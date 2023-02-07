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
      <div class="card card-default" style="border-radius: 2em;">
        <div class="card-header">
          <h3 class="card-title">Register Student</h3>
        </div>
        <!-- /.card-header -->
        @if(Session::has('student_added'))
        <div class="alert alert-success" role="alert">
          <div> Student has been succesfully added.</div>
          </div>
        </div>
        @endif

        @if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
      @endif

        <form action="{{ route ('student.store') }}" enctype="multipart/form-data" method="post">
          @csrf
          <div class="card-body">

             
               

            <div class="form-group" id="country">
              <label for="country">Country of residence:</label>
              <select class="form-control select2" placeholder="Select a Country" name="country" style="width: 100%;" required>
                <!-- @foreach ($courses as $course)
                  <option>{{ $course->name }}</option>
                @endforeach -->
                <option value="">Select Country</option>
                <option>Uganda</option>
                <option>Kenya</option>
                <option>Sudan</option>
                <option>Rwanda</option>
                <option>Tanzania</option>
                <option>Burundian</option>
                <option>Eritrea</option>
                <option>DRC</option>
                <option>Somalia</option>
              </select>
            </div>

            <h5>Choice Of Intake</h5>
            <div class="row">

              <div class="col-md-12">
                <label for="intake">Intake:<label class="text-danger">*</label></label>
               
                <div class="form-group" id="intakeForm">
                  <div class="form-check @error('intake') is-invalid @enderror">
                  
                    <input class="form-check-input" type="radio" name="intake" id="" value="January" required>
                    <label style="margin-left: 20px;" class="form-check-label">January</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" type="radio" name="intake" id="name" value="May" required>
                    <label style="margin-left: 20px;" class="form-check-lxabel">May</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" type="radio" name="intake" id="" value="September" required>
                    <label style="margin-left: 20px;" class="form-check-label">September</label>
                  </div>
                  @error('intake') {{ $message }} @enderror
                </div>
              </div>
            </div>
            
            <div class="form-group" id="yearOfEnrollment">
                <label for="amount">Year of Enrollment:</label>
                <input type="date" class="form-control"  name="yearOfEnrollment" id="yearOfEnrollment" required>
              </div>

            
          
            <h5>1.1: STUDENT’S PERSONAL INFORMATION</h5>
            <div class="row">
              <div class="col-md-12">

                <div class="form-group">
                  <label for="studentID">Student Number:</label>
                  <input type="text" class="form-control @error('studentID') is-invalid @enderror" name="studentID" id="studentID" value=""readonly>
                  
                  @error('studentId') {{ $message }} @enderror
                </div>
                <div class="form-group">
                  <label for="course">Name:</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" required>
                  
                  @error('name') {{ $message }} @enderror
                </div>
                <div class="form-group">
                  <label for="gender">Gender:<label class="text-danger">*</label></label>
                  <div class="form-check @error('gender') is-invalid @enderror">
                    <input class="form-check-input" type="radio" name="gender" id="gender" value="Male" required>
                    <label style="margin-left: 20px;" class="form-check-label">Male</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gender" value="Female"required >
                    <label style="margin-left: 20px;" class="form-check-label">Female</label>
                  </div>
                  @error('gender') {{ $message }} @enderror
                </div>
                <div class="form-group">
                  <label for="date_of_birth">Date Of Birth:</label>
                  <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" id="date_of_birth" required>
                  @error('date_of_birth') {{ $message }} @enderror
                </div>
               
                <div class="form-group">
                  <label for="nationality">Nationality:</label>
                  <select class="form-control select2" placeholder="Select a Nationality" name="nationality" style="width: 100%;" required>
                    <!-- @foreach ($courses as $course)
                      <option>{{ $course->name }}</option>
                    @endforeach -->
                    <option value="">Select Nationality</option>
                    <option>Ugandan</option>
                    <option>Kenyan</option>
                    <option>Sudanese</option>
                    <option>Rwandan</option>
                    <option>Tanzanian</option>
                    <option>Burundian</option>
                    <option>Eritrean</option>
                    <option>DRC</option>
                    <option>Somali</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="district">Home District:</label>
                  <input type="text" class="form-control" name="district" id="district" required>
                </div>
                <div class="form-group">
                  <label for="Town">Town:</label>
                  <input type="text" class="form-control" name="Town" id="Town" required>
                </div>
                <div class="form-group">
                  <label for="postal">P.O Box:</label>
                  <input type="text" class="form-control" name="postal" id="postal">
                </div>
               

                <div class="form-group">
                  <label for="religion">Religion:</label>
                  <select class="form-control select2" placeholder="Select Religion" name="religion" id="religion" style="width: 100%;" required>
                    
                    <option value="">Select Religion</option>
                    <option>Anglican/Protestant</option>
                    <option>Muslim</option>
                    <option>Pentecost</option>
                    <option>Catholic</option>
                    <option>Other</option>
                    
                  </select>
                </div>

                <div class="form-group @error('marital_status') is-invalid @enderror">
                  <label for="marital_status">Marital Status:<label class="text-danger">*</label></label>
                  
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="marital_status" id="marital_status" value="Single" required>
                    <label style="margin-left: 20px;" class="form-check-label">Single</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="marital_status" id="marital_status" value="Married" required>
                    <label style="margin-left: 20px;" class="form-check-label">Married</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="marital_status" id="marital_status" value="Others" required>
                    <label style="margin-left: 20px;" class="form-check-label">Others</label>
                  </div>

                  @error('marital_status') {{ $message }} @enderror
                  <!-- <input type="text" class="form-control" name="marital_status" id="marital_status"> -->
                </div>
                <div class="form-group">
                  <label for="spouse_name">Spouse Name:</label>
                  <input type="text" class="form-control" name="spouse_name" id="spouse_name">
                </div>
        
                <div class="form-group">
                  <label for="spouse_contact">Spouse Contact:</label>
                  <input type="tel" class="form-control" name="spouse_contact" id="spouse_contact">
                </div>
              </div>
            </div>

            <h5>1.2: DISABILITY</h5>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group @error('disability') is-invalid @enderror">
                
                  <label for="disability">Do you have any disability?<label class="text-danger">*</label></label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="disability" id="name" value="Yes" required>
                    <label style="margin-left: 20px;" class="form-check-label">Yes</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="disability" id="name" value="No" required>
                    <label style="margin-left: 20px;" class="form-check-label">No</label>
                  </div>

                  @error('disability') {{ $message }} @enderror
                </div>
                <div class="form-group" disabled>
                  <label  for="nature_of_disability">Nature Of Disability:</label>
                  <input type="text" class="form-control" name="nature_of_disability" id="nature_of_disability">
                </div>
              </div>
            </div>


            
           

            <h5>SECTION 1</h5>
            <div class="row">
              <div class="col-md-12">

                
                <div class="form-group">
                  <label for="course">Programme Being Applied For:</label>
                  <select class="form-control select2 @error('course') is-invalid @enderror" placeholder="Select a course" name="course" style="width: 100%;" required>
                    <option>Select Programme</option>
                    @foreach ($courses as $course)
                      <option>{{ $course->name }}</option>
                    @endforeach
                  </select>
                  @error('intake') {{ $message }} @enderror
                </div>
               

                <label for="optional-course">Option:<label class="text-danger">*</label></label>
                <div class="form-group @error('delivery') is-invalid @enderror">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="optional_course" id="optional_course" value="Day" required>
                    <label style="margin-left: 20px;" class="form-check-label">Day</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="optional_course" id="optional_course" value="Evening" required>
                    <label  style="margin-left: 20px;"class="form-check-label">Evening</label>
                  </div>
                  @error('intake') {{ $message }} @enderror
                </div>

                <label for="delivery">Mode of Delivery:<label class="text-danger">*</label></label>
                <div class="form-group @error('delivery') is-invalid @enderror">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="delivery" id="name" value="Physical" required>
                    <label style="margin-left: 20px;" class="form-check-label">Physical</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="delivery" id="name" value="Online/Distance Learning" required>
                    <label  style="margin-left: 20px;"class="form-check-label">Online/Distance Learning</label>
                  </div>
                  @error('intake') {{ $message }} @enderror
                </div>
              </div>
            </div>

           

            <h5>1.3: STUDENT’S CONTACT</h5>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="email">Email:<label class="text-danger">*</label></label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
                <div class="form-group">
                  <label for="phone_1">Phone Number:<label class="text-danger">*</label></label>
                  <input type="tel" class="form-control" name="phone_1" id="phone_1" required>                
                </div>
                <div class="form-group">
                  <label for="phone_2">Alternative Phone Number:<label class="text-danger">*</label></label>
                  <input type="tel" class="form-control" name="phone_2" id="phone_2" >                 
                </div>
              </div>
            </div>

            <h5>1.4 PARENTS/GUARDIAN’S (next of kin) CONTACT</h5>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="father_name">Father's (Guardian) Name:</label>
                  <input type="father_name" class="form-control" name="father_name" id="father_name" >
                </div>
        
                <div class="form-group">
                  <label for="father_contact">Father's (Guardian) Contact:</label>
                  <input type="tel" class="form-control" name="father_contact" id="father_contact" >
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="mother_name">Mother's (Guardian) Name:</label>
                  <input type="text" class="form-control" name="mother_name" id="mother_name">
                </div>
        
                <div class="form-group">
                  <label for="mother_contact">Mother (Guardian) Contact:</label>
                  <input type="tel" class="form-control" name="mother_contact" id="mother_contact">
                </div>
              </div>
            </div>

            <h5>SECTION 3: SOURCE OF FUNDING<label class="text-danger">*</label></h5>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="sponsorship">Please indicate details of any scholarships, or Grant relating to the course for which you are applying.</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="sponsorship" id="sponsorship" value="Scholarship/funded" required>
                    <label style="margin-left: 20px;" class="form-check-label">Scholarship/Funded</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="sponsorship" id="sponsorship" value="Private" required>
                    <label style="margin-left: 20px;" class="form-check-label">Private</label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="image">Choose Profile Image</label>
                  <div style="margin-left:5px;" class="row">
                    <input type="file" class="btn btn-default col-md-10" name="file" onchange="previewFile(this)" required>
                    <img id="previewImg" alt="" style="max-width:130px; margin-top:20px; margin-bottom:20px;" required/>
                    @if($errors->has('profileImage'))
                      <strong>{{ $errors->first('profileImage') }}</strong>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            <input type="hidden" name="role" value="Student">
            <input type="hidden" name="password" value="password">
            <input type="hidden" name="academic_year" value="{{session('academic_year')}}">
            
            <button class="btn btn-primary" style="border-radius: 2em;" type="submit">Register</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" 
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" 
        crossorigin="anonymous" referrerpolicy="no-referrer">
