@extends('admin.admin_master')
@section('admin')
@section('title')
 Ecommerce - state  edit
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container-full">
<section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
      <h4 class="box-title">State Edit</h4>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
            <form action="{{ route('state.update') }}" method="POST">
                @csrf
<input type="hidden" name="id" id="" value="{{ $state->id }}">
                <div class="row">
                <div class="col-12">

            <div class="row">

                <div class="col-md-12">
                <div class="form-group">
                    <h5>Division Nom <span class="text-danger">*</span></h5>
                    <div class="controls">
                    <select name="division_id" id="" class="form-control">
                     <option value="" selected disabled>Select Division</option>
                    @foreach ($division as $div)
                    <option value="{{ $div->id }}" {{ $state->division_id == $div->id ? 'selected' : ''  }}>{{ $div->division_name }}</option>
                    @endforeach
                    </select>
                @error('division_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                </div>

                <div class="form-group">
                    <h5>District Nom <span class="text-danger">*</span></h5>
                    <div class="controls">
                    <select name="district_id" id="district_id" class="form-control">
                     <option value="" selected disabled>Select District</option>
                     @foreach ($district as $dist)
                     <option value="{{ $dist->id }}" {{ $state->district_id == $dist->id ?'selected' : '' }}>{{ $dist->district_name }}</option>
                     @endforeach
                    </select>
                @error('district_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                </div>


                <div class="form-group">
                    <div class="form-group">
             <h5>State Nom <span class="text-danger">*</span></h5>
                        <div class="controls">
         <input id="state_name" type="text" name="state_name"  class="form-control" value="{{ $state->state_name }}"></div>
                    @error('state_name')
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
