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

    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
@if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default" style="border-radius: 2em;">
        <div class="card-header">
          <h3 class="card-title">Register Course</h3>

        </div>
        <!-- /.card-header -->
        <form action="{{ route ('course.store') }}" method="post">
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">

              <div class="form-group">
                  <label for="name">Level Of Study:</label>
                  <select required class="form-control select2" placeholder="Select a Level" name="LevelOfStudy" style="width: 100%;" required>
                      <option value=''> Select Level Of Study</option> 
                      <option>Bachelor</option>
                      <option>Diploma</option>
                      <option>Certificate</option>
                      <option>Short course</option>
                  </select>
                </div>

                <div class='row'>
                <div class=" col-md-6 form-group">
                  <label for="name">Course Name:</label>
                  <input type="text" class="form-control" name="name" id="name" required>
                </div>
                <div class=" col-md-6 form-group">
                  <label for="code"> Course Code:</label>
                  <input type="text" class="form-control" name="code" id="code" required>
                </div>
                </div>
                
                <div class="form-group">
                  <div class='row'>

                <div class="col-md-6 form-group">
                  <label for="name">Period</label>
                  <select required class="form-control select2" placeholder="Select a Semster" name="Period" style="width: 100%;" required>
                      <option value=''> Select Period</option> 
                      <option>Years </option>
                      <option>Months</option>
                      <option>Weeks</option>
                      <option>Days</option>
                  </select>
                </div>

                  <div class="col-md-6 form-group">
                  <label for="name">Number:</label>
                  <select required class="form-control select2" placeholder="Select a Semster" name="number" style="width: 100%;" required>
                      <option value=''> Select Number</option> 
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                      <option>6</option>
                      <option>7</option>
                      <option>8</option>
                      <option>9</option>
                      <option>10</option>
                  </select>
                </div>
                 <div class="col-md-6 form-group">
                 {{-- <label for="semster">Semester:</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="semster" id="" value="semester 1" required>
                    <label style="margin-left: 20px;" class="form-check-label">Semester 1</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="semster" id="" value="semester 2" required>
                    <label style="margin-left: 20px;" class="form-check-label">Semester 2</label>
                  </div>
                </div>
              </div>
              <div class='row'>
              <div class=" col-md-6 form-group">
                  <label for="functional_fees">Functional Fees:</label>
                  <input type="number" class="form-control"step="1" min="5000" name="functional_fees" id="functional_fees" value="0" oninput="sum()" required>
                </div>
                <div class=" col-md-6 form-group">
                  <label for="school_fees">School Fees:</label>
                  <input type="number" class="form-control" name="school_fees" id="school_fees" value="0" oninput="sum()" on required>
                </div>
              </div>
              </div>
                <div style="margin-bottom:20px" class="from-group">
                  <label for="fees">Course fees:</label>
                  <input type="number" class="form-control" name="fees" id="fees" readonly>
                </div> --}}
            <button class="btn btn-primary" style="border-radius: 2em;" type="submit">Register</button>
            <button style="margin-left: 50px; margin-top:20px;margin-bottom:15px;border-radius: 2em;" class="btn btn-success" type="">
            <a style="color:white;" href="{{ route('course.index') }}"> <i class="fa fa-fw fa-lg fa-eye"></i>View Course</a> </button>

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
{{-- <script>
function sum(){
  var num1 = parseInt(document.getElementById("functional_fees").value);
  var num2 = parseInt(document.getElementById("school_fees").value);
  document.getElementById("fees").value = num1 + num2;
  console.log(document.getElementById("fees").value);
}
</script> --}}