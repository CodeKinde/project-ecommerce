@extends('admin.admin_master')
@section('admin')
@section('title')
 order pending details
@endsection
<div class="container-full">
    <!-- Main content -->
    <section class="content">
      <div class="row">
<div class="col-md-6 col-12">
    <div class="box box-bordered border-primary">
    <div class="box-header with-border">
        <h4 class="box-title"><strong>Achat</strong> Details</h4>
    </div>
    <div class="box-body">
        <table class="table">
            <tr>
                <th>Nom :</th>
                <th>{{ $order->name }}</th>
            </tr>

            <tr>
                <th>Email :</th>
                <th>{{ $order->email }}</th>
            </tr>

            <tr>
                <th>Téléphone  :</th>
                <th>{{ $order->phone }}</th>
            </tr>

            <tr>
                <th>Division :</th>
                <th>{{ $order->division->division_name }}</th>
            </tr>


            <tr>
                <th>District :</th>
                <th>{{ $order->district->district_name }}</th>
            </tr>

            <tr>
                <th>State:</th>
                <th>{{ $order->state->state_name }}</th>
            </tr>

            <tr>
                <th>Post Code:</th>
                <th>{{ $order->post_code }}</th>
            </tr>


            <tr>
                <th>Date commande :</th>
                <th>{{ $order->order_date }}</th>
            </tr>

        </table>

    </div>
    </div>
</div>


<div class="col-md-6 col-12">
    <div class="box box-bordered border-primary">
      <div class="box-header with-border">
        <h4 class="box-title"><strong>Commande Details<span class="text-danger"> Facture N°: {{ $order->invoice_no }}</span></strong></h4>
      </div>
      <div class="box-body">
        <table class="table">
            <tr>
                <th>Nom :</th>
                <th>{{ $order->user->name }}</th>
            </tr>


            <tr>
                <th>Téléphone  :</th>
                <th>{{ $order->phone }}</th>
            </tr>

            <tr>
                <th>Payment Type :</th>
                <th>{{ $order->payment_method }}</th>
            </tr>


            <tr>
                <th>Tranx ID :</th>
                <th>{{ $order->transaction_id }}</th>
            </tr>

            <tr>
                <th>Facture N°:</th>
                <th>{{ $order->invoice_no }}</th>
            </tr>

            <tr>
                <th>Total Commande:</th>
                <th>${{ $order->amount }}</th>
            </tr>


            <tr>
                <th>Status: </th>
                <th><span class="badge badge-pill badge-warning" style="background:#418DB9">{{ $order->status }}</span></th>
            </tr>

            <tr>
                <th></th>
                <th>
                @if($order->status == "Pending")
                <a href="{{ route('pending-confirm',$order->id) }}" class="btn btn-block btn-success" id="confirm">Confirmé la commande</a>
                @elseif ($order->status == 'Confirmé')
                <a href="{{ route('confirm-processing',$order->id) }}" class="btn btn-block btn-success" id="processing">Traité la commande</a>

                @elseif ($order->status == 'Traitement')
                <a href="{{ route('processing-picked',$order->id) }}" class="btn btn-block btn-success" id="picked">Choisie la commande</a>

                @elseif ($order->status == 'Choisie')
                <a href="{{ route('picked-shipped',$order->id) }}" class="btn btn-block btn-success" id="shipped">Envoyé la commande</a>

                @elseif ($order->status == 'Envoyé')
                <a href="{{ route('shipped-delivered',$order->id) }}" class="btn btn-block btn-success" id="delivered">Livré la commande</a>
                @endif
                </th>
            </tr>

        </table>
      </div>
    </div>
  </div>


      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12 col-12">
            <div class="box box-bordered border-primary">
              <div class="box-header with-border">
                <h4 class="box-title"><strong>Bordered</strong> box</h4>
              </div>
              <div class="box-body">
                <div class="able-responsive">
                    <table class="table">
                     <tbody>
                        <tr style="background:#418DB9; color:white">
                        <td width="10%">
                            <label for="">Image</label>
                        </td>

                        <td width="20%">
                            <label for="">Nom Produit</label>
                        </td>

                        <td width="10%">
                            <label for="">Code Produit</label>
                        </td>

                        <td width="10%">
                            <label for="">Couleur</label>
                        </td>


                        <td width="10%">
                            <label for="">Taille</label>
                        </td>


                        <td width="10%">
                            <label for="">Quantité</label>
                        </td>


                        <td width="10%">
                            <label for="">Prix</label>
                        </td>
                        </tr>

                    @foreach ($orderItem as $item)

                    <tr>
                        <td width="10%">
                            <label for=""><img src="{{ asset($item->product->product_thambnail) }}" alt="" width="80px" height="80px"></label>
                        </td>

                        <td width="20%">
                         <label for="">{{ $item->product->product_name_fr }}</label>
                        </td>

                        <td width="10%">
                            <label for="">{{ $item->product->product_code }}</label>
                        </td>

                        <td width="10%">
                            <label for="">{{ $item->color }}</label>
                        </td>


                        <td width="10%">
                            <label for="">{{ $item->size }}</label>
                        </td>

                        <td width="10%">
                            <label for="">{{ $item->qty }}</label>
                        </td>

                        <td width="10%">
                            <label for="">${{ $item->price }} (${{ $item->price *$item->qty  }})</label>
                        </td>
                        </tr>
                        @endforeach

                     </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>
      </div>


    </section>
    <!-- /.content -->

  </div>
@endsection
