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
            <h2 style="font-size:18px" class="card-title">Edit {{$student->user->name }}'s Information</h2 style="font-size:18px">

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
                      <label style="margin-left: 20px;" class="form-check-label">January</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" type="radio" name="intake" id="name" value="May" {{ $student->intake == 'May' ? 'checked' : ''}}>
                      <label style="margin-left: 20px;" class="form-check-label">May</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" type="radio" name="intake" id="" value="September" {{ $student->intake == 'September' ? 'checked' : ''}}>
                      <label style="margin-left: 20px;" class="form-check-label">September</label>
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
                    <label for="course">Student Number:</label>
                    <input type="text" class="form-control" name="studentID" id="studentID" value="{{$student->studentID}}">
                  </div>

                  <div class="col-md-6  form-group">
                  <label for="country">Country of residence:</label>
                  <select class="form-control select2" placeholder="Select a Country" name="country" style="width: 100%;">
                  @if($student->user->country)  
                  <option>{{ $student->user->country }}</option>
                  @else
                    <option value="">select Country</option>
                    <option>Uganda</option>
                    <option>Kenya</option>
                    <option>S.Sudan</option>
                    <option>Rwanda</option>
                    <option>Tanzania</option>
                    <option>Burundian/option>
                    <option>Eritrea</option>
                    <option>DRC</option>
                    @endif
                  </select>
                </div>
                <input type="hidden" name="id" value="{{$student->user->id}}">
                <div class=" col-md-6 form-group">
                  <label for="nationality">Nationality:</label>
                  <select class="form-control select2" placeholder="Select a Nationality" name="nationality" style="width: 100%;">
                  @if($student->user->nationality)  
                  <option>{{ $student->user->nationality }}</option>
                  @else
                    <option value="">select Nationality</option>
                    <option>Ugandan</option>
                    <option>Kenyan</option>
                    <option>S.Sudanise</option>
                    <option>Rwandan</option>
                    <option>Tanzanian</option>
                    <option>Burundian</option>
                    <option>Eritrean</option>
                    <option>DRC</option>
                    @endif
                  </select>
                </div>
                
                  <div class="form-group">
                  <label for="district">Home District:</label>
                  <input type="text" class="form-control" value="{{$student->user->district}}" name="district" id="district" required>
                </div>
                <div class="form-group">
                  <label for="Town">Town:</label>
                  <input type="text" class="form-control" value="{{$student->user->Town}}" name="Town" id="Town" required>
                </div>
                <div class="form-group">
                  <label for="postal">P.O Box:</label>
                  <input type="text" class="form-control" value="{{$student->user->postal}}" name="postal" id="postal" required>
                </div>
                  
                  <div class="form-group">
                    <label for="gender">Gender:</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gender" id="name" value="Male" {{ $student->user->gender == 'Male' ? 'checked' : ''}}>
                      <label style="margin-left: 20px;" class="form-check-label">Male</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gender" id="name" value="Female" {{ $student->user->gender == 'Female' ? 'checked' : ''}}>
                      <label style="margin-left: 20px;" class="form-check-label">Female</label>
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
                      <label style="margin-left: 20px;" class="form-check-label">Yes</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="disability" id="name" value="No" {{ $student->user->disability == 'No' ? 'checked' : ''}}>
                      <label style="margin-left: 20px;" class="form-check-label">No</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="nature_of_disability">Nature Of Disability:</label>
                    <input type="text" class="form-control" name="nature_of_disability" id="nature_of_disability" value="{{$student->user->nature_of_disability}}">
                  </div>
                </div>
              </div>
              
  
              <h5>SECTION 1</h5>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="course">Programme Being Applied For:</label>
                    <select class="form-control select2" name="course1" id="course1">
                      @foreach(App\Models\Course::all() as $c)
                      <option value="{{ $c->id }}" {{$student->course_id == $c->id ? "selected" : "" }}>{{ $c->name}}</option>
                      @endforeach
                  </select>
                  </div>

                  <label for="optional-course">Option:</label>
                  <div class="form-group @error('delivery') is-invalid @enderror">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="optional_course" id="optional_course" value="Day" {{ $student->optional_course == 'Day' ? 'checked' : ''}} required>
                      <label style="margin-left: 20px;" class="form-check-label">Day</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="optional_course" id="optional_course" value="Evening" {{ $student->optional_course == 'Evening' ? 'checked' : ''}} required>
                      <label  style="margin-left: 20px;"class="form-check-label">Evening</label>
                    </div>
                    @error('intake') {{ $message }} @enderror
                  </div>

                  <label for="delivery">Mode of Delivery:</label>
                <div class="form-group @error('delivery') is-invalid @enderror">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="delivery" id="name" value="Physical" {{ $student->delivery == 'Physical' ? 'checked' : ''}} required>
                    <label style="margin-left: 20px;" class="form-check-label">Physical</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="delivery" id="name" value="Online/Distance Learning"  {{ $student->delivery == 'Online/Distance Learning' ? 'checked' : ''}} required>
                    <label  style="margin-left: 20px;"class="form-check-label">Online/Distance Learning</label>
                  </div>
                  @error('intake') {{ $message }} @enderror
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
                    <label for="email">Change Password:(Optional)</label>
                    <input type="password" class="form-control" name="password" id="password">
                  </div>
                  <div class="form-group">
                    <label for="phone_1">Phone Number:</label>
                    <input type="text" class="form-control" name="phone_1" id="phone_1" value="{{$student->user->phone_1}}">                
                  </div>
                  <div class="form-group">
                    <label for="phone_2">Alternative Phone Number:</label>
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
                      <input class="form-check-input" type="radio" name="sponsorship" id="sponsorship" value="Scholarship/funded" {{ $student->sponsorship == 'Scholarship/funded' ? 'checked' : ''}}>
                      <label style="margin-left: 20px;" class="form-check-label">Scholarship/Funded</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="sponsorship" id="sponsorship" value="Private" {{ $student->sponsorship == 'Private' ? 'checked' : ''}}>
                      <label style="margin-left: 20px;" class="form-check-label">Private</label>
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
              <!-- <input type="hidden" name="password" value="secret"> -->
              
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