<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\group_activity;
use App\Models\photo;

class groupActivityController extends Controller
{
    public function viewActivities(){
        $groupActivities = group_activity::all();
        return view('groupActivities', ['groupActivities' => $groupActivities]);
    }
    public function viewActivity($id){
        $groupActivity = group_activity::where('id', $id)->get();
        return view('viewGroupActivity', ['groupActivity' => $groupActivity]);
    }
    public function editActivity($id){

    }
    public function createActivity(Request $request){

    }
    public function removeActivity($id){

    }

}
