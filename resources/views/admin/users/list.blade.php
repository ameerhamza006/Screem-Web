@extends('admin.layout.app')
@section('content')
<div class="card">
@if(Session::has('message'))
<div class="alert alert-success">{{Session::get('message')}}</div>
@endif
<p id="alert" class=""></p>
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                   
                    <th>PHONE NO</th>
                    <th>ADDRESS</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($users as $user)
                  <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->f_name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone_no}}</td>
                    <td>{{$user->address}}</td>
                    <td><a class="" type="button" id="editBtn" href="{{route('users.edit',$user->id)}}"><i class="fas fa-edit"></i></a>|<a id="deleteBtn" type="button" data-id="{{$user->id}}"><i class="fas fa-trash-alt"></i></a></td>
                  </tr>
                  @endforeach
             
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
@endsection
@section('scripts')
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
  $(document).ready(function(){
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  })
    
    $('#deleteBtn').click(function(){
      var id = $(this).data("id")

      $.ajax({
        type:'Delete',
        url:'users/'+id,
        data:{
          "_token": "{{ csrf_token() }}",
          "id":id
        },success:function(response){
          var output = ""
          output +="<p class="alert alert-success">'"+response+"'</p>"
          $('#alert').append(output)
        }
      })
    })

  })


</script>
@endsection