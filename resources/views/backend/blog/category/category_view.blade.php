@extends('admin.admin_master')
@section('admin')
@section('title')
 blog post category
@endsection
<div class="container-full">
    <!-- Main content -->
    <section class="content">
      <div class="row">

<div class="col-8">

    <div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"> Liste Blog Categories
            <span class="badge badge-danger badge-pill">{{ count($categories) }}</span>
        </h3>

    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Categories Nom</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                <td>{{ $category->blog_category_name_fr }}</td>
                <td width="15%">
     <a href="{{ route('category.edit',$category->id) }}" class="btn btn-primary" title="Modifier"><i class="fa fa-edit"></i></a>

     <a href="{{ route('category.delete',$category->id) }}" class="btn btn-danger" id="delete" title="Supprimer"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
    <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<!-- /.col-md-8 -->



        <div class="col-4">

            <div class="box">
               <div class="box-header with-border">
<h3 class="box-title"> Ajouter Categories</h3>

               </div>
               <!-- /.box-header -->
               <div class="box-body">
    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <div class="row">
        <div class="col-12">

    <div class="row">

        <div class="col-md-12">

        <div class="form-group">
            <div class="form-group">
     <h5>Categories Nom (fr) <span class="text-danger">*</span></h5>
                <div class="controls">
 <input  type="text" name="blog_category_name_fr"  class="form-control" value=""></div>
            @error('blog_category_name_fr')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>
        </div>


        <div class="form-group">
            <div class="form-group">
     <h5>Category Name (en) <span class="text-danger">*</span></h5>
                <div class="controls">
 <input  type="text" name="blog_category_name_en"  class="form-control" value=""></div>
            @error('blog_category_name_en')
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
               <!-- /.box-body -->
             </div>
             <!-- /.box -->
           </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

  </div>
@endsection
