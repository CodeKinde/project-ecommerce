@extends('admin.admin_master')
@section('admin')
@section('title')
 Ecommerce -division edit
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container-full">
<section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
      <h4 class="box-title">Division Edit</h4>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
<form action="{{ route('division.update') }}" method="POST">
            @csrf

            <input type="hidden" name="id" id="" value="{{ $division->id }}">
            <div class="row">
            <div class="col-12">

       <div class="row">

            <div class="col-md-12">
            <div class="form-group">
                <h5>Division Nom <span class="text-danger">*</span></h5>
                <div class="controls">
            <input id="division_name" type="text" name="division_name"  class="form-control" value="{{ $division->division_name }}"></div>
            @error('division_name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>

            </div>


       </div><!--end row -->


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
