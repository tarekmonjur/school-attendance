@extends('layout')
@section('title','Settings')
@section('content')
    <style>
        .card [data-background-color="red"] {
            background: linear-gradient(60deg, #ef5350, #e53935);
            box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(244, 67, 54, 0.4);
            color: #ffffff
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
                        <h3 class="card-title">Application Settings</h3>
                    </div>

                    <form role="form" method="post" action="">
                        <div class="card-body">
                            {{--<div class="row">--}}
                                {{--<div class="col-6">--}}
                                    {{--<div class="form-group bootstrap-timepicker timepicker">--}}
                                        {{--<label for="sms_from_time">Attendance SMS From Time</label>--}}
                                        {{--<input type="text" class="form-control datepicker-time" name="sms_from_time"--}}
                                               {{--placeholder="Enter Attendance SMS From Time">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-6">--}}
                                    {{--<div class="form-group bootstrap-timepicker timepicker">--}}
                                        {{--<label for="sms_to_time">Attendance SMS To Time</label>--}}
                                        {{--<input type="text" class="form-control datepicker-time" name="sms_to_time" id="sms_to_time"--}}
                                               {{--placeholder="Enter Attendance SMS To Time">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="in_sms">Attendance In-Time SMS</label>
                                        <select class="form-control" name="in_sms" id="in_sms">
                                            <option value="0" @if($settings && $settings->in_sms == 0) selected @endif >Disable</option>
                                            <option value="1" @if($settings && $settings->in_sms == 1) selected @endif>Enable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="out_sms">Attendance Out-Time SMS</label>
                                        <select class="form-control" name="out_sms" id="out_sms">
                                            <option value="0" @if($settings && $settings->out_sms == 0) selected @endif >Disable</option>
                                            <option value="1" @if($settings && $settings->out_sms == 1) selected @endif >Enable</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="sms_duration">Attendance SMS Duration</label>
                                        <select class="form-control" name="sms_duration" id="sms_duration">
                                            <option value="0.15" @if($settings && $settings->sms_duration == 0.15) selected @endif >15 minute</option>
                                            <option value="0.5" @if($settings && $settings->sms_duration == 0.5) selected @endif >30 minute</option>
                                            <option value="1" @if($settings && $settings->sms_duration == 0.5) selected @endif >1 hour</option>
                                            <option value="1.5" @if($settings && $settings->sms_duration == 0.5) selected @endif >1 hour 30 minute</option>
                                            <option value="2" @if($settings && $settings->sms_duration == 0.5) selected @endif >2 hour</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" name="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

@endsection