@extends('admin.admin_master')
@section('admin')
@section('title')
 Ecommerce -admin profile edit
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container-full">
<section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
      <h4 class="box-title">edit profile administrateur</h4>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
        <form action="{{ route('admin.profile.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
            <div class="col-12">

       <div class="row">

           <div class="col-md-6">
            <div class="form-group">
                <h5>Nom & prenom <span class="text-danger">*</span></h5>
                <div class="controls">
         <input type="text" name="name" class="form-control" value="{{ $editData->name }}" data-validation-required-message="This field is required"></div>
            </div>
           </div>

            <div class="col-md-6">
                <div class="form-group">
                <h5>Email <span class="text-danger">*</span></h5>
                <div class="controls">
        <input type="email" name="email" class="form-control" value="{{ $editData->email }}" data-validation-required-message="This field is required"></div>
                </div>
            </div>
       </div>

       <div class="row">
           <div class="col-md-6">
            <div class="form-group">
                <h5>Profile Image <span class="text-danger">*</span></h5>
            <div class="controls">
         <input type="file" name="profile_photo_path" id="image" class="form-control" value="" data-validation-required-message="This field is required"></div>
            </div>
           </div>

           <div class="col-md-6">
            <div class="form-group">
            <div class="controls">
        <img id="showImage" src="{{ (!empty($editData->profile_photo_path)) ? url('upload/admin_image/'.$editData->profile_photo_path) : url('upload/no_image.jpg') }}" alt="" style="border: solid 1px #000; width:80px; height:80px;">
            </div>
            </div>
           </div>
       </div>
        <div class="text-xs-right">
        <button type="submit" class="btn btn-rounded btn-info">Mise à jour</button>
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
<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
         var reader = new FileReader();
         reader.onload = function(e){
            $('#showImage').attr('src',e.target.result);
         }
         reader.readAsDataURL(e.target.files['0']);
        })
    })
</script>
@endsection
