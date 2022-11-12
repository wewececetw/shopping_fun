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
                    <form id="register-form" name="register-form" class="row mb-0" >
                        @csrf
                        <div class="col-12 form-group">
                            <label for="register-form-name">Name:</label>
                            <input type="text" id="register-form-name" name="name" value="<?=$_GET["name"]?>"
                                class="form-control" />
                        
                        </div>

                        <div class="col-12 form-group">
                            <label for="register-form-email">Email Address:</label>
                            <input type="text" id="register-form-email" name="email" value="<?=$_GET["email"]?>"
                                class="form-control" />
                              
                        </div>

                        <div class="col-12 form-group">
                            <label for="register-form-address">Address:</label>
                            <input type="text" id="register-form-username" name="address" value="<?=$_GET["address"]?>"
                                class="form-control" />
                             
                        </div>

                        <div class="col-12 form-group">
                            <label for="register-form-phone">Phone:</label>
                            <input type="text" id="register-form-phone" name="phone" value="<?=$_GET["phone"]?>"
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
                        <div id="form-errors">

                        </div>
                        <div class="col-12 form-group">
                            <button class="button button-3d button-black m-0" id="register-form-submit" type="button"
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
        if($('#register-form-password').val() != $('#register-form-repassword').val()){
            Swal.fire({
                icon: 'error',
                title: '密碼不符',
                text: '密碼與二次輸入密碼不符!',
                footer: '<a href="">有疑問嗎?可以通知管理者!</a>'
            })
            
        }
        else
        {
            $.ajax({
                url:"{{route('post.register')}}",
                method: "POST" ,
                dataType: "JSON",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: $("#register-form").serializeArray(),
                
                success:function(res){
                    if(res.success)
                    {
                        Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: '註冊成功',
                                showConfirmButton: false,
                                timer: 1500 }); 
                        location.href = "/";        
                    }
                    else
                    {
                        Swal.fire({
                        icon: 'error',
                        title: '系統錯誤',
                        text: '請通知管理人員!',
                        footer: '<a href="">有疑問嗎?可以通知管理者!</a>'
                        })    
                    }
                    
                },
                error:function(err){
                     // Something went wrong
                // HERE you can handle asynchronously the response 

                // Log in the console
                var errors = err.responseJSON;
                console.log(errors);

                // or, what you are trying to achieve
                // render the response via js, pushing the error in your 
                // blade page
                 errorsHtml = '<div class="alert alert-danger"><ul>';

                 $.each( errors.errors, function( key, value ) {
                      errorsHtml += '<li>'+ value[0] + '</li>'; //showing only the first error.
                 });
                 errorsHtml += '</ul></div>';

                 $( '#form-errors' ).html( errorsHtml ); //appending to a <div id="form-errors"></div> inside form  
                
                
                    },
                });
        }
    }
</script>
@stop