@extends('admin.layout.app')
<!-- Latest compiled and minified CSS -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->

<!-- jQuery library -->

<!-- Latest compiled JavaScript -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
@section('content')
    @if(Session::has('message'))
        <div class="alert alert-success">{{Session::get('message')}}</div>
    @endif
    <div class="card card-info">
        <script>

        </script>
        <div class="card-header">
            <h3 class="card-title">Edit Credit/Debit</h3>
        </div>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal frm" action="{{route('credit.update',$transaction->id)}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div class="card-body" id="card-body">
            <div class="row">
                <div class="form-group">
                    <div class="col-sm-12">
                        <select class="form-control txt" name="user">
                            <option value="0">Select User</option>
                            @foreach($users as $user)
                                <option
                                    value="{{$user->id}}"
                                    @if($transaction->user_id === $user->id) selected @endif>{{$user->f_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <select class="form-control " name="credit">
                            @foreach($types as $type)
                                <option value="{{$type}}"
                                        @if($type === $transaction->credit) selected @endif>{{$type}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group ">
                    <div class="col-sm-12">
                        <input type="text" name="cost" value="{{$transaction->cost}}" class="form-control"
                               placeholder="Enter Your Cost" required=""></div>
                </div>

                <div class="form-group">

                    <div class="col-sm-12">
                        <input type="text" name="remarks" value="{{$transaction->remarks}}" class="form-control txt"
                               placeholder="Enter Your Remarks">
                    </div>
                </div>

                <div class="form-group ">
                    <div class="col-sm-12">
                        <input type="date" name="date" class="form-control txt" placeholder="Enter Text"
                               value="{{date('Y-m-d', strtotime($transaction->date))}}"> </textarea>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-sm-12">
                        <input type="file" name="image" class="form-control" placeholder="Add Image">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label>Existing Image</label>
                    <div class="col-sm-12">
                        <img class="img-thumbnail img-rounded text-center" width="300" src="{{$transaction->image}}">
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-info form-control">Update</button>
        </div>
        <!-- /.card-footer -->
    </form>

@endsection
