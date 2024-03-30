

@extends('layouts.app')

@section('content')
<div class="container content">
    <section id="content">
        <div class="contentBx">

           <div class="formBx">
            <h2>Create New Password</h2>
            <p class="description">Enter the 8 digits code to continue recover your email</p>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password_reset') }}">
                @csrf
                        <!-- Display error message if it exists -->
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                        @endif

                        <div class="inputBx">
                            <span>Email</span>
                           <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="inputBx">
                            <span>password</span>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required >

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="inputBx">
                            <span>confirm Password</span>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required >
                        </div>
                        <input type="hidden" name="code_otp" value="{{$code }}">


                        <div class="inputBx">
                            <input type="submit" value="Recover your password">
                        </div>

                </form>
            </div>
        </div>

        <div class="imgBx">
            <img src="{{asset('assets/images/img41.jpg')}}" alt="">

        </div>
    </section>
</div>


@endsection
