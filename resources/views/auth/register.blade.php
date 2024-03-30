@extends('layouts.app')
@section('content')

<section>


    <div class="contentBx">

        <div class="formBx">


            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div id=section1>
                    <h2>Create account</h2>
                    <p class="description">Enter your info to get access to all feature</p>


                    <div class="inputBx">
                        <span>Username</span>
                        <input id="name" type="text"
                        class=" form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="inputBx">
                        <span>Email</span>
                        <input id="email" type="email"
                        class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="inputBx">
                    <span>Passward</span>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="inputBx">
                    <span>confirm Passward</span>
                    <input id="password-confirm" type="password" class="form-control"
                    name="password_confirmation" required autocomplete="new-password">

                    </div>



                    <div class="haveAccount">
                        <p>You already have an account? <a href="/login"> login</a></p>
                    </div>
                </div>  <!-- section1 end-->


                <div id="section2" style="display: none;">
                    <div class="row wrap-button">

                    <button type="button" class="special_button " onclick="setAccountType('organization')">
                        <i class="fa fa-users"></i>
                        <h2>Organization</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, consectetur!</p>
                    </button>
                    <button type="button" class="special_button  " onclick="setAccountType('individual')">
                        <i class="fa fa-user-circle"></i>
                        <h2>Individual</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, consectetur!</p>
                    </button>
                    </div>
                    <input type="hidden" name="account_type" id="accountType" >


                </div>  <!-- section2 end-->

                <div id=section3>

                    <div id="organizationFields" style="display: none;">
                        <h2>Enter your organization info</h2>
                        <p class="description">Individual account is owned/manged by multiple users.</p>


                        <div class="inputBx">
                            <span>organization Name</span>
                            <input id="organization_name" type="text" class=" form-control @error('organization_name') is-invalid @enderror" name="organization_name" value="{{ old('organization_name') }}" >

                                @error('organization_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="inputBx">
                            <span>Address</span>
                            <input id="address" type="text" class=" form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" >

                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="inputBx">
                            <span>city and town</span>
                            <input id="city" type="text" class=" form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" >

                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="inputBx">
                            <span>Organization Phone </span>
                            <input id="organization_phone" type="text" class=" form-control @error('organization_phone') is-invalid @enderror" name="organization_phone" value="{{ old('organization_phone') }}" >

                            @error('organization_phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div><!-- organizationFields-->

                    <div id="individualFields" style="display: none;">
                        <h2>Individual</h2>
                        <p class="description">Individual account is owned/manged by only one user.</p>


                        <div class="inputBx">
                            <span>Job Title</span>
                            <input id="job_title" type="text" class=" form-control @error('job_title') is-invalid @enderror" name="job_title" value="{{ old('job_title') }}" >

                            @error('job_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="inputBx">
                            <span>Bank Account</span>
                            <input id="bank_account" type="text" class=" form-control @error('bank_account') is-invalid @enderror" name="bank_account" value="{{ old('bank_account') }}" >

                            @error('bank_account')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="inputBx">
                            <span>Phone</span>
                            <input id="phone" type="text" class=" form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" >

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="inputBx">
                            <span>Iban </span>
                            <input id="iban" type="text" class=" form-control @error('iban') is-invalid @enderror" name="iban" value="{{ old('iban') }}" >

                            @error('iban')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div><!-- end of individualFields-->


                </div>  <!-- section3 end-->



                <div id="navigationButtons">
                    <div class="inputBx">
                    <button type="button" onclick="previousSection()" id="prevButton"
                        style="display: none;">Previous</button>
                    <button type="button" onclick="nextSection()" id="nextButton">Next</button>
                    <button type="submit" id="registerButton" style="display: none;">Register</button>

                    </div>

                </div>

            </form>

        </div>

    </div>




    <div class="imgBx">
        <img src="{{asset('assets/images/img45.jpg')}}" alt="">

    </div>

   </section>

@endsection


@section('scripts')
    <script>
        var currentSection = 1;
        var totalSections = 3;

        function showSection(section) {
            for (var i = 1; i <= totalSections; i++) {
                var sectionElement = document.getElementById('section' + i);
                sectionElement.style.display = i === section ? 'block' : 'none';
            }
        }

        function showNavigationButtons() {
            var prevButton = document.getElementById('prevButton');
            var nextButton = document.getElementById('nextButton');
            var registerButton = document.getElementById('registerButton');

            if (currentSection === 1) {
                prevButton.style.display = 'none';
            } else {
                prevButton.style.display = 'block';
            }

            if (currentSection === totalSections) {
                nextButton.style.display = 'none';
                registerButton.style.display = 'block';
            } else {
                nextButton.style.display = 'block';
                registerButton.style.display = 'none';
            }
        }

        function previousSection() {
            if (currentSection > 1) {
                currentSection--;
                showSection(currentSection);
                showNavigationButtons();
            }
        }

        function nextSection() {
            if (currentSection < totalSections) {
                currentSection++;
                showSection(currentSection);
                showNavigationButtons();
            }
        }

        function showFields(value) {
            if (value === 'individual') {
                document.getElementById('individualFields').style.display = 'block';
                document.getElementById('organizationFields').style.display = 'none';
                document.getElementById('section3').style.display = 'block'; // Add this line
            } else if (value === 'organization') {
                document.getElementById('individualFields').style.display = 'none';
                document.getElementById('organizationFields').style.display = 'block';
                document.getElementById('section3').style.display = 'block'; // Add this line
            }
        }

        function setAccountType(value) {
            document.getElementById('accountType').value = value;

            if (value === 'organization') {
                document.getElementById('organizationFields').style.display = 'block';
                document.getElementById('individualFields').style.display = 'none';
            } else if (value === 'individual') {
                document.getElementById('individualFields').style.display = 'block';
                document.getElementById('organizationFields').style.display = 'none';
            }

            showNavigationButtons();
        }

        showSection(currentSection);
        showNavigationButtons();
    </script>
@endsection
