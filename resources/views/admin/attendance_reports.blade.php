@extends('layout')
@section('title','Student Add')
@section('content')

    <style>
        .card [data-background-color="red"] {
            background: linear-gradient(60deg, #ef5350, #e53935);
            box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(244, 67, 54, 0.4);
        }

        .card [data-icon-bg-color="red"] i {
            color: #f44336;
        }

        .select2-label-fix {
            margin-top: -12px !important;
        }

        .datetimepicker-conatiner {
            margin-top: -10px;
        }

        .bootstrap-datetimepicker-widget a[data-action] span {
            background-color: #ffffff;
            color: #9c27b0;
        }

        #filter-form {
            background: white;
            color: black;
            display: none;
            margin-left: -15px;
            margin-right: -15px;
            padding-left: 16px;
            padding-right: 16px;
        }

        .main-panel > .content {
            margin-top: 40px;
            min-height: calc(100vh - 93px);
        }

        #attendances-table th, #attendances-table td {
            text-align: center;
            font-size: 14px !important;
            border: none !important;
            border-left: 1px solid #ddd !important;
            border-bottom: 1px solid #ddd !important;
        }

        #attendances-table th:first-of-type, #attendances-table td:first-of-type {
            border-left: none;
        }

        #attendances-table th[colspan="2"] {
            min-width: 110px !important;
        }

        #attendances-table [aria-label="Start"]:after {
            display: none !important;
        }

        #attendances-table th.shade, #attendances-table td.shade {
            background-color: #f3f3f3;
        }

        #attendances-table td {
            padding-top: 4px !important;
            padding-bottom: 4px !important;
        }

        #attendances-table_filter input {
            box-shadow: none !important;
            margin-bottom: -20px;
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

                            <h4 class="title" style="color: white;">Attendance Sheet : <strong
                                        class="date-view">{{$from_date}}</strong> to
                                <strong class="date-view">{{$to_date}}</strong>
                            </h4>


                            <div class="clearfix"></div>


                            <div id="demo" class="collapse">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h5>Search Filters</h5>
                                    </div>
                                    <div class="col-sm-12 col-md-5">
                                        <div class="form-group datetimepicker-conatiner ">
                                            <label for="start_date" class="control-label">Start Date</label>
                                            <input type="text" class="form-control  datepicker" date-format="Y-m-d"
                                                   name="from_date" id="start_date" data-provide="datepicker"
                                                   placeholder="YYYY-MM-DD" value="{{$from_date}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-5">
                                        <div class="form-group datetimepicker-conatiner">
                                            <label for="end_date" class="control-label">End Date</label>
                                            <input type="text" class="form-control  datepicker" date-format="Y-m-d"
                                                   name="to_date" id="end_date" data-provide="datepicker"
                                                   placeholder="YYYY-MM-DD" value="{{$to_date}}"></div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class="pull-right">
                                            <button type="button" data-toggle="collapse" data-target="#demo"
                                                    class="btn btn-danger btn-sm search-form-toggle"><i
                                                        class="fa fa fa-angle-up"></i>
                                                Close
                                            </button>
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                    id="filter-results-button"><i
                                                        class="fa fa-search"></i> Filter
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </form>
                    </div>

                    <div class="card-body">
                        <?php
                        use Carbon\Carbon;
                        $toDate = Carbon::parse($to_date);
                        $day =  $toDate->diffInDays(Carbon::parse($from_date));
                        $header_from_date = $from_date;
                        ?>
                        <table id="attendances-table" class="table table-stripped table-bordered">
                            <thead>
                            <tr id="">
                                <th rowspan="2">Identifier</th>
                                <th rowspan="2">Name</th>
                                <th rowspan="2">RFID</th>
                                @for($i=0; $i<=$day; $i++)
                                <th colspan="3" class="no-sort ">
                                    <?php echo Carbon::parse($header_from_date)->format('M d Y (D)'); $header_from_date = Carbon::parse($header_from_date)->addDay(1); ?>
                                </th>
                                @endfor
                                <th rowspan="2">Total Hour</th>
                            </tr>
                            <tr>
                                @for($i=0; $i<=$day; $i++)
                                <th class="no-sort ">Entry</th>
                                <th class="no-sort ">Exit</th>
                                <th class="no-sort ">Hour</th>
                                @endfor
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($students as $student)
                            <tr>
                                <td>{{$student->sid}}</td>
                                <td>{{$student->name}}</td>
                                <td>{{$student->rf_id}}</td>
                                <?php $body_from_date = $from_date; ?>
                                @for($i=0; $i<=$day; $i++)
                                    @forelse($student->attendances as $attendance)
                                        <?php
                                        $date = Carbon::parse($body_from_date)->format('Y-m-d');
                                        $body_from_date = Carbon::parse($body_from_date)->addDay(1);
                                        if($date == $attendance->date){
                                        ?>
                                            <td class="">{{$attendance->in_time}} {{$day}}</td>
                                            <td class="">{{$attendance->out_time}}</td>
                                            <td class="">{{$attendance->total_hour}}</td>
                                        <?php }else {?>
                                            <td class="">--</td>
                                            <td class="">--</td>
                                            <td class="">--</td>
                                        <?php }?>

                                    @empty
                                        <td class="">--</td>
                                        <td class="">--</td>
                                        <td class="">--</td>
                                    @endforelse
                                @endfor
                                <td>00:00</td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection