<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container-fluid">
        <a href="#" class="navbar-brand" style="margin-left: 20px; font-weight: bold;"> <!-- Added font-weight style -->
            <span class="brand-text">OHANA RESORT BOOKING SYSTEM</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="{{route('/Customer/Pages/Home/home')}}" class="nav-link" id="home">HOME</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('/Customer/Pages/Book/book')}}" class="nav-link" id="book_now">BOOK NOW</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('/Customer/Pages/Calendar/guest_calendar')}}" class="nav-link" id="cal">CALENDAR</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('/Customer/Pages/About/about')}}" class="nav-link" id="about">ABOUT</a>
                </li>
                <!-- <li class="nav-item">
                    <a href="{{route('/Customer/Pages/ContactUs/contact_us')}}" class="nav-link" id="contact_us">CONTACT US</a>
                </li> -->
            </ul>
        </div>
    </div>
</nav>
