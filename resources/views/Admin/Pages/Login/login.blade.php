<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="{{asset ('css/style.css') }}">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>

	@include ('admin_components.head_script')
</head>
<body>
	<img class="wave" src="{{asset ('img/wave.png')}}">
	<div class="container">
		<div class="img">
			<img src="{{asset ('img/bg.svg')}}">
		</div>
		<div class="login-content">
			<form action="{{ route('user_login') }}" class="formPost">
				<img src="{{asset ('img/avatar.svg')}}">
				<h2 class="title">Welcome</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" class="input" name="username" required>
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name="password" required>
            	   </div>
            	</div>
            	<input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="{{asset ('js/main.js')}}"></script>
</body>
<script>
	$('.formPost').on('submit',function(e) {
      e.preventDefault();

      const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 1500
      });
      
      $.ajax({
          type     : "POST",
          cache    : false,
          url      : $(this).attr('action'),
          data     : $(this).serialize(),
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success  : function(data) {

              switch(data['response']) {
                  case 1:
                          Toast.fire({
                              icon: 'success',
                              title: '<p class="text-center pt-2 text-bold text-black">' +data['message']+ '</p>'
                          });

                          setTimeout(function() {
                              window.location.href = data['path'];
                          },1500);

                      break;
                  default:
                          Toast.fire({
                              icon: 'error',
                              title: '<p class="text-center pt-2">' +data['message']+ '</p>'
                          });
                      break;
              }

          }
      });

  });
</script>
</html>
