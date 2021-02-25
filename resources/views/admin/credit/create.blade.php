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
            <h3 class="card-title">Add Credit/Debit</h3>
            <button class="btn btn-default btn-sm btns" style="float: right" type="button" id="plus">Add New Row
            </button>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal frm" action="{{route('credit.store')}}" enctype="multipart/form-data"
              method="post">
            @csrf

            <div class="card-body" id="card-body">
                <div class="row" id="base-row">
                    <div class="form-group ">

                        <div class="col-sm-14">
                            <select class="form-control " name="data[0][user]">
                                <option value="0">Select User</option>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->f_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-14">
                            <select class="form-control " name="data[0][credit]">
                                <option>Credit/Debit</option>
                                @foreach($types as $type)
                                    <option value="{{$type}}">{{$type}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group ">

                        <div class="col-sm-12">
                            <input type="text" name="data[0][remarks]" class="form-control "
                                   placeholder="Enter Your Remarks" required>
                        </div>
                    </div>
                    <div class="form-group ">

                        <div class="col-sm-12">
                            <input type="text" name="data[0][cost]" class="form-control "
                                   placeholder="Enter Your Cost" required>
                        </div>
                    </div>
                    <div class="form-group ">

                        <div class="col-sm-14">
                            <input type="date" name="data[0][date]" class="form-control"
                                   placeholder="Enter Date" required>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-sm-14">
                            <input type="file" name="image_0" class="form-control" placeholder="Add Image" required>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info form-control">Add</button>

            </div>
            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->


    <script>
        $(document).ready(function () {
            var rowId = 1;
            $('#plus').click(function () {
                var textarea_append = $('#card-body')
                var row = '<div class="row" id="row-' + rowId + '">' +
                    '<div class="form-group ">' +
                    '<div class="col-sm-14">' +
                    '<select class="form-control " name="data[' + rowId + '][user]">' +
                    '<option value="0">Select User</option>' +
                    '@foreach($users as $user)<option value="{{$user->id}}">{{$user->f_name}}</option>@endforeach' +
                    '</select></div></div>' +
                    '<div class="form-group">' +
                    '<div class="col-sm-14">' +
                    '<select class="form-control " name="data[' + rowId + '][credit]">' +
                    '<option>Credit/Debit</option>@foreach($types as $type)<option>{{$type}}</option>@endforeach</select>' +
                    '</div></div>' +
                    '<div class="form-group"><div class="col-md-12" >' +
                    '<input type="text" name="data[' + rowId + '][remarks]" value="" class="form-control " placeholder="Enter Your Remarks">' +
                    '</div></div>' +
                    '<div class="form-group ">' +
                    '<div class="col-sm-12"> ' +
                    '<input type="text"  name="data[' + rowId + '][cost]" value="" class="form-control " placeholder="Enter Your Cost" required=""> ' +
                    '</div></div><div class="form-group"><div class="col-sm-12">' +
                    '<input type="date" name="data[' + rowId + '][date]" class="form-control txts" placeholder="Enter Text">   ' +
                    '</div>  </div><div class="form-group"><div class="col-sm-12">' +
                    '<input type="file" name="image_' + rowId + '" class="form-control txts" placeholder="Add Image">   ' +
                    '</div> </div><button type="button"id="butt" class="btn btn-xs btn-danger">' +
                    '<i class="glyphicon glyphicon-trash"></i>remove</button> </div>'

                textarea_append.append(row);
                rowId += 1;
            })
            $('#card-body').on('click', '#butt', function (e) {
                e.preventDefault();

                $(this).parent().remove();
            });
            //the above method will remove the user_data div

        })


    </script>
    <style>
        .txts {
            width: 200px;
        }

        #butt {

            height: 30px;
            margin-top: 8px;
        }
    </style>
@endsection
