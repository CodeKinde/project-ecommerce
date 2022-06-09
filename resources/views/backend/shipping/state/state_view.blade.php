@extends('admin.admin_master')
@section('admin')
@section('title')
 ecommerce page ship district
@endsection
<div class="container-full">
    <!-- Main content -->
    <section class="content">
      <div class="row">

<div class="col-8">

    <div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"> Liste States
            <span class="badge badge-danger badge-pill">{{ count($states) }}</span>
        </h3>

    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Division Nom</th>
                    <th>District Nom</th>
                    <th>State Nom</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($states as $item)
                <tr>
                <td>{{ $item['division']['division_name'] }}</td>
                <td>{{ $item['district']['district_name'] }}</td>

                <td>{{ $item->state_name }}</td>

                <td width="15%">
                <a href="{{ route('state.edit',$item->id) }}" class="btn btn-primary" title="Modifier"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('state.delete',$item->id) }}" class="btn btn-danger" id="delete" title="Supprimer"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
    <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<!-- /.col-md-8 -->



        <div class="col-4">

            <div class="box">
               <div class="box-header with-border">
<h3 class="box-title"> Ajouter States</h3>

               </div>
               <!-- /.box-header -->
               <div class="box-body">
    <form action="{{ route('state.store') }}" method="POST">
        @csrf
        <div class="row">
        <div class="col-12">

    <div class="row">

        <div class="col-md-12">

        <div class="form-group">
            <h5>Division Nom <span class="text-danger">*</span></h5>
            <div class="controls">
            <select name="division_id" id="division_id" class="form-control">
             <option value="" selected disabled>Select Division</option>
            @foreach ($division as $divi)
            <option value="{{ $divi->id }}">{{ $divi->division_name }}</option>
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
             <option value="{{ $dist->id }}">{{ $dist->district_name }}</option>
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
 <input id="state_name" type="text" name="state_name"  class="form-control" value=""></div>
            @error('state_name')
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
               <!-- /.box-body -->
             </div>
             <!-- /.box -->
           </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

  </div>
@endsection

