@extends('layout')
@section('title','Student Add')
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" data-background-color="red">
                        <h3 class="card-title">Add New Student</h3>
                    </div>

                    <form role="form" method="post" action="">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="id">Student ID</label>
                                        <input type="text" class="form-control" name="id" id="id"
                                               placeholder="Enter Student ID">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="rfid">RFID</label>
                                        <input type="text" class="form-control" name="rfid" id="rfid"
                                               placeholder="Enter RFID">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                               placeholder="Enter Name">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="roll">Roll</label>
                                        <input type="text" class="form-control" name="roll" id="roll"
                                               placeholder="Enter Roll">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname">Father Name</label>
                                        <input type="text" class="form-control" name="fname" id="fname"
                                               placeholder="Enter Father Name">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="mname">Mather Name</label>
                                        <input type="text" class="form-control" name="mname" id="mname"
                                               placeholder="Enter Mother Name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="classname">Class Name</label>
                                        <input type="text" class="form-control" name="classname" id="classname"
                                               placeholder="Enter Class Name">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="mobile_number">Mobile Number</label>
                                        <input type="text" class="form-control" name="mobile_number" id="mobile_number"
                                               placeholder="Enter Mobile Number">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea class="form-control" name="address" id="address"
                                                  placeholder="Enter Address"></textarea>
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