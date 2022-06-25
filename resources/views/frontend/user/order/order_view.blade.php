@extends('frontend.main_master')
@section('title')
commande
@endsection
@section('content')
<div class="body-content">
<div class="container">
<div class="row">
   @include('frontend.common.user_sidebar')
                <!--// end col md-2 -->
        <!--// end col md-2 -->
    <div class="col-md-2"></div>
      <div class="col-md-8">
        <div class="able-responsive">
            <table class="table">
             <tbody>
                <tr style="background:#e2e2e2;">
                <td class="col-md-3">
                    <label for="">Date</label>
                </td>

                <td class="col-md-1">
                    <label for="">Total</label>
                </td>

                <td class="col-md-1">
                    <label for="">Payment</label>
                </td>


                <td class="col-md-3">
                    <label for="">Facture N°</label>
                </td>


                <td class="col-md-3">
                    <label for="">Commande</label>
                </td>


                <td class="col-md-2">
                    <label for="">Action</label>
                </td>
                </tr>

            @foreach ($order as $item)

            <tr >
                <td class="col-md-2">
                    <label for="">{{ $item->order_date }}</label>
                </td>

                <td class="col-md-2">
                    <label for="">${{ $item->amount }}</label>
                </td>

                <td class="col-md-1">
                    <label for="">{{ $item->payment_method }}</label>
                </td>


                <td class="col-md-3">
                    <label for="">{{ $item->invoice_no }}</label>
                </td>


             <td class="col-md-3">
                @if ($item->status == "pending" )
                  <span class="badge badge-pill badge-warning" style="background:#800080">En attendant</span>
                 @elseif ($item->status == "confirm")
                 <span class="badge badge-pill badge-warning" style="background:#0000FF">Confirmé</span>

                 @elseif ($item->status == "processing")
                 <span class="badge badge-pill badge-warning" style="background:#FFA500">Traitement</span>

                 @elseif ($item->status == "picked")
                 <span class="badge badge-pill badge-warning" style="background:#808000">Choisie</span>

                 @elseif ($item->status == "shipped")
                 <span class="badge badge-pill badge-warning" style="background:#808080">Envoyé</span>

                 @elseif ($item->status == "delivered")
                 <span class="badge badge-pill badge-warning" style="background:#008000">Livré</span>

                 @elseif ($item->order_return == 1)
                 <span class="badge badge-pill badge-warning" style="background:red;">Return Demandé
                </span>
                 @else
                 <span class="badge badge-pill badge-warning" style="background:#FF0000">Annulé</span>
                 @endif

                    </span>

             </td>


            <td class="col-md-1">
                <a href="{{ url('/user/order-detail/'.$item->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> View</a>

                <a target="_black" href="{{ url('/user/invoice-download/'.$item->id) }}" class="btn btn-sm btn-danger" style="color:white; margin-top:5px"><i class="fa fa-download"></i> Facture</a>
            </td>
                </tr>
                @endforeach

             </tbody>
            </table>
        </div>
       </div> <!--// end col md-8 -->

            </div>
            <!--// end row -->

        </div>

    </div>


@endsection
