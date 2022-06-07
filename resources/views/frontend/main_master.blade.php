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

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<!--////////////// Add to cart Modal  product start//////////-->

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
              @if(session()->get('language') == 'english')
            <span id="pname_en"></span> @else <span id="pname_fr"></span> @endif</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModel">
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
                    <label for="color_en">choose color</label>
                    <select name="color_en" id="color_en" class="form-control">
                    </select>
                    @else
                    <label for="color_fr">choisie la couleur</label>
                    <select name="color_fr" id="color_fr" class="form-control">
                    </select>
                     @endif

                </div> <!--end form -->

                <div class="form-group" id="sizeArray">
                    @if(session()->get('language') == 'english')
                    <label for="size_en">choose Taille</label>
                    <select name="size_en" id="size_en" class="form-control">
                    </select>
                    @else
                    <label for="size_fr">choisie la Taille</label>
                    <select name="size_fr" id="size_fr" class="form-control">
                    </select>
                     @endif
                </div><!--end form -->

                <div class="form-group">
                    <label for="qty">
                    @if(session()->get('language') == 'english')
                      Quantity @else Quantié @endif
                  </label>
                    <input type="number" name="" id="qty" class="form-control" min="1" value="1">
                </div> <!--end form -->
                <input type="hidden"  id="product_id">
                @if(session()->get('language') == 'english')
                <button type="submit" class="btn btn-primary" onclick="addToCartEn()">
                    Add To cart </button> @else
                 <button type="submit" class="btn btn-primary" onclick="addToCart()">
                     Ajouter au panier </button>
                    @endif
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

             $('#product_id').val(id);
             $('#qty').val(1);

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
  ///End Product view modal with ajax

  ///Start add product to cart fr
  function addToCart(){
        var id = $('#product_id').val();
        var product_name_fr = $('#pname_fr').text();
        var color_fr= $('#color_fr option:selected').text();
        var size_fr = $('#size_fr option:selected').text();
        var quantity = $('#qty').val();
        $.ajax({
            type:'POST',
            dataType:"json",
            data:{
                product_name_fr:product_name_fr, color_fr:color_fr,size_fr:size_fr, quantity:quantity
            },
            url:"/cart/data/store/"+id,
            success:function(data){
                console.log(data);
                miniCart();
                $('#closeModel').click();
                //console.log(data);
            //start message
        const Toast = Swal.mixin({
                toast:true,
                position: 'top-end',
                icon: 'success',
                showConfirmButton: false,
                timer: 1500
                })
            if($.isEmptyObject(data.error)){
                Toast.fire({
                    type:'success',
                    title: data.success
                })
            }else{
                Toast.fire({
                    type:'error',
                    title: data.error
                })
            }
        //End message

         }
        });
    }
 ///End add product to cart fr

   ///Start add product to cart fr
   function addToCartEn(){
        var id = $('#product_id').val();
        var product_name_en = $('#pname_en').text();
        var color_en = $('#color_en option:selected').text();
        var size_en = $('#size_en option:selected').text();
        var quantity = $('#qty').val();
        $.ajax({
            type:'POST',
            dataType:"json",
            data:{
                product_name_en:product_name_en, color_en:color_en, size_en:size_en,quantity:quantity
            },
            url:"/cartEn/data/store/"+id,
            success:function(data){
                console.log(data);
                miniCart();
                $('#closeModel').click();
                //console.log(data);
            //start message
        const Toast = Swal.mixin({
                toast:true,
                position: 'top-end',
                icon: 'success',
                showConfirmButton: false,
                timer: 1500
                })
            if($.isEmptyObject(data.error)){
                Toast.fire({
                    type:'success',
                    title: data.success
                })
            }else{
                Toast.fire({
                    type:'error',
                    title: data.error
                })
            }
        //End message

         }
        });
    }
 ///End add product to cart fr
    </script>

<script type="text/javascript">
//<!--start get product mini cart -->
function miniCart(){
$.ajax({
    type:"GET",
    url:"/product/mini/cart",
    dataType:"json",
    success:function(response){
        $('span[id="cartSubTotal"]').text(response.cartTotal);
        $('#cartQty').text(response.cartQty);
        var miniCart =""
        $.each(response.carts, function(key, value){
            miniCart +=`<div class="cart-item product-summary">
            <div class="row">
                <div class="col-xs-4">
                <div class="image"> <a href="detail.html"><img src="/${value.options.image}" alt=""></a> </div>
                </div>
                <div class="col-xs-7">
                <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
                <div class="price">${value.price} * ${value.qty}</div>
                </div>
                <button type="submit" class="btn btn-danger" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fa fa-trash"></i> </button>
            </div>
            </div>
            <!-- /.cart-item -->
            <div class="clearfix"></div>
            <hr>`
        });
        $('#miniCart').html(miniCart);
    }
})
}
miniCart();
 ///<!--End get product mini cart-->
