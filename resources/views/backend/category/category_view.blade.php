@extends('admin.admin_master')
@section('admin')
@section('title')
 ecommerce page category
@endsection
<div class="container-full">
    <!-- Main content -->
    <section class="content">
      <div class="row">


        <div class="col-12">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> Liste Categories
                  <span class="badge badge-danger badge-pill">{{ count($category) }}</span>
              </h3>
              <a href="{{ route('category.add') }}" style="float: right" class="btn btn-success"><i class="fa fa-plus-circle"></i> Ajouter Category</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Icon categorie</th>
                            <th>Categories Nom Fr</th>
                            <th>Categories Nom En</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach ($category as $item)
                     <tr>
                        <td><span><i class="{{ $item->category_icon }}"></i></span></td>
                        <td>{{ $item->category_name_fr }}</td>
                        <td>{{ $item->category_name_en }}</td>
                        <td width="15%">
                        <a href="{{ route('category.edit',$item->id) }}" class="btn btn-primary" title="Modifier"><i class="fa fa-edit"></i></a>
                         <a href="{{ route('category.delete',$item->id) }}" class="btn btn-danger" id="delete" title="Supprimer"><i class="fa fa-trash"></i></a>
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
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

  </div>
@endsection
