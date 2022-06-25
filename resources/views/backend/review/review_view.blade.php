@extends('admin.admin_master')
@section('admin')
@section('title')
 avis en attente
@endsection
<div class="container-full">
    <!-- Main content -->
    <section class="content">
      <div class="row">


        <div class="col-12">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> Liste Avis des Clients</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Summary</th>
                            <th>Commentaire</th>
                            <th>Client</th>
                            <th>Produit</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach ($reviews as $item)
                     <tr>
                        <td>{{ $item->summary }}</td>
                        <td>{{ $item->comment }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->product->product_name_fr }}</td>
                        <td>
                         @if($item->status == 0)
                         <span class="badge badge-pill badge-primary">En attente</span>
                         @elseif($item->status == 1)
                         <span class="badge badge-pill badge-success">Publish</span>
                         @endif
                      </td>

                        <td width="10%">
 <a href="{{ route('review.publish',$item->id) }}" class="btn btn-danger" title="publier">Publier</a>

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
