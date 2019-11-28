@extends('layouts.app')
@section('title','Visit Create')
@section('visit','active')
@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
  <div class="card-body p-0">
    <div class="row">
      <div class="col-lg-5 d-none d-lg-block ">
        <img src="https://www.onlinelogomaker.com/blog/wp-content/uploads/2017/09/Dental-Logo-Design.jpg" class="img-fluid" />
      </div>
      <div class="col-lg-7">
        <div class="p-5">
          <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Shto Vizitë!</h1>
          </div>
          <form class="user" method="POST" action="{{ route('visit.store') }}">
            {{ csrf_field() }}
            <div class="form-group ">
              <label class="text-xs" for="pacient">Pacienti</label>
              <input  placeholder="Pacienti" class="form-control form-control-user" id="pacient" name="pacient"  data-toggle="modal" data-target="#pacientModal" />
              <input  hidden id="pacient-id"  name="pacient-id"/>
              <div class="modal fade" id="pacientModal" tabindex="-1" role="dialog" aria-labelledby="pacientModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="pacientModalLabel">Zgjedh Pacientin</h5>
                      <input type="text" class="form-controller float-right" id="searchPacient" placeholder="Kërko" name="searchPacient"/>
                    </div>
                    <div class="modal-body">
                      <table class="table table-bordered table-hover">
                        <thead class="bg-dark text-light">
                          <tr>
                            <th scope="col">Emri</th>
                            <th scope="col">Mbiemri</th>
                            <th scope="col">Numri Personal</th>
                            <th scope="col">Shto</th>
                          </tr>
                        </thead>
                        <tbody id="pacient-table-body">
                        </tbody>
                      </table>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Mbylle</button>
                    </div>
                  </div>
                </div>
              </div>
              @if ($errors->has('pacient'))
                <span class="help-block">
                  <strong>{{ $errors->first('pacient') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group ">
                      <label class="text-xs" for="user">Dentisti</label>
                      <input  placeholder="Dentisti" class="form-control form-control-user" id="user" name="user"  data-toggle="modal" data-target="#userModal" />
                      <input  hidden id="user-id"  name="user-id"/>
                      <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="userModalLabel">Zgjedh Dentistin</h5>
        <input type="text" placeholder="Kërko" class="form-controller float-right" id="searchUser" name="searchUser"/>
      </div>
      <div class="modal-body">
        
        <table class="table table-bordered table-hover">
          <thead class="bg-dark text-light">
          <tr>
          <th>Emri Mbiemri</th>
          <th>E-Mail</th>
          <th>Shto</th>
          </tr>
          </thead>
          <tbody id="user-table-body">
          </tbody>
        </table>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Mbylle</button>
      </div>
    </div>
  </div>
</div> 
                      @if ($errors->has('user'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('user') }}</strong>
                                        </span>
                                    @endif
              </div>
              <div class="form-group ">
                      <label class="text-xs"  for="data">Data e Vizites</label>
                      <input type="date" class="form-control form-control-user" required="" name="data" id="data" max="{{date('Y-m-d')}}" placeholder="Data e Terminit">
                      @if ($errors->has('data'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('data') }}</strong>
                                        </span>
                                    @endif
              </div>
              
              <div class="form-group">
                      <label class="text-xs"  for="time">Ora e Vizites</label>
                      <select class="form-control form-control-user" id="time" name="time" placeholder="Ora"> 
                        <option>08:00</option>
                        <option>08:30</option>
                        <option>09:00</option>
                        <option>09:30</option>
                        <option>10:00</option>
                        <option>10:30</option>
                        <option>11:00</option>
                        <option>11:30</option>
                        <option>12:00</option>
                        <option>12:30</option>
                        <option>13:00</option>
                        <option>13:30</option>
                        <option>14:00</option>
                        <option>14:30</option>
                        <option>15:00</option>
                        <option>15:30</option>
                        <option>16:00</option>
                        <option>16:30</option>
                        <option>17:00</option>
                        <option>17:30</option>
                        <option>18:00</option>
                        <option>18:30</option>
                        <option>19:00</option>
                        <option>19:30</option>
                      </select>
              </div>
                <button type="submit"  class="btn btn-primary btn-user btn-block">
                Regjistro
              </button>
            </form>
            <hr>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection