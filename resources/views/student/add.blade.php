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
                        <h3 class="card-title">Add New Student</h3>
                    </div>

                    <form role="form" method="post" action="">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="sid">Student ID</label>
                                        <input type="text" class="form-control" name="sid" id="sid"
                                               placeholder="Enter Student ID" value="{{getStudentId()}}">
                                        <span class="text-danger">{{errors('sid')}}</span>
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
                                        <label for="roll">Roll</label>
                                        <input type="text" class="form-control" name="roll" id="roll"
                                               placeholder="Enter Roll" value="{{old('roll')}}">
                                        <span class="text-danger">{{errors('roll')}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email">Email Address</label>
                                        <input type="text" class="form-control" name="email" id="email"
                                               placeholder="Enter Email Address" value="{{old('email')}}">
                                        <span class="text-danger">{{errors('email')}}</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="mobile_number">Mobile Number</label>
                                        <input type="text" class="form-control" name="mobile_number" id="mobile_number"
                                               placeholder="Enter Mobile Number" value="{{old('mobile_number')}}">
                                        <span class="text-danger">{{errors('mobile_number')}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname">Father Name</label>
                                        <input type="text" class="form-control" name="fname" id="fname"
                                               placeholder="Enter Father Name" value="{{old('fname')}}">
                                        <span class="text-danger">{{errors('fname')}}</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="mname">Mather Name</label>
                                        <input type="text" class="form-control" name="mname" id="mname"
                                               placeholder="Enter Mother Name" value="{{old('mname')}}">
                                        <span class="text-danger">{{errors('mname')}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="classname">Class Name</label>
                                        <select class="form-control" name="classname" id="classname">
                                            @foreach($classes as $class)
                                            <option value="{{$class->id}}" @if(old('classname') == $class->id) selected @endif>{{$class->classname}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{errors('classname')}}</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="section">Section Name</label>
                                        <select class="form-control" name="section" id="section">
                                            @foreach($sections as $section)
                                                <option value="{{$section->secid}}" @if(old('section') == $section->secid) selected @endif>{{$section->section}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{errors('section')}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="bdate">Date of Birth</label>
                                        <input type="text" class="form-control" name="bdate" id="bdate"
                                               placeholder="Enter Date of Birth" value="{{old('bdate')}}">
                                        <span class="text-danger">{{errors('bdate')}}</span>
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