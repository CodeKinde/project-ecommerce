@extends('admin.admin_master')
@section('admin')
@section('title')
  user page
@endsection
<div class="container-full">
    <!-- Main content -->
    <section class="content">
      <div class="row">


        <div class="col-12">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> Liste des Utilisateur
                  <span class="badge badge-danger badge-pill">{{ count($users) }}</span>
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th witdh="20%"> image</th>
                            <th>Nom & Prénom</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach ($users as $user)
                     <tr>
                <td>
                    <img class="" src="{{ (!empty($user->profile_photo_path))? url('upload/user_image/'.$user->profile_photo_path) : url('upload/no_image.jpg') }}" style="width: 50px; height:50px" alt="">
                </td>

                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->mobile }}</td>
                        <td>
                         @if($user->UserOnligne())
                         <span class="badge badge-success badge-pill">enligne</span>
                         @else
                         <span class="badge badge-danger badge-pill">
                            {{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</span>
                         @endif
                        </td>

                        <td width="15%">
                            <a href="{{ route('brand.edit',$user->id) }}" class="btn btn-primary" title="Modifier"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('brand.delete',$user->id) }}" class="btn btn-danger" id="delete" title="Supprimer"><i class="fa fa-trash"></i></a>
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
