@extends('frontend.main_master')
@section('title')
commande details
@endsection
@section('content')
<div class="body-content">
<div class="container">
<div class="row">
   @include('frontend.common.user_sidebar')
                <!--// end col md-2 -->
        <!--// end col md-2 -->
      <div class="col-md-5">
        <div class="card">
          <div class="card-header"> <h3><u>Achat Details</u></h3> </div>
          <div class="card-body" style="background: #E9EBEC">
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
       </div><!--// end col md-5 -->

       <div class="col-md-5">
        <div class="card">
          <div class="card-header"> <h4><u>Commande Details</u><span class="text-danger"> Facture N°: {{ $order->invoice_no }}</span></h4> </div>
          <div class="card-body" style="background: #E9EBEC">
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

            </table>

        </div>

        </div>
       </div><!--// end col md-5 -->
       <div class="row">
        <div class="col-md-12">
            <div class="able-responsive">
                <table class="table">
                 <tbody>
                    <tr style="background:#418DB9; color:white">
                    <td class="col-md-1">
                        <label for="">Image</label>
                    </td>

                    <td class="col-md-4">
                        <label for="">Nom Produit</label>
                    </td>

                    <td class="col-md-2">
                        <label for="">Code Produit</label>
                    </td>

                    <td class="col-md-1">
                        <label for="">Couleur</label>
                    </td>


                    <td class="col-md-1">
                        <label for="">Taille</label>
                    </td>


                    <td class="col-md-1">
                        <label for="">Quantité</label>
                    </td>


                    <td class="col-md-3">
                        <label for="">Prix</label>
                    </td>
                    </tr>

                @foreach ($orderItem as $item)

                <tr>
                    <td class="col-md-1">
                        <label for=""><img src="{{ asset($item->product->product_thambnail) }}" alt="" width="80px" height="80px"></label>
                    </td>

                    <td class="col-md-4">
                        <label for="">{{ $item->product->product_name_fr }}</label>
                    </td>

                    <td class="col-md-2">
                        <label for="">{{ $item->product->product_code }}</label>
                    </td>

                    <td class="col-md-1">
                        <label for="">{{ $item->color }}</label>
                    </td>


                    <td class="col-md-1">
                        <label for="">{{ $item->size }}</label>
                    </td>

                    <td class="col-md-1">
                        <label for="">{{ $item->qty }}</label>
                    </td>

                    <td class="col-md-3">
                        <label for="">${{ $item->price }} (${{ $item->price *$item->qty  }})</label>
                    </td>
                    </tr>
                    @endforeach

                 </tbody>
                </table>
            </div>
           </div> <!--// end col md-8 -->
       </div>
        @if($order->status !== "Livré")
        @else
        @php
         $order = App\Models\Order::where('id',$order->id)->where('return_reason','=',null)->first();
        @endphp
        @if($order)

        <form action="{{ route('order-return',$order->id) }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="label">Raison de return de la commande:</label>
           <textarea name="return_reason" id="return_reason" cols="30" rows="5" class="form-control" required>
              Return Reason</textarea>
            </div>
            <button type="submit" class="btn btn-danger">Submit</button>
          </form>
          @else
          <span class="badge badge-pill badge-warning" style="background:red">
            Vous avez une demande de retour pour ce produit
        </span>
          @endif
          <br><br>
        @endif

            </div> <!--// end row -->

        </div>

    </div>


@endsection
