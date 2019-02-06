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
            border: none !important;
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
                                        class="date-view">02-02-2019</strong> to
                                <strong class="date-view">09-02-2019</strong>
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
                                                   name="start_date" id="start_date" data-provide="datepicker"
                                                   placeholder="YYYY-MM-DD" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-5">
                                        <div class="form-group datetimepicker-conatiner">
                                            <label for="end_date" class="control-label">End Date</label>
                                            <input type="text" class="form-control  datepicker" date-format="Y-m-d"
                                                   name="end_date" id="end_date" data-provide="datepicker"
                                                   placeholder="YYYY-MM-DD" value=""></div>
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

                        <table id="attendances-table" class="table table-stripped table-bordered">
                            <thead>
                            <tr id="">
                                <th rowspan="2">Identifier</th>
                                <th rowspan="2">Name</th>
                                <th rowspan="2">Primary Text</th>
                                <th rowspan="2">Secondary Text</th>
                                <th rowspan="2">RFID</th>
                                <th colspan="3" class="no-sort ">01-02-2019</th>
                                <th colspan="3" class="no-sort shade">02-02-2019</th>
                                <th colspan="3" class="no-sort ">03-02-2019</th>
                                <th rowspan="2">Total Hour</th>
                            </tr>
                            <tr>
                                <th class="no-sort ">Entry</th>
                                <th class="no-sort ">Exit</th>
                                <th class="no-sort ">Hour</th>
                                <th class="no-sort shade">Entry</th>
                                <th class="no-sort shade">Exit</th>
                                <th class="no-sort shade">Hour</th>
                                <th class="no-sort ">Entry</th>
                                <th class="no-sort ">Exit</th>
                                <th class="no-sort ">Hour</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>21008-Tasnim</td>
                                <td></td>
                                <td>Tasnim</td>
                                <td>18001</td>
                                <td>0000827670</td>

                                <td class="">--</td>
                                <td class="">--</td>
                                <td class="">--</td>
                                <td class="shade">--</td>
                                <td class="shade">--</td>
                                <td class="shade">--</td>
                                <td class="">15:03</td>
                                <td class="">--</td>
                                <td class="">--</td>
                                <td>00:00</td>
                            </tr>
                            <tr>
                                <td>21008-Mahamud</td>
                                <td></td>
                                <td>Mahamud</td>
                                <td>18011</td>
                                <td>0008589455</td>

                                <td class="">--</td>
                                <td class="">--</td>
                                <td class="">--</td>
                                <td class="shade">09:51</td>
                                <td class="shade">--</td>
                                <td class="shade">--</td>
                                <td class="">10:34</td>
                                <td class="">19:08</td>
                                <td class="">08:33</td>
                                <td>08:33</td>
                            </tr>
                            <tr>
                                <td>21008-Zafar</td>
                                <td></td>
                                <td>Abu Zafar</td>
                                <td>18002</td>
                                <td>0008583992</td>

                                <td class="">--</td>
                                <td class="">--</td>
                                <td class="">--</td>
                                <td class="shade">09:54</td>
                                <td class="shade">--</td>
                                <td class="shade">--</td>
                                <td class="">--</td>
                                <td class="">--</td>
                                <td class="">--</td>
                                <td>00:00</td>
                            </tr>
                            <tr>
                                <td>21008-18030</td>
                                <td></td>
                                <td>Razzak</td>
                                <td>18030</td>
                                <td>0008577834</td>

                                <td class="">--</td>
                                <td class="">--</td>
                                <td class="">--</td>
                                <td class="shade">09:47</td>
                                <td class="shade">19:30</td>
                                <td class="shade">09:43</td>
                                <td class="">09:48</td>
                                <td class="">19:08</td>
                                <td class="">09:20</td>
                                <td>19:03</td>
                            </tr>
                            <tr>
                                <td>21008-18032</td>
                                <td></td>
                                <td>Abu Taleb</td>
                                <td>18032</td>
                                <td>0008589698</td>

                                <td class="">--</td>
                                <td class="">--</td>
                                <td class="">--</td>
                                <td class="shade">10:13</td>
                                <td class="shade">--</td>
                                <td class="shade">--</td>
                                <td class="">09:56</td>
                                <td class="">--</td>
                                <td class="">--</td>
                                <td>00:00</td>
                            </tr>
                            <tr>
                                <td>21008-Hannan</td>
                                <td></td>
                                <td>A Hannan</td>
                                <td>5500060</td>
                                <td>0000825304</td>

                                <td class="">--</td>
                                <td class="">--</td>
                                <td class="">--</td>
                                <td class="shade">--</td>
                                <td class="shade">--</td>
                                <td class="shade">--</td>
                                <td class="">09:44</td>
                                <td class="">--</td>
                                <td class="">--</td>
                                <td>00:00</td>
                            </tr>
                            <tr>
                                <td>21008-Saiful</td>
                                <td></td>
                                <td>Saiful</td>
                                <td>5500069</td>
                                <td>0000836104</td>

                                <td class="">--</td>
                                <td class="">--</td>
                                <td class="">--</td>
                                <td class="shade">10:08</td>
                                <td class="shade">--</td>
                                <td class="shade">--</td>
                                <td class="">09:50</td>
                                <td class="">19:08</td>
                                <td class="">09:17</td>
                                <td>09:17</td>
                            </tr>
                            <tr>
                                <td>21008-18000</td>
                                <td></td>
                                <td>Suvo</td>
                                <td>55000001</td>
                                <td></td>

                                <td class="">--</td>
                                <td class="">--</td>
                                <td class="">--</td>
                                <td class="shade">09:48</td>
                                <td class="shade">--</td>
                                <td class="shade">--</td>
                                <td class="">09:52</td>
                                <td class="">--</td>
                                <td class="">--</td>
                                <td>00:00</td>
                            </tr>
                            <tr>
                                <td>21016-Belal</td>
                                <td>Belal Uddin</td>
                                <td>Belal</td>
                                <td>5500067</td>
                                <td>0000839508</td>

                                <td class="">--</td>
                                <td class="">--</td>
                                <td class="">--</td>
                                <td class="shade">--</td>
                                <td class="shade">--</td>
                                <td class="shade">--</td>
                                <td class="">15:14</td>
                                <td class="">--</td>
                                <td class="">--</td>
                                <td>00:00</td>
                            </tr>
                            <tr>
                                <td>21016-A Rahim</td>
                                <td>A Rahim</td>
                                <td>A Rahim-00</td>
                                <td>5500091</td>
                                <td>0000805473</td>

                                <td class="">--</td>
                                <td class="">--</td>
                                <td class="">--</td>
                                <td class="shade">--</td>
                                <td class="shade">--</td>
                                <td class="shade">--</td>
                                <td class="">15:14</td>
                                <td class="">--</td>
                                <td class="">--</td>
                                <td>00:01</td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection