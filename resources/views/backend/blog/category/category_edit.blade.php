@extends('admin.admin_master')
@section('admin')
@section('title')
blog post category edit
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
            <form action="{{ route('category.update') }}" method="POST">
                @csrf
<input type="hidden" name="id" id="" value="{{ $category->id }}">
                <div class="row">
                <div class="col-12">

            <div class="row">

                <div class="col-md-12">
                    <div class="form-group">
                        <div class="form-group">
                 <h5>Categories Nom (fr) <span class="text-danger">*</span></h5>
                            <div class="controls">
          <input  type="text" name="blog_category_name_fr"  class="form-control" value="{{ $category->blog_category_name_fr }}"></div>
                        @error('blog_category_name_fr')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="form-group">
                 <h5>Category Name (en) <span class="text-danger">*</span></h5>
                            <div class="controls">
             <input  type="text" name="blog_category_name_en"  class="form-control" value="{{ $category->blog_category_name_en }}"></div>
                        @error('blog_category_name_en')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>
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
