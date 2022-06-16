@extends('admin.admin_master')
@section('admin')
@section('title')
 order livré
@endsection
<div class="container-full">
    <!-- Main content -->
    <section class="content">
      <div class="row">


        <div class="col-12">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> Liste des commandes Livré
                  <span class="badge badge-danger badge-pill">{{ count($orders) }}</span>
              </h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Invoice N°</th>
                            <th>Montant</th>
                            <th>Paiement</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach ($orders as $item)
                     <tr>
                        <td>{{ $item->order_date }}</td>
                        <td>{{ $item->invoice_no }}</td>
                        <td>{{ $item->amount }}</td>
                        <td>{{ $item->payment_type }}%</td>
                        <td>
                        <span class="badge badge-pill badge-success">{{ $item->status }}</span>
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
