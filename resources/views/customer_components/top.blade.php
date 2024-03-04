<nav class="main-header navbar navbar-expand-md navbar_cust">
    <div class="container-fluid container_fluid_767">
        <a href="#" class="navbar-brand text-white" style="margin-left: 80px; font-weight: bold;"> <!-- Added font-weight style -->
            <span class="brand-text ohana_text"><span class="single_letter">O</span>HANA <span class="single_letter">R</span>ESORT</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse navar_customized" id="navbarCollapse">
            <ul class="navbar-nav navbar-nav1 ml-auto">
                <li class="nav-item tops">
                    <a href="{{route('/Customer/Pages/Home/home')}}" class="nav-link" id="home">HOME</a>
                </li>
                <li class="nav-item tops">
                    <a href="{{route('/Customer/Pages/Book/book')}}" class="nav-link" id="book_now">BOOK NOW</a>
                </li>
                <li class="nav-item tops">
                    <a href="{{route('/Customer/Pages/Calendar/guest_calendar')}}" class="nav-link" id="cal">CALENDAR</a>
                </li>
                <li class="nav-item tops">
                    <a href="{{route('/Customer/Pages/About/about')}}" class="nav-link" id="about">ABOUT</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>

    .navbar_cust{
        background: rgba(0, 0, 0, .9);
        backdrop-filter: blur(25px);
        border-bottom:1px  solid red;
    }

    .c_active{
        border: 1px solid red;
        border-radius: 3px;
        
    }

    .navbar-nav1  .nav-item .nav-link {
        color: #fff !important;
        font-weight: bold;
    }

    .tops:hover{
        border: 1px solid red;
        border-radius: 3px;
        transition: 1s;
    }

    .navar_customized ul li a {
        color: #fff;
    }

    .single_letter {
        font-size: xxx-large;
        font-style: italic;
        color: red;
    }

    .ohana_text{
        font-size: 30px;
        font-weight: bolder;
        letter-spacing: 8px;
        color: #fff;
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
