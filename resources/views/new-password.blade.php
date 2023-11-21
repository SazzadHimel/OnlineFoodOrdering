@extends('layout')
@section('content')
    <main>
        <div>
            <div>
                @if($errors->any())
                    <div></div>
                        @foreach($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                    </div>
                @endif

                @if(session()->has('error'))
                    <div>{{session('error')}}</div>
                @endif

                @if(session()->has('success'))
                    <div>{{session('success')}}</div>
                @endif
            </div>
            <div class="form-container">
            <form action="{{route('reset.password.post')}}" method="POST">
                @csrf
                <input type='text' name="token" hidden value="{{$token}}">
                <h3>Reset Your Password</h3>
                <div>
                    <label>Email Address</label>
                    <input type="email" class='form-control' name='email'>
                </div>

                <div>
                    <label></label>Enter New Password</label>
                    <input type='password' name='password'>
                </div>

                <div class='md-3'>
                    <label class="form-label">Confirm Password</label>
                    <input type='password'name='password_confirmation'>
                </div>

                <button type="submit" class="btn">submit</button>
            </form>
        </div>
</main>

@endsection