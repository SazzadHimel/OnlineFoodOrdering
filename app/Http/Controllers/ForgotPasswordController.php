<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    function ForgotPassword(){
        return view("ForgotPassword");
    }

    function ForgotPasswordPost(Request $request){
        $request->validate([
            'email' => "required|email|exists:users",
        ]);

        $token = Str::random(length:8);

        DB::table("password_reset_tokens")->insert([
            "email"=> $request->email,
            "token"=> $token,
            "created_at" => carbon::now()

        ]);

        Mail::send("emails.forgotPassword", ['token'=>$token], function ($message) use ($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return redirect()->to(route(name:"ForgotPassword"))
        ->with('success','We have sent an email to reset your password');


    }

    function ResetPassword($token){
        return view("new-password",compact(var_name:"token"));
    }

    function ResetPasswordPost(Request $request){
        $request->validate([
            "email"=> "required|email|exists:users",
            "password"=> "required|string|min:6|confirmed",
            "password_confirmed"=> "required"
        ]);

        $update_password = DB::table("password_reset_tokens")
        ->where([
            "email"=>$request->email,
            'token'=> $request->token,

        ])->first();

        if (! $update_password){
            return redirect()->to(route(name:'reset.password'))->with('Error','Invalid');
        }

        User::where('email',$request->email)
            ->update(['password'=> Hash::make(value: $request->password)]);
        
        DB::table(table:"password_reset_tokens")->where("email",$request->email)->delete();

        return redirect()->to(route(name:"login"))->with("success","Password has been reset successfully");

    }
}

