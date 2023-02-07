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
          <h3 class="card-title">Register Lecturer</h3>
        </div>
       
        <!-- /.card-header -->
        @if(Session::has('student_added'))
        <div class="alert alert-success" role="alert">
          <div> Lecturer has been succesfully added.</div>
          </div>
        </div>
        @endif

        
        @if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
      @endif
        <form action="{{ route ('lecturer.store') }}" enctype="multipart/form-data" method="post">
          @csrf
          <div class="card-body">
           
            
           

            <h5>1.1: LECTURE’S PERSONAL INFORMATION</h5>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="course">Name:</label>
                  <input type="text" class="form-control" name="name" id="name" required>
                </div>
                <div class="form-group">
                  <label for="gender">Gender:</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gender" value="Male" required>
                    <label style="margin-left: 20px;" class="form-check-label">Male</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gender" value="Female" required>
                    <label style="margin-left: 20px;" class="form-check-label">Female</label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="date_of_birth">Date Of Birth:</label>
                  <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" required>
                </div>
                <div class="form-group">
                  <label for="country">Country of residence:</label>
                  <select class="form-control select2" placeholder=" Select a Country " name="country" style="width: 100%;" required>
                    <!-- @foreach ($courses as $course)
                      <option>{{ $course->name }}</option>
                    @endforeach -->
                    <option value="">Select Country</option>
                    <option>Uganda</option>
                    <option>Kenya</option>
                    <option>S.Sudan</option>
                    <option>Rwanda</option>
                    <option>Tanzania</option>
                    <option>Burundian</option>
                    <option>Eritrea</option>
                    <option>DRC</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="nationality">Nationality:</label>
                  <select class="form-control select2" placeholder=" Select a Nationality " name="nationality" style="width: 100%;" required>
                    <option value="">Select Nationality</option>
                    <option>Ugandan</option>
                    <option>Kenyan</option>
                    <option>S.Sudanise</option>
                    <option>Rwandan</option>
                    <option>Tanzanian</option>
                    <option>Burundian</option>
                    <option>Eritrean</option>
                    <option>DRC</option>
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
                  <label for="postal">P.O BOX:</label>
                  <input type="text" class="form-control" name="postal" id="postal">
                </div>
                <div class="form-group">
                  <label for="religion">Religion:</label>
                  <input type="text" class="form-control" name="religion" id="religion" required>
                </div>
                <div class="form-group">
                  <label for="marital_status">Marital Status:</label>
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
                  <!-- <input type="text" class="form-control" name="marital_status" id="marital_status"> -->
                </div>
                <div class="form-group">
                  <label for="spouse_name">Spouse Name:</label>
                  <input type="text" class="form-control" name="spouse_name" id="spouse_name" >
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
                <div class="form-group">
                  <label for="disability">Do you have any disability?</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="disability" id="name" value="Yes" required>
                    <label style="margin-left: 20px;" class="form-check-label">Yes</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="disability" id="name" value="No" required>
                    <label style="margin-left: 20px;" class="form-check-label">No</label>
                  </div>
                </div>
                <div class="form-group" disabled>
                  <label  for="nature_of_disability">Nature Of Disability:</label>
                  <input type="text" class="form-control" name="nature_of_disability" id="nature_of_disability">
                </div>
              </div>
            </div>

            <h5>1.3: LECTURE’S CONTACT</h5>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
                <div class="form-group">
                  <label for="phone_1">Phone Number:</label>
                  <input type="tel" class="form-control" name="phone_1" id="phone_1" required>                
                </div>
                <div class="form-group">
                  <label for="phone_2">Alt Phone Number:</label>
                  <input type="tel" class="form-control" name="phone_2" id="phone_2">                 
                </div>
              </div>
            </div>

            <h5>1.4 NEXT OF KIN CONTACT</h5>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="father_name">Next of kin (1) Name:</label>
                  <input type="father_name" class="form-control" name="nextOfKin1Name" id="nextOfKin1ContactName">
                </div>
        
                <div class="form-group">
                  <label for="father_contact">Next of kin (1) Contact:</label>
                  <input type="tel" class="form-control" name="nextOfKin1Contact" id="nextOfKin1Contact">
                </div>

                <div class="form-group">
                  <label for="father_contact">Next of kin (1) e-mail:</label>
                  <input type="email" class="form-control" name="nextOfKin1Email" id="nextOfKin1Email">
                </div>

                <div class="form-group">
                  <label for="father_contact">Next of kin (1) Address:</label>
                  <input type="address" class="form-control" name="nextOfKin1Address" id="nextOfKin1Address" >
                </div>

              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="mother_name">Next of kin (2) Name:</label>
                  <input type="text" class="form-control" name="nextOfKin2Name" id="nextOfKin2Name">
                </div>
        
                <div class="form-group">
                  <label for="mother_contact">Next of kin (2) Contact:</label>
                  <input type="tel" class="form-control" name="nextOfKin2Contact" id="nextOfKin2Contact">
                </div>

                <div class="form-group">
                  <label for="father_contact">Next of kin (2) e-mail:</label>
                  <input type="email" class="form-control" name="nextOfKin2Email" id="nextOfKin2Email">
                </div>

                <div class="form-group">
                  <label for="father_contact">Next of kin (2) Address:</label>
                  <input type="address" class="form-control" name="nextOfKin2Address" id="nextOfKin2Address">
                </div>
              </div>
            </div>

            <h5>1.3: ACADEMIC BACKGROUND</h5>
            <div class="row">
              <div class="col-md-12">
              <div class="form-group">
                  <label for="nationality">Qualification:</label>
                  <select class="form-control select2" placeholder=" Select a qualification " name="qualification" style="width: 100%;" required>
                    <option value="">Select Qualification</option>
                    <option>Primary</option>
                    <option>Lower Secondary - Ordinary Level</option>
                    <option>Upper Secondary - Advanced Level</option>
                    <option>Vocational/Technical</option>
                    <option>Bachelor</option>
                    <option>Master</option>
                    <option>Doctorate</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="phone_1">Year of Study:</label>
                  <select  class="form-control select2"  placeholder= "year" name="yearOfStudy" id="yearOfStudy" style="width: 100%;"  required> 
                    <option value="">Select Year Of Study</option>
                    <option value="{!! Form::selectYear('year', 1900, 2022) !!}</option>
                  </select>               
                </div>

                <div class="form-group">
                  <label for="phone_2">Institution:</label>
                  <input type="text" class="form-control" name="institution" id="institution" required>                 
                </div>

                <div class="form-group">
                  <label for="phone_2">Specialization:</label>
                  <input type="text" class="form-control" name="specialzation" id="specialzation" required>                 
                </div>
              </div>
            </div>




                <div class="form-group">
                  <label for="image">Choose Profile Image</label>
                  <div style="margin-left:5px;" class="row">
                    <input type="file" class="btn btn-default col-md-10" name="file" onchange="previewFile(this)" required>
                    <img id="previewImg" alt="" style="max-width:130px; margin-top:20px; margin-bottom:20px;"/>
                    @if($errors->has('profileImage'))
                      <strong>{{ $errors->first('profileImage') }}</strong>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            <input type="hidden" name="role" value="Lecturer">
            <input type="hidden" name="password" value="password">
            
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



<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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


@endsection