@extends('admin.layout.app')
@section('content')
@if(Session::has('message'))
<div class="alert alert-success">{{Session::get('message')}}</div>
@endif
<div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Add User Screen</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="{{route('userscreen.store')}}" method="post">
              @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Select User</label>
                    <div class="col-sm-10">
                    <select class="form-control" name="user">
                     <option value="0">Select User</option>
                     @foreach($users as $user)
                     <option value="{{$user->id}}">{{$user->f_name}}</option>
                     @endforeach
                     </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">User Screen</label>
                    <div class="col-sm-10">
                    <select class="form-control" name="user">
                     <option value="0">User location</option>
                     @foreach($screen as $screen)
                     <option value="{{$user->id}}">{{$screen->screen_location}}</option>
                     @endforeach
                     </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Select Date</label>
                    <div class="col-sm-10">
                      <input type="datetime-local" name="date" class="form-control" id="inputEmail3">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                    <input type="text" name="date" class="form-control" id="inputEmail3">
                      
                    </div>
                  </div>
             
              
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Add</button>
                 
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->

          </div>
@endsection