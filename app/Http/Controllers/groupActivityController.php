<?php

namespace App\Http\Controllers;

use App\Models\group;
use App\Models\group_member;
use Illuminate\Http\Request;
use App\Models\group_activity;
use App\Models\photo;

class groupActivityController extends Controller
{
    public function viewActivities()
    {
        $groupActivities = group_activity::all();
        return view('GroupActivities', ['groupActivities' => $groupActivities]);
    }

    public function viewActivity($id)
    {
        if(group_activity::find($id)==null) {return back();}
        $groupActivity = group_activity::where('id', $id)->get();
        return view('GroupActivityView', ['groupActivity' => $groupActivity]);
    }
    public function viewCreate()
    {
        return view('GroupActivityAdd');
    }

    public function createActivity(Request $request)
    {

        request()->validate([
            'title' => 'required',
            'photo_url' => 'required',
            'photo_url.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'size' => 'required',
            'description' => 'required',

        ]);

        $activity = new group_activity();
        $activity->title = request('title');
        $activity->description = request('description');
        $activity->size = request('size');
        $activity->free_spaces = request('size');
        $activity->save();

        $group = new group();
        $group->name=request('title');
        $group->group_activity_id = $activity->id;
        $group->save();

        if ($request->hasfile('photo_url')) {
            foreach ($request->file('photo_url') as $image) {
                $name = $image->getClientOriginalName();
                $image->move(public_path() . '/images/', $name);
                $form = new photo();
                $form->photo_url = $name;
                $form->group_activity_id = $activity->id;
                $form->save();
            }
        }

        return redirect('/groupActivities')->with('success', 'Veikla sukurta!');
    }
    public function viewRegister($id)
    {
        if(group_activity::find($id)==null) {return back();}
        $groupActivity = group_activity::where('id', $id)->get();
        return view('GroupActivityRegister', ['groupActivity' => $groupActivity]);
    }
    public function createGroupMemeber($id)
    {
        if(group_activity::find($id)==null) {return back();}
        request()->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'gender' => 'required',
            'age' => 'required',
        ]);
        $group = group::where('group_activity_id', $id)->first();
        $groupMember = new group_member();
        $groupMember->name = request('name');
        $groupMember->surname = request('surname');
        $groupMember->email = request('email');
        $groupMember->phone_number = request('phone_number');
        $groupMember->gender = request('gender');
        $groupMember->age = request('age');
        $groupMember->group_id = $group->id;
        $groupMember->save();


        $groupActivity = group_activity::where('id', $id)->first();
        $groupActivity->free_spaces = $groupActivity->free_spaces - 1;
        $groupActivity->save();



        return redirect('/groupActivities')->with('success', 'Užsiregistravote grupinėje veikloje!');;
    }
    public function viewEdit($id)
    {
        if(group_activity::find($id)==null) {return back();}
        $activity = group_activity::where('id', $id)->get();
        return view('GroupActivityEdit', ['activity' => $activity]);
    }
    public function editActivity(Request $request,$id)
    {
        if(group_activity::find($id)==null) {return back();}
        request()->validate([
            'title' => 'required',
            'description' => 'required',
            'size' => 'required',
        ]);
        group_activity::where('id', $id)->update([
            'title' => request('title'),
            'description' => request('description'),
            'size' => request('size'),
        ]);

        if ($request->hasfile('photo_url')) {
            foreach ($request->file('photo_url') as $image) {
                $name = $image->getClientOriginalName();
                $image->move(public_path() . '/images/', $name);
                $form = new photo();
                $form->photo_url = $name;
                $form->group_activity_id = $id;
                $form->save();
            }
        }
        return redirect('/groupActivities')->with('success', 'Grupinė veikla atnaujinta!');
    }


    public function deleteActivity($id)
    {
        if(group_activity::find($id)==null) {return back();}
        $group=group::where('group_activity_id',$id)->get();
        group_member::where('group_id',$group[0]->id)->delete();
        group::where('group_activity_id',$id)->delete();
        group_activity::where('id', $id)->delete();
        return redirect('/groupActivities')->with('success', 'Grupinė veikla pašalinta!');
    }

}
