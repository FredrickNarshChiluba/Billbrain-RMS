@extends('baselayout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    
  </section>
  <?php
  $student=App\Models\Student::all();
  ?>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default" style="border-radius: 2em;">
        <div class="card-header">
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
          <h3 class="card-title">Register Payments</h3>

        </div>
        <?php
        $stud= App\Models\Student::all();
        $rec=App\Models\Payment::all();
        $payment=App\Models\Payment::all();
        $num=0; $num++; $num=sprintf('%07d',$num);
        ?>
        <!-- /.card-header -->       
        
        <form action="{{ route ('payment.store') }}" method="post" id="pay">
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
              <div class="">
                
                <label for="course">student  RegNo:</label>
                  <select style="" class=" form-control select2 productname" placeholder="Select student  RegNo" id="studentID" name="studentID" style="width: 100%;" id="prod_cat_id">
		
                    <option value="0" disabled="true" selected="true">Select Student Reg N0</option>
                    @foreach($stud as $cat)
                      <option value="{{$cat->studentID}}">{{$cat->studentID}}</option>
                    @endforeach

                  </select> 
                

                <label  style="margin-bottom:10px;margin-top:20px" for="name">Name:</label>
                <input type="text" class="form-control name" name="name" id="name"  disabled>
                
                <label style="margin-bottom:10px;margin-top:20px" for="academic_year">Academic Year:</label>
                <input type="text" class="form-control academic_year" name="academic_year" id="academic_year" required>
                <input type="hidden" class="form-control registration_id" name="registration_id" id="registration_id">
              
                <div class="form-group">
                  <label  style="margin-bottom:10px;margin-top:20px" for="student_number">Student Number:</label>
                  <input type="text" class="form-control student_number" name="student_number" id="student_number"  disabled>
                </div>  
<!-- capturing course applied -->
                <div class="form-group">
                  <label  style="margin-bottom:10px;margin-top:20px" for="course">Course Applied:</label>
                  <input type="text" class="form-control course" name="course" id="course"  disabled>
                </div> 

                <div class="form-group">
                  <label  style="margin-bottom:10px;margin-top:20px" for="reason">Payment Reason:</label>
                  <input type="text" class="form-control reason" name="reason" id="reason"  required>
                </div> 
                
                <div class="row">
                <div class="col-md-6">                
                <div class="form-group">
                <label for="semster">Semester:</label>
                <div class="form-check" id="semesterNumber">
                  <input class="form-check-input" type="radio" name="semster" value="I" required>
                  <label style="margin-left: 20px;" class="form-check-label" for="semster">
                  One
                  </label>

                  <input class="form-check-input" type="radio" name="semster" value="II">
                  <label style="margin-left: 20px;" class="form-check-label" for="semster" required>
                    Two
                  </label>
                </div>
                </div>
                </div>
              </div>
<!-- capturing course fees -->
               
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="fees">Total Fees:</label>
                    <input required type="number" class="form-control fees" step="1" min="500" name="fees" id="fees" disabled>
                  </div>
                </div>
               
                <div class="col-md-6">
                <div class="form-group">
                  <label for="amount">Amount:</label>
                  <input required type="number" class="form-control amount" step="1" min="500" name="amount" id="amount" required>
                </div>
              </div> 
              <div class="row">
                <div class="col-md-6">                
                <div class="form-group">
                <label for="semster">Payment Mode:</label>
                <div class="form-check" id="mode">
                  <input class="form-check-input" type="radio" name="mode" value="Cash" required>
                  <label style="margin-left: 20px;" class="form-check-label" for="mode">
                  Cash
                  </label>

                  <input class="form-check-input" type="radio" name="mode" value="Cheque">
                  <label style="margin-left: 20px;" class="form-check-label" for="mode" required>
                  Cheque
                  </label>

                  <input class="form-check-input" type="radio" name="mode" value="Mobile Money">
                  <label style="margin-left: 20px;" class="form-check-label" for="mode" required>
                  Mobile Money
                  </label>

                  <input class="form-check-input" type="radio" name="mode" value="EFT/Online">
                  <label style="margin-left: 20px;" class="form-check-label" for="mode" required>
                  EFT/Online
                  </label>


                </div>
                </div>
                </div>
              </div>
            
             <div class="col-md-6">
                <div class="form-group">
                  <label for="amount">Receipt Number:</label>
                  <input required type="number" class="form-control @error('receipt_id') is-invalid @enderror"  name="receipt_id" id="receipt_id">
                  @error('receipt_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> 
                </div> 
                <div class="col-md-6">
                <div class="form-group">
                  <label for="amount">Receipt Date:</label>
                  <input type="date" class="form-control"  name="Receipt_Date" id="Receipt_Date" required>

                </div> 
                </div> 

               
                </div>
                
            <button class="btn btn-primary" style="border-radius: 2em;" type="submit"><i class="fa fa-fw fa-lg fa-save"></i>&nbsp;Register</button>
            <!-- <button style="margin-left: 50px; margin-top:20px;margin-bottom:15px" class="btn btn-success" type=""> url()->previous()-->
            <a style="color:blue;"href="{{ route('payment.index') }}"> <i class="fa fa-fw fa-lg fa-eye"></i> &nbsp;View Payment List</a> 
          <!-- </button> -->

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

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


<script type="text/javascript">
	$(document).ready(function(){


		$(document).on('change','.productname',function () {
			var prod_id=$(this).val();

			var a=$(this).parent();
			
			var op="";
			$.ajax({
				type:'get',
				url:'{!!URL::to('findPrice')!!}',
				data:{'id':prod_id},
				dataType:'json',//return data will be json
				success:function(data){

console.log(data);
					a.find('.student_number').val(data.p.studentID);
					a.find('.academic_year').val(data.p.academic_year);
          a.find('.name').val(data.data2.name);
          a.find('.course').val(data.p.course);
          a.find('.registration_id').val(data.registration.id);

				},
				error: function(e){
            console.log(e.responseText);
          }
			});

      $(document).on('click', '.semesterNumber', function(e) {
        const number = e.target.value
        const academic_year=$('.academic_year').val();
        const course_id=$('.course').val();

        $.ajax({
				type:'get',
				url:'{!!URL::to('semesterFees')!!}',
				data:{'year':academic_year, 'semester':number, 'course':course_id},
				dataType:'json',//return data will be json
				success:function(data){
          if(number === "I"){
            a.find('.fees').val(data.data.semester_1);
          }
          if(number === "II"){
            a.find('.fees').val(data.data.semester_2);
          }

				},
				error: function(e){
            console.log(e.responseText);
          }
			});
      })


		});

	});
</script>

@endsection