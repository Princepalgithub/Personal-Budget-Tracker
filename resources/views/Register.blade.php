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
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'></link>  
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
<style>

    </style>
</head>
<body>
<div class="wrapper">
	<div class="registration_form">
		<div class="title">
			Create Account
		</div>

		<form id="frm">
		<div class="form_wrap">   
					<div class="input_wrap">
						<label for="fname">Name</label>
						<input type="text" id="name" name="name">
						<span class="name_error"></span>
					</div>
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
					<input type="submit" value="Register Now" class="submit_btn">
				</div>
				<p>Already Have an account? <a class="log" href="{{route('login_view')}}" data-toggle="modal" data-target="#login-modal">Login</a> </p>
			</div>
		</form>
	</div>
</div>
<script>
$(document).ready(function(){
	$("#frm").submit(function (e) {
        e.preventDefault();
  var formData = new FormData(this);
  var name=$('#name').val();
  var email=$('#email').val();
  var password=$('#password').val();
  $('.name_error').html('name is required');
	$('.email_error').html('');
  $('.email_error').html('');

  if(name == ''){
	$('.name_error').html('name is required');
	return false ;
  }else {
	$('.name_error').html('');
  }
  if(email == ''){
	$('.email_error').html('Email is required');
	return false ;
  }else {
	$('.email_error').html('');
  }
  if(password == ''){
	$('.password_error').html('Password is required');
	return false ;
  }else{
  $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
            $.ajax({
                type:'POST',
                url:"/postregister", 
                data: formData,
                processData: false,
                 contentType: false,
                success: function (data) {
                    console.log(data.status)
					if (data.status == 200) {
                      $('#emailerrorsdfs').hide()
                      swal("Registration", "successfull", "success",);
                      $('form').trigger('reset');
                      $('.email_error').hide();
					  setTimeout(myURL, 1500);
                        function myURL() {
                            document.location.href = 'http://127.0.0.1:8000/login';
                        }
                      console.log(data);
                    } 
                    if(data.status == 'email')
                       {
                      $('#emailerrorsdfs').html('Email already exit');
                      console.log();
                    }
              
				
					},
                
            });
			
    }
  });
});
</script>
</body>
</html>