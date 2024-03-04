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
</div>

<style>
	body {
		background-image:url('/images/ohanabg.png');
		background-repeat: no-repeat;
		background-size: cover;
		width: 100%;
	}

	.content-wrapper{
		background: rgba(0, 0, 0, .5);
		color: #fff;
		font-size: 2rem;
		display: flex;
		flex-direction: row;
    }

	.content{
		margin-top: 40px
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
		color: red;
	}

</style>
<script type="text/javascript">
	$('#home').addClass('c_active');
</script>
@endsection