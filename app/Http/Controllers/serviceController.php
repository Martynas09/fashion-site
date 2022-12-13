<?php

namespace App\Http\Controllers;

use App\Models\photo;
use App\Models\service;
use Illuminate\Http\Request;
use App\Mail\Purchase;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

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
    public function viewPurchase($id){
        $service = service::where('id', $id)->get();
        return view('ServicePurchase', ['service' => $service]);
    }
    public function purchaseService(Request $request,$id){
        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
        ]);
        $service = service::where('id', $id)->get();
        $email=request('email');
        $name=request('name');
        $title=$service[0]->title;
        Mail::to($email)->send(new Purchase($email,$name,$title));


        return redirect('/services')->with('success', 'Paslauga sėkmingai užsakyta!');
    }
    public function viewEdit($id){
        $service = service::where('id', $id)->get();
        return view('ServiceEdit', ['service' => $service]);
    }
    public function editService(Request $request,$id){
        request()->validate([
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',

        ]);
        service::where('id', $id)->update([
            'title' => request('title'),
            'price' => request('price'),
            'description' => request('description'),
        ]);

        if($request->hasfile('photo_url'))
        {
            foreach($request->file('photo_url') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/', $name);
                $form= new photo();
                $form->photo_url=$name;
                $form->service_id=$id;
                $form->save();
            }
        }

        return redirect('/services')->with('success', 'Paslauga atnaujinta!');
    }

    public function deleteService($id)
    {
        photo::where('service_id', $id)->delete();
        service::where('id', $id)->delete();
        return redirect('/services')->with('success', 'Paslauga sėkmingai ištrinta!');
    }

}
