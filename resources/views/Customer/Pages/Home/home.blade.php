@extends('layouts.app_customer')
@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="words">
			<p>Steps into serenity:</p>
		</div>
		<div class="words">
			<p>"Where every stay</p>
		</div>
		<div class="words">
			<p>Begins in simple booking"</p>
		</div>
    </div>

	<div class="logo">
		<div class="ohana">
			<img src="{{asset ('/images/ohanaLogo.png')}}">
		</div>
	</div>
</div>

<style scoped>

.logo {
	display:flex;
	justify-content:center;
	align-items: center;
}
.logo .ohana img{
	background: rgba(0, 0, 0, .4);
	backdrop-filter: blur(5px);
	width: 100%;
	height: auto;
    background-repeat: no-repeat;
    background-size: contain;
}

.content{
	display: flex;
	align-items: center;
    flex-wrap: wrap;
    justify-content: center;
    width: 100%;
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
	width: 947px;
    font-weight: bolder;
	padding: 0 30px;
}

.words:nth-child(1){
    font-size:5rem;
}
.words:nth-child(2){
    font-size:5rem;
}
.words:nth-child(3){
    font-size:4rem;
	text-align:center;
	border-radius: 5px;
	background-color: #a50f15;
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
</style>
<script type="text/javascript">
	$('#home').addClass('c_active');
</script>
@endsection