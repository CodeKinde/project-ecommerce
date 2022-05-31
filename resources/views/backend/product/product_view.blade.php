@extends('admin.admin_master')
@section('admin')
@section('title')
 ecommerce page product
@endsection
<div class="container-full">
    <!-- Main content -->
    <section class="content">
      <div class="row">


        <div class="col-12">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> Liste des produits
                  <span class="badge badge-danger badge-pill">{{ count($products) }}</span>
              </h3>
              <a href="{{ route('product.add') }}" style="float: right" class="btn btn-success"><i class="fa fa-plus-circle"></i> Ajouter produit</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>image</th>
                            <th>Nom Produit Fr</th>
                            <th>Quantité</th>
                            <th>Prix Produit</th>
                            <th>Rémise</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                     @foreach ($products as $item)
                     <tr>
                        <td width="8%"><img src="{{ asset($item->product_thambnail) }}" style="width: 70px; height:60px;" alt=""></td>
                        <td width="40%">{{ $item->product_name_fr }}</td>
                        <td>{{ $item->product_qty }} Pic</td>
                        <td>{{ $item->selling_price }}$</td>
                        <td>
                          @if($item->discount_price == NULL)
                            <span class="badge badge-danger badge-pill">Pas de rémise</span>
                           @else
                           @php
                               $amount = $item->selling_price - $item->discount_price;
                               $discount = ($amount/$item->selling_price)* 100;
                           @endphp
                            <span class="badge badge-danger badge-pill">{{round($discount)}}%</span>
                          @endif
                        </td>
                        <td>
                            @if ($item->status == 1)
                             <span class="badge badge-success badge-pill">Active</span>
                             @else
                             <span class="badge badge-danger badge-pill">InActive</span>
                            @endif
                        </td>
                        <td width="20%">
    <a href="{{ route('product.details',$item->id) }}" class="btn btn-info" title="Voir"><i class="fa fa-eye"></i></a>

     <a href="{{ route('product.edit',$item->id) }}" class="btn btn-primary" title="Modifier"><i class="fa fa-edit"></i></a>

    <a href="{{ route('product.delete',$item->id) }}" class="btn btn-danger" id="delete" title="Supprimer"><i class="fa fa-trash"></i></a>

    @if($item->status == 1)
    <a href="{{ route('product.inactive',$item->id) }}" class="btn btn-danger" title="InActive"><i class="fa fa-arrow-down"></i></a>
    @else
    <a href="{{ route('product.active',$item->id) }}" class="btn btn-success" title="Active"><i class="fa fa-arrow-up"></i></a>
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
