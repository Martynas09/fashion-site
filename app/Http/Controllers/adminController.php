<?php

namespace App\Http\Controllers;

use App\Models\group_activity;
use App\Models\group_member;
use Illuminate\Http\Request;
use App\Models\admin;
use Illuminate\Support\Facades\Hash;
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

}
