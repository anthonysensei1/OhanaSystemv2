<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Ohana Resort Online Booking</title>
  @include ('customer_components.head_script')
</head>
<body class="hold-transition layout-top-nav">
	<div class="wrapper">
	<!-- Navbar -->
	@include('customer_components.top')
	<!-- /.navbar -->
	<!-- Main Sidebar Container -->
	<!-- Content Wrapper. Contains page content -->
	@yield('content')
	<!-- /.content-wrapper -->
	</div>
	@include('customer_components.footer')
	<!-- ./wrapper -->

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
	
		$('.edit').on('click',function(e) {
			const id = $(this).attr('data-id');
			const path = "{{ route('room_type_edit', ['id' => ':id']) }}".replace(':id', id);
			$.ajax({
				type     : "GET",
				cache    : false,
				url      : path,
				data     : {id:id},
				success  : function(data) {
	
				let counter = 1;
				for (let key in data) {
					if (data.hasOwnProperty(key)) {
						let value = data[key];
	
						$('#'+key).val(value);
	
						if (counter === 1) {
							$('#d_id').val(data[key]);
							counter++;
							continue;
						}
	
						counter++;
					}
				}
	
				}
			});
	
		});
		
		$('.logout').on('submit',function(e) {
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
</body>
</html>
