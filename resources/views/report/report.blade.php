@extends('layouts.app')
@section('title','Raporti')
@section('report','active')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid mt-4">

    <!-- Page Heading -->
    <div class="row">
      <div class="col-sm-6">
        <h1 class="h3 mb-4 text-gray-800">Raportet</h1>
      </div>
      <div class="col-sm-6 ">
          <a href="/report/create" class="btn btn-circle btn-success float-right"><i class="fa fa-plus"></i></a>
        </div>
    </div>
    
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Lista e raporteve</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="ReportdataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Pacienti</th>
                <th>Trajtimi</th>
                <th>Data</th>
                <th>Menaxhimi</th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->
@endsection