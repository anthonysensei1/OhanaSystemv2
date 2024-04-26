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
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse order-3 custome" id="navbarCollapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="{{route('/Customer/Pages/Home/home')}}" class="nav-link"
                        id="home">HOME</a></li>
                <li class="nav-item"><a href="{{route('/Customer/Pages/Book/book')}}" class="nav-link"
                        id="book_now">BOOK NOW</a></li>
                <li class="nav-item"><a href="{{route('/Customer/Pages/Calendar/guest_calendar')}}" class="nav-link"
                        id="cal">CALENDAR</a></li>
                <li class="nav-item"><a href="{{route('/Customer/Pages/About/about')}}" class="nav-link"
                        id="about">ABOUT</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        Notification
                        <span class="badge badge-warning navbar-badge"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm"> 3 mins</span>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown  btn btn-group-lo profile-image ml-2">
                    <a data-toggle="dropdown" href="#">
                        <img src="{{ asset('/images/ohana.png') }}" class="rounded-circle"
                            style="width: 40px; height: 40px;">
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a class="btn dropdown-item click_my_account" href="#" id="click_my_account">My Account</a>
                        <div class="dropdown-divider"></div>
                        @auth
                        <form action="{{ route('customer_logout') }}" class="logout dropdown-item log_out">
                            @csrf
                            <button class="btn btn-light btn_out" type="submit" href="#"><i
                                    class="fas fa-sign-out-alt"></i> Logout</button>
                        </form>
                        @endauth
                    </div>
                </li>
            </ul>
        </div>
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
                <form action="{{ route('customer_update') }}" class="formPost">
                    <input type="text" class="form-control" name="url" value="{{ url()->current() }}" readonly hidden>
                    <input type="text" class="form-control" name="id" value="{{ auth()->user()->id }}" readonly hidden>
                    <input type="text" class="form-control" name="ordinary_id" value="{{ session('ordinary_id') }}"
                        readonly hidden>
                    <div class="labels">Firstname</div>
                    <input type="text" class="form-control" name="firstname" placeholder="Firstname" autofocus required
                        value="{{ session('first_name') }}" autocomplete="given-name">
                    <div class="labels">Lastname</div>
                    <input type="text" class="form-control" name="lastname" placeholder="Lastname" required
                        value="{{ session('last_name') }}" autocomplete="family-name">
                    <div class="labels">Address</div>
                    <input type="text" class="form-control" name="address" placeholder="Address" required
                        value="{{ session('address') }}" autocomplete="address-line1">
                    <div class="labels">Contact Number</div>
                    <input type="number" class="form-control" name="c_number" placeholder="Contact Number" required
                        value="{{ session('c_number') }}" autocomplete="tel">
                    <div class="labels">Username</div>
                    <input type="text" class="form-control" name="username" placeholder="Username" required
                        value="{{ auth()->user()->username }}" autocomplete="username">
                    <div class="labels">Password</div>
                    <div class="input-group input-group-md">
                        <input type="password" class="form-control" name="password" placeholder="Password" required
                            value="{{ auth()->user()->password }}" autocomplete="current-password" disabled
                            id="passwordField">
                        <span class="input-group-append">
                            <button type="button" class="btn btn-info" id="up_pass" onclick="togglePasswordField()"> <i
                                    class="fas fa-edit"></i> </button>
                        </span>
                    </div>
                    <div class="labels">Confirm-Password</div>
                    <div class="input-group input-group-md">
                        <input type="password" class="form-control" name="c_password" placeholder="Confirm Password"
                            required value="{{ auth()->user()->password }}" autocomplete="new-password" disabled
                            id="cPasswordField">
                        <span class="input-group-append">
                            <button type="button" class="btn btn-info" id="up_cpass"
                                onclick="toggleConfirmPasswordField()"> <i class="fas fa-edit"></i> </button>
                        </span>
                    </div>
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
.dropdown-menu .dropdown-item {
    color: #000;
}

