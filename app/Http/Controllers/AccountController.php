<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Role;


class AccountController extends Controller
{
    public function login(){
        return view('account.login');
    }

    public function signin(Request $request){
        $data=$request->only('username','password');
        if(Auth::attempt($data)){
            $user = User::find(Auth::user()->id);
            if($user->hasRole('Admin')){
                return redirect()->route('index-admin');
            }
            return redirect()->route('index-employee');
        }
        return redirect()->back()->with('message','Login Error, Invalid Credentials');
    }

    public function signout(){
        Auth::Logout();
        session::flush();
        return redirect('login');
    }
}
