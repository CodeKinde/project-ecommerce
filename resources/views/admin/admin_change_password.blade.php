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
        <form action="{{ route('change.password.update') }}" method="POST">
            @csrf
            <div class="row">
            <div class="col-12">

       <div class="row">

           <div class="col-md-6">
            <div class="form-group">
                <h5>Mot de passe Actuel <span class="text-danger">*</span></h5>
                <div class="controls">
    <input id="current_password" type="password" name="oldpassword"  class="form-control" value="" data-validation-required-message="This field is required"></div>
            </div>


                <div class="form-group">
                <h5>Nouveau mot de passe <span class="text-danger">*</span></h5>
                <div class="controls">
   <input id="password" type="password" name="password" class="form-control" value="" data-validation-required-message="This field is required"></div>
                </div>

            <div class="form-group">
                <h5>Confirmé  nouveau mot de passe <span class="text-danger">*</span></h5>
                <div class="controls">
  <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" value="" data-validation-required-message="This field is required"></div>
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

@endsection
