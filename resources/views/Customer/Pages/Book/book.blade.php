@extends('layouts.app_customer')
@section('content')
<div class="content-wrapper">
	<div class="content">
		<div class="container-fluid">
			<!-- Event Hall Section -->
			<div class="row">
				<div class="col-lg-2"></div>
				<div class="col-lg-8">
					<div class="card m-4">
						<div class="card-header bg-gradient-info">
							<h4 class="text-center text-bold">EVENT HALL</h4>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-sm-12">
										<div class="small-box">
											<div style="display: flex; justify-content: center;">
												<img class="d-flex justify-content-center mt-5" src="{{asset('dist/img/AdminLTELogo.png')}}"><!-- This should not be in circular form-->
											</div>
											<h5 class="text-center p-3">(Description)</h5>
											<h4><label class="m-2">RATE: P5000.00</label></h4>
										</div>                      
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12 d-flex justify-content-end">
										<button class="btn btn-md btn-outline-success" data-toggle="modal" data-target="#event_hall_d">
											<i class="fas fa-tag"></i> 
											Book Now!
										</button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-2"></div>
				</div>
			</div>
			<!-- End Event Hall Section -->

			<!-- Dislay Room in this Section -->
			<div class="row">
				<div class="col-lg-3">
					<div class="card m-4">
						<div class="card-header bg-gradient-info">
							<h4 class="text-center text-bold">Room #</h4>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-sm-12">
										<div class="small-box">
											<div style="display: flex; justify-content: center;">
												<img class="d-flex justify-content-center mt-5" src="{{asset('dist/img/AdminLTELogo.png')}}"><!-- This should not be in circular form-->
											</div>
											<h5 class="text-center p-3">(Description)</h5>
											<h4><label class="m-2">RATE: P350.00</label></h4>
										</div>                      
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12 d-flex justify-content-end">
										<button class="btn btn-md btn-outline-success" data-toggle="modal" data-target="#book_now_d">
											<i class="fas fa-tag"></i> 
											Book Now!
										</button>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-3">
					<div class="card m-4">
						<div class="card-header bg-gradient-info">
							<h4 class="text-center text-bold">Room #</h4>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-sm-12">
										<div class="small-box">
											<div style="display: flex; justify-content: center;">
												<img class="d-flex justify-content-center mt-5" src="{{asset('dist/img/AdminLTELogo.png')}}"><!-- This should not be in circular form-->
											</div>
											<h5 class="text-center p-3">(Description)</h5>
											<h4><label class="m-2">RATE: P350.00</label></h4>
										</div>                      
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12 d-flex justify-content-end">
										<button class="btn btn-md btn-outline-success">
											<i class="fas fa-tag"></i> 
											Book Now!
										</button>
								</div>
							</div>
						</div>
					</div>
				</div>


				<div class="col-lg-3">
					<div class="card m-4">
						<div class="card-header bg-gradient-info">
							<h4 class="text-center text-bold">Room #</h4>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-sm-12">
										<div class="small-box">
											<div style="display: flex; justify-content: center;">
												<img class="d-flex justify-content-center mt-5" src="{{asset('dist/img/AdminLTELogo.png')}}"><!-- This should not be in circular form-->
											</div>
											<h5 class="text-center p-3">(Description)</h5>
											<h4><label class="m-2">RATE: P350.00</label></h4>
										</div>                      
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12 d-flex justify-content-end">
										<button class="btn btn-md btn-outline-success">
											<i class="fas fa-tag"></i> 
											Book Now!
										</button>
								</div>
							</div>
						</div>
					</div>
				</div>


				<div class="col-lg-3">
					<div class="card m-4">
						<div class="card-header bg-gradient-info">
							<h4 class="text-center text-bold">Room #</h4>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-sm-12">
										<div class="small-box">
											<div style="display: flex; justify-content: center;">
												<img class="d-flex justify-content-center mt-5" src="{{asset('dist/img/AdminLTELogo.png')}}"><!-- This should not be in circular form-->
											</div>
											<h5 class="text-center p-3">(Description)</h5>
											<h4><label class="m-2">RATE: P350.00</label></h4>
										</div>                      
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12 d-flex justify-content-end">
										<button class="btn btn-md btn-outline-success">
											<i class="fas fa-tag"></i> 
											Book Now!
										</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Dislay Room in this Section -->

		</div>
	</div>
