@extends('admin.admin_master')
@section('admin')
@section('title')
 ecommerce page sub sub-category
@endsection
<div class="container-full">
    <!-- Main content -->
    <section class="content">
      <div class="row">


        <div class="col-12">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> Liste Sub sub Categories
                  <span class="badge badge-danger badge-pill">{{ count($subsubcategory) }}</span>
              </h3>
              <a href="{{ route('sub-subcategory.add') }}" style="float: right" class="btn btn-success"><i class="fa fa-plus-circle"></i> Ajouter SubSubCategory</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Categorie</th>
                            <th>Sub Categories</th>
                            <th>Sub Sub Categories Nom Fr</th>
                            <th>Sub Sub Categories Nom En</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach ($subsubcategory as $item)
                     <tr>
                        <td>{{ $item['category']['category_name_fr'] }}</td>
                        <td>{{ $item['subcategory']['subcategory_name_fr'] }}</td>
                        <td>{{ $item->subsubcategory_name_fr }}</td>
                        <td>{{ $item->subsubcategory_name_en }}</td>
                        <td width="15%">
                        <a href="{{ route('sub-subcategory.edit',$item->id) }}" class="btn btn-primary" title="Modifier"><i class="fa fa-edit"></i></a>
                         <a href="{{ route('sub-subcategory.delete',$item->id) }}" class="btn btn-danger" id="delete" title="Supprimer"><i class="fa fa-trash"></i></a>
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
