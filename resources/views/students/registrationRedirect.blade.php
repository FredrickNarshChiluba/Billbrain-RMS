@extends('baselayout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Payments</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Academic Year</th>
                      <th>Semester</th>
                      <th>Course</th>
                      <th>Total Fees (UGX)</th>
                      <th>Fees Paid</th>
                      <th>Status</th>
                      {{-- <th>Receipt ID</th> --}}
                     
                    </tr>
                    </thead>
                    <tbody>
                    <div class="callout">
                      <strong style="color:red">Please Register to be able to View your Payments.</strong>
                    
                      <a class="btn btn-primary" href="{{ route('registration.index') }}" >Register Here</a>
                  </div>
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>Academic Year</th>
                      <th>Semster</th>
                      <th>Course</th>
                      <th>Total Fees (UGX)</th>
                      <th>Fees Paid</th>
                      <th>Status</th>
                      {{-- <th>Receipt ID</th> --}}
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
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  </section>
    </div>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
@endsection