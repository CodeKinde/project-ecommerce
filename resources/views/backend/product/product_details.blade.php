@extends('admin.admin_master')
@section('admin')
@section('title')
 ecommerce page product
@endsection
<div class="container-full">
    <!-- Main content -->
    <section class="content">
      <div class="row">


        <div class="col-md-6 col-12">

         <div class="box box-bordered border-primary">
            <div class="box-header with-border">
                <h3 class="box-title"> produits details </h3>
              <a href="{{ route('product.add') }}" style="float: right" class="btn btn-success"><i class="fa fa-plus-circle"></i> Ajouter produit</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table  class="table table-bordered table-striped">
                    <tbody>

                <tr>
                <th>Brand Name fr</th>
                <th>{{ $product['brand']['brand_name_fr']}}</th>
                <tr>
                <tr>
                <th>Categories Name fr</th>
                <th>{{ $product['category']['category_name_fr']}}</th>
                <tr>
                <tr>
                <th>Sub Categories Name fr</th>
                <th>{{ $product['subcategory']['subcategory_name_fr']}}</th>
                <tr>
                <tr>
                <th>Sub Sub Categories Name fr</th>
                <th>{{ $product['subsubcategory']['subsubcategory_name_fr']}}</th>
                <tr>
                <tr>
                <th>Code produit</th>
                <th>{{ $product->product_code}}</th>
                <tr>

                <tr>
                <th>Taille produit</th>
                <th>{{ $product->product_size_fr}}</th>
                <tr>

                <tr>
                <th>Tags produit</th>
                <th>{{ $product->product_tags_fr}}</th>
                <tr>

                <tr>
                @if ($product->hot_deals == null)
                @else
                 <th>Hot Deals</th>
                 <th>{{ $product->hot_deals}}</th>
                <tr>
               @endif

                <tr>
                @if ($product->featured == null)
                @else
                <th>Featured</th>
                <th>{{ $product->featured}}</th>
                @endif
                <tr>

                <tr>
                @if ($product->special_offer == null)
                @else
                <th>Special offer</th>
                <th>{{ $product->special_offer}}</th>
                @endif
                <tr>

                <tr>
                @if ($product->special_deals == null)
                @else
                <th>Special Deals</th>
                <th>{{ $product->special_deals}}</th>
                @endif
                <tr>

                <tr>
                <th>Courte description</th>
                <th>{{ $product->short_descp_fr}}</th>
                <tr>

                <tr>
                    @if ($product->long_descp_fr == null)
                    @else
                    <th>Longue description</th>
                    <th>{{ $product->long_descp_fr}}</th>
                    @endif
                 <tr>

                    </tbody>
                  </table>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-6 col-12">

            <div class="box box-bordered border-primary">
               <div class="box-header with-border">
                   <h3 class="box-title"> produits details </h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                     <table  class="table table-bordered table-striped">
                       <tbody>

                   <tr>
                   <th>Brand Name En</th>
                   <th>{{ $product['brand']['brand_name_en']}}</th>
                   <tr>
                   <tr>
                   <th>Categories Name En</th>
                   <th>{{ $product['category']['category_name_en']}}</th>
                   <tr>
                   <tr>
                   <th>Sub Categories Name En</th>
                   <th>{{ $product['subcategory']['subcategory_name_en']}}</th>
                   <tr>
                   <tr>
                   <th>Sub Sub Categories Name En</th>
                   <th>{{ $product['subsubcategory']['subsubcategory_name_en']}}</th>
                   <tr>

                   <tr>
                   <th>Taille produit En</th>
                   <th>{{ $product->product_size_en}}</th>
                   <tr>

                   <tr>
                   <th>Tags produit En</th>
                   <th>{{ $product->product_tags_en}}</th>
                   <tr>


                   <tr>
                   <th>Courte description En</th>
                   <th>{{ $product->short_descp_en}}</th>
                   <tr>

                   <tr>
                       @if ($product->long_descp_en == null)
                       @else
                       <th>Longue description En</th>
                       <th>{{ $product->long_descp_en}}</th>
                       @endif
                    <tr>

                       </tbody>
                     </table>
                   </div>
               </div>
               <!-- /.box-body -->
             </div>
             <!-- /.box -->
           </div>  <!-- /.col -->

           <div class="col-12">

            <div class="box box-bordered border-primary">
               <div class="box-header with-border">
                   <h3 class="box-title"> produits details </h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                     <table  class="table table-bordered table-striped">
                      <thead>
                        <th>image</th>
                        <th>Nom Produit Fr</th>
                        <th>Nom Produit En</th>
                        <th>Quantité</th>
                        <th>Prix Produit</th>
                        <th>Rémise</th>
                        <th>Status</th>
                      </thead>
                       <tbody>
                        <tr>
                        <td width="8%"><img src="{{ asset($product->product_thambnail) }}" style="width: 70px; height:60px;" alt=""></td>
                        <td width="25%">{{ $product->product_name_fr }}</td>
                        <td width="25%">{{ $product->product_name_en }}</td>
                        <td>{{ $product->product_qty }} Pic</td>
                        <td>{{ $product->selling_price }}$</td>
                        <td>
                            @if($product->discount_price == NULL)
                            <span class="badge badge-danger badge-pill">Pas de rémise</span>
                            @else
                            @php
                                $amount = $product->selling_price - $product->discount_price;
                                $discount = ($amount/$product->selling_price)* 100;
                            @endphp
                            <span class="badge badge-danger badge-pill">{{round($discount)}}%</span>
                            @endif
                        </td>
                        <td>
                            @if ($product->status == 1)
                                <span class="badge badge-success badge-pill">Active</span>
                                @else
                                <span class="badge badge-danger badge-pill">InActive</span>
                            @endif
                        </td>

                          </tr>
                       </tbody>
                     </table>
                   </div>
               </div>
               <!-- /.box-body -->
             </div>
             <!-- /.box -->
           </div>  <!-- /.col -->

           <div class="col-12">

            <div class="box box-bordered border-primary">
               <div class="box-header with-border">
                   <h3 class="box-title"> produits Multiple Image details </h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="row row-sm">
                    @foreach ($multiImgs as $item)
                    <div class="col-md-3">
                        <img src="{{ asset($item->photo_name) }}"  alt="">
                   </div>
                    @endforeach

               </div>
                   </div>
               <!-- /.box-body -->
             </div>
             <!-- /.box -->
           </div>  <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

  </div>
@endsection
