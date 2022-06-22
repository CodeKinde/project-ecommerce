@extends('admin.admin_master')
@section('admin')
@section('title')
 blog post page
@endsection
<div class="container-full">
    <!-- Main content -->
    <section class="content">
      <div class="row">


        <div class="col-12">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> Liste des Posts
              </h3>
              <a href="{{ route('post.add') }}" style="float: right" class="btn btn-success"><i class="fa fa-plus-circle"></i> Ajouter post</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table  class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Post image</th>
                            <th>Titre Post (fr)</th>
                            <th>Post Title (en)</th>
                            <th>Post Details(fr)</th>
                            <th>Post Details(en)</th>


                        </tr>
                    </thead>
                    <tbody>
                     <tr>
                <td width="8%">
    <img src="{{ asset($details->post_image) }}" style="width: 100px; height:100px;" alt=""></td>
                <td width="10%">{{ $details->title_fr }}</td>
                <td width="10%">{{ $details->title_en }}</td>
                 <td width="20%">
                    {{ $details->post_details_fr }}
                 </td>

                 <td width="20%">
                    {{ $details->post_details_en }}
                 </td>
                    </tr>
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
