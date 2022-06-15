@extends('frontend.main_master')
@section('content')
@section('title')
shop on line edit profile
@endsection
@php
$user = DB::table('users',Auth::id())->first();
@endphp
<div class="body-content">
<div class="container">
<div class="row">
    @include('frontend.common.user_sidebar')


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
