@extends('admin.admin_master')
@section('admin')
@section('title')
 Ecommerce produit edit
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container-full">
<section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
      <h4 class="box-title">Produit edit</h4>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
<form action="{{ route('slider.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" id="" value="{{ $slider->id }}">
            <input type="hidden" name="old_img" id="" value="{{ $slider->slider_img }}">
            <div class="row">
            <div class="col-12">

<div class="row">

<div class="col-md-6">
    <div class="form-group">
    <h5>Slider Titre <span class="text-danger">*</span></h5>
    <div class="controls">
        <input type="text" name="title" id="title" class="form-control" value="{{ $slider->title }}">
    </div>
    </div><!--col md -4 -->
</div><!--end row -->


    <div class="col-md-6">
    <div class="form-group">
    <h5>Slider Image <span class="text-danger">*</span></h5>
    <div class="controls">
        <input type="file" name="slider_img" id="slider_img" onchange="mainThamURL(this)" class="form-control">
    </div>
    <img src="{{ asset($slider->slider_img) }}" id="mainThmb" alt="" style="width:80px; height:80px">
    @error('slider_img')
    <div class="text-danger">{{ $message }}</div>
    @enderror
    </div>

</div> <!--col md -4 -->
</div> <!--end row -->


 <div class="row">

<div class="col-md-12">
<div class="form-group">
    <h5>Slider description<span class="text-danger">*</span></h5>
    <div class="controls">
        <textarea id="descrip" name="descrip" rows="5" cols="80" class="form-control">
            {!! $slider->descrip !!}</textarea></div>
</div>
</div><!--col md -4 -->
</div><!--end row -->



<div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-info" value="mise à jour">
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
function mainThamURL(input){
 if(input.files && input.files[0]){
     var reader = new FileReader();
     reader.onload = function(e){
      $('#mainThmb').attr('src',e.target.result).width(80).height(80);
     }
     reader.readAsDataURL(input.files[0]);
 }
}
</script>


@endsection
