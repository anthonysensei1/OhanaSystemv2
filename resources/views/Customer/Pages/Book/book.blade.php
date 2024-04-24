@extends('layouts.app_customer')
@section('content')
<div class="content-wrapper">
	<div class="content">
		<div class="container-fluid">
			@if (!empty($function_hall))
				<!-- Event Hall Section -->
				<div class="row">
					<div class="col-lg-2"></div>
					<div class="col-lg-8">
						<div class="card m-4">
							<div class="card-header card-header-color">
								<h4 class="text-center text-bold">EVENT HALL</h4>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-sm-12">
										<div class="small-box">
											<div style="display: flex; justify-content: center;">
												<img class="img_fix_size_f" src="{{ isset($function_hall['function_hall_image']) ? asset('functional_hall_images/' . $function_hall['function_hall_image']) : asset('dist/img/default.png')}}">
											</div>
											<h5 class="text-center p-3">{{ $function_hall['function_hall_description'] ?? ''}}</h5>
											<div><h4 class="m-2">RATE: P{{ number_format($function_hall['function_hall_rate'] ?? '', 2, '.', ',') }} per 5hours</h4></div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 d-flex justify-content-end">
										<button class="btn btn-md card-header-color" id="function_hall_btn" data-toggle="modal" data-target="#book_now_d" onclick="edit({{ $function_hall['function_hall_rate'] ?? '' }}, {{ $function_hall['id'] ?? '' }}, 'hall')">
											<i class="fas fa-tag"></i> 
											Book Now!
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-2"></div>
				</div>
				<!-- End Event Hall Section -->
			@endif


			<!-- Dislay Room in this Section -->
			<div class="row">
				<div class="divide_box">
					@foreach ($rooms as $room)
					<div class="card m-1">
						<div class="card-header card-header-color">
							<h4 class="text-center text-bold">Room {{ $room['room_no'] }}</h4>
						</div>
						<div class="card-body">
							<div class="room-item">
								<div style="display: flex; justify-content: center;">
									<div id="carouselExampleAutoplaying{{ $loop->index }}" class="carousel slide img_fix_size" data-bs-ride="carousel" style="width: 300px; border: 2px solid #000;">
										<div class="carousel-inner">
											@foreach ($room['room_image'] as $index => $room_image)
												<div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
													<img src="{{ asset('/images/' . $room_image) }}" class="d-block" alt="Room Image" style="width: 500px; height: 250px;">
												</div>
											@endforeach
										</div>
										<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying{{ $loop->index }}" data-bs-slide="prev">
											<span class="carousel-control-prev-icon" aria-hidden="true"></span>
											<span class="visually-hidden">Previous</span>
										</button>
										<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying{{ $loop->index }}" data-bs-slide="next">
											<span class="carousel-control-next-icon" aria-hidden="true"></span>
											<span class="visually-hidden">Next</span>
										</button>
									</div>
								</div>
								<h5 class="text-center p-3">{{ $room['room_name'] }}</h5>
								<h4 class="m-2"> RATE:P{{ number_format($room['room_rate'], 2, '.', ',') }} per day</h4>
							</div>                      
							<div class="row">
								<div class="col-sm-12 d-flex justify-content-end">
									<button class="btn btn-md card-header-color" id="room_btn" data-toggle="modal" data-target="#book_now_d" onclick="edit({{ $room['room_rate'] }}, {{ $room['id'] }}, 'room')">
										<i class="fas fa-tag"></i> 
										Book Now!
									</button>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
			<!-- Dislay Room in this Section -->

		</div>
	</div>
</div>

