@extends('layout')
@section('content')
    <main>
        <div class="ms-auto mt-5" style="width: 500px">
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
            <p>A link will be sent to your email to reset the password.</p>
            <div class="form-container">
            <form action="{{route('reset.password.post')}}" method="POST">
                @csrf
                <input type='text' name="token" hidden value="{{$token}}">
                <h3>Login Now</h3>
                <div class='md-3'>
                    <label class="form-label">Email Address</label>
                    <input type="email" class='form-control' name='email'>
                </div>

                <div class='md-3'>
                    <label class="form-label">Enter New Password</label>
                    <input type='email' class='form-control' name='password'>
                </div>

                <div class='md-3'>
                    <label class="form-label">Confirm Password</label>
                    <input type='email' class='form-control' name='password_confirmation'>
                </div>

                <button type="submit" class="btn">Log In</button>
            </form>
        </div>
</main>

@endsection