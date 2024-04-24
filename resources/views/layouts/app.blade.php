<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ohana Resort Online Booking</title>

    @include ('admin_components.head_script')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</head>

<body class="hold-transition sidebar-mini layout-fixed layout-footer-fixed layout-navbar-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        @include('admin_components.top')
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        @include('admin_components.side')
        <!-- Content Wrapper. Contains page content -->
        @yield('content')
        <!-- /.content-wrapper -->
        @include('admin_components.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <script>
        $('.formPost').on('submit', function(e) {
            e.preventDefault();

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1500
            });

            $.ajax({
                type: "POST",
                cache: false,
                url: $(this).attr('action'),
                data: $(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {

                    switch (data['response']) {
                        case 1:
                            Toast.fire({
                                icon: 'success',
                                title: '<p class="text-center pt-2 text-bold text-black">' +
                                    data['message'] + '</p>'
                            });

                            setTimeout(function() {
                                window.location.href = data['path'];
                            }, 1500);

                            break;
                        default:
                            Toast.fire({
                                icon: 'error',
                                title: '<p class="text-center pt-2">' + data['message'] + '</p>'
                            });
                            break;
                    }

                }
            });

        });

        $('.edit').on('click', function(e) {
            const id = $(this).attr('data-id');
            const path = "{{ route('room_type_edit', ['id' => ':id']) }}".replace(':id', id);
            $.ajax({
                type: "GET",
                cache: false,
                url: path,
                data: {
                    id: id
                },
                success: function(data) {

                    let counter = 1;
                    for (let key in data) {
                        if (data.hasOwnProperty(key)) {
                            let value = data[key];

                            $('#' + key).val(value);

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

        $('.logout').on('submit', function(e) {
            e.preventDefault();

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1500
            });

            $.ajax({
                type: "POST",
                cache: false,
                url: $(this).attr('action'),
                data: $(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {

                    switch (data['response']) {
                        case 1:
                            Toast.fire({
                                icon: 'success',
                                title: '<p class="text-center pt-2 text-bold text-black">' +
                                    data['message'] + '</p>'
                            });

                            setTimeout(function() {
                                window.location.href = data['path'];
                            }, 1500);

                            break;
                        default:
                            Toast.fire({
                                icon: 'error',
                                title: '<p class="text-center pt-2">' + data['message'] + '</p>'
                            });
                            break;
                    }

                }
            });

        });
    </script>

</body>

</html>
