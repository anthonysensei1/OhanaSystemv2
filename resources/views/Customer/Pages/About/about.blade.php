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
                                <img src="{{asset ('../images/1.png') }}" class="d-block w-100" >
                            </div>
                            <div class="carousel-item">
                                <img src="{{asset ('/images/3.png') }}" class="d-block w-100" >
                            </div>
                            <div class="carousel-item">
                                <img src="{{asset ('/images/5.png') }}" class="d-block w-100" >
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
                    <div class="row desc_contact_row">
                        <div class="col-lg-12">
                            <div class="description">
                                <div class="head_desc">
                                    <h3>Description</h3>
                                </div>
                                <div class="desc_cont">
                                    <p>asdsadasdsad as,bsakj dsauidbnm, asbdjkasbdjklsad nsalkhnjkld</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="description">
                                <div class="head_desc">
                                    <h3>Contact Us</h3>
                                </div>
                                <div class="contact_cont">
                                    <div class="row">
                                        <div class="col-lg-4 cc_card">
                                            <div class="info">
                                                <i class="fab fa-facebook-square fa-4x"></i>
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
                                                <i class="fas fa-phone fa-4x"></i>
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
                                                <i class="fas fa-envelope fa-4x"></i>
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
            </div>
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
</div>

<script type="text/javascript">
	$('#about').addClass('c_active');
</script>

<style>
    .custom-carousel{
        border: 2px solid #000;
        padding: 0;
        background: lightgrey;
    }

    .head_desc{
        display: flex;
        justify-content: center;
        align-items: center;
        background: #59cfff;
        margin: 0 auto;
        padding: 0;
        border-radius: 5px;
        border:1px solid #000;
    }

    .desc_contact{
        display: flex;
        flex-direction: wrap;
        justify-content: center;
    }

    .desc_contact_row{
        display: flex;
        flex-wrap: wrap;
        width: 100%;
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
        margin-bottom: 20px;
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
</style>

@endsection