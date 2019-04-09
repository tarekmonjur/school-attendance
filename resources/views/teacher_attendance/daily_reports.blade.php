@extends('layout')
@section('title','Daily Report')
@section('content')
    <style>
        .card [data-background-color="red"] {
            background: linear-gradient(60deg, #ef5350, #e53935);
            box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(244, 67, 54, 0.4);
        }

        .card [data-icon-bg-color="red"] i {
            color: #f44336;
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

                                <button class="btn btn-danger btn-sm export">
                                    <i class="fa fa-download"> </i> Export
                                </button>
                            </div>

                            <h4 class="title" style="color: white;">Daily Attendance Sheet : <strong
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

                    <div class="card-body">
                        <?php
                        use Carbon\Carbon;
                        $toDate = Carbon::parse($to_date);
                        $day =  $toDate->diffInDays(Carbon::parse($from_date));
                        $header_from_date = $from_date;
                        ?>
                        <table id="attendances-table" class="table table-bordered table-responsive">
                            <thead>
                            <tr id="">
                                <th rowspan="2">Identifier</th>
                                <th rowspan="2" style="min-width: 150px">Name</th>
                                <th rowspan="2">RFID</th>
                                @for($i=0; $i<=$day; $i++)
                                <th colspan="3" class="no-sort ">
                                    <?php echo Carbon::parse($header_from_date)->format('M d Y (D)'); $header_from_date = Carbon::parse($header_from_date)->addDay(1); ?>
                                </th>
                                @endfor
                                <th rowspan="2" style="border-right: 1px solid #ddd !important">Total Hour</th>
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
                            <?php
                                foreach($teachers as $teacher) {
                                $total_hours = 0;
                                ?>
                                <tr>
                                    <td>{{$teacher->em_id}}</td>
                                    <td>{{$teacher->name}}</td>
                                    <td>{{$teacher->rf_id}}</td>
                                    <?php
                                        $body_from_date = $from_date;
                                        for($i=0; $i<=$day; $i++) {
                                            $attend = false;
                                            $date = Carbon::parse($body_from_date)->format('Y-m-d');
                                            $body_from_date = Carbon::parse($body_from_date)->addDay(1);
                                            foreach($teacher->teacher_attendances as $attendance) {
                                                if($date == $attendance->date) {
                                                    $attend = true; ?>
                                                    <td class="">{{$attendance->in_time}}</td>
                                                    <td class="">{{$attendance->out_time}}</td>
                                                    <td class="">{{$attendance->total_hour}}</td>
                                            <?php
                                                $total_hours += $attendance->total_hour;
                                                break;
                                                }
                                            }
                                            ?>

                                            @if($attend == false)
                                                <td class="">--</td>
                                                <td class="">--</td>
                                                <td class="">--</td>
                                            @endif
                                    <?php } ?>
                                    <td style="border-right: 1px solid #ddd !important">{{$total_hours}}</td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection