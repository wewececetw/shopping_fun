@extends('front_end.layouts.footer')

@section('content')

<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>Forget Password</h1>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Pages</a></li>
					<li class="breadcrumb-item active" aria-current="page">Forget Password</li>
				</ol>
			</div>

		</section><!-- #page-title end -->

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">

            <div class="tabs mx-auto mb-0 clearfix" id="tab-login-register" style="max-width: 500px;">

                <div class="tab-container">

                    <div class="tab-content">
                        <div class="card mb-0">
                            <div class="card-body" style="padding: 40px;">
                                <div class="mb-4 text-sm text-gray-600">
                                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                                </div>
                                
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf

                                    <!-- Email Address -->
                                    <div class="col-12 form-group">
                                        <x-label for="email" :value="__('Email')" />

                                        <x-input id="email" class="form-control" type="email" name="email"
                                            :value="old('email')" required autofocus />
                                    </div>

                                    <div class="col-12 form-group">
                                        <button class="button button-3d button-black m-0" >Email Password Reset Link</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section><!-- #content end -->
@stop