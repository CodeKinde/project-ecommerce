@extends('admin.admin_master')
@section('admin')
@section('title')
 Ecommerce produit ajout
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container-full">
<section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
      <h4 class="box-title">Produit Ajout</h4>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
<form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
            <div class="col-12">

<div class="row">

    <div class="col-md-6">
        <div class="form-group">
    <h5>Title Nom (fr) <span class="text-danger">*</span></h5>
            <div class="controls">
<input  type="text" name="title_fr"  class="form-control" value=""></div>
        @error('title_fr')
        <div class="text-danger">{{ $message }}</div>
        @enderror
     </div>
    </div><!--col md 6 -->


    <div class="col-md-6">
        <div class="form-group">
        <h5>Title Name (en) <span class="text-danger">*</span></h5>
                <div class="controls">
    <input  type="text" name="title_en"  class="form-control" value=""></div>
        @error('title_en')
        <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
    </div> <!--col md 6 -->

</div><!--end row -->

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
          <h5>Post Categories <span class="text-danger">*</span></h5>
            <div class="controls">
      <select name="blog_category_id" id="blog_category_id" class="form-control">
        <option value="" disabled selected>Select Category</option>
        @foreach ($category as $categ)
            <option value="{{ $categ->id }}">{{ $categ->blog_category_name_fr }}</option>
        @endforeach
        </select>
            </div>
        @error('blog_category_id')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>

        </div><!--col md 6 -->

    <div class="col-md-6">
        <div class="form-group">
            <div class="form-group">
        <h5>Post Image <span class="text-danger">*</span></h5>
                <div class="controls">
        <input  type="file" name="post_image"  class="form-control" value=""></div>
            @error('post_image')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>
        </div>
        </div><!--col md 6 -->
</div>

 <div class="row">

     <div class="col-md-6">
        <div class="form-group">
            <h5>Post details (fr)<span class="text-danger">*</span></h5>
            <div class="controls">
           <textarea id="editor" name="post_details_fr" rows="5" cols="80">
                    post details french</textarea></div>
            @error('post_details_fr')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        </div><!--col md -6 -->


        <div class="col-md-6">
            <div class="form-group">
                <h5>Post details (En)<span class="text-danger">*</span></h5>
                <div class="controls">
         <textarea id="editor" name="post_details_en" rows="5" cols="80">
                     post details english</textarea></div>
                @error('post_details_en')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            </div><!--col md -6 -->
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
