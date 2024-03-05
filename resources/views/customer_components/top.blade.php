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
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="custome" style="color:white; display:flex; " >
            <a href="{{route('/Customer/Pages/Home/home')}}" class="nav-link" id="home">HOME</a>
            <a href="{{route('/Customer/Pages/Book/book')}}" class="nav-link" id="book_now">BOOK NOW</a>
            <a href="{{route('/Customer/Pages/Calendar/guest_calendar')}}" class="nav-link" id="cal">CALENDAR</a>
            <a href="{{route('/Customer/Pages/About/about')}}" class="nav-link" id="about">ABOUT</a>
        </div>
    </div>
</nav>

<style scoped>
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

    .container_fluid_767{
        display: flex;
        flex-wrap: inherit;
        justify-content: space-around;
        align-items: center;
        width: 100%;
    }

    .container_fluid_767 ul li a {
        color: #fff;
        display: flex;
        flex-wrap: inherit;
        justify-content: space-around;
        align-items: center;
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
