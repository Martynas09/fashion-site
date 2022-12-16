<?php

namespace App\Http\Controllers;

use App\Mail\notifyGroup;
use App\Models\group;
use App\Models\group_activity;
use App\Models\group_member;
use App\Models\photo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\admin;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class adminController extends Controller
{
    public function showLogin()
    {
        return view('AdminLogin');
    }

    public function signIn()
    {
        $google2fa = app('pragmarx.google2fa');

        request()->validate([
            'username' => 'required|max:254|exists:admin',
            'password' => 'required',
            'otp' => 'required'
        ]);
        $data = admin::select('*')->where([['username', '=', request('username')]])->get();
        if (!$data->isEmpty() && Hash::check(request('password'), $data[0]->password)) {
            if (count($data) > 0) {
                Session::put('username', "Inga");
                Session::put('role', "admin");
                if ($google2fa->verifyGoogle2FA($data[0]->google2fa_secret, request('otp')) == 1) {
                    return redirect('/')->with('success', 'Sėkmingai prijungta prie administratoriaus paskyros');;
                } else {
                    return redirect('/admin')->with('error', 'Neteisingas OTP kodas');
                }
            } else {
                return redirect('/admin')->with('error', 'Neteisingas slapyvardis arba slaptažodis');
            }
        }
        else{
            return redirect('/admin')->with('error', 'Neteisingas slapyvardis arba slaptažodis');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/');
    }

    public function deletePhoto($id){
        if(photo::find($id)==null) {return back();}
        $photo=photo::where('id',$id)->get();
        File::delete('/images/'.$photo[0]->photo_url);
        photo::where('id', $id)->delete();
        return back()->with('success', 'Nuotrauka ištrinta.');
    }

}