.dropdown-menu .dropdown-item {
    border-radius: 0 !important;
    color: #000;
    text-align: center;
}

.dropdown-menu .dropdown-item:hover {
    border-radius: 0 !important;
    background-color: #a50f15;
    color: #fff;
    font-weight: bolder;
}


.btn.dropdown-toggle::after {
    display: none !important;
}


.nav-link {
    color: white;
    font-weight: 600;
}

.navbar_cust {
    background: rgba(0, 0, 0, .9);
    backdrop-filter: blur(25px);
    border-bottom: 3px solid #fff;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

.c_active {
    border-radius: 50px;
    background-color: #a50f15;
    color: #fff;
}

.navbar-nav .nav-item .nav-link {
    color: #fff !important;
    font-weight: bold;
}

.custome {
    display: flex;
    align-items: center;
    justify-content: center;
}

.custome a {
    transition: .2s;
    border-radius: 50px;
    color: #fff;
}

.custome a:hover {
    background-color: #a50f15;
    color: #fff;
}

.log_out:hover {
    background-color: #fff !important;
    color: #fff;
}

.btn_out:hover {
    background-color: #a50f15;
    color: #fff;
}

.no-icon::before {
    display: none !important;
}


.container_fluid_767 {
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

.ohana_text {
    font-size: 30px;
    font-weight: bolder;
    letter-spacing: 8px;
    color: #fff;
    display: flex;
}

@media screen and (max-width:950px) {

    .custome {
        display: none !important;
    }

    .navbar-collapse {
        display: none !important;
    }

}

    @media screen and (max-width:767px) {
        .btn-group-lo {
            position: relative;
            vertical-align: middle;
        }

        .navbar-collapse {
            display: none !important;
        }

        .navbar-collapse.show {
            display: block !important;
        }

        .container_fluid_767 .navbar-nav {
            display: flex;
            flex-direction: column;
            align-content: center;
            align-items: center;
        }

        .c_active {
            background: #a50f15 !important;
            border-radius: 5px;
            width: 100%;
        }

        .navbar-nav .nav-item .nav-link {
            color: #fff !important;
            font-weight: bold;
        }

        .navbar-toggler-icon {
            width: 30px;
            height: 3px;
            background-color: #fff;
            display: block;
            transition: background-color 0.3s;
            margin: 5px 0px 5px 0px;
        }

        .navbar-toggler[aria-expanded="true"].navbar-toggler-icon {
            background-color: #fff;
        }

        .navbar-toggler:focus .navbar-toggler-icon {
            outline: none;
        }
    }

    @media screen and (max-width: 424px) {
        .ohana_text {
            font-size: 6vw;
            font-weight: bolder;
            letter-spacing: 8px;
            color: #fff;
            display: flex;
        }

        .single_letter {
            font-size: 8vw;
        }
    }
</style>


<script scoped>
$('.click_my_account').click(function() {
    $('#my_account').modal('show');
});

$('.close').click(function() {
    $('#my_account').modal('hide');
});

function togglePasswordField() {
    var passwordField = document.getElementById("passwordField");
    var cPasswordField = document.getElementById("cPasswordField");
    var pass = "{{ auth()->user()->password }}";

    passwordField.disabled = !passwordField.disabled;
    cPasswordField.disabled = passwordField.disabled;

    if (passwordField.disabled) {
        passwordField.value = pass;
        cPasswordField.value = pass;
    } else {
        passwordField.value = "";
        cPasswordField.value = "";
    }
}

function toggleConfirmPasswordField() {
    var passwordField = document.getElementById("passwordField");
    var cPasswordField = document.getElementById("cPasswordField");
    var pass = "{{ auth()->user()->password }}";

    passwordField.disabled = !passwordField.disabled;
    cPasswordField.disabled = passwordField.disabled;

    if (passwordField.disabled) {
        passwordField.value = pass;
        cPasswordField.value = pass;
    } else {
        passwordField.value = "";
        cPasswordField.value = "";
    }
}
</script>