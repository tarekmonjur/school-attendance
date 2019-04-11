@extends('layout')
@section('title','Dashboard')
@section('content')
 
 
<!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v2</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

 

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{$students}}</h3>
                  <p>Total Students</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
                <a href="{{url('students')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{$attends}}</h3>
                  <p>Today Total Attendances</p>
                </div>
                <div class="icon">
                  <i class="fa fa-clock-o"></i>
                </div>
                <a href="{{url('attendance/daily-reports')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{$absences}}</h3>
                  <p>Today Total Absences</p>
                </div>
                <div class="icon">
                  <i class="fa fa-calendar"></i>
                </div>
                <a href="{{url('attendance/daily-reports')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>{{$sms}}</h3>
                  <p>Today Total SMS</p>
                </div>
                <div class="icon">
                  <i class="fa fa-envelope"></i>
                </div>
                <a href="{{url('sms/logs')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <div class="row">
            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$student_cards}}</h3>
                <p>Total Student Cards</p>
              </div>
              <div class="icon">
                <i class="fa fa-address-card"></i>
              </div>
              <a href="{{url('students')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->

@endsection