<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ohana Resort Online Booking</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <link rel="shortcut icon" href="{{asset ('/images/ohana.png') }}">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">

    <style scoped>
    * {
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    body {
        background-image: url('/images/ohanabg.png') !important;
        background-repeat: no-repeat !important;
        background-size: cover !important;
    }

    .main-footer a {
        text-decoration: none;
    }

    .display a {
        text-decoration: none;
    }

    .labels {
        color: #000;
        font-size: 15px;
        font-weight: bold;
        margin: 5px 0;
    }

    .sign_in_up {
        width: 22%;
        height: 450px;
        background: rgba(0, 0, 0, .4);
        border: 2px solid rgba(255, 255, 255, .8);
        backdrop-filter: blur(9px);
        color: #fff;
        border-radius: 12px;
        transition: 0.5s;
        padding: 30px 40px;

    }

    .sign_in_up h1 {
        font-size: 36px;
        text-align: center;
    }

    .sign_in_up .input-box {
        position: relative;
        width: 100%;
        height: auto;
        margin: 30px 0;
    }

    .input-box input {
        width: 100%;
        height: 100%;
        background: transparent;
        border: none;
        outline: none;
        border: 2px solid rgba(255, 255, 255, .2);
        border-radius: 40px;
        font-size: 16px;
        color: #fff;
        padding: 20px 45px 20px 20px;
    }

    .input-box input::placeholder {
        color: #fff;
    }

    .input-box i {
        position: absolute;
        right: 20px;
        top: 30%;
        transform: translate(-50%);
        font-size: 20px;

    }

    .sign_in_up .btn {
        width: 100%;
        height: 45px;
        background: #fff;
        border: none;
        outline: none;
        border-radius: 40px;
        box-shadow: 0 0 10px rgba(0, 0, 0, .1);
        cursor: pointer;
        font-size: 16px;
        color: #333;
        font-weight: 600;
    }

    .sign_in_up .register-link {
        font-size: 14.5px;
        text-align: center;
        margin: 20px 0 15px;
    }

    .register-link p a {
        color: #a50f15;
        text-decoration: none;
        font-weight: 600;
    }

    .register-link p a:hover {
        text-decoration: underline;
        color: #fff;
    }

    .content-wrapper {
        background: rgba(0, 0, 0, .4);
        color: #fff;
        font-size: 2rem;
        display: flex;
        align-items: center;
        justify-content: space-evenly;
    }

    .words {
        font-weight: bolder;
    }

    .words:nth-child(1) {
        font-size: 8rem;
        margin-left: 110px;
    }

    .words:nth-child(2) {
        font-size: 5rem;
        margin-left: 110px;
    }

    .words:nth-child(3) {
        font-size: 5rem;
        margin-left: 110px;
        background-color: #a50f15;
        text-align: center;
        border-radius: 5px;
        /* width: 1100px; */
    }

    .main-footer {
        background: rgba(0, 0, 0, .8);
        backdrop-filter: blur(30px);
        color: #fff;
        border-top: 3px solid #fff;
    }

    .main-footer a {
        color: #fff;
        font-weight: bolder;
    }

    .footer_single_letter {
        font-size: 25px;
        color: #a50f15;
    }

    @media screen and (max-width: 1740px) {

        .content-wrapper {
            flex-direction: column;
        }

        .sign_in_up {
            width: 40%;
            margin: 15px 0 15px 0;
        }

        .words:nth-child(1) {
            font-size: 50px;
            margin-left: 0px;
            text-align: center;
        }

        .words:nth-child(2) {
            font-size: 30px;
            margin-left: 0px;
            text-align: center;
        }

        .words:nth-child(3) {
            font-size: 30px;
            margin-left: 0px;
            text-align: center;
            color: #fff;
            background-color: #a50f15;
        }


    }

    @media screen and (max-width: 960px) {
        .sign_in_up {
            width: 450px;
        }

        .navar_customized {
            display: none;
        }
    }


    @media screen and (max-width: 520px) {
        .sign_in_up {
            width: 350px;
        }
    }

    .navbar_cust {
        background: rgba(0, 0, 0, .9);
        backdrop-filter: blur(25px);
        border-bottom: 3px solid #fff;
    }

    .single_letter {
        font-size: 45px;
        color: #a50f15;
    }

    .ohana_text {
        font-size: 30px;
        font-weight: bolder;
        letter-spacing: 8px;
        color: #fff;
        display: flex;
    }

    @media screen and (max-width:767px) {

        .container_fluid_767 .navbar-nav {
            display: flex;
            flex-direction: column;
            align-content: center;
            align-items: center;
        }

    }

    @media screen and (max-width:365px) {
        .ohana_text {
            font-size: 18px;
        }
    }

    /* For Chrome, Safari, and Opera */
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* For Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }

    .tac {
        color: #000;
        font-size: 15px;
    }

    .tac_pop:hover {
        text-decoration: underline;
    }

    .mod_bot {
        display: flex;
        flex-direction: column;
        align-content: center;
    }

    .tac input[type="checkbox"] {
        transform: scale(1.5);
        margin-right: 10px;
    }

    .tac input[type="checkbox"]:hover {
        cursor: pointer;
    }

    .termscond {
        display: flex;
        color: #000;
        font-size: 15px;
        flex-direction: column;
    }

    .nums {
        font-weight: 900;
    }

    .desc {
        font-style: italic;
        margin-left: 10px;
    }

    .byohana {
        color: #000;
        font-size: 15px;
    }

    .title {
        font-size: 20px;
        font-weight: 900;
    }

    .card-header-color {
        background-color: #a50f15;
        color: #fff;
    }

    .scrollable {
        max-height: 500px;
        overflow-y: auto;
    }

    .reg_scrollable {
        max-height: 400px;
        overflow-y: auto;
    }

    #snackbar {
        visibility: hidden;
        min-width: 250px;
        background-color: #66ff85;
        color: #3e403f;
        text-align: center;
        border-radius: 2px;
        padding: 16px;
        position: fixed;
        z-index: 1;
        left: 50%;
        bottom: 30px;
        transform: translateX(-50%);
    }

    #snackbar.show {
        visibility: visible;
        animation: fadein 0.5s, fadeout 0.5s 2.5s;
    }

    @keyframes fadein {
        from {
            bottom: 0;
            opacity: 0;
        }

        to {
            bottom: 30px;
            opacity: 1;
        }
    }

    @keyframes fadeout {
        from {
            bottom: 30px;
            opacity: 1;
        }

        to {
            bottom: 0;
            opacity: 0;
        }
    }
    </style>
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar_cust">
            <div class="container_fluid_767">
                <a href="#" class="navbar-brand text-white">
                    <div class="brand-text ohana_text">
                        <div>
                            <span class="single_letter">O</span>HANA
                        </div>
                        <div>
                            <span class="single_letter">R</span>ESORT
                        </div>
                    </div>
                </a>
            </div>
        </nav>
        <div class="content-wrapper">
            <div class="content">
                <div class="words">
                    Steps into serenity:
                </div>
                <div class="words">
                    "Where every stay
                </div>
                <div class="words">
                    Begins in simple booking"
                </div>
            </div>

            <!-- Login -->
            <div class="sign_in_up">
                <form action="{{ route('customer_login') }}" class="login_post" data-num="1">
                    @csrf
                    <h1>Login</h1>
                    <input type="text" name="input_from" id="input_from" value="2" readonly hidden>
                    <div class="input-box">
                        <input type="text" placeholder="Username" name="username" id="s_username" required autofocus
                            autocomplete="username">
                        <i class='bx bxs-user icons'></i>
                    </div>
                    <div class="input-box">
                        <input type="password" placeholder="Password" name="password" id="s_password" required>
                        <i class='bx bxs-lock-alt icons'></i>
                    </div>
                    <button type="submit" class="btn">Login</button>
                    <div class="register-link">
                        <p>Dont have an account? <a href="#" data-toggle="modal" data-target="#popup_reg">Register</a>
                        </p>
                    </div>
                </form>
            </div>
            <!-- End -->

            <!-- PopUp Register -->
            <div class="modal fade" id="popup_reg" aria-hidden="true" data-backdrop="static">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('customer_store') }}" method="POST" class="signup_post" data-num="2">
                            <div class="modal-body reg_scrollable">
                                <div class="labels">Firstname</div>
                                <input type="text" class="form-control" name="firstname" placeholder="Firstname"
                                    autofocus required autocomplete="given-name">
                                <div class="labels">Lastname</div>
                                <input type="text" class="form-control" name="lastname" placeholder="Lastname" required
                                    autocomplete="family-name">
                                <div class="labels">Address</div>
                                <input type="text" class="form-control" name="address" placeholder="Address" required
                                    autocomplete="address-line1">
                                <div class="labels">Contact Number</div>
                                <input type="text" class="form-control" name="c_number" id="c_number"
                                    placeholder="Contact Number" pattern="\d{11}" title="Please enter 11 digits"
                                    inputmode="numeric" required>
                                <div class="labels">Email</div>
                                <input type="email" id="email_id" class="form-control" name="email" placeholder="Email"
                                    required autocomplete="email">
                                <div class="labels">Username</div>
                                <input type="text" class="form-control" name="username" placeholder="Username" required
                                    autocomplete="username">
                                <div class="labels">Password</div>
                                <input type="password" id="input-password" class="form-control" name="password"
                                    placeholder="Password" required autocomplete="current-password">
                                <div class="labels">Confirm-Password</div>
                                <input type="password" id="confirm-password" class="form-control" name="c_password"
                                    placeholder="Confirm Password" required autocomplete="new-password">

                            </div>

                            <div class="modal-footer mod_bot">
                                <div class="tac">
                                    <input type="checkbox" id="myCheckbox" name="myCheckbox" value="1"
                                        onchange="toggleSubmit()" disabled>
                                    <label for="myCheckbox"></label>
                                    I agree to the
                                    <a href="#" class="tac_pop" id="termsLink" data-toggle="modal"
                                        data-target="#termsandconditions" onclick="checkCheckbox()">terms and
                                        conditions</a>.
                                </div>
                                <div class="reg_sub">
                                    <button type="submit" id="submitButton" class="btn btn-md btn-outline-success"
                                        disabled>Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="popup_reg1" aria-hidden="true" data-backdrop="static">
                <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" style="font-size:18px; color:black">Verify Your Code</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="otpCode" style="font-size:15px; color:black">Your code was sent to you
                                    via email <br><span id="email-send"> admin@admin.com</span></label>

                                <input type="number" class="form-control" id="otpCode" placeholder="Enter code"
                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    maxlength="6" required style="text-align: center;">
                                <div class="row">
                                    <div class="col-6">
                                        <small id="timer" style="font-size:15px; color:black">Time left:
                                            00:00</small>
                                    </div>

                                    <div class="col-6">
                                        <small class="float-right text-primary " id="resend" style="display:none"
                                            onclick="__resend('is_resend')"><u>Resend</u></small>
                                    </div>
                                </div>


                            </div>
                            <button type="submit" class="btn btn-primary verify_btn">Verify</button>

                        </div>
                    </div>
                </div>
            </div>

            <!-- End -->


            <!-- Show Terms and Conditions -->
            <div class="modal fade" id="termsandconditions" data-backdrop="static">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header card-header-color">
                            <h4 class="modal-title title">Ohana Resort Booking System - Terms and Conditions</h4>
                            <button type="button" class="close" id="termsCloseButton" data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body scrollable">
                            <div class="termscond">
                                <div class="nums">1. Room Types and Rates</div>
                                <div class="desc">
                                    - Small Room: ₱2,500 per night, accommodates up to 3 guests.
                                </div>
                                <div class="desc">
                                    - Large Room: ₱3,000 per night, accommodates up to 4 guests.
                                </div>

                                <div class="nums">2. Check-in and Check-out</div>
                                <div class="desc">
                                    - Check-in time is 2:00 PM, and check-out time is 12:00 PM.
                                </div>
                                <div class="desc">
                                    - Early check-in or late check-out may be available, subject to additional charges.
                                </div>

                                <div class="nums">3. Function Hall</div>
                                <div class="desc">
                                    - Function hall available for events, accommodating up to 40 guests for 5 hours.
                                </div>
                                <div class="desc">
                                    - Function hall rental fee: ₱5,000.
                                </div>

                                <div class="nums">4. Booking and Res</div>
                                <div class="desc">
                                    - Users must specify room number, room type and duration of function hall rental
                                    during booking.
                                </div>
                                <div class="desc">
                                    - Bookings are subject to availability and confirmation by Ohana Resort.
                                </div>

                                <div class="nums">5. Payment</div>
                                <div class="desc">
                                    - Payments are required to secure both room bookings and function hall bookings.
                                </div>
                                <div class="desc">
                                    - Payments can be made online through GCash Reference Number and Pay Cash based.
                                </div>
                                <div class="desc">
                                    - For online payments, users must provide the GCash reference number to confirm the
                                    transaction.
                                </div>
                                <div class="desc">
                                    - Cash payments can be made in person at the resort.
                                </div>
                                <div class="desc">
                                    - Guests must settle payments directly with the front desk during check-in.
                                </div>

                                <div class="nums">6. Cancellation Policy</div>
                                <div class="desc">
                                    - Cancellation is prohibited; once a reservation is made, it is considered final.
                                </div>
                                <div class="desc">
                                    - Function hall bookings are also non-refundable.
                                </div>

                                <div class="nums">7. Guest Responsibilities</div>
                                <div class="desc">
                                    - Guests are responsible for the proper use of the function hall and adherence to
                                    resort policies.
                                </div>
                                <div class="desc">
                                    - Damages to resort property, including function hall equipment, may result in
                                    additional charges.
                                </div>

                                <div class="nums">8. Privacy and Data Security</div>
                                <div class="desc">
                                    - Ohana Resort respects user privacy for both room bookings and function hall
                                    bookings.
                                </div>

                                <div class="nums">9. Amenities and Services</div>
                                <div class="desc">
                                    - Ohana Resort, being a smaller establishment, provides personalized services to
                                    ensure a cozy and intimate experience.
                                </div>

                                <div class="nums">10. Disclaimer of Liability</div>
                                <div class="desc">
                                    - Ohana Resort is not responsible for accidents, injuries, or loss of personal
                                    property during the stay or event.
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer byohana mt-3 mb-3">
                            By using the Ohana Resort Booking System, users agree to abide by these terms and
                            conditions. Ohana Resort may update these terms periodically, and users are encouraged to
                            review them regularly.
                        </div>
                    </div><!-- /.modal-content -->
                </div> <!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- End of Show Terms and Conditions -->

        </div>
        <!-- /.content-wrapper -->
    </div>

    <footer class="main-footer">
        <center>
            <strong>Copyright &copy; 2024
                <a href="#">
                    <span class="footer_single_letter">O</span>hana
                    <span class="footer_single_letter">R</span>esort Booking System</a>.
            </strong>
        </center>
    </footer>
    <!-- ./wrapper -->

