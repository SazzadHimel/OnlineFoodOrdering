@extends('layout')
@section('title', 'Online Food Ordering System')
@section('content')
    <div class="header">
        <nav>
            <img src="img\logo_Mesa de trabajo 1 copia 2.png">
            <h1 class="title">Online Food Order</h1>
            <div class="nav-bar" id="navbar">
                <i class="fa-solid fa-xmark" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="welcome">Home</a></li>
                    <li><a href="about">About</a></li>
                    <li><a href="menu">Menu</a></li>
                    <li><a href="login"><button class="btn">Login</button></a></li>
                    <li><a href="registration"><button class="btn">Sign Up</button></a></li>
                </ul>
            </div>
            <i class="fa-solid fa-bars" onclick="showMenu()"></i>
        </nav>
        <div class="text-box">
            <h1>Welcome To<br>Online Food Order</h1>
            <p>Enjoy Your Food At Home</p>
            <a href="welcome" class="main-btn">Click To Know More</a>
        </div>
    </div>
@endsection