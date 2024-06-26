@extends('layouts.app_customer')
@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            @if (!empty($function_hall))
            <!-- Event Hall Section -->

            <div class="card">
                <div class="card-header card-header-color">
                    <h4 class="text-center text-bold">EVENT HALL</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="small-box">
                                <img class="img_fix_size_f" src="{{ isset($function_hall['function_hall_image']) ? asset('functional_hall_images/' . $function_hall['function_hall_image']) : asset('dist/img/default.png')}}">
                                <div class="fh_res">
                                    <div class="fh_desc">{{ $function_hall['function_hall_description'] ?? ''}}</div>
                                    <div class="fh_txt">RATE: P{{ number_format($function_hall['function_hall_rate'] ?? '', 2, '.', ',') }} per 5hours</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 d-flex justify-content-end">
                            <button class="btn btn-md card-header-color" id="function_hall_btn" data-toggle="modal" data-target="#book_now_d" data-rate="{{ $function_hall['function_hall_rate'] ?? '' }}" data-id="{{ $function_hall['id'] ?? '' }}" data-type="hall">
                                <i class="fas fa-tag"></i>
                                Book Now!
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Event Hall Section -->
            @endif

            <!-- Display Rooms in this Section -->
            <div class="divide_box">
                @foreach ($rooms as $room)
                <div class="card m-1">
                    <div class="card-header card-header-color">
                        <h4 class="text-center text-bold">Room {{ $room['room_no'] }}</h4>
                    </div>
                    <div class="card-body">
                        <div id="carouselExampleAutoplaying{{ $loop->index }}" class="carousel slide room-item" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($room['room_image'] as $index => $room_image)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{ asset('/images/' . $room_image) }}" class="img_fix_size" alt="Room Image">
                                </div>
                                @endforeach
                            </div>
                            <div class="room_info">
                                <h5 class="text-center">{{ $room['room_type'] }}</h5>
                                <div class="text-center">
                                    <h6> RATE:P{{ number_format($room['room_rate'], 2, '.', ',') }} per day</h6>
                                </div>
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
                        <div class="row">
                            <div class="col-sm-12 d-flex justify-content-end">
                                <button class="btn btn-md card-header-color room_btn" data-toggle="modal" data-target="#book_now_d" data-rate="{{ $room['room_rate'] }}" data-id="{{ $room['id'] }}" data-type="room">
                                    <i class="fas fa-tag"></i>
                                    Book Now!
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Display Rooms in this Section -->

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
                            <select class="form-control mb-3 text-center" name="payment_method" id="payment_method" required>
                                <option value="" selected disabled>- Payment Method -</option>
                                <option value="0">Cash</option>
                                <option value="1">Gcash</option>
                            </select>
                            <div id="div_payment"></div>
                            <input type="text" class="form-control mb-3" id="room_rate" name="room_rate" readonly placeholder="Rate" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn card-header-color"><i class="fas fa-tag"></i> Book! </button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End of BookNow Dialog -->

<script type="text/javascript">
    $(document).ready(function () {
        $('#book_now').addClass('c_active');

		$('#reservation').daterangepicker({
          "timePicker": true,
          "locale": {
            "direction": "ltr",
            "format": "MM/DD/YYYY HH:mm",
            "separator": " - ",
            "applyLabel": "Apply",
            "cancelLabel": "Cancel",
            "fromLabel": "From",
            "toLabel": "To",
            "customRangeLabel": "Custom",
            "daysOfWeek": [
              "Su",
              "Mo",
              "Tu",
              "We",
              "Th",
              "Fr",
              "Sa"
            ],
            "monthNames": [
              "January",
              "February",
              "March",
              "April",
              "May",
              "June",
              "July",
              "August",
              "September",
              "October",
              "November",
              "December"
            ],
            "firstDay": 1
          },
          "startDate": "04/23/2024",
          "endDate": "04/29/2024"
        }, function (start, end, label) {
          console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
        });

        $('#function_hall_btn').on('click', function () {
            $('#time-range').val('P5,000 per 5hours');
            $('#modal_type').val('2');
            $('#room_rate').val($(this).data('rate'));
            $('#b_id').val($(this).data('id'));
            $('#b_from').val($(this).data('type'));
        });

        $('.room_btn').on('click', function () {
            $('#time-range').val('start 2:00 PM - 12:00 PM end counted as 1 day');
            $('#modal_type').val('1');
            $('#room_rate').val($(this).data('rate'));
            $('#b_id').val($(this).data('id'));
            $('#b_from').val($(this).data('type'));
        });

        $('#payment_method').change(() => {
            if ($('#payment_method').val() < 1) {
                let div_payment = '<input type="number" class="form-control mb-3" id="payment" name="payment" placeholder="Payment" required>';
                $('#div_payment').html(div_payment);
            } else {
                let div_payment = '<div class="center_img"><input type="text" class="form-control "placeholder="09925312738" disabled><img src="{{asset('/images/qrcode.jpg')}}" class="rqcode_image mb-2"><img></div><input type="text" class="form-control mb-3" id="reference_num" name="reference_num" placeholder="Reference Number" required><input type="number" class="form-control mb-3" id="payment" name="payment" placeholder="Payment" required>';
                $('#div_payment').html(div_payment);
            }
        });

        $('#book_now_d').on('hidden.bs.modal', function (event) {
            $("#payment").val('');
            $("#reference_num").val('');
            $("#book_now_d select").val('');
            $('#div_payment').html('');
        });
    });

</script>

<style scoped>
    .rqcode_image {
        width: 150px;
        height: 150px;
    }

    .center_img {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .divide_box {
        margin-left: 5px;
        width: 100%;
        height: auto;
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
    }

    .room-item {
        margin: 5px;
        background: linear-gradient(45deg, white, whitesmoke, grey);
        border: 2px solid #000;
        backdrop-filter: blur(10px);
        border-radius: 5px;
        width: 320px;
        height: 385px;
    }

    .img_fix_size {
        width: 100%;
        height: 330px;
        padding: 5px;
        object-fit: cover;
    }

    .room_info {
        background: linear-gradient(45deg, white, whitesmoke, grey);
    }

    .img_fix_size_f {
        width: 900px;
        height: 500px;
        padding: 10px;
        object-fit: fill;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .card-header-color {
        background-color: #a50f15;
        color: #fff;
    }

    .card {
        background: linear-gradient(45deg, lightgrey, whitesmoke, whitesmoke);
    }

    @media screen and (max-width: 625px) {
        .mobile {
            width: 100%;
        }

        .fh_res {

        }
    }

    .fh_res {
        display: flex;
        flex-direction: column;
        margin: 10px;
    }

    .fh_txt {
        font-size: 1.5rem;
        font-weight: 500;
    }

    .fh_desc {
        font-size: 1.5rem;
        font-weight: 700;
        text-align: center;
    }
</style>
@endsection
