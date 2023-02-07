@extends('baselayout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Register Payments</h3>

        </div>
        <!-- /.card-header -->
        <form action="{{ route ('payment.update', ['payment' => $payment]) }}" method="post">
          @csrf
          @method('PUT')
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$payment->registration->student->user->name}}" disabled>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="student_number">Student Number:</label>
                    <input type="text" class="form-control" name="student_number" id="student_number" value="20/BIT/003" disabled>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="academic_year">Academic Year:</label>
                    <input type="text" class="form-control" name="academic_year" id="academic_year" value="{{$payment->registration->academic_year}}" >
                  </div>
                  <div class="form-group col-md-6">
                    <label for="semster">Semster:</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="semster" id="name" value= "I" {{ $payment->registration->semster == 1 ? 'checked' : ''}} disabled>
                      <label style="margin-left: 20px;"  class="form-check-label">I</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="semster" id="name" value="II" {{ $payment->registration->semster == 2 ? 'checked' : ''}} disabled>
                      <label style="margin-left: 20px;"  class="form-check-label">II</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>Amount To Be Paid / Balance:</label>
                    <input type="number" class="form-control" value="{{$payment->registration->student->course->fees - $payment->amount}}" disabled>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="amount">Enter Amount:</label>
                    <input type="number" class="form-control" name="amount" id="amount">
                  </div>
                </div>
                <div class="form-group">
                  <label for="receipt_id">Receipt ID:</label>
                  <input disabled type="text" class="form-control" value="{{$payment->receipt_id}}" name="receipt_id" id="receipt_id">
                </div>
            </div>
            <button style="margin-left:20px" class="btn btn-primary" type="submit">Register</button>
          </div>
          <!-- /.card-body -->
        </form>
        
      </div>
      <!-- /.card -->

    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection