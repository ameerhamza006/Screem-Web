@extends('admin.layout.app')
@section('content')
@if(Session::has('message'))
<div class="alert alert-success">{{Session::get('message')}}</div>
@endif
<div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Update User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" id="userForm" action="{{route('users.update',$user->id)}}" method="post">
              @csrf
              {{ method_field('PATCH') }}
            
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">First Name</label>
                    <div class="col-sm-10">
                      <input type="text" name="firstName" class="form-control" value="{{$user->f_name}}" id="inputEmail3" placeholder="First Name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Last Name</label>
                    <div class="col-sm-10">
                      <input type="text" name="lastName" class="form-control" value="{{$user->l_name}}"  id="inputEmail3" placeholder="Last Name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="text" name="email" class="form-control" value="{{$user->email}}"  id="inputEmail3" placeholder="Email">
                    </div>
                  </div>
                 
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Phone No</label>
                    <div class="col-sm-10">
                      <input type="number" name="phone_no" class="form-control" id="inputPassword3" value="{{$user->phone_no}}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                      <textarea type="text" name="address" class="form-control" id="inputPassword3" placeholder="">{{$user->address}}</textarea>
                    </div>
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit"  class="btn btn-info">Update User</button>
                 
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->

          </div>
@endsection
@section('scripts')
<script>
$(document).ready(function(){
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

    $('#addBtn').click(function(){

        
        data = {
             data : $('userForm').serialize(),
        _token: "{{csrf_token()}}",
     
      };

        $.ajax({
            type:'POST',
            usrl:"{{URL::to('/users')}}",
            data:{
                _token:"{{ csrf_token() }}",
               
            },
            success:function(response){
                console.log(response)
            }
        })

    })
   

})
</script>
@endsection