@extends('layouts.app_customer')
@section('content')
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content pt-3 pb-3" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7 custom-carousel">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{asset ('../images/1.png') }}" class="d-block w-100">
                            </div>
                            <div class="carousel-item">
                                <img src="{{asset ('/images/3.png') }}" class="d-block w-100">
                            </div>
                            <div class="carousel-item">
                                <img src="{{asset ('/images/5.png') }}" class="d-block w-100">
                            </div>
                            <div class="carousel-item">
                                <img src="{{asset ('/images/6.png') }}" class="d-block w-100">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-lg-5 desc_contact">
                    <div class="columns">
                        <div class="description">
                            <div class="head_desc">
                                <h3>Description</h3>
                            </div>
                            <div class="desc_cont">
                                <div class="p1">
                                    <p>
                                        Experience affordable luxury in our small rooms at Ohana Mabini Event Place Resort, perfect for three guests. Enjoy the charm of bouncy beds paired with super-soft linens and fluffy pillows. Our rooms are thoughtfully curated with our favorite touches, making it a space you may never want to leave. And if staying in is your preference, no worries – we'll bring the Ohana Event Place experience to you!
                                    </p>
                                </div>
                                <div class="p2">
                                    <div class="exclusive_offer">*Exclusive Offer*</div>
                                    <ul class="ul">
                                        <li>
                                            Stay includes breakfast for 2
                                        </li>
                                        <li>
                                            Free Wifi for seamless connectivity
                                        </li>
                                        <li>
                                            Dive into relaxation with complimentary use of our refreshing swimming pool.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="description">
                            <div class="head_desc">
                                <h3>Contact Us</h3>
                            </div>
                            <div class="contact_cont">
                                <div class="row">
                                    <div class="col-lg-4 cc_card">
                                        <div class="info">
                                            <i class="fab fa-facebook-square fa-3x"></i>
                                            <span class="display">
                                                Visit us on our Facebook Page!
                                                <a href="https://web.facebook.com/profile.php?id=100083468221851">
                                                    https://web.facebook.com/profile.php?id=100083468221851
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 cc_card">
                                        <div class="info">
                                            <i class="fas fa-phone fa-3x"></i>
                                            <span class="display">
                                                You can call or message us on this contact number.
                                                <a href="#">
                                                    +639369900245
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 cc_card">
                                        <div class="info">
                                            <i class="fas fa-envelope fa-3x"></i>
                                            <span class="display">
                                                You can send message through our email
                                                <a href="#">
                                                    myohanaplace@gmail.com
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
</div>

<script type="text/javascript">
	$('#about').addClass('c_active');
</script>

<style>
    .carousel-inner img{
        height: 830px;
    }
    .carousel-indicators button{
        background-color: #fff!important;
    }

    .head_desc{
        display: flex;
        justify-content: center;
        align-items: center;
        background: #a50f15;
        margin: 0 auto;
        padding: 0;
        border-radius: 5px;
        border:2px solid #000;
        width: 100%;
        color: #fff;
    }
    .desc_contact_row{
        width: 102%;
        margin: 0;
        padding: 0;
        background-color: red;
    }

    .columns{
        margin: 5px;
        width: 100%;
    }

    .desc_cont{
        border:2px solid #000;
        border-radius: 2px;
        padding: .2rem;
        margin-top: 10px;
        background-color: #fff;
    }
    .desc_cont .p1 p{
        text-align: justify;
        margin: .8rem;
        font-size: 1.1rem;  
    }

    .contact_cont{
        border:2px solid #000;
        border-radius: 2px;
        margin-top: 10px;
        background-color: #fff;
    }

    .exclusive_offer{
        display: flex;
        align-items: baseline;
        align-content: flex-start;
        justify-content: center;
        font-size: 1.2rem;
        letter-spacing: 5px;
    }

    .p2 .ul{
        list-style-type: disc;
    }

    .p2 ul li{
        text-decoration: underline;
    }

    
    .cc_card{
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        width: 100%;
        margin-top: 30px;
    }

    .info{
        display: flex;
        align-items: center;
        flex-direction: column;
        flex-wrap: nowrap;
    }

    .info span:nth-of-type(1){
        margin-bottom: 10px;
    }
    .info span a{
        display: flex;
        align-items: center;
        flex-direction: column;
        flex-wrap: nowrap;
    }

    .display{
        display: flex;
        align-items: center;
        flex-direction: column;
        flex-wrap: nowrap;
    }


    @media screen and (max-width:990px){
        .desc_contact{
            margin-top: 10px;
            width: 100%;
        }
    }
</style>

@endsection