@extends('admin.layout.app')
@section('content')
<div class="card">
              <div class="card-header">
                <h3 class="card-title"> Users Screen List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>User Name</th>
                    <th>User Location</th>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($userscreen as $userscreen)
                  <tr>
                    <td>{{$userscreen->id}}</td>
                    <td>{{$userscreen->f_name}}
                    </td>
                    <td>{{$userscreen->screen_location}}</td>
                    <td>{{$userscreen->date}}</td>
                    <td>{{$userscreen->name}}</td>
                    <td><a class="" type="button" id="editBtn" href="{{route('userscreen.edit',$userscreen->id)}}"><i class="fas fa-edit"></i></a>|<a id="deleteBtn" type="button" data-id="{{$userscreen->id}}"><i class="fas fa-trash-alt"></i></a></td>
                  </tr>
                  @endforeach
                 
                  </tbody>
                
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
</script>
@endsection