<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class adminController extends Controller
{
    public function showLogin()
    {
        return view('AdminLogin');
    }

    public function signIn()
    {
        request()->validate([
            'username' => 'required|max:254|exists:admin'
        ]);

        $data = admin::select('*')->where([['username', '=', request('username')]])->get();
        if (!$data->isEmpty() && Hash::check(request('password'), $data[0]->password)) {
            if (count($data) > 0) {
                Session::put('username', "Inga");
                Session::put('role', "admin");
                return redirect('/');
            } else {
                return redirect('/admin')->with('alert', 'Neteisingas slaptažodis');
            }
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/');
    }

}
