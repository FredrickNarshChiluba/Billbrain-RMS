@extends('baselayout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Payments</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
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
                    <th>Amount (UGX)</th>
                    <th>Paid (UGX)</th>
                    <th>Balance (UGX)</th>
                    <th>Receipt ID</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($registrations as $registration)
                      <tr>
                        <td>{{ $registration->academic_year }}2</td>
                        <td> {{ $registration->semster }} </td>
                        <td>{{ $registration->student->course->name}}</td>
                        <td>{{ $registration->student->course->fees }}</td>
                        <td> {{ $registration->payment->amount}} </td>
                        <td>{{ $registration->student->course->fees - $registration->payment->amount}}</td>
                        <td>{{ $registration->payment->receipt_id }}</td>
                        <td>
                        @if (($payment->registration->student->course->fees - $payment->amount) == 0)
                                <button disabled class="btn btn-success">Fully Paid</button>
                              @elseif ($payment->amount == 0)
                                <a href=""  class="btn btn-danger">Not Paid</a>
                                @elseif ($payment->registration->student->course->fees - $payment->amount<=0)
                                <a href=""  class="btn btn-secondary">Fully Paid</a>
                              @else
                              <a href=""  class="btn btn-primary">Partially Paid</a>
                              @endif
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Academic Year</th>
                    <th>Semster</th>
                    <th>Course</th>
                    <th>Amount (UGX)</th>
                    <th>Paid (UGX)</th>
                    <th>Balance (UGX)</th>
                    <th>Receipt ID</th>
                    <th>Status</th>
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
  </div>
  <!-- /.content-wrapper -->

@endsection