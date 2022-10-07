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
					<li class="breadcrumb-item active" aria-current="page">{{$type ? $type : "login"}}</li>
				</ol>
			</div>

		</section><!-- #page-title end -->

		@php
			
			$active = array(
				'acctive' => array(
					'login' => ($type == 'login') ? 'ui-tabs-active ui-state-active' :'',
					'register' => ($type  == 'register') ? 'ui-tabs-active ui-state-active' :''
				),
				'divshow' => array(
					'login' => ($type  == 'login') ? ' style="display: block;" ' : ' style="display: none;" ',
					'register' => ($type  == 'register') ? ' style="display: block;" ' : ' style="display: none;" '
				)
			);
			
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

					<div class="tabs mx-auto mb-0 clearfix" id="tab-login-register" style="max-width: 500px;">

						<ul class="tab-nav tab-nav2 center clearfix">
							<li class="inline-block {{$active["acctive"]["login"]}}"><a href="#tab-login">Login</a></li>
							<li class="inline-block {{$active["acctive"]["register"]}}"><a href="#tab-register">Register</a></li>
						</ul>

						<div class="tab-container">

							<div class="tab-content" {{$active["divshow"]["login"]}} id="tab-login">
								<div class="card mb-0">
									<div class="card-body" style="padding: 40px;">
										<form method="POST" action="{{ route('login') }}" id="login-form" name="login-form" class="mb-0" action="#" method="post">
											@csrf
											<h3>Login to your Account</h3>

											<div class="row">
												<div class="col-12 form-group">
													<label for="login-form-username">Username:</label>
													<input name="email" type="email" id="login-form-username" name="login-form-username" value="{{$login_email}}" class="form-control" required="email" />
													@if ($errors->has('email'))
													<span class="text-danger">{{ $errors->first('email') }}</span>
													@endif
												</div>

												<div class="col-12 form-group">
													<label for="login-form-password">Password:</label>
													<input name="password" type="password" id="login-form-password" name="login-form-password" value="{{$login_pass}}" class="form-control" required="" />
													@if ($errors->has('password'))
													<span class="text-danger">{{ $errors->first('password') }}</span>
													@endif
												</div>

												<div class="col-12 form-group">
													<button class="button button-3d button-black m-0" id="login-form-submit" name="login-form-submit" value="login">Login</button>
													<a href="#" class="float-end">Forgot Password?</a>
												</div>
											</div>

										</form>
									</div>
								</div>
							</div>

							<div class="tab-content" {{$active["divshow"]["register"]}} id="tab-register">
								<div class="card mb-0">
									<div class="card-body" style="padding: 40px;">
										<h3>Register for an Account</h3>

										<form id="register-form" name="register-form" class="row mb-0" action="#" method="post">

											<div class="col-12 form-group">
												<label for="register-form-name">Name:</label>
												<input type="text" id="register-form-name" name="register-form-name" value="" class="form-control" />
											</div>

											<div class="col-12 form-group">
												<label for="register-form-email">Email Address:</label>
												<input type="text" id="register-form-email" name="register-form-email" value="" class="form-control" />
											</div>

											<div class="col-12 form-group">
												<label for="register-form-username">Choose a Username:</label>
												<input type="text" id="register-form-username" name="register-form-username" value="" class="form-control" />
											</div>

											<div class="col-12 form-group">
												<label for="register-form-phone">Phone:</label>
												<input type="text" id="register-form-phone" name="register-form-phone" value="" class="form-control" />
											</div>

											<div class="col-12 form-group">
												<label for="register-form-password">Choose Password:</label>
												<input type="password" id="register-form-password" name="register-form-password" value="" class="form-control" />
											</div>

											<div class="col-12 form-group">
												<label for="register-form-repassword">Re-enter Password:</label>
												<input type="password" id="register-form-repassword" name="register-form-repassword" value="" class="form-control" />
											</div>

											<div class="col-12 form-group">
												<button class="button button-3d button-black m-0" id="register-form-submit" name="register-form-submit" value="register">Register Now</button>
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