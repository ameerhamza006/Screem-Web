@extends('admin.layout.app')
@section('content')
<div class="card card-info">
@if(Session::has('message'))
<div class="alert alert-success">{{Session::get('message')}}</div>
@endif
              <div class="card-header">
                <h3 class="card-title">Add User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" id="userForm" action="{{route('users.store')}}" method="post">
              @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">First Name</label>
                    <div class="col-sm-10">
                      <input type="text" name="firstName" class="form-control" id="inputEmail3" placeholder="First Name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Last Name</label>
                    <div class="col-sm-10">
                      <input type="text" name="lastName" class="form-control" id="inputEmail3" placeholder="Last Name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="text" name="email" class="form-control" id="inputEmail3" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Phone No</label>
                    <div class="col-sm-10">
                      <input type="number" name="phone_no" class="form-control" id="inputPassword3" placeholder="Phone No">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                      <textarea type="text" name="address" class="form-control" id="inputPassword3" placeholder="Address"></textarea>
                    </div>
                  </div>
              
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit"  class="btn btn-info">Add User</button>
                 
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