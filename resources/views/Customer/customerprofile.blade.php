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
                    <li><a href="{{route('logout')}}"><button class="btn">Logout</button></a></li>
                </ul>
            </div>
            <i class="fa-solid fa-bars" onclick="showMenu()"></i>
        </nav>
        <div class="text-box">
            <h1>Welcome {{ $user->name }}<br>This is {{ $user->user_type }} Page</h1>
            <p>Wallet ID: {{$user->wallet_id}}</p>
            <a href="welcome" class="main-btn">Show wallet</a>
        </div>
    </div>
@endsection