</div>

<!-- BookNow Dialog -->
<div class="modal fade" id="book_now_d">
   <div class="modal-dialog modal-dialog-info modal-dialog-centered">
      <div class="modal-content">
			<div class="modal-header bg-gradient-success">
			
				<h4 class="modal-title text-center"> <i class="fas fa-tag"></i> BOOK NOW!</h4>
			</div>
         <div class="modal-body">
				<form action="#" method="post">
					<div class="row">
						<div class="col">
							<input type="text" class="form-control mb-3" id="room_fullname" name="room_fullname" disabled placeholder="Full Name">
							<input type="text" class="form-control mb-3" id="room_address" name="room_address" disabled placeholder="Address">
							<input type="text" class="form-control mb-3" id="room_contact_number" name="room_contact_number" disabled placeholder="Contact Number">
							<input type="text" class="form-control mb-3" id="room_address" name="room_address" disabled placeholder="Address">
							<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="far fa-calendar-alt"></i>
										</span>
									</div>
									<input type="text" class="form-control" id="reservation">
							</div>
							<select class="form-control mb-3 text-center">
									<option value="Select Type" selected disabled>- Payment Method -</option>
									<option value="cash">Cash</option>
									<option value="gcash">Gcash</option>
							</select>
							<input type="text" class="form-control mb-3" id="room_rate" name="room_rate" disabled placeholder="Rate">
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-success"> Submit </button>
					</div>
				</form>
			</div>
      </div><!-- /.modal-content -->
   </div> <!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End of BookNow Dialog -->


<!-- BookNow Event Hall Dialog -->
<div class="modal fade" id="event_hall_d">
   <div class="modal-dialog modal-dialog-info modal-dialog-centered">
      <div class="modal-content">
			<div class="modal-header bg-gradient-success">
			
				<h4 class="modal-title text-center"> <i class="fas fa-tag"></i> BOOK NOW!</h4>
			</div>
         <div class="modal-body">
				<form action="#" method="post">
					<div class="row">
						<div class="col">
							<input type="text" class="form-control mb-3" id="event_hall_fullname" name="event_hall_fullname" disabled placeholder="Full Name">
							<input type="text" class="form-control mb-3" id="event_hall_address" name="event_hall_address" disabled placeholder="Address">
							<input type="text" class="form-control mb-3" id="event_hall_contact_number" name="event_hall_contact_number" disabled placeholder="Contact Number">
							<input type="text" class="form-control mb-3" id="event_hall_address" name="event_hall_address" disabled placeholder="Address">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="far fa-calendar-alt"></i>
									</span>
								</div>
								<input type="text" class="form-control" id="reservation1">
							</div>
							<select class="form-control mb-3 text-center">
									<option value="Select Type" selected disabled>- Payment Method -</option>
									<option value="cash">Cash</option>
									<option value="gcash">Gcash</option>
							</select>
							<input type="text" class="form-control mb-3" id="event_hall_rate" name="room_rate" disabled placeholder="Rate">
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-success"> Submit </button>
					</div>
				</form>
			</div>
      </div><!-- /.modal-content -->
   </div> <!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End of BookNow Event Hall Dialog -->

<script type="text/javascript">
	$('#book_now').addClass('c_active');
</script>

<script>
  $(function () {
    //Date range picker
    $('#reservation').daterangepicker()
	$('#reservation1').daterangepicker()
  })
</script>

@endsection