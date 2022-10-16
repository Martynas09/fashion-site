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
}
