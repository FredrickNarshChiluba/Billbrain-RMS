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
            <h3 class="card-title">Edit Student</h3>

          </div>
          <!-- /.card-header -->
          <form action="{{ route ('student.update', ['student'=>$student])}}" enctype="multipart/form-data" method="post">
            @csrf
            @method('PUT')
            <div class="card-body">
              <h5>Choice Of Intake</h5>
              <div class="row">
                <div class="col-md-12">
                  <label for="intake">Intake:</label>
                  <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="intake" id="" value="January" {{ $student->intake == 'January' ? 'checked' : ''}}>
                      <label class="form-check-label">January</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" type="radio" name="intake" id="name" value="May" {{ $student->intake == 'May' ? 'checked' : ''}}>
                      <label class="form-check-label">May</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" type="radio" name="intake" id="" value="September" {{ $student->intake == 'September' ? 'checked' : ''}}>
                      <label class="form-check-label">September</label>
                    </div>
                  </div>
                </div>
              </div>
  
              <h5>SECTION 1</h5>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="course">Programme being applied for:</label>
                    <input type="text" class="form-control" name="course" id="course" value="{{$student->course->name }}">
                  </div>
                  <div class="form-group">
                    <label for="optional_course">Optional Course:</label>
                    <input type="text" class="form-control" name="optional_course" id="optional_course" value="{{$student->optional_course}}">
                  </div>
                  <label for="delivery">Mode of Delivery:</label>
                  <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="delivery" id="name" value="Weekend" {{ $student->delivery == 'Weekend' ? 'checked' : ''}}>
                      <label class="form-check-label">Weekend</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="delivery" id="name" value="Distance Learning" {{ $student->delivery == 'Distance Learning' ? 'checked' : ''}}>
                      <label class="form-check-label">Distance Learning</label>
                    </div>
                  </div>
                </div>
              </div>
  
              <h5>1.1: APPLICANT’S PERSONAL INFORMATION</h5>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="course">Name:</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$student->user->name}}">
                  </div>
                  <div class="form-group">
                    <label for="gender">Gender:</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gender" id="name" value="Male" {{ $student->user->gender == 'Male' ? 'checked' : ''}}>
                      <label class="form-check-label">Male</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gender" id="name" value="Female" {{ $student->user->gender == 'Female' ? 'checked' : ''}}>
                      <label class="form-check-label">Female</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="date_of_birth">Date Of Birth:</label>
                    <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="{{$student->user->date_of_birth}}">
                  </div>
                  <div class="form-group">
                    <label for="religion">Religion:</label>
                    <input type="text" class="form-control" name="religion" id="religion" value="{{$student->user->religion}}">
                  </div>
                  <div class="form-group">
                    <label for="marital_status">Marital Status:</label>
                    <input type="text" class="form-control" name="marital_status" id="marital_status" value="{{$student->user->marital_status}}">
                  </div>
                  <div class="form-group">
                    <label for="spouse_name">Spouse Name:</label>
                    <input type="text" class="form-control" name="spouse_name" id="spouse_name" value="{{$student->user->spouse_name}}">
                  </div>
          
                  <div class="form-group">
                    <label for="spouse_contact">Spouse Contact:</label>
                    <input type="text" class="form-control" name="spouse_contact" id="spouse_contact" value="{{$student->user->spouse_contact}}">
                  </div>
                </div>
              </div>
  
              <h5>1.2: DISABILITY</h5>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="disability">Do you have any disability?</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="disability" id="name" value="Yes" {{ $student->user->disability == 'Yes' ? 'checked' : ''}}>
                      <label class="form-check-label">Yes</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="disability" id="name" value="No" {{ $student->user->disability == 'No' ? 'checked' : ''}}>
                      <label class="form-check-label">No</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="nature_of_disability">Nature Of Disability:</label>
                    <input type="text" class="form-control" name="nature_of_disability" id="nature_of_disability" value="{{$student->user->nature_of_disability}}">
                  </div>
                </div>
              </div>
  
              <h5>1.3: APPLICANT’S CONTACT</h5>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{$student->user->email}}">
                  </div>
                  <div class="form-group">
                    <label for="phone_1">Phone Number:</label>
                    <input type="text" class="form-control" name="phone_1" id="phone_1" value="{{$student->user->phone_1}}">                
                  </div>
                  <div class="form-group">
                    <label for="phone_2">Alt Phone Number:</label>
                    <input type="text" class="form-control" name="phone_2" id="phone_2" value="{{$student->user->phone_2}}">                 
                  </div>
                </div>
              </div>
  
              <h5>1.4 PARENTS/GUARDIAN’S (next of kin) CONTACT</h5>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="father_name">Father's (Guardian) Name:</label>
                    <input type="father_name" class="form-control" name="father_name" id="father_name" value="{{$student->user->father_name}}">
                  </div>
          
                  <div class="form-group">
                    <label for="father_contact">Father's (Guardian) Contact:</label>
                    <input type="text" class="form-control" name="father_contact" id="father_contact" value="{{$student->user->father_contact}}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="mother_name">Mother's (Guardian) Name:</label>
                    <input type="text" class="form-control" name="mother_name" id="mother_name" value="{{$student->user->mother_name}}">
                  </div>
          
                  <div class="form-group">
                    <label for="mother_contact">Mother (Guardian) Contact:</label>
                    <input type="text" class="form-control" name="mother_contact" id="mother_contact" value="{{$student->user->mother_contact}}">
                  </div>
                </div>
              </div>
  
              <h5>SECTION 3: SOURCE OF FUNDING</h5>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="sponsorship">Please indicate details of any scholarships, or Grant relating to the course for which you are applying.</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="sponsorship" id="sponsorship" value="Government" {{ $student->sponsorship == 'Government' ? 'checked' : ''}}>
                      <label class="form-check-label">Government/Ministry</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="sponsorship" id="sponsorship" value="Private" {{ $student->sponsorship == 'Private' ? 'checked' : ''}}>
                      <label class="form-check-label">Private</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                  <label for="image" class="col-md-4 col-form-label">Choose Profile Image</label>
                  <div><input type="file" name="file" onchange="previewFile(this)"></div>
                  <div><img id="previewImg" alt="profile image" src="{{ asset('images') }}/{{ $student->user->profileImage }}" style="max-width:130px; margin-top:20px; margin-bottom:20px;"/></div>
                  @if($errors->has('profileImage'))
                     <strong>{{ $errors->first('profileImage') }}</strong>
                  @endif
                 
                    </div>
                </div>
              </div>
              <input type="hidden" name="role" value="Student">
              <input type="hidden" name="password" value="secret">
              
              <button class="btn btn-secondary" type="submit">Update</button>
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
  </script>
  @if(Session::has('success'))
  <script>
    swal("Congratulations!","{!! Session::get('success') !!}","success",{
      button:"OK",
    })
  </script>
  @endif
 
  <!-- /.content-wrapper -->
@endsection