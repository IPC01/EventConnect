@extends('layouts.base')

@section('Content')
<div class="container">
<style>
  
  .bg-login-image {
    background-color: #1D3557;
    position: relative;
    overflow: hidden;
    min-height: 100vh; /* Fill the entire viewport height */
    display: flex;
    align-items: center;
    justify-content: center;
    width: 45%; /* Take up almost half of the screen */
    margin: 0; /* Remove any margin */
    padding: 0; /* Remove any padding */
}

/* Create the diagonal white shape */
.bg-login-image:after {
    content: "";
    position: absolute;
    top: 0;
    right: -50px; /* Adjust to push the diagonal edge further right */
    width:   15%; /* Increase width to ensure it covers the edge */
    height: 100%;
    background-color: white;
    transform: skewX(-20deg);
    transform-origin: top right;
    z-index: 1;
}

/* Keep the default image visible */
.bg-login-image img {
    position: relative;
    z-index: 3;
    max-width: 100%;
    height: auto;
}

.card {
    height: 100vh;
    margin: 0 !important;
    border-radius: 0;
}

.card-body {
    height: 100%;
}

.row {
    height: 100%;
    margin: 0;
}

/* Adjust the right column to take remaining space */
.col-lg-5 {
    padding: 0 2rem;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Remove outer margins and padding */
.container, .row, .col-xl-10, .col-lg-12, .col-md-9, .mt-5 {
    padding: 0;
    margin: 0;
    max-width: 100%;
}

.col-xl-10, .col-lg-12, .col-md-9 {
    flex: 0 0 100%;
    max-width: 100%;
}
</style>
    <!-- Outer Row -->
    <div class="">

                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image">
                            {{-- <img src="{{asset('img/login_ilustracao.png')}}" alt="" srcset=""> --}}
                        </div>
                        <div class="col-lg-4 offset-2" style="margin-top: 100px">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login!</h1>
                                </div>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" id="email" name="email" 
                                            placeholder="Enter Email Address..." value="{{ old('email') }}" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" 
                                            placeholder="Password" required autocomplete="current-password">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="remember" name="remember">
                                            <label class="custom-control-label" for="remember">Remember Me</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn  btn-user btn-block" style="background-color: #1D3557;color:white">
                                        Login
                                    </button>
                                    <hr>
                                    {{-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                        <i class="fab fa-google fa-fw"></i> Login with Google
                                    </a>
                                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                        <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                    </a> --}}
                                </form>
                                
                                <div class="text-center">
                                    <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{ route('register') }}">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
               
           

      

    </div>

</div>  
@endsection
