@extends('layouts.applogin')

@section('content')
<style>
  body{
    font-family:Segoe UI;
    /* background-image:'{{url("/public/images/bg/bg.jpg")}}';
    background-size: 100% 100%;
    background-repeat: no-repeat; */
  }
  .main-content{
    margin-top:100%;
    width: 50%;
    border-radius: 20px;
    box-shadow: 0 5px 5px rgba(0,0,0,.4);
    margin: 5em auto;
    display: flex;
  }
  .company__info{
    background-color: #36802d;
    border-top-left-radius: 20px;
    border-bottom-left-radius: 20px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    color: #fff;
  }
  .fa-building{
    font-size:3em;
  }
  @media screen and (max-width: 640px) {
    .main-content{width: 90%;}
    .company__info{
      display: none;
    }
    .login_form{
      border-top-left-radius:20px;
      border-bottom-left-radius:20px;
    }
  }
  @media screen and (min-width: 642px) and (max-width:800px){
    .main-content{width: 70%;}
  }
  .row > h2{
    color:#36802d;
  }
  .login_form{
    background-color: #fff;
    border-top-right-radius:20px;
    border-bottom-right-radius:20px;
    border-top:1px solid #ccc;
    border-right:1px solid #ccc;
  }
  form{
    padding: 0 2em;
  }
  .form__input{
    width: 100%;
    border:0px solid transparent;
    border-radius: 0;
    border-bottom: 1px solid #aaa;
    padding: 1em .5em .5em;
    padding-left: 2em;
    outline:none;
    margin:1.5em auto;
    transition: all .5s ease;
  }
  .form__input:focus{
    border-bottom-color: #36802d;
    box-shadow: 0 0 5px rgba(0,80,80,.4); 
    border-radius: 4px;
  }
  .btn{
    transition: all .5s ease;
    width: 70%;
    border-radius: 30px;
    color:#36802d;
    font-weight: 600;
    background-color: #fff;
    border: 1px solid #36802d;
    margin-top: 1.5em;
    margin-bottom: 1em;
  }
  .btn:hover, .btn:focus{
    background-color: #36802d;
    color:#fff;
  }
  .danger{
    color:red; 
  }
</style>
<?php $busniess_settings = DB::table('busniess_settings')->first(); ?>
<div class="container-fluid">
		<div class="row main-content bg-success text-center">
			
      <div class="col-md-4 text-center company__info">

				<span class="company__logo">
          @if($busniess_settings->logo)
            <img src="{{url('public/build/images/logo', $busniess_settings->logo)}}" width="150px" height="150px" />
            @else
            <h2><span class="fa fa-building"></span></h2>
          @endif  
          
        </span>

				<h3 class="company_title">{{$busniess_settings->company_name}} </h3>
			</div>

			<div class="col-md-8 col-xs-12 col-sm-12 login_form ">
				<div class="container-fluid">
					<div class="row">
						<h2>Financial & Accounts ERP V 1.0 <br> <small>Log In</small> </h2>
					</div>
					<div class="row">
						<form method="POST" action="{{route('login.post')}}" autocomplete="off">
            @csrf
							<div class="row">
								<input type="text" name="username" id="username" class="form__input" placeholder="Username">
                @error('username')
                  <span class="invalid-feedback danger" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
							</div>
							<div class="row">
								<!-- <span class="fa fa-lock"></span> -->
								<input type="password" name="password" id="password" class="form__input" placeholder="Password">
                @error('password')
                  <span class="invalid-feedback danger" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
							</div>
              @if(\Session::has('error'))
                <div class="alert alert-danger">
                    <ul>
                      <li> {{\Session::get('error')}} </li>
                  </ul>
                </div>
              @endif
							<div class="row">
								<input type="submit" value="Submit" class="btn">
							</div>
						</form>
					</div>
					<div class="row">
						<p>Financial & Accounts ERP V 1.0 by <a href="https://midwaretech.com">Midware Technologies </a></p>
					</div>
				</div>
			</div>
		</div>
	</div>

      
@endsection
