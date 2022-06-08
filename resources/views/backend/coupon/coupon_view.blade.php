@extends('admin.admin_master')
@section('admin')
@section('title')
 ecommerce coupon page
@endsection
<div class="container-full">
    <!-- Main content -->
    <section class="content">
      <div class="row">


        <div class="col-12">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> Liste Coupons
                  <span class="badge badge-danger badge-pill">{{ count($coupons) }}</span>
              </h3>
              <a href="{{ route('coupon.add') }}" style="float: right" class="btn btn-success"><i class="fa fa-plus-circle"></i> Ajouter Coupon</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nom Coupon</th>
                            <th>Remise Coupon</th>
                            <th>Coupon Validation</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach ($coupons as $item)
                     <tr>
                        <td>{{ $item->coupon_name }}</td>
                        <td>{{ $item->coupon_discount }}%</td>
                        <td>{{ Carbon\Carbon::parse($item->coupon_validity)->format('D, d F Y') }}</td>
                        <td>
                        @if($item->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d') )
                        <span class="badge badge-pill badge-success">Valide</span>
                         @else
                         <span class="badge badge-pill badge-danger">Invalide </span>
                        @endif
                    </td>
                        <td width="15%">
                        <a href="{{ route('coupon.edit',$item->id) }}" class="btn btn-primary" title="Modifier"><i class="fa fa-edit"></i></a>
                         <a href="{{ route('coupon.delete',$item->id) }}" class="btn btn-danger" id="delete" title="Supprimer"><i class="fa fa-trash"></i></a>
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
