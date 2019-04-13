@extends('layout')
@section('title','Student List')
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
                        <form action="">
                            <div class="pull-right">
                                <button type="button" data-toggle="collapse" data-target="#demo"
                                        class="btn btn-danger btn-sm search-form-toggle"><i
                                            class="fa fa-search"></i>
                                    Filter Results
                                </button>

                                <button class="btn btn-danger btn-sm export">
                                    <i class="fa fa-download"> </i> Export
                                </button>
                            </div>

                            <h4 class="title" style="color: white;">Student List Info :
                                <strong>Class : <?php $cls = $classes->find($class_name); ?>{{ ($cls)?$cls->classname:'All Class' }} Students</strong>,
{{--                                <strong>{{ $class_section }}</strong>--}}
                            </h4>

                            <div class="clearfix"></div>

                            <div id="demo" class="collapse">
                                <div class="row">
                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group datetimepicker-conatiner ">
                                            <label for="start_date" class="control-label">Class </label>
                                            <select name="class_name" id="" class="form-control">
                                                <option value="">--All Class--</option>
                                                @foreach($classes as $value)
                                                    <option value="{{ $value->id }}">{{ $value->classname }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="pull-right">
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                    id="filter-results-button"><i
                                                        class="fa fa-search"></i> Filter
                                            </button>
                                            <button type="button" data-toggle="collapse" data-target="#demo"
                                                    class="btn btn-danger btn-sm search-form-toggle"><i
                                                        class="fa fa fa-angle-up"></i>
                                                Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th width="130px">ID</th>
                                <th width="130px">RFID</th>
                                <th>Roll</th>
                                <th>Name</th>
                                <th>F.Name</th>
                                <th>M.Name</th>
                                <th>Class</th>
                                <th>Section</th>
                                <th>Mobile</th>
                                <th>Gender</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <input type="text" id="sid_{{$student->id}}" value="{{$student->sid}}" style="width: 130px">
                                    </td>
                                    <td>
                                        <input type="text" id="rf_id_{{$student->id}}" value="{{$student->rf_id}}" style="width: 130px">
                                    </td>
                                    <td>{{$student->roll}}</td>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->fname}}</td>
                                    <td>{{$student->mname}}</td>
                                    <td>{{($student->class)?$student->class->classname:''}}</td>
                                    <td>{{($student->classSection)?$student->classSection->section:''}}</td>
                                    <td>{{$student->gsm}}</td>
                                    <td>{{$student->sex}}</td>
                                    <td>{{$student->address}}</td>
                                    <td>
                                        <a href="javascript:void(0)" onclick="saveStudent({{$student->id}})" class="btn btn-sm btn-success">Save</a>
                                        <a href="{{url('/students/edit/'.$student->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>SL</th>
                                <th width="150px">ID</th>
                                <th width="150px">RFID</th>
                                <th>Roll</th>
                                <th>Name</th>
                                <th>F.Name</th>
                                <th>M.Name</th>
                                <th>Class</th>
                                <th>Section</th>
                                <th>Mobile</th>
                                <th>Gender</th>
                                <th>Address</th>
                                <th>Action</th>
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
        function saveStudent(id) {
            var sid = document.getElementById('sid_'+id).value;
            var rfid = document.getElementById('rf_id_'+id).value;
            $.ajax({
               url: baseUrl+'/students/'+id,
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