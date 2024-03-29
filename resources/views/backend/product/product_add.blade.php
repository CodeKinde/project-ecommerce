@extends('admin.admin_master')
@section('admin')
@section('title')
 Ecommerce produit ajout
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container-full">
<section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
      <h4 class="box-title">Produit Ajout</h4>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
            <div class="col-12">

       <div class="row">
<div class="col-md-4">
<div class="form-group">
<h5>Brand <span class="text-danger">*</span></h5>
<div class="controls">
    <select name="brand_id" id="brand_id" class="form-control">
    <option value="" disabled selected>Select brand</option>
    @foreach ($brands as $brand)
        <option value="{{ $brand->id }}">{{ $brand->brand_name_fr }}</option>
    @endforeach
    </select>
    </div>
    @error('brand_id')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
</div> <!--col md -4 -->

<div class="col-md-4">
<div class="form-group">
<h5>Categories <span class="text-danger">*</span></h5>
<div class="controls">
    <select name="category_id" id="category_id" class="form-control">
    <option value="" disabled selected>Select Category</option>
    @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->category_name_fr }}</option>
    @endforeach
    </select>
    </div>
    @error('category_id')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
</div> <!--col md -4 -->

<div class="col-md-4">
<div class="form-group">
<h5>Sub Categories <span class="text-danger">*</span></h5>
<div class="controls">
    <select name="subcategory_id" id="subcategory_id" class="form-control">
    <option value="" disabled selected>Select Category</option>
  </select></div>
    @error('subcategory_id')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
</div><!--col md -4 -->
</div> <!--end row -->


   <div class="row">

<div class="col-md-4">
<div class="form-group">
    <h5>Sub sub Categorie Nom Fr <span class="text-danger">*</span></h5>
    <div class="controls">
      <select name="subsubcategory_id" id="subsubcategory_id" required class="form-control">
    <option value="" disabled selected>Select sub sub Category</option>
        </select> </div>
    @error('subsubcategory_id')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
</div><!--col md -4 -->


<div class="col-md-4">
    <div class="form-group">
        <h5>Nom Produit Fr <span class="text-danger">*</span></h5>
        <div class="controls">
      <input id="product_name_fr" type="text" name="product_name_fr"  class="form-control" value="" required></div>
        @error('product_name_fr')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    </div><!--col md -4 -->


<div class="col-md-4">
    <div class="form-group">
        <h5>Nom Produit En <span class="text-danger">*</span></h5>
        <div class="controls">
      <input id="product_name_en" type="text" name="product_name_en"  class="form-control" value="" required></div>
        @error('product_name_en')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    </div><!--col md -4 -->

</div><!--end row -->

