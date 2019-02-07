@extends('layout')
@section('title','Student List')
@section('content')

  <!-- Main content -->
    <section class="content">
      <div class="row">
       


        <div class="col-12">
         <div class="card">
            <div class="card-header">
              <h3 class="card-title">Student Database</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Serial</th>
                  <th>Name</th>
                  <th>RFID</th>
                  <th>Mobile</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                   <tr>
                      <td>01</td>
                      <td>Abu Taleb</td>
                      <td>86521478</td>
                      <td>+8801779325718</td>
                      <td>
                         <a href="" class="btn btn-xs btn-success">
                            <i class="nav-icon fa fa-edit"></i>
                         </a>
                         <a href="" class="btn btn-xs btn-danger">
                            <i class="nav-icon fa fa-trash"></i>
                         </a>
                      </td>
                    </tr>
                    <tr>
                      <td>01</td>
                      <td>Abu Taleb</td>
                      <td>86521478</td>
                      <td>+8801779325718</td>
                      <td>
                         <a href="" class="btn btn-xs btn-success">
                            <i class="nav-icon fa fa-edit"></i>
                         </a>
                         <a href="" class="btn btn-xs btn-danger">
                            <i class="nav-icon fa fa-trash"></i>
                         </a>
                      </td>
                    </tr>
                    <tr>
                      <td>01</td>
                      <td>Abu Taleb</td>
                      <td>86521478</td>
                      <td>+8801779325718</td>
                      <td>
                         <a href="" class="btn btn-xs btn-success">
                            <i class="nav-icon fa fa-edit"></i>
                         </a>
                         <a href="" class="btn btn-xs btn-danger">
                            <i class="nav-icon fa fa-trash"></i>
                         </a>
                      </td>
                    </tr>
                    <tr>
                      <td>01</td>
                      <td>Abu Taleb</td>
                      <td>86521478</td>
                      <td>+8801779325718</td>
                      <td>
                         <a href="" class="btn btn-xs btn-success">
                            <i class="nav-icon fa fa-edit"></i>
                         </a>
                         <a href="" class="btn btn-xs btn-danger">
                            <i class="nav-icon fa fa-trash"></i>
                         </a>
                      </td>
                    </tr>
                    <tr>
                      <td>01</td>
                      <td>Abu Taleb</td>
                      <td>86521478</td>
                      <td>+8801779325718</td>
                      <td>
                         <a href="" class="btn btn-xs btn-success">
                            <i class="nav-icon fa fa-edit"></i>
                         </a>
                         <a href="" class="btn btn-xs btn-danger">
                            <i class="nav-icon fa fa-trash"></i>
                         </a>
                      </td>
                    </tr>
                    <tr>
                      <td>01</td>
                      <td>Abu Taleb</td>
                      <td>86521478</td>
                      <td>+8801779325718</td>
                      <td>
                         <a href="" class="btn btn-xs btn-success">
                            <i class="nav-icon fa fa-edit"></i>
                         </a>
                         <a href="" class="btn btn-xs btn-danger">
                            <i class="nav-icon fa fa-trash"></i>
                         </a>
                      </td>
                    </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>Serial</th>
                  <th>Name</th>
                  <th>RFID</th>
                  <th>Mobile</th>
                  <th>Action</th>
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