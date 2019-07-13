@extends('layout')
@section('title','Teacher List')
@section('content')
    <style>
        .card [data-background-color="red"] {
            background: linear-gradient(60deg, #ef5350, #e53935);
            box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(244, 67, 54, 0.4);
        }
        .card [data-icon-bg-color="red"] i {
            color: #f44336;
        }
        .card-header{
            border-bottom: 0px;
        }
        .table-responsive {
            padding-bottom: 20px;
        }
    </style>

    <!-- Main content -->
    <section class="content">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{session()->get('success')}}
            </div>
        @endif

        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{session()->get('error')}}
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" data-background-color="red">
                        <h4 class="title" style="color: white;">Teacher List Info :</h4>
                    </div>

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-responsive">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th width="120px">ID</th>
                                <th width="120px">RFID</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Education</th>
                                <th>National ID</th>
                                <th>Mobile</th>
                                <th>Salary</th>
                                <th>B.Group</th>
                                <th>Gender</th>
                                <th>Address</th>
                                <th width="100px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($teachers as $teacher)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <input type="text" style="width: 120px" id="sid_{{$teacher->em_id}}" value="{{$teacher->staff_id}}">
                                    </td>
                                    <td>
                                        <input type="text" style="width: 120px" id="rf_id_{{$teacher->em_id}}" value="{{$teacher->rf_id}}">
                                    </td>
                                    <td>{{$teacher->name}}</td>
                                    <td>{{$teacher->post}}</td>
                                    <td>{{$teacher->edu}}</td>
                                    <td>{{$teacher->nid}}</td>
                                    <td>{{$teacher->gsm}}</td>
                                    <td>{{$teacher->salary}}</td>
                                    <td>{{$teacher->bgroup}}</td>
                                    <td>{{$teacher->sex}}</td>
                                    <td>{{$teacher->address}}</td>
                                    <td>
                                        <a href="javascript:void(0)" onclick="saveTeacher({{$teacher->em_id}})" class="btn btn-sm btn-success">Save</a>
                                        <a href="{{url('/teachers/edit/'.$teacher->em_id)}}" class="btn btn-sm btn-primary">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>SL</th>
                                <th width="120px">ID</th>
                                <th width="120px">RFID</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Education</th>
                                <th>National ID</th>
                                <th>Mobile</th>
                                <th>Salary</th>
                                <th>B.Group</th>
                                <th>Gender</th>
                                <th>Address</th>
                                <th width="100px">Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection


@push('scripts')
    <script type="text/javascript">
        function saveTeacher(id) {
            var sid = document.getElementById('sid_'+id).value;
            var rfid = document.getElementById('rf_id_'+id).value;
            $.ajax({
               url: baseUrl+'/teachers/'+id,
               type: 'POST',
               dataType: 'json',
               data: {sid: sid, rf_id: rfid},
               success: function(data){
                   if(data.status == 'error') {
                       $.notify(data.message, {style: 'bootstrap', className: 'error'});
                   }else if(data.status == 'success') {
                       $.notify(data.message, {style: 'bootstrap', className: 'success'});
                   }
               },error: function (data) {
                    $.notify(data.message, {style: 'bootstrap', className: 'error'});
               }
            });
        }
    </script>
@endpush