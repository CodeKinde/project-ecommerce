@extends('admin.admin_master')
@section('admin')
@section('title')
 Ecommerce site setting
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container-full">
<section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
      <h4 class="box-title">Mise jour paramètre du site</h4>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
        <form action="{{ route('site.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
            <div class="col-12">

       <input type="hidden" name="id" id="" value="{{ $site->id }}">
        <div class="col-md-6">
        <div class="form-group">
            <h5>Logo <span class="text-danger">*</span></h5>
            <div class="controls">
            <input id="logo" type="file" name="logo"  class="form-control" value=""></div>
            @error('logo')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>
        </div>

        <div class="col-md-6">
        <div class="form-group">
            <h5>Phone One <span class="text-danger">*</span></h5>
        <div class="controls">
        <input id="phone_one" type="text" name="phone_one"  class="form-control" value="{{ $site->phone_one }}"></div>
            @error('phone_one')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        </div>

    <div class="col-md-6">
        <div class="form-group">
            <h5>Phone Two <span class="text-danger">*</span></h5>
        <div class="controls">
        <input id="phone_two" type="text" name="phone_two"  class="form-control" value="{{ $site->phone_two }}"></div>
            @error('phone_two')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        </div>

    <div class="col-md-6">
        <div class="form-group">
            <h5>Email <span class="text-danger">*</span></h5>
        <div class="controls">
        <input id="email" type="text" name="email"  class="form-control" value="{{ $site->email }}"></div>
            @error('email')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        </div>


    <div class="col-md-6">
        <div class="form-group">
            <h5>Nom Entreprise <span class="text-danger">*</span></h5>
        <div class="controls">
        <input id="company_name" type="text" name="company_name"  class="form-control" value="{{ $site->company_name }}"></div>
            @error('company_name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        </div>

    <div class="col-md-6">
        <div class="form-group">
            <h5>Addresse Entreprise <span class="text-danger">*</span></h5>
        <div class="controls">
        <input id="company_address" type="text" name="company_address"  class="form-control" value="{{ $site->company_address }}"></div>
            @error('company_address')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        </div>

    <div class="col-md-6">
        <div class="form-group">
            <h5>Facebook <span class="text-danger">*</span></h5>
        <div class="controls">
        <input id="facebook" type="text" name="facebook"  class="form-control" value="{{ $site->facebook }}"></div>
            @error('facebook')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        </div>


<div class="col-md-6">
    <div class="form-group">
        <h5> Twitter<span class="text-danger">*</span></h5>
    <div class="controls">
    <input id="twitter" type="text" name="twitter"  class="form-control" value="{{ $site->twitter }}"></div>
        @error('twitter')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    </div>


     <div class="col-md-6">
        <div class="form-group">
            <h5>LinkedIn <span class="text-danger">*</span></h5>
        <div class="controls">
        <input id="linkedin" type="text" name="linkedin"  class="form-control" value="{{ $site->linkedin }}"></div>
            @error('linkedin')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        </div>

    <div class="col-md-6">
        <div class="form-group">
            <h5>Youtube <span class="text-danger">*</span></h5>
        <div class="controls">
        <input id="youtube" type="text" name="youtube"  class="form-control" value="{{ $site->youtube }}"></div>
            @error('youtube')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        </div>


       <div class="text-xs-right">
        <input type="submit" class="btn btn-rounded btn-info" value="Mise à jour">
        </div>
        </form>

           </div>
           <!-- /.col -->
         </div>
         <!-- /.row -->
       </div>
       <!-- /.box-body -->
     </div>
     <!-- /.box -->
   </section>
</div>

@endsection
