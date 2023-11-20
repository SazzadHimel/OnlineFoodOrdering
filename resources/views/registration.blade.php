@extends('layout')
@section('title', 'Register')
@section('content')
    <div class="form-container">
        <form action="{{route('registration.post')}}" method="POST">
            @csrf
            <h3>Sign-Up Now</h3>
            <select name="user_type">
                <option value="manager">Manager</option>
                <option value="customer">Customer</option>
            </select>
            <input type="text" name="name" required placeholder="enter your name">
            <input type="email" name="email" required placeholder="enter your email">
            <input type="text" name="address" required placeholder="enter your address">
            <input type="text" name="phone_number" required placeholder="enter your phone number">
            <input type="password" name="password" required placeholder="enter your password">
            <button type="submit" class="btn">Sign Up</button>
        </form>
    </div>
@endsection