@extends('layouts.app')
@section('content')

<div class="container content">
    <section id="content">
        <div class="contentBx">
           <div class="formBx">
                <h2>Recover Your Password </h2>
                <p class="description">We will send acode to recover your account</p>
                
                @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
                @endif

                <form method="POST" action="{{ route('forget_password') }}">
                    @csrf

                        <div class="inputBx">

                            <span>Email</span>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required  >
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="inputBx">
                            <input type="submit" name="submit" value="Send Recovery Code">
                        </div>

                </form>
            </div>
        </div>

        <div class="imgBx">
            <img src="{{asset('assets/images/img46.jpg')}}" alt="">

        </div>
    </section>
</div>


@endsection



