<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
</body>
</html>
