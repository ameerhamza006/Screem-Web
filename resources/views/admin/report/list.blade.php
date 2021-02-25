@extends('admin.layout.app')
@section('content')
@if(Session::has('message'))
<div class="alert alert-success">{{Session::get('message')}}</div>

@endif
<p id="alert"></p>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" type="text/css" >
<script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>




<div class="card" >




              <div class="card-header">
              <form action="fff" method="POST">
                <div class="form-group row">
                    
                    <div class="col-lg-6">
                    <select class="form-control" name="user">
                     <option value="0">All</option>
                     @foreach($users as $user)
                   
                     <option value="{{$user->id}}">{{$user->f_name}}</option>
                     
                     @endforeach
                     </select>
                    </div>
                    <button type="submit" class="btn btn-success">Search</button>
                  </div>
                  

                  </form>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="studentsData" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>User</th>
                    <th>Type</th>
                    <th>Cost</th>
                    <th>Remarks</th>
                    
                  
                    <th>Date</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($cradits as $report)
                  <tr>
                    <td>{{$report->id}}</td>
                    <td>{{$report->f_name}}
                    </td>
                    <td>{{$report->credit}}</td>
                    <td>{{$report->cost}}</td>
                    <td>{{$report->remarks}}</td>
                   
                    <td>{{$report->date}}</td>
                   
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

$(document).ready(function() {

$('select[name="user_id"]').on('change', function() {

    var userID = $(this).val();

    if(userID) {




  $.ajax({
   url: 'report/'+userID,
   type: "GET",
   success:function(data) {
      console.log(data.students)
   }
});

    }

  })
  
});





















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
        url:'status/'+id,
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