@extends('admin.admin_master')
@section('admin')
@section('title')
 return request
@endsection
<div class="container-full">
    <!-- Main content -->
    <section class="content">
      <div class="row">


        <div class="col-12">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> Liste des commandes de retour demandé
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
                        <td>{{ $item->payment_method }}</td>
                        <td>
                         @if($item->order_return == 1)
                         <span class="badge badge-pill badge-primary">En attente</span>
                         @endif
                      </td>

                        <td width="10%">
 <a href="{{ route('return.approve',$item->id) }}" class="btn btn-danger" title="approve">Approve</a>

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
