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

            @forelse ($order as $item)

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
                    <label for="">
                    <span class="badge badge-pill badge-warning" style="background:#418DB9">{{ $item->status }}
                    </span>
                    </label>
                </td>


            <td class="col-md-1">
                <a href="{{ url('/user/order-detail/'.$item->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> View</a>

                <a target="_black" href="{{ url('/user/invoice-download/'.$item->id) }}" class="btn btn-sm btn-danger" style="color:white; margin-top:5px"><i class="fa fa-download"></i> Facture</a>
            </td>
                </tr>
                @empty
                    <h2 class="text-danger">Order Not Found</h2>
                @endforelse

             </tbody>
            </table>
        </div>
       </div> <!--// end col md-8 -->

            </div>
            <!--// end row -->

        </div>

    </div>


@endsection
