<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\photo;
use App\Models\post;

class postController extends Controller
{
    public function viewPosts(){
        $posts = post::all();
        return view('Posts', ['posts' => $posts]);
    }
    public function viewPost($id){
        $post = post::where('id', $id)->get();
        return view('PostView', ['post' => $post]);
    }
    public function viewAddPost(){

    }
    public function addPost(Request $request){

    }
    public function editPost($id){

    }
    public function removePost($id){

    }
}
