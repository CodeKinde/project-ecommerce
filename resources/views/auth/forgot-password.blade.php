@extends('frontend.main_master')
@section('content')
@section('title')
forget password
@endsection

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Mot de passe Oublié</li>
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
	<h4 class="">Mot de passe Oublié</h4>
	<p class="">vous êtes oublié votre mot de passe! pas de problème.</p>

    <form method="POST" action="{{ route('password.email') }}">
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


	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Lien de réinitialisation du mot de passe par e-mail</button>
	</form>
</div>
<!-- Sign-in -->
</div><!-- /.row -->
		</div><!-- /.sigin-in-->

@include('frontend.body.brand')
</div><!-- /.container -->
</div><!-- /.body-content -->
@endsection