<!-- BookNow Dialog -->
<div class="modal fade" id="book_now_d" data-backdrop="static">
   <div class="modal-dialog modal-dialog-info modal-dialog-centered">
      <div class="modal-content">
			<div class="modal-header card-header-color">
				<h4 class="modal-title text-center"> <i class="fas fa-tag"></i> BOOK NOW!</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
         <div class="modal-body">
				<form action="{{ route('book_store') }}" class="formPost">
					<div class="row">
						<div class="col">
							<input type="hidden" id="modal_type" name="modal_type" value="">
							<input type="text" class="form-control mb-3" id="auth_id" name="auth_id" value="{{ auth()->user()->id }}" readonly hidden>
							<input type="text" class="form-control mb-3" id="b_id" name="b_id" readonly hidden>
							<input type="text" class="form-control mb-3" id="b_from" name="b_from" readonly hidden>
							<input type="text" class="form-control mb-3" id="room_fullname" name="room_fullname" readonly required placeholder="Full Name" value="{{ $current_user['ordinary_user_fullname'] }}">
							<input type="text" class="form-control mb-3" id="room_address" name="room_address" readonly required placeholder="Address" value="{{ $current_user['address'] }}">
							<input type="text" class="form-control mb-3" id="room_contact_number" name="room_contact_number" readonly required placeholder="Contact Number" value="{{ $current_user['c_number'] }}">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="far fa-calendar-alt"></i>
									</span>
								</div>
								<input type="text" class="form-control" name="reservation" id="reservation" required>
							</div>
							<input type="text" class="form-control mb-3" name="time-range" id="time-range" readonly>

							<!-- If 0 = Cash is selected there must be another input field for amount, and if 1 = Gcash is selected, there must be another input field for amount and reference number appear below this portion -->
							<select class="form-control mb-3 text-center" name="payment_method" id="payment_method" required>
									<option value="" selected disabled>- Payment Method -</option>
									<option value="0">Cash</option>
									<option value="1">Gcash</option>
							</select>
							<div id="div_payment">

							</div>
							<input type="text" class="form-control mb-3" id="room_rate" name="room_rate" readonly placeholder="Rate" required>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn card-header-color"><i class="fas fa-tag"></i>  Book! </button>
					</div>
				</form>
			</div>
      </div><!-- /.modal-content -->
   </div> <!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End of BookNow Dialog -->


<script type="text/javascript">
	$('#book_now').addClass('c_active');
	
	function edit(rate, id, b_from) {
		$('#room_rate').val(rate);
		$('#b_id').val(id);
		$('#b_from').val(b_from);
	}

	$('#payment_method').change(() => {
		if ($('#payment_method').val() < 1) {
			let div_payment = '<input type="number" class="form-control mb-3" id="payment" name="payment" placeholder="Payment" required>';
         	$('#div_payment').html(div_payment);
		} else {
			let div_payment = '<div class="center_img"><input type="text" class="form-control "placeholder="09925312738" disabled><img src="{{asset('/images/qrcode.jpg')}}" class="rqcode_image mb-2"><img></div><input type="text" class="form-control mb-3" id="reference_num" name="reference_num" placeholder="Reference Number" required><input type="number" class="form-control mb-3" id="payment" name="payment" placeholder="Payment" required>';
         	$('#div_payment').html(div_payment);
		}
	});

	$('#book_now_d').on('hidden.bs.modal', function(event) {
		$("#payment").val('');
		$("#reference_num").val('');
		$("#book_now_d select").val('');
		$('#div_payment').html('');
    });

</script>

<script scoped>
  $(function () {
    //Date range picker
    $('#reservation').daterangepicker()
  })

  	document.getElementById('function_hall_btn').addEventListener('click', function() {
        document.getElementById('time-range').value = 'P5,000 per 5hours';
		document.getElementById('modal_type').value = '2';
    });

    document.getElementById('room_btn').addEventListener('click', function() {
        document.getElementById('time-range').value = 'start 2:00 PM - 12:00 PM end counted as 1 day';
		document.getElementById('modal_type').value = '1';
    });

</script>

<style scoped>
	.rqcode_image{
		width:150px;
		height: 150px;
	}
	.center_img {
		display: flex;
		flex-direction: column;
		align-items: center;
	}
   .divide_box{
      width: 100%;
      height: auto;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      flex-direction: row;
      align-content: center;
	gap: 10px;
   }

   .room-item{
      margin: 5px;
      background: linear-gradient(45deg, white, whitesmoke,grey);
      border: 2px solid #000;
      backdrop-filter: blur(10px);
      border-radius: 5px;
   }
   .img_fix_size{
      width: 300px;
      height: 280px;
      padding: 5px;
      display: block;
      object-fit: cover;
   }

   .img_fix_size_f{
		width: 100%;
      height: 500px;
      padding: 10px;
      object-fit: contain;
   }

   .card-header-color{
	background-color: #a50f15;
	color: #fff;
   }

   .card{
	background: linear-gradient(45deg,lightgrey, whitesmoke, whitesmoke);
   }
</style>
@endsection