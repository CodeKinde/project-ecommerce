@extends('admin.admin_master')
@section('admin')
@section('title')
 report page
@endsection
<div class="container-full">
    <!-- Main content -->
    <section class="content">
      <div class="row">

<div class="col-4">
    <div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"> Recherche par Date
        </h3>

    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form action="{{ route('division.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <h5>Date <span class="text-danger">*</span></h5>
                <div class="controls">
        <input  type="date" name="order_date" id="order_date"  class="form-control" value=""></div>
            @error('order_date')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>

        <div class="text-xs-right">
        <input type="submit" class="btn btn-rounded btn-info" value="Chercher">
        </div>
        </form>
    </div>
    <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<!-- /.col-md-8 -->


        <div class="col-4">
            <div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"> Recherche par Mois</h3>
     </div>
               <!-- /.box-header -->

        <div class="box-body">
    <form action="{{ route('division.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <h5>Select Mois <span class="text-danger">*</span></h5>
            <div class="controls">
            <select name="order_month" id="order_month" class="form-control">
             <option value="" selected disabled>Choisie Un Mois</option>
             <option value="January">January</option>
             <option value="February">February</option>
             <option value="March">March</option>
             <option value="April">April</option>
             <option value="May">May</option>
             <option value="Jun">Jun</option>
             <option value="July">July</option>
             <option value="August">August</option>
             <option value="September">September</option>
             <option value="October">October</option>
             <option value="November">November</option>
             <option value="December">December</option>
            </select>
        @error('order_month')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>
        </div>


        <div class="form-group">
            <h5>Select Année <span class="text-danger">*</span></h5>
            <div class="controls">
            <select name="order_year" id="order_year" class="form-control">
                <option value="" selected disabled>Choisie Une Année</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
                <option value="2027">2027</option>
                <option value="2028">2028</option>
                <option value="2029">2029</option>
                <option value="2030">2030</option>
            </select>
        @error('order_year')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>
     </div>
    <div class="text-xs-right">
    <input type="submit" class="btn btn-rounded btn-info" value="Chercher">
    </div>
    </form>
               </div>
               <!-- /.box-body -->
             </div>
             <!-- /.box -->
           </div>    <!-- /.col-md-4 -->



        <div class="col-4">
            <div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"> Recherche par Année</h3>
     </div>
               <!-- /.box-header -->
        <div class="box-body">
    <form action="{{ route('division.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <h5>Select Année <span class="text-danger">*</span></h5>
            <div class="controls">
            <select name="order_year" id="order_year" class="form-control">
             <option value="" selected disabled>Choisie Une Année</option>
             <option value="2021">2021</option>
             <option value="2022">2022</option>
             <option value="2023">2023</option>
             <option value="2024">2024</option>
             <option value="2025">2025</option>
             <option value="2026">2026</option>
             <option value="2027">2027</option>
             <option value="2028">2028</option>
             <option value="2029">2029</option>
             <option value="2030">2030</option>
            </select>
        @error('order_year')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>
        </div>
    <div class="text-xs-right">
    <input type="submit" class="btn btn-rounded btn-info" value="Chercher">
    </div>
    </form>
               </div>
               <!-- /.box-body -->
             </div>
             <!-- /.box -->
           </div>    <!-- /.col-md-4 -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

  </div>
@endsection
