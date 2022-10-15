<?php

namespace App\Http\Controllers;

use App\Models\photo;
use Illuminate\Http\Request;

class photoController extends Controller
{
    public function showPhotos()
    {
        $photos = photo::all();
        return view('photos', ['photos' => $photos]);
    }

        public function create()
    {
        return view('upload');
    }

        public function store(Request $request)
    {
        $this->validate($request, [

            'photo_url' => 'required',
            'photo_url.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);

        if($request->hasfile('photo_url'))
        {

            foreach($request->file('photo_url') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/', $name);
                $form= new photo();
                $form->photo_url=$name;
                $form->save();
            }
        }

        return back()->with('success', 'Your images has been successfully');
    }
}
