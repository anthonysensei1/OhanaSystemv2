<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ohana Resort Online Booking</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <link rel="shortcut icon" href="{{asset ('/images/ohana.png') }}">

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
        width: 1100px;
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
        <form action="#">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" placeholder="Username" name="s_username" id="s_username" required autofocus>
                <i class='bx bxs-user icons'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" name="s_password" id="s_password" required>
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
                <div class="modal-body">
                    <form action="#">
                        <div class="labels">Firstname</div>
                            <input type="text" class="form-control" name="firstname" placeholder="Firstname" autofocus required autocomplete="given-name">
                        <div class="labels">Lastname</div>
                            <input type="text" class="form-control" name="lastname" placeholder="Lastname" required autocomplete="family-name">
                        <div class="labels">Address</div>
                            <input type="text" class="form-control" name="address" placeholder="Address" required autocomplete="address-line1">
                        <div class="labels">Contact Number</div>
                            <input type="tel" class="form-control" name="c_number" placeholder="Contact Number" required autocomplete="tel">
                        <div class="labels">Username</div>
                            <input type="text" class="form-control" name="username" placeholder="Username" required autocomplete="username">
                        <div class="labels">Password</div>
                            <input type="password" class="form-control" name="password" placeholder="Password" required autocomplete="current-password">
                        <div class="labels">Confirm-Password</div>
                            <input type="password" class="form-control" name="c_password" placeholder="Confirm Password" required autocomplete="new-password">
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-md btn-outline-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End -->

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