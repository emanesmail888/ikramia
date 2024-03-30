@extends('layouts.app')

@section('content')

<section>


    <div class="contentBx">

        <div class="formBx">

            <h2>Login</h2>
            <p class="description">Enter your info to get access to all feature</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="inputBx">
                    <span>Email</span>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="inputBx">
                    <span>Passward</span>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="forget_password">
                    <a href="{{ route('forget') }}">forget password</a>
                </div>

                <div class="remember">
                    <label for="">  Remember Me</label>
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                </div>

                <div class="inputBx">
                    <input type="submit" name="login" value="Login">
                </div>


                <div class="haveAccount">
                    <p>Don't have an accoun? <a href="{{route('register')}}"> Sign Up</a></p>
                </div>

            </form>

        </div>

    </div>




    <div class="imgBx">
        <img src="{{asset('assets/images/img42.jpg')}}" alt="">

    </div>

   </section>

@endsection
