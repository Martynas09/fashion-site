<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\photo;
use App\Models\post;

class postController extends Controller
{
    public function viewPosts(){
        $posts = post::orderBy('created_at', 'desc')->get();
        return view('Posts', ['posts' => $posts]);
    }
    public function viewAddPost(){
        return view('PostAdd');
    }
    public function addPost(Request $request){
        request()->validate([
            'photo_url' => 'required',
            'photo_url.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $post = new post();
        if(request('description') != null){
            $post->description = request('description');
        }

        $post->created_at = Carbon::now()->format('y-m-d');
        $post->save();

        if($request->hasfile('photo_url'))
        {
                $name=$request->file('photo_url')->getClientOriginalName();
                $request->file('photo_url')->move(public_path().'/images/', $name);
                $form= new photo();
                $form->photo_url=$name;
                $form->post_id=$post->id;
                $form->save();
        }

        return redirect('/posts');

    }
    public function editPost($id){

    }
    public function removePost($id){

    }
}
