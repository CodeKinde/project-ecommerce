@extends('admin.admin_master')
@section('admin')
@section('title')
 Ecommerce -sub-category ajout
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container-full">
<section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
      <h4 class="box-title">Sub Categories Ajout</h4>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
<form action="{{ route('subcategory.update',$subcategory->id) }}" method="POST">
            @csrf
            <input type="hidden" name="id" id="" value="{{ $subcategory->id }}">
            <div class="row">
            <div class="col-12">

       <div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <h5>Categories <span class="text-danger">*</span></h5>
            <div class="controls">
                <select name="category_id" id="category_id" class="form-control">
                <option value="" disabled selected>Select Category</option>
                @foreach ($category as $categ)
                    <option value="{{ $categ->id }}"{{ $categ->id == $subcategory->category_id ? 'selected' : ''  }}>{{ $categ->category_name_fr }}</option>
                @endforeach
                </select>
            </div>
        @error('category_id')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>
        </div>

            <div class="col-md-12">
            <div class="form-group">
                <h5>sub Categorie Nom Français <span class="text-danger">*</span></h5>
                <div class="controls">
            <input id="subcategory_name_fr" type="text" name="subcategory_name_fr"  class="form-control" value="{{ $subcategory->subcategory_name_fr }}"></div>
            @error('subcategory_name_fr')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>

            </div>

            <div class="col-md-12">
            <div class="form-group">
                <h5>Sub Category Nom Anglais <span class="text-danger">*</span></h5>
                <div class="controls">
            <input id="subcategory_name_en" type="text" name="subcategory_name_en"  class="form-control" value="{{ $subcategory->subcategory_name_en }}"></div>
            @error('subcategory_name_en')
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
