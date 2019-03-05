@extends('layout')
@section('title','Sms Logs')
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

                                <button type="submit" class="btn btn-danger btn-sm" name="action" value="export">
                                    <i class="fa fa-download"> </i> Export
                                </button>
                            </div>

                            <h4 class="title" style="color: white;">SMS Logs Info : <strong
                                        class="date-view">{{$from_date}}</strong> to
                                <strong class="date-view">{{$to_date}}</strong>
                            </h4>

                            <div class="clearfix"></div>

                            <div id="demo" class="collapse">
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="form-group datetimepicker-conatiner ">
                                            <label for="start_date" class="control-label">Start Date</label>
                                            <input type="text" class="form-control datepicker"
                                                   name="from_date" id="start_date" data-provide="datepicker"
                                                   placeholder="YYYY-MM-DD" value="{{$from_date}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-5">
                                        <div class="form-group datetimepicker-conatiner">
                                            <label for="end_date" class="control-label">End Date</label>
                                            <input type="text" class="form-control datepicker"
                                                   name="to_date" id="end_date" data-provide="datepicker"
                                                   placeholder="YYYY-MM-DD" value="{{$to_date}}"></div>
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

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>RFID</th>
                                    <th>Mobile</th>
                                    <th>Date</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sms_logs as $log)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$log->sid}}</td>
                                    <td>@if($log->student){{$log->student->name}}@endif</td>
                                    <td>{{$log->rf_id}}</td>
                                    <td>{{$log->mobile_number}}</td>
                                    <td>{{$log->date}}</td>
                                    <td>{{$log->body}}</td>
                                    <td>{{$log->status}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>SL</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>RFID</th>
                                <th>Mobile</th>
                                <th>Date</th>
                                <th>Message</th>
                                <th>Status</th>
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