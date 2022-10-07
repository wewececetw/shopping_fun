@extends('front_end.layouts.footer')

@section('content')

<!-- Page Title
		============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1>My Account</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active" aria-current="page">Login</li>
        </ol>
    </div>

</section><!-- #page-title end -->

@php

if(isset($_COOKIE['login_email']) && isset($_COOKIE['login_pass']))
{
	$login_email = $_COOKIE['login_email'];
	$login_pass = $_COOKIE['login_pass'];
	$is_remember = "checked='checked'";
} else {
	$login_email ='';
	$login_pass = '';
	$is_remember = "";
}

@endphp

<!-- Content
		============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">

            <div class="accordion accordion-lg mx-auto mb-0 clearfix" style="max-width: 550px;">

                <div class="accordion-header" id="accordion-login">
                    <div class="accordion-icon" >
                        <i class="accordion-closed icon-lock3"></i>
                        <i class="accordion-open icon-unlock"></i>
                    </div>
                    <div class="accordion-title">
                        Login to your Account
                    </div>
                </div>
                <div class="accordion-content clearfix">
                    <form method="POST" action="{{ route('post.login') }}" id="login-form" name="login-form" class="row mb-0">
                        @csrf
                        <div class="col-12 form-group">
                            <label for="login-form-username">Username:</label>
                            <input name="email" type="email" id="login-form-username" name="login-form-username"
                                value="{{$login_email}}" class="form-control" required="email" />
                            @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="col-12 form-group">
                            <label for="login-form-password">Password:</label>
                            <input name="password" type="password" id="login-form-password" name="login-form-password"
                                value="{{$login_pass}}" class="form-control" required="" />
                            @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="col-12 form-group">
                            <button class="button button-3d button-black m-0" id="login-form-submit"
                                name="login-form-submit" value="login">Login</button>
                            <a href="{{route('password.request')}}" class="float-end">Forgot Password?</a>
                        </div>
                    </form>
                </div>

                <div class="accordion-header" id="accordion-register">
                    <div class="accordion-icon" >
                        <i class="accordion-closed icon-user4"></i>
                        <i class="accordion-open icon-ok-sign"></i>
                    </div>
                    <div class="accordion-title">
                        New Signup? Register for an Account
                    </div>
                </div>
                <div class="accordion-content clearfix">
                    <form id="register-form" name="register-form" class="row mb-0" action="{{route('post.register')}}" method="post">
                        <div class="col-12 form-group">
                            <label for="register-form-name">Name:</label>
                            <input type="text" id="register-form-name" name="name" value="{{old('name')}}"
                                class="form-control" />
                        </div>

                        <div class="col-12 form-group">
                            <label for="register-form-email">Email Address:</label>
                            <input type="text" id="register-form-email" name="email" value="{{old('email')}}"
                                class="form-control" />
                        </div>

                        <div class="col-12 form-group">
                            <label for="register-form-address">Address:</label>
                            <input type="text" id="register-form-username" name="address" value="{{old('address')}}"
                                class="form-control" />
                        </div>

                        <div class="col-12 form-group">
                            <label for="register-form-phone">Phone:</label>
                            <input type="text" id="register-form-phone" name="phone" value="{{old('phone')}}"
                                class="form-control" />
                        </div>

                        <div class="col-12 form-group">
                            <label for="register-form-password">Choose Password:</label>
                            <input type="password" id="register-form-password" name="password" value=""
                                class="form-control" />
                        </div>

                        <div class="col-12 form-group">
                            <label for="register-form-repassword">Re-enter Password:</label>
                            <input type="password" id="register-form-repassword" name="repassword"
                                value="" class="form-control" />
                        </div>

                        <div class="col-12 form-group">
                            <button class="button button-3d button-black m-0" id="register-form-submit"
                                name="register-form-submit" onclick="checkpwd()" value="register">Register Now</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
</section><!-- #content end -->

<script>
    jQuery(document).ready(function ($) {

        let authMode = location.hash;
        if (authMode != "" && typeof authMode !== 'undefined') {
            var $accordion = $(authMode).parents('.accordion');
            if ($accordion.length > 0) {
                $accordion.find('.accordion-content').hide();
                $accordion.find('.accordion-header').removeClass('accordion-active');
                $(authMode).addClass('accordion-active').next().show();
            }
        }
    });
    function checkpwd(){
        if($('#register-form-password').val() == $('#register-form-repassword').val()){
            
        }
    }
</script>
@stop