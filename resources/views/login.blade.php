<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Register</title>
	<link href="{{ asset('asstes/style.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
	</link>
	<style>
.fail{
	color: red;
	text-align: center;
}
	</style>
</head>

<body>
	<div class="wrapper">
		<div class="registration_form">
			<div class="title">
				Login Account
			</div>

			<form id="frm" action="/login" method="post">
				@csrf
				<div class="form_wrap">
					<div class="input_wrap">
						<label for="email">Email Address</label>
						<input type="email" id="email" name="email">
						<span class="email_error"></span>
						<span class="erorr " id="emailerrorsdfs"></span>
						
						<p class="text-danger">
						</p>
					</div>
					<div class="input_wrap">
						<label>Password</label>
						<input type="password" id="password" name="password">
						<span class="password_error"></span>
					</div>

					<div class="input_wrap">
						<input type="submit" value="Login" class="submit_btn">
					</div>
					<p>Already Have an account? <a class="log" href="{{route('register')}}" data-toggle="modal" data-target="#login-modal">Register</a> </p>
				</div>
				@if(Session::has('failpass'))
						<div class="fail">{{Session::get('failpass')}}</div>
						@endif
			</form>
		</div>
	</div>

</body>

</html>