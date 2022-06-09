@extends('admin.admin_master')
@section('admin')
@section('title')
 Ecommerce -District edit
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container-full">
<section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
      <h4 class="box-title">District Edit</h4>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
            <form action="{{ route('district.update') }}" method="POST">
                @csrf
<input type="hidden" name="id" id="" value="{{ $district->id }}">
                <div class="row">
                <div class="col-12">

            <div class="row">

                <div class="col-md-12">
                <div class="form-group">
                    <h5>Division Nom <span class="text-danger">*</span></h5>
                    <div class="controls">
                    <select name="division_id" id="" class="form-control">
                     <option value="" selected disabled>Select Division</option>
                    @foreach ($divisions as $division)
                    <option value="{{ $division->id }}" {{ $district->division_id == $division->id ? 'selected' : ''  }}>{{ $division->division_name }}</option>
                    @endforeach
                    </select>
                @error('division_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                </div>

                <div class="form-group">
                    <div class="form-group">
             <h5>District Nom <span class="text-danger">*</span></h5>
                        <div class="controls">
         <input id="district_name" type="text" name="district_name"  class="form-control" value="{{ $district->district_name }}"></div>
                    @error('district_name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                </div>

            </div><!--end row -->


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
