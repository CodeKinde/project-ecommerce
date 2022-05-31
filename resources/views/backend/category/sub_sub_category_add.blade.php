@extends('admin.admin_master')
@section('admin')
@section('title')
 Ecommerce sub-sub-category ajout
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container-full">
<section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
      <h4 class="box-title">Sub Sub Categories Ajout</h4>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
<form action="{{ route('sub-subcategory.store') }}" method="POST">
            @csrf
            <div class="row">
            <div class="col-12">

       <div class="row">
<div class="col-md-6">
<div class="form-group">
    <h5>Categories <span class="text-danger">*</span></h5>
    <div class="controls">
        <select name="category_id" id="category_id" class="form-control">
        <option value="" disabled selected>Select Category</option>
        @foreach ($category as $categ)
            <option value="{{ $categ->id }}">{{ $categ->category_name_fr }}</option>
        @endforeach
        </select>
        </div>
        @error('category_id')
        <div class="text-danger">{{ $message }}</div>
        @enderror
  </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
        <h5>Sub Categories <span class="text-danger">*</span></h5>
        <div class="controls">
            <select name="subcategory_id" id="subcategory_id" class="form-control">
            <option value="" disabled selected>Select Category</option>
            </select>
        </div>
            @error('subcategory_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
      </div>
    </div>
        </div> <!--end row -->


        <div class="row">
            <div class="col-md-12">
            <div class="form-group">
                <h5>Sub sub Categorie Nom Français <span class="text-danger">*</span></h5>
                <div class="controls">
            <input id="subsubcategory_name_fr" type="text" name="subsubcategory_name_fr"  class="form-control" value=""></div>
                @error('subsubcategory_name_fr')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            </div>

            <div class="col-md-12">
            <div class="form-group">
                <h5>Sub sub Category Nom Anglais <span class="text-danger">*</span></h5>
                <div class="controls">
            <input id="subsubcategory_name_en" type="text" name="subsubcategory_name_en"  class="form-control" value=""></div>
                @error('subsubcategory_name_en')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            </div>

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
 })
</script>

@endsection
