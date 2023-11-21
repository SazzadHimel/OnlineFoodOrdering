<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthManager extends Controller
{
    function login(){
        return view('login');
    }

    function registration(){
        return view('registration');
    }

    function loginPost(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        $credintials = $request->only('email','password');
        if (Auth::attempt($credintials)){
            $user = Auth::user();
            if ($user->user_type == 'admin') {
                return redirect()->route('Admin.adminprofile');
            } elseif ($user->user_type == 'manager') {
                return redirect()->route('Manager.managerprofile');
            } elseif ($user->user_type == 'customer') {
                return redirect()->route('Customer.customerprofile');
            }
        }
        return redirect(route('login'))->with('error');
    }

    function registrationPost(Request $request){
        $request->validate([
            'user_type'=>'required',
            'name'=>'required',
            'email'=>'required|unique:users|email',
            'address'=>'required',
            'phone_number'=>'required',
            'password'=>'required',
        ]);
        
        $data['user_type'] = $request->user_type;
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        $data['phone_number'] = $request->phone_number;
        $data['password'] = Hash::make($request->password);
        $User = User::create($data);
        
        if (!$User){
            return redirect(route('registration'))->with('error','Registration Failed Try again');
        }
        return redirect(route('login'))->with('success','Registration successful');
    }
    
    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('welcome'));
    }
}
