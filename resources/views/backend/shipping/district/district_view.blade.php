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
        <h3 class="box-title"> Liste District
            <span class="badge badge-danger badge-pill">{{ count($districts) }}</span>
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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($districts as $item)
                <tr>
                <td>{{ $item['division']['division_name'] }}</td>
                <td>{{ $item->district_name }}</td>

                <td width="15%">
                <a href="{{ route('district.edit',$item->id) }}" class="btn btn-primary" title="Modifier"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('district.delete',$item->id) }}" class="btn btn-danger" id="delete" title="Supprimer"><i class="fa fa-trash"></i></a>
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
<h3 class="box-title"> Ajouter District</h3>

               </div>
               <!-- /.box-header -->
               <div class="box-body">
    <form action="{{ route('district.store') }}" method="POST">
        @csrf
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
            <option value="{{ $division->id }}">{{ $division->division_name }}</option>
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
 <input id="district_name" type="text" name="district_name"  class="form-control" value=""></div>
            @error('district_name')
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