<div class="row">

    <div class="col-md-4">
        <div class="form-group">
            <h5>Code Produit<span class="text-danger">*</span></h5>
            <div class="controls">
          <input id="product_code" type="text" name="product_code"  class="form-control" value="" required></div>
            @error('product_code')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        </div><!--col md -4 -->


    <div class="col-md-4">
        <div class="form-group">
            <h5>Quantité Produit <span class="text-danger">*</span></h5>
            <div class="controls">
          <input id="product_qty" type="text" name="product_qty"  class="form-control" value="" required></div>
            @error('product_qty')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        </div><!--col md -4 -->


    <div class="col-md-4">
        <div class="form-group">
            <h5>Tags Produit Fr<span class="text-danger">*</span></h5>
            <div class="controls">
             <div class="tags-default">
        <input type="text" value="Lorem" data-role="tagsinput" placeholder="add tags" name="product_tags_fr"/></div></div>
            @error('product_tags_fr')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        </div><!--col md -4 -->

    </div><!--end row -->

    <div class="row">

        <div class="col-md-4">
            <div class="form-group">
                <h5>Tags Produit En <span class="text-danger">*</span></h5>
                <div class="controls">
                 <div class="tags-default">
            <input type="text" value="Lorem," data-role="tagsinput" name="product_tags_en" placeholder="add tags" /></div></div>
                @error('product_tags_fr')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            </div><!--col md -4 -->

    <div class="col-md-4">
        <div class="form-group">
            <h5>Taille Produit Fr<span class="text-danger">*</span></h5>
            <div class="controls">
                <div class="tags-default">
        <input type="text" value="M,L,X" data-role="tagsinput" name="product_size_fr" placeholder="add tags" /></div></div>
            @error('product_size_fr')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        </div><!--col md -4 -->



        <div class="col-md-4">
            <div class="form-group">
                <h5>Taille Produit En<span class="text-danger">*</span></h5>
                <div class="controls">
                    <div class="tags-default">
            <input type="text" value="M,L,X" data-role="tagsinput" name="product_size_en" placeholder="add tags" /></div></div>
                @error('product_size_en')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            </div><!--col md -4 -->

        </div><!--end row -->


    <div class="row">

        <div class="col-md-4">
            <div class="form-group">
                <h5>Couleur Fr Produit <span class="text-danger">*</span></h5>
                <div class="controls">
                 <div class="tags-default">
            <input type="text" value="Rouge,Noir,Blanc" data-role="tagsinput" name="product_color_fr" placeholder="add tags" /></div></div>
                @error('product_color_fr')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            </div><!--col md -4 -->

    <div class="col-md-4">
        <div class="form-group">
            <h5>Couleur En Produit <span class="text-danger">*</span></h5>
            <div class="controls">
                <div class="tags-default">
        <input type="text" value="Red,White,Black" data-role="tagsinput" name="product_color_en" placeholder="add tags" /></div></div>
            @error('product_color_en')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        </div><!--col md -4 -->



        <div class="col-md-4">
            <div class="form-group">
                <h5>Prix Vente Produit<span class="text-danger">*</span></h5>
                <div class="controls">
             <input id="selling_price" type="text" name="selling_price"  class="form-control" value="" required></div>
                @error('selling_price')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            </div><!--col md -4 -->

        </div><!--end row -->



    <div class="row">

        <div class="col-md-4">
            <div class="form-group">
                <h5>Rémise Produit<span class="text-danger">*</span></h5>
                <div class="controls">
            <input id="discount_price" type="text" name="discount_price"  class="form-control" value=""></div>
                @error('discount_price')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            </div><!--col md -4 -->

        <div class="col-md-4">
            <div class="form-group">
                <h5>Main Thambnail <span class="text-danger">*</span></h5>
                <div class="controls">
         <input id="product_thambnail" type="file" name="product_thambnail"  class="form-control" value="" required onchange="mainThamURL(this)"></div>
                @error('product_thambnail')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <img src="" id="mainThmb" alt="">
            </div>
            </div><!--col md -4 -->

    <div class="col-md-4">
        <div class="form-group">
            <h5>Multiple Image <span class="text-danger">*</span></h5>
            <div class="controls">
         <input id="multiImg" type="file" name="multi_img[]"  class="form-control" required multiple></div>
            @error('multi_img')
            <div class="text-danger">{{ $message }}</div>
            @enderror
         <div class="row" id="previen_img"></div>
        </div>
        </div><!--col md -4 -->

        </div><!--end row -->


        <div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <h5>Courte description Fr Produit<span class="text-danger">*</span></h5>
            <div class="controls">
            <textarea name="short_descp_fr" id="textarea" class="form-control">
                courte description en français
            </textarea></div>
            @error('short_descp_fr')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        </div><!--col md -4 -->


    <div class="col-md-6">
        <div class="form-group">
            <h5>Courte description En Produit<span class="text-danger">*</span></h5>
            <div class="controls">
            <textarea name="short_descp_en" id="textarea" class="form-control">
                courte description en anglais
             </textarea></div>
            @error('short_descp_en')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        </div><!--col md -4 -->

     </div><!--end row -->
 <div class="row">

     <div class="col-md-6">
        <div class="form-group">
            <h5>Longue description Fr Produit<span class="text-danger">*</span></h5>
            <div class="controls">
                <textarea id="editor1" name="long_descp_fr" rows="10" cols="80">
                    Longue description en français</textarea></div>
            @error('long_descp_fr')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        </div><!--col md -4 -->


        <div class="col-md-6">
            <div class="form-group">
                <h5>Longue description En Produit<span class="text-danger">*</span></h5>
                <div class="controls">
                 <textarea id="editor2" name="long_descp_en" rows="10" cols="80">
                     Longue description en anglais</textarea></div>
                @error('long_descp_en')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            </div><!--col md -4 -->
     </div><!--end row -->



    <div class="row">

 <div class="col-md-6">
     <div class="form-group">
    <div class="controls">
    <fieldset>
        <input type="checkbox" id="checkbox_2" value="1" name="hot_deals">
        <label for="checkbox_2">Hot deals</label>
    </fieldset>
    <fieldset>
        <input type="checkbox" id="checkbox_3" value="1" name="featured">
        <label for="checkbox_3">Featured</label>
    </fieldset>
    </div>
        </div>
        </div><!--col md -4 -->

        <div class="col-md-6">
        <div class="form-group">
    <div class="controls">
        <fieldset>
            <input type="checkbox" id="checkbox_4"  value="1" name="special_offer">
            <label for="checkbox_4">Special Offer</label>
        </fieldset>
        <fieldset>
            <input type="checkbox" id="checkbox_5" value="1" name="special_deals">
            <label for="checkbox_5">Special deals</label>
        </fieldset>
    </div>
        </div>
        </div><!--col md -4 -->

        </div><!--end row -->

        <div class="text-xs-right">
        <input type="submit" class="btn btn-rounded btn-info" value="Ajouter">
        </div>
     </form>

           </div>
           <!-- /.col -->
         </div>
         <!-- /.row -->
       </div>
       <!-- /.box-body -->
     </div>
     <!-- /.box -->
   </section>
