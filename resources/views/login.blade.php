@extends('layout')
@section('title', 'Login')
@section('content')
    <div class='container'>
        <div class='mt-5'>
            @if($errors->any())
                <div class="col-12">
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                </div>
            @endif

            @if(session()->has('error'))
                <div class='alert alert-danger'>{{session('error')}}</div>
            @endif

            @if(session()->has('success'))
                <div class='alert alert-danger'>{{session('success')}}</div>
            @endif
        </div>
            
        <div class="form-container">
            <form action="{{route('login.post')}}" method="POST">
                @csrf
                <h3>Login Now</h3>
                <input type="email" name="email" required placeholder="enter your email">
                <input type="password" name="password" required placeholder="enter your password">
                <p>Forgot Password? <a href="ForgotPassword"> Click Here Now</a></p>
                <button type="submit" class="btn">Log In</button>
            </form>
        </div>
    </div>
@endsection