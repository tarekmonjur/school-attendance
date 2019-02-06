@extends('layout')
@section('title','Student Add')
@section('content')

  <!-- Main content -->
    <section class="content">
      <div class="row">
       <div class="col-6">
         <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">New Student</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
                  </div>
                  <div class="form-group">
                    <label for="">RFID</label>
                    <input type="text" class="form-control" name="rfid" id="rfid" placeholder="Enter RFID">
                  </div>
                  <div class="form-group">
                    <label for="">Mobile</label>
                    <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter Mobile">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>
          <!-- /.card -->
          
          
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

    @endsection