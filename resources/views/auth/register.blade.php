@extends('frontend.main_master')
@section('content')
@section('title')
Connexion
@endsection

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Connexion</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
				<!-- Sign-in -->
<div class="col-md-6 col-sm-6 sign-in">
	<h4 class="">Se connectez</h4>
	<p class="">Salut, Bienvenue sur votre compte.</p>
	<div class="social-sign-in outer-top-xs">
		<a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i>Connectez avec Facebook</a>
		<a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i>Connectez avec Twitter</a>
	</div>
    <form method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}">
        @csrf


		<div class="form-group">
	 <label class="info-title" for="exampleInputEmail1">Address Email <span>*</span></label>
<input type="email" name="email" id="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1">
@error('email')
<span class="invaid-feeback" role="alert">
 <strong>{{ $message }}</strong>
</span>
@enderror
		</div>

   	<div class="form-group">
<label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
<input type="password" name="password" id="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" >
@error('password')
<span class="invaid-feeback" role="alert">
 <strong>{{ $message }}</strong>
</span>
@enderror
		</div>


		<div class="radio outer-xs">
		<label>
<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" id="remember_me" name="remember">Souviens-toi de moi!
		</label>
	<a href="{{ route('password.request') }}" class="forgot-password pull-right">votre mot de passe oublié?</a>
		</div>


	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Se connectez</button>
	</form>
</div>
<!-- Sign-in -->

<!-- create a new account -->
<div class="col-md-6 col-sm-6 create-new-account">
	<h4 class="checkout-subtitle">Creer un nouveau compte</h4>
	<p class="text title-tag-line">Creer votre nouveau compte.</p>
	<form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
	  <label class="info-title" for="exampleInputEmail1">Nom & prénom <span>*</span></label>
	 <input type="text" name="name" id="name"  class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
     @error('name')
     <span class="invalid-feeback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
     @enderror
	  </div>


		<div class="form-group">
	    	<label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
        <input type="email" id="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail2" >
        @error('email')
        <span class="invalid-feeback" role="alert">
           <strong>{{ $message }}</strong>
       </span>
        @enderror
	  	</div>

        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Numero Téléphone <span>*</span></label>
		<input type="text" id="mobile" name="mobile" class="form-control unicase-form-control text-input" id="exampleInputEmail1">
        @error('mobile')
        <span class="invalid-feeback" role="alert">
           <strong>{{ $message }}</strong>
       </span>
        @enderror
		</div>

        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Addresse <span>*</span></label>
		<input type="text" id="address" name="address" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
        @error('address')
        <span class="invalid-feeback" role="alert">
           <strong>{{ $message }}</strong>
       </span>
        @enderror
		</div>


        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
	 <input type="password" id="password" name="password" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
     @error('password')
     <span class="invalid-feeback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
     @enderror
		</div>

         <div class="form-group">
  <label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
      <input type="password" id="password_confirmation" name="password_confirmation" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
      @error('password_confirmation')
      <span class="invalid-feeback" role="alert">
         <strong>{{ $message }}</strong>
     </span>
      @enderror
		</div>

	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">S'inscrire</button>
	</form>


</div>
<!-- create a new account -->			</div><!-- /.row -->
		</div><!-- /.sigin-in-->

@include('frontend.body.brand')
</div><!-- /.container -->
</div><!-- /.body-content -->
@endsection