/// mini Cart remove start
function miniCartRemove(rowId){

    $.ajax({
        type:'GET',
        url:"/minicart/product-remove/"+rowId,
        dataType:'json',
        success:function(data){
            miniCart();
            //End message
            const Toast = Swal.mixin({
                toast:true,
                position: 'top-end',
                icon: 'error',
                showConfirmButton: false,
                timer: 1500
                })
            if($.isEmptyObject(data.error)){
                Toast.fire({
                    type:'error',
                    title: data.success
                })
            }else{
                Toast.fire({
                    type:'error',
                    title: data.error
                })
            }
            //End message

        }
    })
}
/// End mini Cart remove start
</script>
<script type="text/javascript">
function AddToWishlist(product_id){
    $.ajax({
        type:"POST",
        url:"/add-to-wishlist/"+product_id,
        dataType:'json',
        success:function(data){
        //End message
        const Toast = Swal.mixin({
            toast:true,
            position: 'top-end',
            icon: 'success',
            showConfirmButton: false,
            timer: 1500
            })
        if($.isEmptyObject(data.error)){
            Toast.fire({
                type:'success',
                icon:'success',
                title: data.success
            })
        }else{
            Toast.fire({
                type:'error',
                icon:'error',
                title: data.error
            })
        }
        //End message
        }
    })
}
</script>
<!--/// start get wishlist product fr-->
<script type="text/javascript">

function wishlist(){
 $.ajax({
     type:"GET",
     url:"/user/get-wishlist-product",
     dataType:'json',
     success:function(response){
         //console.log(response);
        var rows = ""
        $.each(response,function(key,value){
          rows +=`<tr>
            <td class="col-md-2"><img src="/${value.product.product_thambnail}" alt="imga"></td>
            <td class="col-md-7">
            <div class="product-name"><a href="#">
             @if(session()->get('language') ==  'english')
             ${value.product.product_name_en}
             @else
             ${value.product.product_name_fr}
             @endif
            </a></div>
            <div class="price">
                ${value.product.discount_price == null
                    ? `$ ${value.product.selling_price}`
                    : `$ ${value.product.discount_price} <span>$ ${value.product.selling_price} </span>
                    `
                    }
            </div>
            </td>
            <td class="col-md-2">
                @if (session()->get('language') == 'english')
                <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary icon" type="button" title="Add Cart" id="${value.product_id }" onclick="productView(this.id)">Add to Cart </button>
            </td>
                <td class="col-md-1 close-btn">
                    <button type="submit" class="btn btn-danger" id="${value.id}" onclick="wishlistRemove(this.id)"><i class="fa fa-times"></i></button>                </td>
                @else
                <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary icon" type="button" title="Add Cart" id="${value.product_id }" onclick="productView(this.id)">Ajouter au panier </button>
            </td>
            <td class="col-md-1 close-btn">
                <button type="submit" class="btn btn-danger" id="${value.id}" onclick="wishlistRemoveFr(this.id)"><i class="fa fa-times"></i></button>
            </td>
                @endif
        </tr>`
        });
        $('#wishlist').html(rows);
     }
 })
}
wishlist();


///start remove wishlist product
function wishlistRemoveFr(id){

$.ajax({
    type:'GET',
    url:"/user/wishlist/productfr-remove/"+id,
    dataType:'json',
    success:function(data){
        wishlist();
        //End message
        const Toast = Swal.mixin({
            toast:true,
            position: 'top-end',
            icon: 'error',
            showConfirmButton: false,
            timer: 1500
            })
        if($.isEmptyObject(data.error)){
            Toast.fire({
                type:'error',
                title: data.success
            })
        }else{
            Toast.fire({
                type:'error',
                title: data.error
            })
        }
        //End message

    }
})
}

function wishlistRemove(id){

$.ajax({
    type:'GET',
    url:"/user/wishlist/product-remove/"+id,
    dataType:'json',
    success:function(data){
        wishlist();
        //End message
        const Toast = Swal.mixin({
            toast:true,
            position: 'top-end',
            icon: 'error',
            showConfirmButton: false,
            timer: 1500
            })
        if($.isEmptyObject(data.error)){
            Toast.fire({
                type:'error',
                title: data.success
            })
        }else{
            Toast.fire({
                type:'error',
                title: data.error
            })
        }
        //End message

    }
})
}
/// End  remove  wishlist product
</script>
<!--/// End get wishlist product -->

</body>
</html>
