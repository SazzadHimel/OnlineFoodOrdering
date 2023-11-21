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
            <div class="ms-auto mt-5" style="width: 500px">
                <p>A link will be sent to your email to reset the password.</p>
                <div class="form-container">
                <form action="{{route('ForgotPasswordPost')}}" method="POST">
                    @csrf
                    <h3>Enter your email address</h3>
                    <input type="email" name="email" required placeholder="enter your email">
                    <button type="submit" class="btn">Log In</button>
            </div>
            </form>
        </div>
</main>

@endsection