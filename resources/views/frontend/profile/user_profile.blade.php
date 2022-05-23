@extends('frontend.main_master')
@section('content')
@section('title')
shop on line edit profile
@endsection
<div class="body-content">
<div class="container">
<div class="row">
    <div class="col-md-2"><br><br>
    <img class="card-img-top" style="border-radius:50%" src="{{ (!empty($user->profile_photo_path))? url('upload/user_image/'.$user->profile_photo_path) : url('upload/no_image.jpg') }}" alt="User Avatar"
    height="100%" width="100%"><br><br><br>
    <ul class="list-group list-group-flush">
        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
        <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Modifier profile</a>
        <a href="" class="btn btn-primary btn-sm btn-block">Changer mot de passe</a>
        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Se Deconnectez</a>

    </ul>
    </div><!--end col-md-2 -->

    <div class="col-md-2">

    </div><!--end col-md-2 -->


    <div class="col-md-6">
        <div class="card">
            <h3 class="text-center"><span class="text-danger">Modifier votre profile</h3>
        </div>
        <div class="card-body">
        <form action="{{ route('user.profile.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
            <label class="info-title" for="exampleInputPassword1">Nom & prénom <span>*</span></label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
            </div>

        <div class="form-group">
            <label class="info-title" for="exampleInputPassword1">Email <span>*</span></label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
            </div>

        <div class="form-group">
            <label class="info-title" for="exampleInputPassword1">Téléphone <span>*</span></label>
            <input type="text" name="mobile" id="mobile" class="form-control" value="{{ $user->mobile }}">
            </div>

        <div class="form-group">
            <label class="info-title" for="exampleInputPassword1">Adresse <span>*</span></label>
            <input type="text" name="address" id="address" class="form-control" value="{{ $user->address }}">
            </div>

        <div class="form-group">
            <label class="info-title" for="exampleInputPassword1">Iamge profile</span></label>
            <input type="file" name="profile_photo_path" id="profile_photo_path" class="form-control">

            </div>
           <div class="form-group">
            <button type="submit" class="btn btn-danger">Mise à jour</button>
           </div>
        </form>
        </div>
    </div><!--end col-md-2 -->
</div><!--end row -->
</div>
</div>
@endsection
