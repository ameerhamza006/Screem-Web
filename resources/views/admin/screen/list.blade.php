@extends('admin.layout.app')
@section('content')
@if(Session::has('message'))
<div class="alert alert-success">{{Session::get('message')}}</div>
@endif
<p id="alert"></p>
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Screen List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>User</th>
                    <th>Date</th>
                    <th>Screen Location</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($screen as $stat)
                  <tr>
                    <td>{{$stat->id}}</td>
                    <td>{{$stat->f_name}}
                    </td>
                    <td>{{$stat->date}}</td>
                    <td>{{$stat->screen_location}}</td>
                    <td><a class="" type="button" id="editBtn" href="{{route('screen.edit',$stat->id)}}"><i class="fas fa-edit"></i></a>|<a id="deleteBtn" type="button" data-id="{{$stat->id}}"><i class="fas fa-trash-alt"></i></a></td>
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
        url:'screen/'+id,
        data:{
          "_token": "{{ csrf_token() }}",
          "id":id
        },
        success:function(response){
        
          
          $('#alert').html(response)
        }
      })
    })


  })
 
</script>
@endsection