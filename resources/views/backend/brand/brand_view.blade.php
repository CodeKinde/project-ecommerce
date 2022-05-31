@extends('admin.admin_master')
@section('admin')
@section('title')
 ecommerce page brand
@endsection
<div class="container-full">
    <!-- Main content -->
    <section class="content">
      <div class="row">


        <div class="col-12">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> Liste Brand
                  <span class="badge badge-danger badge-pill">{{ count($brands) }}</span>
              </h3>
              <a href="{{ route('brand.add') }}" style="float: right" class="btn btn-success"><i class="fa fa-plus-circle"></i> Ajouter Brand</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th witdh="20%">Brand image</th>
                            <th>Brand Fr</th>
                            <th>Brand En</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                     @foreach ($brands as $item)
                     <tr>
                        <td><img src="{{ asset($item->brand_image) }}" style="width: 70px; height:40px" alt=""></td>
                        <td>{{ $item->brand_name_fr }}</td>
                        <td>{{ $item->brand_name_en }}</td>
                        <td width="15%">
                            <a href="{{ route('brand.edit',$item->id) }}" class="btn btn-primary" title="Modifier"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('brand.delete',$item->id) }}" class="btn btn-danger" id="delete" title="Supprimer"><i class="fa fa-trash"></i></a>
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
