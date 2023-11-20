<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function adminprofile()
    {
        $user = Auth::user();
        return view('Admin.adminprofile', compact('user'));
    }

    public function managerprofile()
    {
        $user = Auth::user();
        return view('Manager.managerprofile', compact('user'));
    }

    public function customerprofile()
    {
        $user = Auth::user();
        return view('Customer.customerprofile', compact('user'));
    }
}