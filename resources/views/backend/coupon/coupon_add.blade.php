@extends('admin.admin_master')
@section('admin')
@section('title')
 Ecommerce coupon ajout
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container-full">
<section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
      <h4 class="box-title">Coupon Ajout</h4>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
<form action="{{ route('coupon.store') }}" method="POST">
            @csrf
            <div class="row">
            <div class="col-12">

       <div class="row">

            <div class="col-md-12">
            <div class="form-group">
                <h5>Nom Coupon<span class="text-danger">*</span></h5>
                <div class="controls">
            <input id="coupon_name" type="text" name="coupon_name"  class="form-control" value=""></div>
            @error('coupon_name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>

            </div>

            <div class="col-md-12">
            <div class="form-group">
                <h5>Coupon Remise(%) <span class="text-danger">*</span></h5>
                <div class="controls">
            <input id="coupon_discount" type="text" name="coupon_discount"  class="form-control" value=""></div>
            @error('coupon_discount')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>

            </div>

        <div class="col-md-12">
        <div class="form-group">
            <h5>Coupon Validation <span class="text-danger">*</span></h5>
            <div class="controls">
        <input  type="date" name="coupon_validity" id="coupon_validity"  class="form-control" value="" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}"></div>
        @error('coupon_validity')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>
        </div>

       </div><!--end row -->


        <div class="text-xs-right">
        <input type="submit" class="btn btn-rounded btn-info" value="Ajouter">
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
