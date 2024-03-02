@extends('layouts.app_customer')
@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
					<div class="col-lg-6" style="background:#BFEFFF">
						<div class="text-center mt-lg-5 mt-3 p-lg-5 p-3">
							<h1>STEP INTO SERENITY</h1>
							<h1>"WHERE EVERY STAY BEGINS IN SIMPLE BOOKING"</h1>
							<div class="mt-lg-5 mt-3">
									<button type="button" class="btn btn-outline-success btn-lg font-weight-bold" data-toggle="modal" data-target="#log_sign">
										LOGIN/SIGN-UP
									</button>
							</div>
						</div>
					</div>
					<div class="col-lg-6 d-none d-lg-block"> <!-- Hide on mobile -->
						<img src="{{asset('dist/img/prod-1.jpg')}}" class="product-image" alt="Product Image">
					</div>
            </div>
        </div>
    </div>
</div>


<!-- Login_Register Dialog -->
<div class="modal fade" id="log_sign">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
			<div class="card-header text-center">
            <h4 class="modal-title "> 
					<p class="login-box-msg">Sign in to start your session</p>
				</h4>
         </div>
         <div class="modal-body">
				<form action="#" method="post">
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="username">
						<div class="input-group-append">
							<div class="input-group-text">
							<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control" placeholder="password">
						<div class="input-group-append">
							<div class="input-group-text">
							<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-9">
							<span>Don't have an account?<a href="#" class="nav-link"> Sign-up here </a></span>
						</div>
						<div class="col-lg-3">
							<button type="submit" class="btn btn-success btn-md"> 
								<i class="fas fa-arrow"></i>
								LOGIN 
							</button>
						</div>
					</div>
				</form>
			</div>
      </div><!-- /.modal-content -->
   </div> <!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End of Login_Register Dialog -->


<!-- Signup Dialog -->
<div class="modal fade" id="sign_up">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
			<div class="card-header text-center">
            <h4 class="modal-title "> 
					<p class="login-box-msg">Sign in to start your session</p>
				</h4>
         </div>
         <div class="modal-body">
				<form action="#" method="post">
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="username">
						<div class="input-group-append">
							<div class="input-group-text">
							<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control" placeholder="password">
						<div class="input-group-append">
							<div class="input-group-text">
							<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-9">
							<span>Don't have an account?<a href="#" class="nav-link"> Sign-up here </a></span>
						</div>
						<div class="col-lg-3">
							<button type="submit" class="btn btn-success btn-md"> 
								<i class="fas fa-arrow"></i>
								LOGIN 
							</button>
						</div>
					</div>
				</form>
			</div>
      </div><!-- /.modal-content -->
   </div> <!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End of Signup Dialog -->


<script type="text/javascript">
	$('#home').addClass('c_active');
	$('#home').parent().addClass('active');
</script>


@endsection