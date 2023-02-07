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
              <div class="card" style="border-radius: 2em;">
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
                      @foreach ($payments as $payment)
                      <tr>
                        <td>{{ $payment->academic_years}}</td>
                        <td>{{ $payment->semester}}</td>
                        <td>{{ $payment->course }}</td>
                        <td>
                          @if($payment->semester == "I")
                          <p>{{ $payment->semester_1}}</p>
                          @endif

                          @if($payment->semester == "II")
                          <p>{{ $payment->semester_2}}</p>
                          @endif
                        </td> 
                             
                          <td>{{ $payment->amount }}</td>

                              
                          <td>
                            @if($payment->payment_status == 0)
                              <p style="color:red">Partially Paid</p>
                            @endif
                            @if($payment->payment_status == 1)
                              <p style="color:green">Fully Paid</p>
                            @endif
                          </td>
                      </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>Academic Year</th>
                      <th>Semester</th>
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
@endsection