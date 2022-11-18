<?php

namespace App\Http\Controllers;

use App\Models\photo;
use App\Models\service;
use Illuminate\Http\Request;

class serviceController extends Controller
{
    public function showServices()
    {
        $services = service::all();
        return view('Services', ['services' => $services]);
    }
    public function viewService($id)
    {
        $service = service::where('id', $id)->get();
        return view('ServiceView', ['service' => $service]);
    }
    public function viewCreate()
    {
        return view('ServiceAdd');
    }

    public function createService(Request $request)
    {
        request()->validate([
            'title' => 'required',
            'photo_url' => 'required',
            'photo_url.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required',
            'description' => 'required',

        ]);
        $service = new service();
        $service->title = request('title');
        $service->description = request('description');
        $service->price = request('price');
        $service->save();

        if($request->hasfile('photo_url'))
        {
            foreach($request->file('photo_url') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/', $name);
                $form= new photo();
                $form->photo_url=$name;
                $form->service_id=$service->id;
                $form->save();
            }
        }

        return redirect('/services');
    }
    public function editService($id)
    {

    }
    public function removeService($id)
    {

    }

}
