@extends('auth.index_login')
@section('title', 'Register')
@section('content')
    <div class="col col-login mx-auto mt-7">
        <div class="text-center">
            <img src="../assets/images/brand/logo.png" class="header-brand-img" alt="">
        </div>
    </div>
    <div class="container-login100">
        <div class="wrap-login100 p-0">
            <div class="card-body">
                <form class="login100-form validate-form">
                    <span class="login100-form-title">
                        Registration
                    </span>
                    <div class="wrap-input100 validate-input" data-bs-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" placeholder="User name">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="mdi mdi-account" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-bs-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="zmdi zmdi-email" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-bs-validate = "Password is required">
                        <input class="input100" type="password" name="pass" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="zmdi zmdi-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <label class="custom-control custom-checkbox mt-4">
                        <input type="checkbox" class="custom-control-input">
                        <span class="custom-control-label">Agree the <a href="terms.html">terms and policy</a></span>
                    </label>
                    <div class="container-login100-form-btn">
                        <a href="index.html" class="login100-form-btn btn-primary">
                            Register
                        </a>
                    </div>
                    <div class="text-center pt-3">
                        <p class="text-dark mb-0">Already have account?<a href="login.html" class="text-primary ms-1">Sign
                                In</a></p>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center my-3">
                    <a href="" class="social-login  text-center me-4">
                        <i class="fa fa-google"></i>
                    </a>
                    <a href="" class="social-login  text-center me-4">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href="" class="social-login  text-center">
                        <i class="fa fa-twitter"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
