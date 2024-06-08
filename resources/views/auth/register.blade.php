@extends('layouts.app')
@section('content')
    <div class="wrapper">
        <nav class="nav">
            <div class="nav-logo">
                {{-- <p></p> --}}
            </div>

            <div class="nav-button">

                <button class="btn white-btn" id="loginBtn" onclick="login()">Sign In</button>
                <button class="btn" id="registerBtn" onclick="register()">Register</button>
            </div>
            <div class="nav-menu-btn">
                <i class="bx bx-menu" onclick="myMenuFunction()"></i>
            </div>
        </nav>
        <!----------------------------- Form box ----------------------------------->
        <div class="form-box">

            <!------------------- login form -------------------------->
            <div class="login-container" id="login">
                <div class="top">
                    <span>Don't have an account? <a href="#" onclick="register()">Sign Up</a></span>
                    {!! Toastr::message() !!}
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <header>Register</header>
                </div>
                <div class="input-box">
                    <input type="text" class="input-field  form-control  @error('name') is-invalid @enderror"
                        name="name" placeholder="Enter Name" value="{{ old('name') }}" required autocomplete="name"
                        autofocus>

                    <i class="fas fa-user white-icon"></i>
                </div>
                <div class="input-box">
                    <input type="text" class="input-field  form-control  @error('email') is-invalid @enderror"
                        id="email" name="email" placeholder="Username or Email" value="{{ old('email') }}" required
                        autocomplete="off">
                    <i class="fas fa-user white-icon"></i>
                </div>
                <div class="input-box">
                    <input type="password" class="input-field form-control  @error('password') is-invalid @enderror"
                        id="password" name="password" placeholder="Password" required autocomplete="off">
                    <i class="fas fa-lock white-icon"></i>
                </div>
                <div class="input-box">
                    <input type="password" class="input-field form-control  @error('password') is-invalid @enderror"
                        name="password_confirmation" placeholder="Confirm Password" required autocomplete="off"
                        id="password-confirm">
                    <i class="fas fa-lock white-icon"></i>
                </div>
                <div class="input-box">
                    <input type="submit" class="submit" value="Register">
                </div>
                <div class="two-col">
                    <div class="one">
                        <input type="checkbox" id="login-check">
                        <label for="login-check"> Remember Me</label>
                    </div>
                    <div class="two">
                        <label><a href="#">Forgot password?</a></label>
                    </div>
                </div>
            </div>


            </form>
            {{-- -------------------------- --}}



            {{-- <script>
            function Register() {
                window.location.href = "/register";
            }
        </script> --}}
            <script>
                function myMenuFunction() {
                    var i = document.getElementById("navMenu");
                    if (i.className === "nav-menu") {
                        i.className += " responsive";
                    } else {
                        i.className = "nav-menu";
                    }
                }
            </script>

            <script>
                var a = document.getElementById("loginBtn");
                var b = document.getElementById("registerBtn");
                var x = document.getElementById("login");
                var y = document.getElementById("register");

                function login() {
                    window.location.href = "/login";
                    x.style.left = "4px";
                    y.style.right = "-520px";
                    a.className += " white-btn";
                    b.className = "btn";
                    x.style.opacity = 1;
                    y.style.opacity = 0;
                }

                function register() {
                    window.location.href = "/register";
                    x.style.left = "-510px";
                    y.style.right = "5px";
                    a.className = "btn";
                    b.className += " white-btn";
                    x.style.opacity = 0;
                    y.style.opacity = 1;

                }
            </script>
        @endsection
