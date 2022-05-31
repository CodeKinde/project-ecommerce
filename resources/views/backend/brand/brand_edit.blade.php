@extends('admin.admin_master')
@section('admin')
@section('title')
 Ecommerce -brand ajout
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container-full">
<section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
      <h4 class="box-title">Brand Ajout</h4>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
    <form action="{{ route('brand.update',$brand->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $brand->id }}">
            <input type="hidden" name="old_image" value="{{ $brand->brand_image }}">

            <div class="row">
            <div class="col-12">

       <div class="row">

        <div class="col-md-12">
        <div class="form-group">
            <h5>Brand Nom Fr <span class="text-danger">*</span></h5>
            <div class="controls">
        <input id="brand_name_fr" type="text" name="brand_name_fr"  class="form-control" value="{{ $brand->brand_name_fr }}" data-validation-required-message="This field is required"></div>
        @error('brand_name_fr')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
        <h5>Brand Nom En <span class="text-danger">*</span></h5>
        <div class="controls">
        <input id="brand_name_en" type="text" name="brand_name_en"  class="form-control" value="{{ $brand->brand_name_en }}"></div>
        @error('brand_name_en')
        <div class="text-danger">{{ $message }}</div>
        @enderror
            </div>
            </div>

        <div class="col-md-10">
        <div class="form-group">
            <h5>Brand Image <span class="text-danger">*</span></h5>
            <div class="controls">
        <input id="brand_image" type="file" name="brand_image" id="brand_image"  class="form-control" value=""   onchange="BrandImage(this)"></div>
            @error('brand_image')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        </div>

            <div class="col-md-2">
            <img src="{{ asset($brand->brand_image) }}"width="80px" height="80px" id="showImage" alt="">
        </div>

       </div><!--end row -->


        <div class="text-xs-right">
        <input type="submit" class="btn btn-rounded btn-info" value="Enrégistrer">
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
    function BrandImage(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
            $('#showImage').attr('src',e.target.result).width(80).height(80);
            }
            reader.readAsDataURL(input.files[0])
        }
    }
</script>

@endsection
