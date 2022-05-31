@extends('admin.admin_master')
@section('admin')
@section('title')
 ecommerce page slider
@endsection
<div class="container-full">
    <!-- Main content -->
    <section class="content">
      <div class="row">


        <div class="col-12">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> Liste des Sliders
                  <span class="badge badge-danger badge-pill">{{ count($sliders) }}</span>
              </h3>
              <a href="{{ route('slider.add') }}" style="float: right" class="btn btn-success"><i class="fa fa-plus-circle"></i> Ajouter Slider</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>image</th>
                            <th>Titre slider</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                     @foreach ($sliders as $item)
                     <tr>
                        <td width="10%"><img src="{{ asset($item->slider_img) }}" style="width: 100px; height:60px" alt=""></td>
                        <td>{{ $item->title }}</td>
                        <td>{!! $item->descrip !!}</td>
                        <td>
                            @if ($item->status == 1)
                             <span class="badge badge-success badge-pill">Active</span>
                             @else
                             <span class="badge badge-danger badge-pill">InActive</span>
                            @endif
                        </td>
                        <td width="15%">
     <a href="{{ route('slider.edit',$item->id) }}" class="btn btn-primary" title="Modifier"><i class="fa fa-edit"></i></a>

    <a href="{{ route('slider.delete',$item->id) }}" class="btn btn-danger" id="delete" title="Supprimer"><i class="fa fa-trash"></i></a>

    @if($item->status == 1)
    <a href="{{ route('slider.inactive',$item->id) }}" class="btn btn-danger" title="InActive"><i class="fa fa-arrow-down"></i></a>
    @else
    <a href="{{ route('slider.active',$item->id) }}" class="btn btn-success" title="Active"><i class="fa fa-arrow-up"></i></a>
    @endif
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
