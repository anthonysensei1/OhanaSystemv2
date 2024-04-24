<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ohana Resort Online Booking</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
    *{
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
    }

    body {
        background-image:url('/images/ohanabg.png')!important;
        background-repeat: no-repeat!important;
        background-size: cover!important;
    }
    .main-footer a{
        text-decoration: none;
    }

    .display a{
        text-decoration: none;
    }
    .labels{
        color: #000;
        font-size: 15px;
        font-weight: bold;
        margin: 5px 0;
    }

    .sign_in_up{
    width: 22%;
    height: 450px;
    background: rgba(0, 0, 0, .4);
    border: 2px solid rgba(255, 255, 255, .8);
    backdrop-filter: blur(9px);
    color: #fff;
    border-radius: 12px;
    transition:0.5s;
    padding: 30px 40px;

    }
    .sign_in_up h1{
    font-size: 36px;
    text-align: center;
    }
    .sign_in_up .input-box{
    position: relative;
    width: 100%;
    height: auto;
    margin: 30px 0;
    }
    .input-box input{
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
    .input-box input::placeholder{
    color: #fff;
    }
    .input-box i{
    position: absolute;
    right: 20px;
    top: 30%;
    transform: translate(-50%);
    font-size: 20px;

    }
    .sign_in_up .btn{
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
    .sign_in_up .register-link{
    font-size: 14.5px;
    text-align: center;
    margin: 20px 0 15px;
    }
    .register-link p a{
        color:#a50f15;
    text-decoration: none;
    font-weight: 600;
    }
    .register-link p a:hover{
    text-decoration: underline;
    color:#fff;
    }

    .content-wrapper {
        background: rgba(0, 0, 0, .4);
        color: #fff;
        font-size: 2rem;
        display: flex;
        align-items: center;
        justify-content: space-evenly;
    }

    .words{
        font-weight: bolder;
    }

    .words:nth-child(1){
        font-size:8rem;
        margin-left: 110px;
    }
    .words:nth-child(2){
        font-size:5rem;
        margin-left: 110px;
    }
    .words:nth-child(3){
        font-size:5rem;
        margin-left: 110px;
        background-color: #a50f15;
        text-align: center;
        border-radius: 5px;
        /* width: 1100px; */
    }

    .main-footer{
            background: rgba(0, 0, 0, .8);
            backdrop-filter: blur(30px);
            color: #fff;
            border-top:3px  solid #fff;
        }

        .main-footer a{
            color:#fff;
            font-weight: bolder;
        }

        .footer_single_letter {
            font-size: 25px;
            color: #a50f15;
        }

    @media screen and (max-width: 1740px){

        .content-wrapper{
            flex-direction: column;
        }
        .sign_in_up{
            width: 40%;
            margin:15px 0 15px 0;
        }

        .words:nth-child(1){
        font-size: 50px;
        margin-left: 0px;
        text-align:center;
    }
    .words:nth-child(2){
        font-size:30px;
        margin-left: 0px;
        text-align:center;
    }
    .words:nth-child(3){
        font-size:30px;
        margin-left: 0px;
        text-align:center;
        color: #fff;
        background-color: #a50f15;
    }


    }
    @media screen and (max-width: 960px){
        .sign_in_up{
            width: 450px;
        }
        .navar_customized{
            display:none;
        }
    }


    @media screen and (max-width: 520px){
        .sign_in_up{
            width: 350px;
        }
    }

        .navbar_cust{
            background: rgba(0, 0, 0, .9);
            backdrop-filter: blur(25px);
            border-bottom: 3px solid #fff;
        }

        .single_letter {
            font-size: 45px;
            color: #a50f15;
        }

        .ohana_text{
            font-size: 30px;
            font-weight: bolder;
            letter-spacing: 8px;
            color: #fff;
            display: flex;
        }

        @media screen and (max-width:767px){
            
            .container_fluid_767 .navbar-nav{
                display: flex;
                flex-direction: column;
                align-content: center;
                align-items: center;
            }

        }

        @media screen and (max-width:365px){
            .ohana_text{
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

    .tac{
        color: #000;
        font-size: 15px;
    }

    .tac_pop:hover{
        text-decoration: underline;
    }

    .mod_bot{
        display: flex;
        flex-direction: column;
        align-content: center;
    }

    .tac input[type="checkbox"] {
        transform: scale(1.5);
        margin-right: 10px;
    }

    .tac input[type="checkbox"]:hover {
        cursor:pointer;
    }

    .termscond{
        display: flex;
        color: #000;
        font-size: 15px;
        flex-direction: column;
    }

    .nums{
        font-weight: 900;
    }

    .desc{
        font-style: italic;
        margin-left: 10px;
    }

    .byohana{
        color: #000;
        font-size: 15px;
    }

    .title{
        font-size: 20px;
        font-weight: 900;
    }

    .card-header-color{
        background-color: #a50f15;
	    color: #fff;
    }

    .scrollable{
        max-height: 500px;
        overflow-y: auto;
    }

    .reg_scrollable{
        max-height: 400px;
        overflow-y: auto;
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
                <form action="{{ route('customer_login') }}" class="formPost">
                    @csrf
                    <h1>Login</h1>
                    <input type="text" name="input_from" id="input_from" value="2" readonly hidden>
                    <div class="input-box">
                        <input type="text" placeholder="Username" name="username" id="s_username" required autofocus autocomplete="username">
                        <i class='bx bxs-user icons'></i>
                    </div>
                    <div class="input-box">
                        <input type="password" placeholder="Password" name="password" id="s_password" required>
                        <i class='bx bxs-lock-alt icons' ></i>
                    </div>
                    <button type="submit" class="btn">Login</button>
                    <div class="register-link">
                        <p>Dont have an account? <a href="#" data-toggle="modal" data-target="#popup_reg">Register</a></p>
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
                        <form action="{{ route('customer_store') }}" class="formPost">
                            <div class="modal-body reg_scrollable">
                                <div class="labels">Firstname</div>
                                    <input type="text" class="form-control" name="firstname" placeholder="Firstname" autofocus required autocomplete="given-name">
                                <div class="labels">Lastname</div>
                                    <input type="text" class="form-control" name="lastname" placeholder="Lastname" required autocomplete="family-name">
                                <div class="labels">Address</div>
                                    <input type="text" class="form-control" name="address" placeholder="Address" required autocomplete="address-line1">
                                <div class="labels">Contact Number</div>
                                    <input type="number" class="form-control" name="c_number" placeholder="Contact Number" required autocomplete="tel">
                                <div class="labels">Username</div>
                                    <input type="text" class="form-control" name="username" placeholder="Username" required autocomplete="username">
                                <div class="labels">Password</div>
                                    <input type="password" class="form-control" name="password" placeholder="Password" required autocomplete="current-password">
                                <div class="labels">Confirm-Password</div>
                                    <input type="password" class="form-control" name="c_password" placeholder="Confirm Password" required autocomplete="new-password">
                            </div>
                        
                        <div class="modal-footer mod_bot">
                            <div class="tac">
                                <input type="checkbox" id="myCheckbox" name="myCheckbox" value="1" onchange="toggleSubmit()">
                                <label for="myCheckbox"></label>
                                    I agree to the 
                                    <a href="#" class="tac_pop" id="termsLink" data-toggle="modal" data-target="#termsandconditions">terms and conditions</a>.
                            </div>
                            <div class="reg_sub">
                                <button type="submit" id="submitButton" class="btn btn-md btn-outline-success" disabled>Submit</button>
                            </div>
                        </div>
                        </form>
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
                            <button type="button" class="close" id="termsCloseButton" data-dismiss="modal" aria-label="Close">
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
                                    - Users must specify room number, room type and duration of function hall rental during booking.
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
                                    - For online payments, users must provide the GCash reference number to confirm the transaction.
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
                                    - Guests are responsible for the proper use of the function hall and adherence to resort policies.
                                </div>
                                <div class="desc">
                                    - Damages to resort property, including function hall equipment, may result in additional charges.
                                </div>

                                <div class="nums">8. Privacy and Data Security</div>
                                <div class="desc">
                                    - Ohana Resort respects user privacy for both room bookings and function hall bookings.
                                </div>

                                <div class="nums">9. Amenities and Services</div>
                                <div class="desc">
                                    - Ohana Resort, being a smaller establishment, provides personalized services to ensure a cozy and intimate experience.
                                </div>

                                <div class="nums">10. Disclaimer of Liability</div>
                                <div class="desc">
                                    - Ohana Resort is not responsible for accidents, injuries, or loss of personal property during the stay or event.
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer byohana mt-3 mb-3">
                            By using the Ohana Resort Booking System, users agree to abide by these terms and conditions. Ohana Resort may update these terms periodically, and users are encouraged to review them regularly.
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


    function toggleSubmit() {
        var checkbox = document.getElementById('myCheckbox');
        var submitButton = document.getElementById('submitButton');
        
        if (checkbox.checked) {
            submitButton.disabled = false;
        } else {
            submitButton.disabled = true;
        }
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