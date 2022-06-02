<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
<title>@yield('title')</title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">

<!-- Customizable CSS -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/blue.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.transitions.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/rateit.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap-select.min.css') }}">

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.css') }}">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
@include('frontend.body.header')
<!-- ============================================== HEADER : END ============================================== -->
@yield('content')
<!-- /#top-banner-and-menu -->

<!-- ============================================================= FOOTER ============================================================= -->
@include('frontend.body.footer')
<!-- ============================================================= FOOTER : END============================================================= -->

<!-- For demo purposes – can be removed on production -->

<!-- For demo purposes – can be removed on production : End -->

<!-- JavaScripts placed at the end of the document so the pages load faster -->
<script src="{{ asset('frontend/assets/js/jquery-1.11.1.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap-hover-dropdown.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/echo.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery.easing-1.3.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap-slider.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery.rateit.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/lightbox.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/scripts.js') }}"></script>


<!--////////////// Add to cart Modal  product start//////////-->

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
              @if(session()->get('language') == 'english')
            <span id="pname_en"></span> @else <span id="pname_fr"></span> @endif</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
              <div class="col-md-4">
                <div class="card">
                    <img src="" class="card-img-top" alt="" id="pimage" style="width: 200px; height:200px;">
                </div>
              </div><!--col-md-4 -->
              <div class="col-md-4">
                <ul class="list-group">
                 <li class="list-group-item">
                     @if(session()->get('language') == 'english')
                    Product Price: <strong class="text-danger">$<span id="pprice"></span></strong><del id="oldprice">$</del> @else Prix Produit: <strong class="text-danger">$<span id="pprice"></span></strong>  <del id="oldprice">$</del> @endif</li>

                 <li class="list-group-item">
                     @if(session()->get('language') == 'english')
                    Product Code: <strong id="pcode"></strong> @else Code Produit: <strong id="pcode"></strong> @endif</li>
                 <li class="list-group-item">
                     @if(session()->get('language') == 'english')
                    Category: <strong id="pcategory_en"></strong> @else Categories: <strong id="pcategory_fr"></strong> @endif</li>
                 <li class="list-group-item">Brand: <strong id="pbrand"></strong></li>
                 <li class="list-group-item">Stock:
                     @if(session()->get('language') == 'english')
                     <span class="badge badge-pill badge-success" id="aviable" style="background:green; color:white;"></span>

                     <span class="badge badge-pill badge-success" id="stockout" style="background:red; color:white;"></span>
                     @else
                     <span class="badge badge-pill badge-success" id="disponible" style="background:green; color:white;"></span>
                     <span class="badge badge-pill badge-success" id="rupture" style="background:red; color:white;"></span>
                     @endif
                 </li>

                </ul>
            </div><!--col-md-4 -->

            <div class="col-md-4">
                <div class="form-group">

                    @if(session()->get('language') == 'english')
                    <label for="">choose color</label>
                    <select name="color_en" id="" class="form-control">
                    </select>
                    @else
                    <label for="">choisie la couleur</label>
                    <select name="color_fr" id="" class="form-control">
                    </select>
                     @endif

                </div> <!--end form -->

                <div class="form-group" id="sizeArray">
                    @if(session()->get('language') == 'english')
                    <label for="">choose Taille</label>
                    <select name="size_en" id="" class="form-control">
                    </select>
                    @else
                    <label for="">choisie la Taille</label>
                    <select name="size_fr" id="" class="form-control">
                    </select>
                     @endif
                </div><!--end form -->

                <div class="form-group">
                    <label for="">
                    @if(session()->get('language') == 'english')
                      Quantity @else Quantié @endif
                  </label>
                    <input type="number" name="" id="" class="form-control">
                </div> <!--end form -->
                <button type="submit" class="btn btn-primary">
                    @if(session()->get('language') == 'english')
                    Add To cart @else Ajouter au panier @endif</button>
            </div><!--col-md-4 -->
          </div><!--end row -->

        </div>
      </div>
    </div>
  </div>
    <!--////////////// Add to cart Modal  product End//////////-->
    <script class="text/javascript">
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    })
///start Product view modal with ajax
    function productView(id){
        //alert(id)
        $.ajax({
            data:'GET',
            url:'/product/view/modal/'+id,
            dataType:'json',
            success:function(data){
                //console.log(data);
             $('#pname_fr').text(data.product.product_name_fr);
             $('#pname_en').text(data.product.product_name_en);

             $('#price').text(data.product.selling_price);
             $('#pcode').text(data.product.product_code);
             $('#pcategory_fr').text(data.product.category.category_name_fr);
             $('#pcategory_en').text(data.product.category.category_name_en);
             $('#pbrand').text(data.product.brand.brand_name_en);
             $('#pimage').attr('src','/'+data.product.product_thambnail);

             //product price
             if(data.product.discount_price == null){
                $('#pprice').text("");
                $('#oldprice').text("");
                $('#pprice').text(data.product.selling_price);

             }else{
                $('#pprice').text(data.product.discount_price);
                $('#oldprice').text(data.product.selling_price);
             }
             //End product price
             //product stock
             if(data.product.product_qty > 0){
                 $('#disponible').text("");
                 $('#aviable').text("");
                 $('#rupture').text("");
                 $('#stockout').text("");

                 $('#disponible').text('Disponible');
                 $('#aviable').text('Aviable');

             }else{
                 $('#disponible').text("");
                 $('#aviable').text("");

                 $('#rupture').text("");
                 $('#stockout').text("");

                $('#rupture').text('Rupture de stock');
                $('#stockout').text('Stockout');

             }

             //End product stock
             ///product color
             $('select[name="color_fr"]').empty();
             $.each(data.color_fr,function (key, value) {
                $('select[name="color_fr"]').append('<option value="'+value+'">'+value+'</option>');
                });

                $('select[name="color_en"]').empty();
             $.each(data.color_fr,function (key, value) {
                $('select[name="color_en"]').append('<option value="'+value+'">'+value+'</option>');
                });
                ///End product color


                // product size
                $('select[name="size_fr"]').empty();
             $.each(data.size_fr,function (key, value) {
                $('select[name="size_fr"]').append('<option value="'+value+'">'+value+'</option>');
                if (data.size_fr == "") {
                    $('#sizeArray').hide();
                }else{
                    $('#sizeArray').show();
                }
                });

                $('select[name="size_en"]').empty();
             $.each(data.size_en,function (key, value) {
                $('select[name="size_en"]').append('<option value="'+value+'">'+value+'</option>');
                if (data.size_en == "") {
                    $('#sizeArray').hide();
                }else{
                    $('#sizeArray').show();
                }
                });

              // end product size
            }
        })
    }
    </script>
</body>
</html>
