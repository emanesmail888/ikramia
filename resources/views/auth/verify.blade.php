@extends('layouts.app')

@section('content')

<div class="container content">
    <section id="content">
        <div class="contentBx">

           <div class="formBx">
                <h2>Check your email</h2>
                <p class="description">Enter the 8 digits code to continue recover your email</p>

                @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
                @endif

                <form method="POST" action="{{ route('verify_password') }}">
                    @csrf
                        <div class="inputBx">
                            <span>Recovery code</span>
                            <input type="text" name="code_otp" placeholder="xxxxxxxx">
                        </div>

                        <div class="inputBx">
                            <input type="hidden" name="email"  value="{{ old('email', $input['email'] ?? '') }}">
                        </div>

                        <div class="inputBx">
                            <input type="submit" name="submit" value="Recover your password">
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
