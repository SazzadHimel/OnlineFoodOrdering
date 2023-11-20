@extends('layout')
@section('title', 'Online Food Ordering System')
@section('content')
    <div class="header">
        <nav>
            <a href="welcome"><img src="img\logo_Mesa de trabajo 1 copia 2.png"></a>
            <h1 class="title">Online Food Order</h1>
            <div class="nav-bar" id="navbar">
                <i class="fa-solid fa-xmark" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="#">Profile</a></li>
                    <li><a href="about">About</a></li>
                    <li><a href="menu">Menu</a></li>
                    <li><a href="{{route('logout')}}"><button class="btn">Logout</button></a></li>
                </ul>
            </div>
            <i class="fa-solid fa-bars" onclick="showMenu()"></i>
        </nav>
        <div class="text-box">
            <h1>Your balance is: </h1>
        </div>
    </div>
@endsection