@extends('frontend.main_master')
@section('content')
@section('title')
 Caise
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Shopping Cart</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01">
	<div class="panel-collapse collapse in">

		<!-- panel-body  -->
	    <div class="panel-body">
			<div class="row">

				<!-- guest-login -->
    <div class="col-md-6 col-sm-6 already-registered-login">
        <h3> Addresse Achat</h3>
        <form class="register-form" action="{{ route('checkout.store') }}" role="form" method="POST">
            @csrf

            <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Shipping Name <span>*</span></label>
            <input type="text" class="form-control unicase-form-control text-input" id="shipping_name" name="shipping_name" placeholder="Prénom & Nom" value="{{ Auth::user()->name }}" required>
            </div>

            <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
            <input type="text" class="form-control unicase-form-control text-input" id=" shipping_email" name="shipping_email" placeholder="Email" value="{{ Auth::user()->email }}" required>
            </div>

            <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Téléphone <span>*</span></label>
            <input type="number" class="form-control unicase-form-control text-input" id="shipping_phone" name="shipping_phone" placeholder="Téléphone" value="{{ Auth::user()->mobile }}" required>
            </div>

            <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Post Code <span>*</span></label>
            <input type="text" class="form-control unicase-form-control text-input" id="post_code" name="post_code" placeholder="post_code" value="" required>
            </div>
    </div>
				<!-- guest-login -->

				<!-- already-registered-login -->
        <div class="col-md-6 col-sm-6 already-registered-login">

                <div class="form-group">
                <label class="info-title" for="exampleInputPassword1">Division <span>*</span></label>
                    <select name="division_id" id="division_id" class="form-control unicase-form-control text-input" required>
                    <option value="" disabled selected>Select Division</option>
                    @foreach ($divsions as $item)
                        <option value="{{ $item->id }}">{{ $item->division_name }}</option>
                    @endforeach
                    </select>
                    @error('division_id')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>


            <div class="form-group">
            <label class="info-title" for="exampleInputPassword1">District <span>*</span></label>
                <select name="district_id" id="district_id" class="form-control unicase-form-control text-input" required>
                <option value="" disabled selected>Select District</option>
                </select>
                @error('district_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
            <label class="info-title" for="exampleInputPassword1">State <span>*</span></label>
                <select name="state_id" id="state_id" class="form-control unicase-form-control text-input" required>
                <option value="" disabled selected>Select State</option>
                </select>
                @error('state_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Notes <span>*</span></label>
            <textarea class="form-control unicase-form-control text-input" id="notes" name="notes" rows="5" cols="5"> </textarea>
            </div>

        </div>
				<!-- already-registered-login -->
			</div><!-- row -->
		</div>
		<!-- panel-body  -->
	</div>
   </div>
<!-- checkout-step-01  -->
  </div><!-- /.checkout-steps -->
 </div>

<div class="col-md-4">
<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
<div class="panel-group">
    <div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="unicase-checkout-title">Your Checkout Progress</h4>
    </div>
    <div class="">
<ul class="nav nav-checkout-progress list-unstyled">
    @foreach ($carts as $item)
    <li>
    <img src="{{ asset($item->options->image) }}" style="width: 50px; height:50px;" alt="">
    </li>
    <li>
        <strong>Qty: </strong>
        ({{ $item->qty }})
        <strong>COLOR: </strong>
        {{$item->options->color_fr  }}
        <strong>SIZE: </strong>
        {{$item->options->size_fr  }}
        <hr>
    </li>
    @endforeach
    <li>
        @if(Session::has('coupon'))
        <strong>Sous Total: </strong>${{ $cartTotal }} <hr>
        <strong>Nom coupon: </strong> {{ session()->get('coupon')['coupon_name'] }}
        ({{ session()->get('coupon')['coupon_discount'] }}%) <br>

        <strong>Montant Rémise: </strong> ${{ session()->get('coupon')['discount_amount'] }} <br>
        <hr>
        <strong>Grand Total: </strong> ${{ session()->get('coupon')['total_amount'] }}
        <hr>

        @else
        <strong>Sous Total: </strong>${{ $cartTotal }}
        <hr>
        <strong>Grand Total: </strong>${{ $cartTotal }}

        <hr>
        @endif
    </li>
</ul>
    </div>
    </div>
  </div>
 </div>
<!-- checkout-progress-sidebar --></div>

 <div class="col-md-4">
<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="unicase-checkout-title">Select Methode de paiment</h4>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="">Strip</label>
                <input type="radio" name="payment_method" value="stripe">
                <img src="{{ asset('frontend/assets/images/payments/4.png') }}" alt="">
            </div>

            <div class="col-md-4">
                <label for="">Carte</label>
                <input type="radio" name="payment_method" value="card">
                <img src="{{ asset('frontend/assets/images/payments/3.png') }}" alt="">
            </div>

            <div class="col-md-4">
                <label for="">Espèce</label>
                <input type="radio" name="payment_method" value="espèces">
                <img src="{{ asset('frontend/assets/images/payments/6.png') }}" alt="">
            </div>

        </div><!-- /.row -->
        <hr>
        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Etape de Paiment</button>
		</div>
	</div>
</div>
<!-- checkout-progress-sidebar --></div>

</form>

			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->

<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
</div><!-- /.container -->
</div><!-- /.body-content -->
<script type="text/javascript">
 $(document).ready(function(){

 $('select[name="division_id"]').on('change',function(){
     var division_id = $(this).val();
     if(division_id){
        $.ajax({
            type:"GET",
            url:"{{ url('/user/district-get/ajax') }}/"+division_id,
            dataType:"json",
            success:function(data){
             $("select[name='district_id']").empty();
             $.each(data,function(key, value){
                 $("select[name='district_id']").append('<option value="'+value.id+'">'+value.district_name+'</option>');
             })
            }
        })
     }else{
         alert('danger')
     }
  })

$('select[name="district_id"]').on('change',function(){
    var district_id = $(this).val();
    if(district_id){
    $.ajax({
        type:"GET",
        url:"{{ url('/user/state-get/ajax') }}/"+district_id,
        dataType:"json",
        success:function(data){
            $("select[name='state_id']").empty();
            $.each(data,function(key, value){
                $("select[name='state_id']").append('<option value="'+value.id+'">'+value.state_name+'</option>');
            })
        }
    })
    }else{
        alert('danger')
    }
})
 });
</script>

@endsection
