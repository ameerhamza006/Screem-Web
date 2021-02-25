@extends('admin.layout.app')
@section('content')

<div class="container">
    <div class="row">
    <div class="col-md-3">
      <div class="card-counter primary">
        <i class="fa fa-credit-card"></i>
        <span class="count-numbers">{{$count}}</span></span>
        <span class="count-name">Total Credit</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter danger">
        <i class="fa fa-database"></i>
        <span class="count-numbers">{{$counts}}</span>
        <span class="count-name">Total Debit</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter success">
        <i class="fa fa-credit-card"></i>
        <span class="count-numbers">{{$count}}</span>
        <span class="count-name">Monthly Credit</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter info">
        <i class="fa fa-database"></i>
        <span class="count-numbers">{{$counts}}</span>
        <span class="count-name">Monthly Debit</span>
      </div>
    </div>
  </div>
</div><style>.card-counter{
    box-shadow: 2px 2px 10px #DADADA;
    margin: 5px;
    padding: 20px 10px;
    background-color: #fff;
    height: 100px;
    border-radius: 5px;
    transition: .3s linear all;
  }

  .card-counter:hover{
    box-shadow: 4px 4px 20px #DADADA;
    transition: .3s linear all;
  }

  .card-counter.primary{
    background-color: #007bff;
    color: #FFF;
  }

  .card-counter.danger{
    background-color: #ef5350;
    color: #FFF;
  }  

  .card-counter.success{
    background-color: #66bb6a;
    color: #FFF;
  }  

  .card-counter.info{
    background-color: #26c6da;
    color: #FFF;
  }  

  .card-counter i{
    font-size: 5em;
    opacity: 0.2;
  }

  .card-counter .count-numbers{
    position: absolute;
    right: 35px;
    top: 20px;
    font-size: 32px;
    display: block;
  }

  .card-counter .count-name{
    position: absolute;
    right: 35px;
    top: 65px;
    font-style: italic;
    text-transform: capitalize;
    opacity: 0.5;
    display: block;
    font-size: 18px;
  }</style>
  <br>
    <br>  <br>
    <div class="container">
        <div class="row">
            <div class="col-sm-6"><div class="card">
              <div class="card-header">
                <h3 class="card-title">Recent Credit List
                <!--<span class="pull-right"><a href="#" class="btn btn-danger btn-sm">Download Pdf</a></span>-->
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    
                 <th>Users</th>
                    <th>Credit</th>
                    <th>Cost</th>
                    <th>Remarks</th>
                   
                   
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($users as $stat)
                  @if($stat->credit == 'Credit')
                
                  <tr class="trow">
                  
               
                  <td>{{$stat->f_name}}</td>
                    </td>
                  
              <td>{{$stat->credit}}</td>

                   <td>{{$stat->cost}}</td> 
                    <td>{{$stat->remarks}}</td>
                   
                    
                  </tr>
                  @endif
                  @endforeach
                 
                  </tbody>
             
                </table>
                 {{$users->links()}}
              </div>
              <!-- /.card-body -->
            </div></div >
 <div class="col-sm-6"><div class="card">
              <div class="card-header">
                <h3 class="card-title">Monthly Credit List  
                <!--<span class="pull-right"><a href="#" class="btn btn-danger btn-sm">Download Pdf</a></span>-->
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
         <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                
                 <th>Users</th>
                    <th>Credit</th>
                    <th>Cost</th>
                     <th>Remarks</th>
                    
                   
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($users as $stat)
                  @if($stat->credit == 'Credit')
                                    <tr>
         
                  <td>{{$stat->f_name}}</td>
                    </td>
                    
                    <td>{{$stat->credit}}</td>
                    <td>{{$stat->cost}}</td>
                    <td>{{$stat->remarks}}</td>
                
                  </tr>
                  @endif
                  @endforeach
                 
                  </tbody>
             
                </table>
                 {{$users->links()}}
              </div>
              <!-- /.card-body -->
            </div></div >
            </div></div>
            <div class="container">
        <div class="row">
            <div class="col-sm-6"><div class="card">
              <div class="card-header">
                <h3 class="card-title">Recent Debit List  
                <!--<span class="pull-right"><a href="#" class="btn btn-danger btn-sm">Download Pdf</a></span>-->
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                   
                 <th>Users</th>
                    <th>Debit</th>
                    <th>Cost</th>
                    <th>Remarks</th>
               
                    
                   
                  </tr>
                  </thead>
                  <tbody>
                 
                  @foreach($users as $stat)
                  @if($stat->credit == 'Debit')
                  <tr class="trow">
                
                   
                  <td>{{$stat->f_name}}</td>
                    </td>
                  
                    
                    <td>
                    {{$stat->credit}}</td>
                    <td>{{$stat->cost}}</td>
                   
                    <td>{{$stat->remarks}}</td>
                    <!-- <td><a href="{{action('App\Http\Controllers\Dashboards@pdf', $stat->id)}}">Download PDF</a></td> -->
                  </tr>
                  @endif
                  @endforeach
                
                  </tbody>
               
           
                </table>
                 {{$users->links()}}
              </div>
              <!-- /.card-body -->
            </div></div >
 <div class="col-sm-6"><div class="card">
              <div class="card-header">
                <h3 class="card-title">Monthly Debit List
                <!--<span class="pull-right"><a href="#" class="btn btn-danger btn-sm">Download Pdf</a></span>-->
                </h3></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                 <th>Users</th>
                    <th>Debit</th>
                    <th>Cost</th>
                    <th>Remarks</th>
                    
                   
                  </tr>
                  </thead>
                  <tbody>
         
                  @foreach($users as $stat)
                  @if($stat->credit == 'Debit')

                  <tr>
                   
                  <td>{{$stat->f_name}}</td>
                    </td>
                    <td>{{$stat->credit}}</td>
                    <td>{{$stat->cost}}</td>
                    <td>{{$stat->remarks}}</td>
                    
                  </tr>
                  @endif
                  @endforeach
                 
                  </tbody>
                  
                </table>
                 {{$users->links()}}
              </div>
              <!-- /.card-body -->
            </div></div >
            </div></div>
@endsection
@section('scripts')
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "paging":false,
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
   
  
                  var timers = { };

timers.marco = setTimeout(function() {
  $(this).parent('.trow > td').hide();
}, 88400);
// timers.marco = null;

// ...


</script>

@endsection