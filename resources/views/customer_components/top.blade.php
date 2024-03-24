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
        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> -->
        <div class="custome">
            <a href="{{route('/Customer/Pages/Home/home')}}" class="nav-link" id="home">HOME</a>
            <a href="{{route('/Customer/Pages/Book/book')}}" class="nav-link" id="book_now">BOOK NOW</a>
            <a href="{{route('/Customer/Pages/Calendar/guest_calendar')}}" class="nav-link" id="cal">CALENDAR</a>
            <a href="{{route('/Customer/Pages/About/about')}}" class="nav-link" id="about">ABOUT</a>
            <div class="nav-item dropdown  btn btn-group profile-image ml-2">
                <a data-toggle="dropdown" href="#">
                    <img src="{{ asset('/images/ohana.png') }}" class="rounded-circle" style="width: 40px; height: 40px;">
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a class="btn dropdown-item click_my_account" href="#" id="click_my_account">My Account</a>
                <div class="dropdown-divider"></div>
                @auth
                <!-- <a href="#" class="dropdown-item"> -->
                    <form action="{{ route('customer_logout') }}" class="logout dropdown-item log_out">
                        @csrf
                        <button class="btn btn-light btn_out" type="submit" href="#"><i class="fas fa-sign-out-alt"></i> Logout</button>
                    </form>
                <!-- </a> -->
                @endauth
                </div>
            </div>
            <!-- <div class="btn btn-group dropdown-toggle profile-image ml-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{ asset('/images/ohana.png') }}" class="rounded-circle" style="width: 40px; height: 40px;">
                <div class="dropdown-menu">
                    <a class="btn dropdown-item click_my_account" href="#" id="click_my_account">My Account</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </div>
            </div> -->
        </div>
        <!-- @auth
            <form action="{{ route('customer_logout') }}" class="logout">
                @csrf
                <button class="btn btn-light" type="submit" href="#"><i class="fas fa-sign-out-alt"></i> Logout</button>
            </form>
        @endauth -->
    </div>
</nav>

<!-- PopUp MyAccount -->
<div class="modal fade " id="my_account" aria-hidden="true" data-backdrop="static" style="z-index: 1050;">
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
                        <input type="text" class="form-control" name="my_firstname" placeholder="Firstname" autofocus required autocomplete="given-name">
                    <div class="labels">Lastname</div>
                        <input type="text" class="form-control" name="my_lastname" placeholder="Lastname" required autocomplete="family-name">
                    <div class="labels">Address</div>
                        <input type="text" class="form-control" name="my_address" placeholder="Address" required autocomplete="address-line1">
                    <div class="labels">Contact Number</div>
                        <input type="tel" class="form-control" name="my_c_number" placeholder="Contact Number" required autocomplete="tel">
                    <div class="labels">Username</div>
                        <input type="text" class="form-control" name="my_username" placeholder="Username" required autocomplete="username">
                    <div class="labels">Password</div>
                        <input type="password" class="form-control" name="my_password" placeholder="Password" required autocomplete="current-password">
                    <div class="labels">Confirm-Password</div>
                        <input type="password" class="form-control" name="my_c_password" placeholder="Confirm Password" required autocomplete="new-password">
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-md btn-outline-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End -->

<style scoped>
    .dropdown-menu .dropdown-item{
        color: #000;
    }
    .dropdown-menu .dropdown-item{
        border-radius: 0 !important;
        color: #000;
        text-align:center;
    }
    
    .dropdown-menu .dropdown-item:hover{
        border-radius: 0 !important;
        background-color: #a50f15;
        color: #fff;
        font-weight: bolder;
    }


    .btn.dropdown-toggle::after {
        display: none !important;
    }


    .nav-link{
        color:white;
        font-weight:600;
    }
    .navbar_cust{
        background: rgba(0, 0, 0, .9);
        backdrop-filter: blur(25px);
        border-bottom: 3px solid #fff;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .c_active{
        border-radius: 50px;
        background-color: #a50f15;
    }

    .navbar-nav1  .nav-item .nav-link {
        color: #fff !important;
        font-weight: bold;
    }
    
    .custome{
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .custome a{
        transition: .2s;
        border-radius: 50px;
        color: #fff;
    }

    .custome a:hover {
        background-color: #a50f15;
        color: #fff;
    }

    .log_out:hover{
        background-color: #fff!important;
        color: #fff;
    }

    .btn_out:hover{
        background-color: #a50f15;
        color: #fff;
    }

    .no-icon::before {
        display: none !important;
    }


    .container_fluid_767{
        display: flex;
        flex-wrap: inherit;
        justify-content: space-around;
        align-items: center;
        width: 100%;
        font-size: 15px;
    }

    .container_fluid_767 ul li a {
        color: #fff;
        display: flex;
        flex-wrap: inherit;
        justify-content: space-around;
        align-items: center;
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
    @media screen and (max-width:950px){

        .custome{
            display:none !important;
        }
        .navbar-collapse{
            display:none !important;
        }

    }
    @media screen and (max-width:767px){
        
        .container_fluid_767 .navbar-nav{
            display: flex;
            flex-direction: column;
            align-content: center;
            align-items: center;
        }

        .c_active{
            background: #90EE90!important;
            border-radius: 5px;
            width: 100%;
            color: #000!important;
        }

        .navbar-nav1  .nav-item .nav-link {
            color: #fff !important;
            font-weight: bold;
        }

    }
</style>


<script>
  $('.click_my_account').click(function(){
    $('#my_account').modal('show');
});

$('.close').click(function(){
    $('#my_account').modal('hide');
});

</script>