@extends('admin.admin_master')
@section('admin')
@section('title')
 Ecommerce site setting
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container-full">
<section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
      <h4 class="box-title">Mise jour paramètre du seo</h4>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
        <form action="{{ route('seo.update') }}" method="POST">
            @csrf
            <div class="row">
            <div class="col-12">

       <input type="hidden" name="id"  value="{{ $seo->id }}">

        <div class="col-md-6">
        <div class="form-group">
            <h5>Meta titre <span class="text-danger">*</span></h5>
        <div class="controls">
        <input id="meta_title" type="text" name="meta_title"  class="form-control" value="{{ $seo->meta_title }}"></div>
            @error('meta_title')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        </div>

    <div class="col-md-6">
        <div class="form-group">
            <h5>Meta Auteur <span class="text-danger">*</span></h5>
        <div class="controls">
        <input id="meta_author" type="text" name="meta_author"  class="form-control" value="{{ $seo->meta_author }}"></div>
            @error('meta_author')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        </div>

    <div class="col-md-6">
        <div class="form-group">
            <h5>Meta keyword <span class="text-danger">*</span></h5>
        <div class="controls">
        <input id="meta_keyword" type="text" name="meta_keyword"  class="form-control" value="{{ $seo->meta_keyword }}"></div>
            @error('meta_keyword')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        </div>


    <div class="col-md-6">
        <div class="form-group">
            <h5>Meta Description <span class="text-danger">*</span></h5>
        <div class="controls">
        <input id="meta_description" type="text" name="meta_description"  class="form-control" value="{{ $seo->meta_description }}"></div>
            @error('meta_description')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        </div>

    <div class="col-md-6">
        <div class="form-group">
            <h5>Google Analytics <span class="text-danger">*</span></h5>
        <div class="controls">
        <input id="google_analytics" type="text" name="google_analytics"  class="form-control" value="{{ $seo->google_analytics }}"></div>
            @error('google_analytics')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        </div>



       <div class="text-xs-right">
        <input type="submit" class="btn btn-rounded btn-info" value="Mise à jour">
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

@endsection
