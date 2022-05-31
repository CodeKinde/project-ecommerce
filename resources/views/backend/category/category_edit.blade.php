@extends('admin.admin_master')
@section('admin')
@section('title')
 Ecommerce -category edit
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container-full">
<section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
      <h4 class="box-title">Categories Edit</h4>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
<form action="{{ route('category.update',$category->id) }}" method="POST">
            @csrf
            <input type="hidden" name="id" id="" value="{{ $category->id }}">
            <div class="row">
            <div class="col-12">

       <div class="row">

            <div class="col-md-12">
            <div class="form-group">
                <h5>Categorie Nom Français <span class="text-danger">*</span></h5>
                <div class="controls">
            <input id="category_name_fr" type="text" name="category_name_fr"  class="form-control" value="{{ $category->category_name_fr }}"></div>
            @error('category_name_fr')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>

            </div>

            <div class="col-md-12">
            <div class="form-group">
                <h5>Brand Nom Anglais <span class="text-danger">*</span></h5>
                <div class="controls">
            <input id="category_name_en" type="text" name="category_name_en"  class="form-control" value="{{ $category->category_name_en }}"></div>
            @error('category_name_en')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>

            </div>

        <div class="col-md-12">
        <div class="form-group">
            <h5>Categories Icon <span class="text-danger">*</span></h5>
            <div class="controls">
        <input id="category_icon" type="text" name="category_icon" id="category_icon"  class="form-control" value="{{ $category->category_icon }}"></div>
        @error('category_icon')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>
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

@endsection
