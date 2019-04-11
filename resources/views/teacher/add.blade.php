@extends('layout')
@section('title','Teacher Add')
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
                        <h3 class="card-title">Add New Teacher</h3>
                    </div>

                    <form role="form" method="post" action="">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="staff_id">Staff ID</label>
                                        <input type="text" class="form-control" name="staff_id" id="staff_id"
                                               placeholder="Enter Staff ID" value="{{old('staff_id')}}">
                                        <span class="text-danger">{{errors('staff_id')}}</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="rf_id">RFID</label>
                                        <input type="text" class="form-control" name="rf_id" id="rf_id"
                                               placeholder="Enter RFID" value="{{old('rf_id')}}">
                                        <span class="text-danger">{{errors('rf_id')}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                               placeholder="Enter Name" value="{{old('name')}}">
                                        <span class="text-danger">{{errors('name')}}</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="nid">National ID</label>
                                        <input type="text" class="form-control" name="nid" id="nid"
                                               placeholder="Enter National ID" value="{{old('nid')}}">
                                        <span class="text-danger">{{errors('nid')}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="designation">Designation</label>
                                        <input type="text" class="form-control" name="designation" id="designation"
                                               placeholder="Enter Designation" value="{{old('designation')}}">
                                        <span class="text-danger">{{errors('designation')}}</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="edu">Education</label>
                                        <input type="text" class="form-control" name="edu" id="edu"
                                               placeholder="Enter Education" value="{{old('edu')}}">
                                        <span class="text-danger">{{errors('edu')}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="mobile_number">Mobile Number</label>
                                        <input type="text" class="form-control" name="mobile_number" id="mobile_number"
                                               placeholder="Enter Mobile Number" value="{{old('mobile_number')}}">
                                        <span class="text-danger">{{errors('mobile_number')}}</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="salary">Salary</label>
                                        <input type="text" class="form-control" name="salary" id="salary"
                                               placeholder="Enter Salary" value="{{old('salary')}}">
                                        <span class="text-danger">{{errors('salary')}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="bgroup">Blood Group</label>
                                        <input type="text" class="form-control" name="bgroup" id="bgroup"
                                               placeholder="Enter Blood Group" value="{{old('bgroup')}}">
                                        <span class="text-danger">{{errors('bgroup')}}</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select class="form-control" name="gender" id="gender">
                                            <option value="Male" @if(old('gender') == 'Male') selected @endif>Male</option>
                                            <option value="Female" @if(old('gender') == 'Female') selected @endif>Female</option>
                                        </select>
                                        <span class="text-danger">{{errors('gender')}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea class="form-control" name="address" id="address"
                                                  placeholder="Enter Address">{{old('address')}}</textarea>
                                        <span class="text-danger">{{errors('address')}}</span>
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