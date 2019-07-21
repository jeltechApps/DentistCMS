@extends('layouts.app')
@section('title','Users')
@section('user','active')
@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid mt-4">

          <!-- Page Heading -->
          <div class="row">
            <div class="col-sm-6">
              <h1 class="h3 mb-4 text-gray-800">Përdoruesit</h1>
            </div>
            <div class="col-sm-6 ">
                <a href="/user/create" class="btn btn-success float-right"><i class="fa fa-plus"></i> Krijo</a>
              </div>
          </div>
          
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Lista e përdoruesve</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Emri Mbiemri</th>
                      <th>Email</th>
                      <th>Password</th>
                      <th>Pozita</th>
                      <th>Menaxhimi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($users) > 0)
                    @foreach($users as $user)
                    <tr>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>********</td>
                      <td>{{$user->position}}</td>
                      <td>
                        <a href="/user/{{$user->id}}" class="btn btn-secondary"><i class="fa fa-eye"></i> Shiko</a>
                        <a href="/user/{{$user->id}}/edit"  class="btn btn-info"><i class="fa fa-pen"></i> Ndrysho</a>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#fshijModal{{$user->id}}"><i class="fa fa-trash"></i> Fshij</button>
                        <div class="modal fade" id="fshijModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="fshijModalLabel{{$user->id}}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="fshijModalLabel{{$user->id}}">Fshij Përdoruesin</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        A jeni i sigurtë që doni të vazhdoni?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Jo</button>
                                        <form class="d-inline" method="POST" action="{{ route('user.destroy',$user->id)}}" accept-charset="UTF-8">
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Fshij</button>
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                        </div> 
                      </td>
                      
                    </tr>
                    @endforeach
                    @else
                    <tr>
                      <td colspan="4">Nuk u gjetën përdorues</td>
                    </tr>
                    @endif
                  </tbody>
                </table>
                {{ $users->appends(request()->query())->links() }}
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

@endsection
