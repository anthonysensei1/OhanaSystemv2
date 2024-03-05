@extends('layouts.app_customer')
@section('content')
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
    <div class="sign_in_up">
        <form action="">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" placeholder="Username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt' ></i>
            </div>
            <button type="submit" class="btn">Login</button>
            <div class="register-link">
                <p>Dont have an account? <a href="#">Register</a></p>
            </div>
        </form>
    </div>
</div>


<style scoped>
*{
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
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
  color: cyan;
  text-decoration: none;
  font-weight: 600;
}
.register-link p a:hover{
  text-decoration: underline;
}

body {
    background-image:url('/images/ohanabg.png');
    background-repeat: no-repeat;
    background-size: cover;
    width: 100%;
}

.content-wrapper {
    background: rgba(0, 0, 0, .5);
    color: #fff;
    font-size: 2rem;
    display: flex;
    align-items: center;
    justify-content: space-evenly;
}

.content{
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
    color: red;
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
@endsection