</div>
<script type="text/javascript">
$(document).ready(function(){
$('select[name="category_id"]').on('change',function(){
    var category_id = $(this).val();
    if(category_id){
    $.ajax({
    type:"GET",
    url:"{{ url('/category/subcategory/ajax') }}/"+category_id,
    dataType:'json',
    success:function(data){
        //console.log(data);
        var d = $('select[name="subcategory_id"]').empty();
        $.each(data, function(key, value){
        $('select[name="subcategory_id"]').append('<option value="'+value.id+'">'+value.subcategory_name_fr+'</option>');
        })
    }
    })
    }else{
    alert('danger');
    }
})

$('select[name="subcategory_id"]').on('change',function(){
    var category_id = $(this).val();
    if(category_id){
    $.ajax({
    type:"GET",
    url:"{{ url('/category/sub-subcategory/ajax') }}/"+category_id,
    dataType:'json',
    success:function(data){
        //console.log(data);
        var d = $('select[name="subsubcategory_id"]').empty();
        $.each(data, function(key, value){
        $('select[name="subsubcategory_id"]').append('<option value="'+value.id+'">'+value.subsubcategory_name_fr+'</option>');
        })
    }
    })
    }else{
    alert('danger');
    }
})

})
</script>
<script type="text/javascript">
function mainThamURL(input){
 if(input.files && input.files[0]){
     var reader = new FileReader();
     reader.onload = function(e){
      $('#mainThmb').attr('src',e.target.result).width(80).height(80);
     }
     reader.readAsDataURL(input.files[0]);
 }
}
</script>

<script type="text/javascript">
    $(document).ready(function(){
       $('#multiImg').on('change',function(){
        if (window.File && window.FileReader && window.FileList && window.Blog) {
         var data = $(this)[0].files;
   $.each(data, function(index, file) { //loop though each file
       if (/(\.|\/)(gif|jpe?g|png)$/i.test(file
           .type)) { //check supported file type
           var fRead = new FileReader(); //new filereader
           fRead.onload = (function(file) { //trigger function on successful read
               return function(e) {
                 var img = $('<img/>').addClass('thumb').attr('src', e.target.result).width(80)
                .height(80); //create image element
                  $('#preview_img').append(img); //append image to output element
               };
           })(file);
           fRead.readAsDataURL(file); //URL representing the file's data.
       }
     });
        }else{
           alert("Your browser doesn't support File API!"); //if File API is absent
        }
       })
    })
   </script>

@endsection
