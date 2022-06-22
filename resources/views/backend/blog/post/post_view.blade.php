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
                  <span class="badge badge-danger badge-pill">{{ count($posts) }}</span>
              </h3>
              <a href="{{ route('post.add') }}" style="float: right" class="btn btn-success"><i class="fa fa-plus-circle"></i> Ajouter post</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Post image</th>
                            <th>Titre Post (fr)</th>
                            <th>Post Title (en)</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                     @foreach ($posts as $post)
                     <tr>
                <td width="8%">
    <img src="{{ asset($post->post_image) }}" style="width: 70px; height:60px;" alt=""></td>
                <td width="40%">{{ $post->title_fr }}</td>
                <td>{{ $post->title_en }}</td>
                        <td width="20%">
    <a href="{{ route('post.details',$post->id) }}" class="btn btn-info" title="Voir"><i class="fa fa-eye"></i></a>

     <a href="{{ route('post.edit',$post->id) }}" class="btn btn-primary" title="Modifier"><i class="fa fa-edit"></i></a>

    <a href="{{ route('post.delete',$post->id) }}" class="btn btn-danger" id="delete" title="Supprimer"><i class="fa fa-trash"></i></a>

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
