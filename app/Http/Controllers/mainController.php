<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class mainController extends Controller
{
    public function showMain()
    {
        $posts = post::orderBy('created_at', 'desc')->take(2)->get();
        return view('main', ['posts' => $posts]);
    }
}