</body>
<div id="snackbar"><strong><span id="message">Snackbar Message</span></strong></div>

</html>


<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- SweetAlert2 -->
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>


<script>
var intervalID;
var totalTime = 60;
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 1500
});
document.getElementById("c_number").addEventListener("input", function() {

    let inputValue = this.value.replace(/\D/g, '');

    if (inputValue.length > 11) {
        inputValue = inputValue.slice(0, 11);
    }
    this.value = inputValue;
});

function showSnackbar(message) {
    var snackbar = document.getElementById("snackbar");
    var snackbar_message = document.getElementById("message");
    snackbar.className = "show";
    snackbar_message.textContent = message;
    setTimeout(function() {
        snackbar.className = snackbar.className.replace("show", "");
    }, 3000);
}



$('.login_post').on('submit', function(e) {
    e.preventDefault();

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
                        title: '<p class="text-center pt-2 text-bold text-black">' + data[
                            'message'] + '</p>'
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

$('.signup_post').on('submit', function(e) {
    e.preventDefault();
    var password = $('#confirm-password').val();
    var confirm_password = $('#input-password').val();

    var email = $('#email_id').val();

    var data = {
        email: email
    }


    __checkEmail(data).done(function(response) {

        if (response == 1) {
            Toast.fire({
                icon: 'error',
                title: '<p class="text-center pt-2">Email is already exist!</p>'
            });
            return;
        }
        if (password == confirm_password) {
            var num = $(this).attr('data-num');
            var email = $('#email_id').val();
            $('#otpCode').val('')

            var data = {
                email: email,
                request_type: '1',
                is_status: 'is_pending'
            };

            $('#email-send').html('<u>' + email + '</u>');

            $('#popup_reg1').modal('show');
            __makeTime();

            Toast.fire({
                icon: 'success',
                title: '<p class="text-center pt-2 text-bold text-black">Sending OTP ...</p>'
            });

            __optSend(data).done(function(response) {

               

            }).fail(function(xhr, status, error) {

                // Toast.fire({
                //     icon: 'error',
                //     title: '<p class="text-center pt-2">Failed to send OTP. Please try again later.</p>'
                // });
            });
            return;
        } else {
            Toast.fire({
                icon: 'error',
                title: '<p class="text-center pt-2">Password Not match!</p>'
            });
            return;
        }

        // Toast.fire({
        //     icon: 'success',
        //     title: '<p class="text-center pt-2 text-bold text-black">Sending OTP ...</p>'
        // });

    }).fail(function(error) {

        return error;
    });


});


$('.verify_btn').on('click', function(e) {
    e.preventDefault();

    __verifyCode();
});


function __verifyCode() {
    var data = {
        email: $('#email_id').val(),
        otp_code: $('#otpCode').val()
    };
    $.ajax({
        url: '/verify-code',
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify(data),
        success: function(response) {

            $('#otpCode').val('');
            if (response.message == "is_verify") {

                $.ajax({
                    type: "POST",
                    cache: false,
                    url: $('.signup_post').attr('action'),
                    data: $('.signup_post').serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {

                        switch (data['response']) {
                            case 1:
                                Toast.fire({
                                    icon: 'success',
                                    title: '<p class="text-center pt-2 text-bold text-black">' +
                                        data[
                                            'message'] + '</p>'
                                });

                                setTimeout(function() {
                                    window.location.href = data['path'];
                                }, 1500);

                                break;
                            default:
                                Toast.fire({
                                    icon: 'error',
                                    title: '<p class="text-center pt-2">' + data[
                                        'message'] + '</p>'
                                });
                                break;
                        }

                    }
                });

            } else {


                Toast.fire({
                    icon: 'error',
                    title: '<p class="text-center pt-2">Invalid OTP code. Please try again.</p>'
                });
            }
        },
        error: function(xhr, status, error) {


            Toast.fire({
                icon: 'error',
                title: '<p class="text-center pt-2">Failed to verify code. Please try again later.</p>'
            });
        }
    });
}

function __optSend(data) {
    return $.ajax({
        url: '/send-otp',
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify(data)
    });
}

function __checkEmail(data) {
    return $.ajax({
        url: '/check-email',
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify(data)
    });
}

function __resend() {
    var data = {
        email: $('#email_id').val(),
        request_type: '1',
        is_status: 'is_resend'
    }
    __resetTime();
    showSnackbar("Resend OTP..");

    __makeTime();
    __optSend(data)
}

function __makeTime() {
    totalTime = 60;
    var timer = $('#timer');

    intervalID = setInterval(function() {
        var minutes = Math.floor(totalTime / 60);
        var seconds = totalTime % 60;

        timer.html('Time left: ' + minutes.toString().padStart(2, '0') + ":" + seconds.toString()
            .padStart(2, '0'));

        totalTime--;

        if (totalTime < 0) {
            clearInterval(intervalID);
            timer.html('Time exp: 00:00');

            $('#resend').attr('style', 'font-size:15px; margin-top: 19px;cursor: pointer;');
            showSnackbar("Please resend again OTP...");
        }
    }, 1000);
}

function __stopTime() {
    if (intervalID) {
        clearInterval(intervalID);
        $('#timer').html('Timer stopped: 00:00');
    }
}

function __resetTime() {
    if (intervalID) {
        clearInterval(intervalID);
    }
    $('#timer').html('Time left: 01:00');
    totalTime = 60;
}

function toggleSubmit() {
    var checkbox = document.getElementById("myCheckbox");
    var submitButton = document.getElementById("submitButton");
    submitButton.disabled = !(checkbox.checked && checkbox.getAttribute('data-clicked') === "true");
}

function checkCheckbox() {
    var checkbox = document.getElementById("myCheckbox");
    checkbox.checked = true;
    checkbox.setAttribute('data-clicked', 'true');
    checkbox.disabled = false;
    toggleSubmit();
}

document.getElementById("termsLink").addEventListener("click", function(event) {
    event.preventDefault();
    $('#popup_reg').modal('hide');
    $('#termsandconditions').modal('show');
});

document.getElementById("termsCloseButton").addEventListener("click", function() {
    $('#popup_reg').modal('show');
});
</script>