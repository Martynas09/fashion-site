<?php

namespace App\Http\Controllers;

use App\Mail\notifyGroup;
use App\Models\group;
use App\Models\group_activity;
use App\Models\group_member;
use Illuminate\Http\Request;
use App\Models\admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class adminController extends Controller
{
    public function showLogin()
    {
        return view('AdminLogin');
    }

    public function signIn()
    {
        $google2fa = app('pragmarx.google2fa');

        request()->validate([
            'username' => 'required|max:254|exists:admin',
            'password' => 'required',
            'otp'=>'required'
        ]);

        $data = admin::select('*')->where([['username', '=', request('username')]])->get();
        if (!$data->isEmpty() && Hash::check(request('password'), $data[0]->password)) {
            if (count($data) > 0) {
                Session::put('username', "Inga");
                Session::put('role', "admin");
                if ($google2fa->verifyGoogle2FA($data[0]->google2fa_secret, request('otp')) == 1) {
                    return redirect('/');
                } else {
                    return redirect('/admin')->with('error', 'Invalid OTP');
                }
            } else {
                return redirect('/admin')->with('error', 'Invalid username or password');
            }
        }
    }
    public function viewGroups()
    {
        $groupActivities = group_activity::all();
        return view('AdminViewGroups', ['groupActivities' => $groupActivities]);
    }

    public function logout()
    {
        Session::flush();
        return redirect('/');
    }
    public function viewNotify($id)
    {
        $groupActivity= group_activity::where('id', $id)->get();
        return view('AdminNotifyGroup', ['groupActivity' => $groupActivity]);
    }
    public function sendNotify(Request $request,$id)
    {

        request()->validate([
            'description' => 'required',
            'time' => 'required',
            'address' => 'required',
        ]);
        //email information
        $activity= group_activity::where('id', $id)->get();
        $description= request('description');
        $time= request('time');
        $address= request('address');

        //get group members to notify
        $group = group::select('*')->where('group_activity_id', '=', $id)->where('notified', '=', 0)->get();
        $groupMembers = group_member::where('group_id', $group[0]->id)->get();
        foreach ($groupMembers as $groupMember) {
            Mail::to($groupMember->email)->send(new notifyGroup($description,$time,$activity[0]->title,$address));
        }
        //update group notified status
        $grupe = group::where('group_activity_id', $id);
        $grupe->update(['notified' => 1]);
        //update group activity start time
        $activityupdate= group_activity::where('id', $id);
        $activityupdate->update(['start_time' => $time]);
        return redirect('/viewGroups')->with('success', 'Grupė informuota.');
    }
    public function clearGroup($id){

    }

}