</script>
<script>
  function previewFile(input){
    var file=$("input[type=file]").get(0).files[0];
    if(file){
      var reader = new FileReader();
      reader.onload = function(){
        $('#previewImg').attr("src",reader.result);
      }
      reader.readAsDataURL(file);
    }
  }

  const generateID = (year, intake, country, student_total) => {
    // const student_number = parseInt(student_total)+1
    return "BIT"+"/"+year.toString()+"/"+"0"+intake.toString()+"/"+country.toString()+"/"+student_total
  }

  

  document.getElementById("intakeForm").addEventListener('click', function(event) {
    const student_number = "{{ $studentid }}"
    if(event.target.value === "January"){
      intakeValue = 1
    }
    if(event.target.value === "May"){
      intakeValue = 5
    }
    if(event.target.value === "September"){
      intakeValue = 9
    }
    const id = generateID(yearValue, intakeValue, countryValue, student_number)
    document.getElementById("studentID").value = id
  })

  document.getElementById("country").addEventListener('input', function(event) {
    const student_number = "{{ $studentid }}"
    if(event.target.value === "Uganda"){
      countryValue = "U"
    }
    else{
      countryValue = "X"
    }
   
    const id = generateID(yearValue, intakeValue, countryValue, student_number)
    document.getElementById("studentID").value = id
  })

  document.getElementById("yearOfEnrollment").addEventListener('input', function(event) {
    const student_number = "{{ $studentid }}"
    const date = new Date (event.target.value)
    const yearValue = date.getFullYear().toString().slice(-2)
    
   
    const id = generateID(yearValue, intakeValue, countryValue, student_number)
    document.getElementById("studentID").value = id
  })


  </script>
  @if(Session::has('student_added'))
    <script>
      swal("Congratulations!","{!! Session::get('student_added') !!}","success",{
        button:"OK",
      })
    </script>
    
  @endif
<!-- /.content-wrapper -->
@endsection