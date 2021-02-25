@extends('admin.layout.app')
@section('content')
@if(Session::has('message'))
<div class="alert alert-success">{{Session::get('message')}}</div>
@endif
<div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit Report</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="{{route('report.update',$cradits->id)}}" method="post">
              @csrf
             {{ method_field('PATCH') }}
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Select User</label>
                    <div class="col-sm-10">
                    <select class="form-control" name="user">
                     <option value="0">Select User</option>
                     @foreach($users as $user)
                     <option value="{{$user->id}}" {{$cradits->user_id == $user->id  ? 'selected' : ''}}>{{$user->f_name}}</option>
                     @endforeach
                     </select>
                    </div>
                  </div>
                
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Select User</label>
                    <div class="col-sm-10">
                    <select class="form-control" name="credit">
                     <option disabled value="0">Select Credit</option>
                     
                     <option value="{{$cradits->credit}}" {{$cradits->credit  ? 'selected' : ''}}>{{$cradits->credit}}</option>
                    <option>ggg</option>
                     </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Select Date</label>
                    <div class="col-sm-10">
                      <input type="datetime-local" value="{{$cradits->date}}" name="date" class="form-control" id="inputEmail3">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Cost</label>
                    <div class="col-sm-10">
                      <input type="text" value="{{$cradits->cost}}" name="cost" class="form-control" id="inputEmail3">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Remarks</label>
                    <div class="col-sm-10">
                    <input type="hidden" name="image" value="{{$cradits->image}}" />
                      <input type="text" value="{{$cradits->remarks}}" name="remarks" class="form-control" id="inputEmail3">
                    </div>
                  </div>
              
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Update</button>
                 
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->

          </div>
@endsection