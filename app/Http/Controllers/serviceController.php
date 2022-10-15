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
        return view('services', ['services' => $services]);
    }
    public function viewService($id)
    {
        $service = service::where('id', $id)->get();
        $photos = photo::where('service_id', $id)->get();
        return view('viewService', ['service' => $service, 'photos' => $photos]);
    }
}
