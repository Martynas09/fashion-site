<?php

namespace App\Http\Controllers;

use App\Mail\notifyGroup;
use App\Models\group_activity;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\group;
use App\Models\group_member;
use Illuminate\Support\Facades\Mail;

class groupController extends Controller
{
    public function viewGroups()
    {
        $groupActivities = group_activity::all();
        $currenttime = Carbon::now('GMT+2');
        return view('AdminViewGroups', ['groupActivities' => $groupActivities, 'currenttime' => $currenttime]);
    }
    public function deleteMember($id)
    {
        if(group_member::find($id)==null) {return back();}
        $member = group_member::where('id', $id)->first();
        $group = group::where('id', $member->group_id)->first();
        $activity = group_activity::where('id', $group->group_activity_id)->first();
        group_activity::where('id', $group->group_activity_id)->update(['free_spaces' => $activity->free_spaces + 1]);
        group_member::where('id', $id)->delete();
        return redirect('/viewGroups')->with('success', 'Narys ištrintas.');
    }
    public function viewEditMember($id)
    {
        if(group_member::find($id)==null) {return back();}

        $member = group_member::where('id', $id)->get();
        return view('AdminEditMember', ['member' => $member]);
    }
    public function editMember(Request $request, $id)
    {
        if(group_member::find($id)==null) {return back();}
        request()->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'gender' => 'required',
            'age' => 'required',
        ]);
        $member = group_member::where('id', $id);
        $member->update(['name' => request('name'), 'surname' => request('surname'), 'email' => request('email'), 'phone_number' => request('phone_number'),'gender' => request('gender'), 'age' => request('age')]);
        return redirect('/viewGroups')->with('success', 'Narys atnaujintas.');
    }
    public function clearGroup($id)
    {
        if(group::find($id)==null){
            return back();
        }
        group_member::where('group_id', $id)->delete();
        $group = group::where('id', $id)->first();
        group::where('id', $id)->update(['notified' => 0]);
        $tempActivity=group_activity::where('id', $group->group_activity_id)->first();
        group_activity::where('id', $group->group_activity_id)->update(['free_spaces' => $tempActivity->size, 'start_time' => null]);
        return redirect('/viewGroups')->with('success', 'Grupė išvalyta.');
    }
    public function viewNotify($id)
    {
        if(group_activity::find($id)==null) {return back();}
        $groupActivity = group_activity::where('id', $id)->get();
        return view('AdminNotifyGroup', ['groupActivity' => $groupActivity]);
    }

    public function sendNotify(Request $request, $id)
    {
        if(group_activity::find($id)==null) {return back();}
        request()->validate([
            'description' => 'required',
            'time' => 'required',
            'address' => 'required',
        ]);
        //email information
        $activity = group_activity::where('id', $id)->get();
        $description = request('description');
        $time = request('time');
        $address = request('address');

        //get group members to notify
        $group = group::select('*')->where('group_activity_id', '=', $id)->where('notified', '=', 0)->get();
        $groupMembers = group_member::where('group_id', $group[0]->id)->get();
        foreach ($groupMembers as $groupMember) {
            Mail::to($groupMember->email)->send(new notifyGroup($description, $time, $activity[0]->title, $address));
        }
        //update group notified status
        $grupe = group::where('group_activity_id', $id);
        $grupe->update(['notified' => 1]);
        //update group activity start time
        $activityupdate = group_activity::where('id', $id);
        $activityupdate->update(['start_time' => $time]);
        return redirect('/viewGroups')->with('success', 'Grupė informuota.');
    }

}
