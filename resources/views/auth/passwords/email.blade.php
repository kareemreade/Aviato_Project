<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <style>
                            @import url("https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap");

                    html {
                    height: 100%;
                    }

                    body {
                    overflow-x: hidden;
                    font-family: "Open Sans", sans-serif;
                    /* background: url(../img/Background.png); */
                    background-size: cover;
                    display: flex;
                    flex-direction: column;

                    /* Avoid the IE 10-11 `min-height` bug. */
                    height: 100vh;
                    }

                    /*-----------------------------------------------------*/
                    /*------|              GLOBAL STYLE             |------*/
                    /*-----------------------------------------------------*/

                    /*--- Logo Style --*/
                    .logo {
                    width: 28rem;
                    border-radius:20px;
                    height: 400px;
                    }

                    /*--- Content Section --*/
                    .content-box {
                    margin: 1rem;
                    padding: 2rem;
                    background-color: rgb(255, 255, 255);
                    -webkit-box-shadow: 0px 0px 10px 2px #b3b3b3;
                    box-shadow: 0px 0px 10px 2px #b3b3b3;

                    /* Prevent Chrome, Opera, and Safari from letting these items shrink to smaller than their content's default minimum size. */

                    }


                    main h3 {
                    font-size: 2.1rem;
                    font-weight: 700;
                    margin: 2rem;
                    }

                    main p {
                    margin: 2rem 1rem 0;
                    font-size: 1em;
                    color: #4b4b4b;
                    }

                    hr {
                    margin-top: 3.4rem;
                    }

                    /*--- Form Section --*/
                    main input {
                    margin-top: 0.8rem;
                    }

                    .btn-lg {
                    border-width: medium;
                    border-radius: 0;
                    padding: 0.5rem 3rem;
                    font-size: 1.1rem;
                    margin-top: 2rem;
                    color: white;
                    background-color: #1ebba3;
                    border-color: #1ebba3;
                    }

                    /*--- Error Section --*/
                    .error-box img {
                    width: 3rem;
                    margin: 0.5rem;
                    }

                    .error-box {
                    margin-top: 1rem;
                    margin-bottom: 0;
                    }

                    /*--- Footer Section --*/
                    footer {
                    background-color: #40474e;
                    color: white;
                    padding: 1.7rem;
                    height: 5rem;

                    /* Prevent Chrome, Opera, and Safari from letting these items shrink to smaller than their content's default minimum size. */
                    flex-shrink: 0;
                    }

                    footer p {
                    margin: 0;
                    }

                    /* media query for 767px */
                    @media screen and (max-width: 767px) {
                    .logo {
                        width: 12rem;
                    }

                    main h3 {
                        font-size: 1.6rem;
                    }
                    }

                    /*-----------------------------------------------------*/
                    /*------|           ADDINTIONAL STYLE           |------*/
                    /*-----------------------------------------------------*/

                    /*--- Login Page --*/
                    #password-forgot {
                    text-align: right;
                    }

                    /*--- Forgot Password Page --*/
                    .reset-password-page h3 {
                    color: #0087dc;
                    }

    </style>
</head>
<body>


    <div class="container-fluid text-center"  >
        <div class="content-box col-xl-5 col-lg-7 col-md-9 col-sm-11 col-xs-12 mx-auto">
          <div class="reset-password-page">
              <img src="{{ asset('Adminasset/img/nati-melnychuk-6WCdYfzY-TA-unsplash.jpg') }}"  class="logo" alt="site logo">

            <main class="signup">
              <h3>Forgot Your Password?</h3>
              <p>Don't worry. Resetting your password is easy, just tell us the email address you registered with iGallery to request a password reset.</p>
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

              <form method="POST" action="{{ route('password.email') }}" class="needs-validation" novalidate>
                @csrf
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
                <button type="submit" class="btn btn-lg  btn-outline-dark">
                    {{ __('Send Password Reset Link') }}
                </button>
              </form>
            </main>

          </div>
        </div>
      </div>

</body>
</html>





























{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
