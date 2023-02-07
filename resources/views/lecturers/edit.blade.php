@extends('baselayout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<?php
        
        $course_code=App\Models\Course_unit::all();
        ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
    <div style="margin-bottom:10px;">
    <a  href="{{url('/Lecturer')}}"><button class="btn btn-primary">Registered Lecturers</button></a>
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
          <div> Lecturer detail has been succesfully updated.</div>
          </div>
        </div>
        @endif
     
    </div>     
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Update {{$admin->name}}'s Details</h3>

        </div>
        <!-- /.card-header -->
        <form action="{{ route ('lecturers.update') }}" enctype="multipart/form-data" method="post">
          @csrf
          <div class="card-body">
            <h5>1.1: LECTURER'S PERSONAL INFORMATION</h5>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="course">Name:</label>
                  <input type="text" class="form-control" name="name" id="name" value="{{ $admin->name }}">
                </div>
                <div class="col-md-6  form-group">
                  <label for="country">Country of residence:</label>
                  <select class="form-control select2" placeholder="Select a Country" name="country" style="width: 100%;">
                    
                  <option>{{ $admin->country }}</option>
                  
                    
                    <option>Uganda</option>
                    <option>Kenya</option>
                    <option>S.Sudan</option>
                    <option>Rwanda</option>
                    <option>Tanzania</option>
                    <option>Burundian/option>
                    <option>Eritrea</option>
                    <option>DRC</option>
                    
                  </select>
                </div>
                <input type="hidden" name="id" value="{{$admin->id}}">
                <div class=" col-md-6 form-group">
                  <label for="nationality">Nationality:</label>
                  <select class="form-control select2" placeholder="Select a Nationality" name="nationality" style="width: 100%;">
                    
                  <option>{{ $admin->nationality }}</option>
                  
                    
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
                
                <div class="col-md-6 form-group">
                  <label for="district">Home District:</label>
                  <input type="text" class="form-control" value="{{ $admin->district }}" name="district" id="district">
                </div>
                <div class=" col-md-6 form-group">
                  <label for="Town">Town:</label>
                  <input type="text" class="form-control" value="{{ $admin->Town }}" name="Town" id="Town">
</div>
                <div class="form-group col-md-6">
                  <label for="gender">Gender:</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gender" value="Male" {{ $admin->gender == 'Male' ? 'checked' : ''}}>
                    <label style="margin-left: 20px;" class="form-check-label">Male</label>
                    <input style="margin-left: 20px;" class="form-check-input" type="radio" name="gender" id="gender" value="Female" {{ $admin->gender == 'Female' ? 'checked' : ''}}>
                    <label style="margin-left: 40px;" class="form-check-label">Female</label>
                  </div>
                  <!-- <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gender" value="Female" {{ $admin->gender == 'Female' ? 'checked' : ''}}>
                    <label style="margin-left: 20px;" class="form-check-label">Female</label>
                  </div> -->
                </div>
                <div class="form-group col-md-6">
                  <label for="marital_status">Marital Status:</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="marital_status" id="marital_status" value="Single" {{ $admin->marital_status == "Single" ? 'checked' : ''}}>
                    <label style="margin-left: 20px;" class="form-check-label">Single</label>
                    <input style="margin-left: 20px;" class="form-check-input" type="radio" name="marital_status" id="marital_status" value="Married" {{ $admin->marital_status == "Married" ? 'checked' : ''}}>
                    <label style="margin-left: 40px;" class="form-check-label">Married</label>
                    <input style="margin-left: 20px;" class="form-check-input" type="radio" name="marital_status" id="marital_status" value="Others" {{ $admin->marital_status == "Others" ? 'checked' : ''}}>
                    <label style="margin-left: 40px;" class="form-check-label">Others</label>
                  </div>
                  <!-- <div class="form-check">
                    <input style="margin-left: 20px;" class="form-check-input" type="radio" name="marital_status" id="marital_status" value="Married">
                    <label style="margin-left: 40px;" class="form-check-label">Married</label>
                  </div>
                  <div class="form-check">
                    <input style="margin-left: 20px;" class="form-check-input" type="radio" name="marital_status" id="marital_status" value="Others">
                    <label style="margin-left: 40px;" class="form-check-label">Others</label>
                  </div> -->
                  <!-- <input type="text" class="form-control" name="marital_status" id="marital_status"> -->
                </div>
                
                <div class="form-group col-md-6 ">
                  <label for="date_of_birth">Date Of Birth:</label>
                  <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="{{$admin->date_of_birth}}">
                </div>
                <div class="form-group col-md-6 ">
                  <label for="religion">Religion:</label>
                  <input type="text" class="form-control" name="religion" id="religion" value="{{$admin->religion}}">
                </div>
                
                <div class="form-group col-md-6 ">
                  <label for="spouse_name">Spouse Name:</label>
                  <input type="text" class="form-control" name="spouse_name" id="spouse_name" value="{{$admin->spouse_name}}">
                </div>
        
                <div class="form-group col-md-6 ">
                  <label for="spouse_contact">Spouse Contact:</label>
                  <input type="tel" class="form-control" name="spouse_contact" id="spouse_contact" value="{{$admin->spouse_contact}}">
                </div>
              </div>
            </div>

            <div class=" form-group col-md-6 ">
                  <label for="CourseUnitCode">Course Unit Code:</label>
                  <select multiple class="form-control select2" placeholder="Select Course Unit Code" name="CourseUnitCode[]" style="width: 100%;" id="category">
      
                    <option selected>{{$courses->course_unit_code}}</option>
                    
                      @foreach ($course_code as $course)
                      <option>{{ $course->course_unit_code }}</option>
                    @endforeach
                  
                  </select>
                </div> 


            <h5>1.2: DISABILITY</h5>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group col-md-6">
                  <label for="disability">Do you have any disability?</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="disability" id="name" value="Yes" {{ $admin->disability == "Yes" ? 'checked' : ''}}>
                    <label style="margin-left: 20px;" class="form-check-label">Yes</label>

                    <input  style="margin-left: 20px;" class="form-check-input" type="radio" name="disability" id="name" value="No" {{ $admin->disability == "No" ? 'checked' : ''}}>
                    <label style="margin-left: 40px;" class="form-check-label">No</label>
                  </div>
                  <!-- <div class="form-check">
                    <input class="form-check-input" type="radio" name="disability" id="name" value="No" {{ $admin->disability == "No" ? 'checked' : ''}}>
                    <label style="margin-left: 20px;" class="form-check-label">No</label>
                  </div> -->
                </div>
                <div class="form-group col-md-6">
                  <label for="nature_of_disability">Nature Of Disability:</label>
                  <input type="text" class="form-control" name="nature_of_disability" id="nature_of_disability" value="{{$admin->nature_of_disability}}">
                </div>
              </div>
            </div>

            <h5>1.3: LECTURER’S CONTACT</h5>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group col-md-6">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" name="email" id="email" value="{{$admin->email}}">
                </div> 
                <div class="form-group col-md-6">
                  <label for="postal">P.O BOX:</label>
                  <input type="text" class="form-control" value="{{$admin->postal}}" name="postal" id="postal">
                </div>               
              </div>
              <div class="col-md-12">
              <div class="form-group col-md-6">
                  <label for="phone_1">Phone Number:</label>
                  <input type="tel" class="form-control" name="phone_1" id="phone_1" value="{{$admin->phone_1}}">                
                </div>
                <div class="form-group col-md-6">
                  <label for="phone_2">Alt Phone Number:</label>
                  <input type="tel" class="form-control" name="phone_2" id="phone_2" value="{{$admin->phone_2}}">                 
                </div>
              </div>
            </div>



            <h5>1.4 NEXT OF KIN CONTACT</h5>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="father_name">Next of kin (1) Name:</label>
                  <input type="father_name" class="form-control" name="nextOfKin1Name" id="nextOfKin1Name"  value="{{$lect->nextOfKin1Name}}">
                </div>
        
                <div class="form-group">
                  <label for="father_contact">Next of kin (1) Contact:</label>
                  <input type="tel" class="form-control" name="nextOfKin1Contact" id="nextOfKin1Contact" value="{{$lect->nextOfKin1Contact}}">
                </div>

                <div class="form-group">
                  <label for="father_contact">Next of kin (1) e-mail:</label>
                  <input type="email" class="form-control" name="nextOfKin1Email" id="nextOfKin1Email" value="{{$lect->nextOfKin1Email}}">
                </div>

                <div class="form-group">
                  <label for="father_contact">Next of kin (1) Address:</label>
                  <input type="address" class="form-control" name="nextOfKin1Address" id="nextOfKin1Address" value="{{$lect->nextOfKin1Address}}">
                </div>

              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="mother_name">Next of kin (2) Name:</label>
                  <input type="text" class="form-control" name="nextOfKin2Name" id="nextOfKin2Name" value="{{$lect->nextOfKin2Name}}" >
                </div>
        
                <div class="form-group">
                  <label for="mother_contact">Next of kin (2) Contact:</label>
                  <input type="tel" class="form-control" name="nextOfKin2Contact" id="nextOfKin2Contact" value="{{$lect->nextOfKin2Contact}}">
                </div>

                <div class="form-group">
                  <label for="father_contact">Next of kin (2) e-mail:</label>
                  <input type="email" class="form-control" name="nextOfKin2Email" id="nextOfKin2Email" value="{{$lect->nextOfKin2Email}}">
                </div>

                <div class="form-group">
                  <label for="father_contact">Next of kin (2) Address:</label>
                  <input type="address" class="form-control" name="nextOfKin2Address" id="nextOfKin2Address" value="{{$lect->nextOfKin2Address}}">
                </div>
              </div>
            </div>

            <h5>1.3: ACADEMIC BACKGROUND</h5>
            <div class="row">
              <div class="col-md-12">
              <div class="form-group">
                  <label for="nationality">Qualification:</label>
                  <select class="form-control select2" placeholder=" Select a qualification " name="qualification" style="width: 100%;">
        
                    <option>{{ $lect->qualification }}</option>
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
                  <select  class="form-control select2"  placeholder= "year" name="yearOfStudy" id="yearOfStudy" style="width: 100%;" >  
                  <option>{{ $lect->yearOfStudy }}</option>
                   <option value="">Select Year Of Study</option>
                    <option value="{!! Form::selectYear('year', 1900, 2022) !!}</option>
                  
                  </select>               
                </div>

                <div class="form-group">
                  <label for="phone_2">Institution:</label>
                  <input type="text" class="form-control" name="institution" id="institution" value="{{$lect->institution}}">                 
                </div>

                <div class="form-group">
                  <label for="phone_2">Specialization:</label>
                  <input type="text" class="form-control" name="specialzation" id="specialzation" value="{{$lect->specialzation}}">                 
                </div>

               
              </div>
            </div>





              <div class="">
                <div class="col-md-12">
                  <div class="form-group">
                  <label for="image">Choose Profile Image</label>
                  <div><input type="file" name="file" onchange="previewFile(this)"></div>
                  <div><img id="previewImg" alt="profile image" src="{{ asset('images') }}/{{ $admin->profileImage }}" style="max-width:130px; margin-top:20px; margin-bottom:20px;"/></div>
                  @if($errors->has('profileImage'))
                     <strong>{{ $errors->first('profileImage') }}</strong>
                  @endif
                 
                    </div>
                </div>
              </div>
            </div>
            
            <button class="btn btn-primary" type="submit">Update</button>
            <a style="margin-left:30px;" href="{{url('/Lecturer')}}">
            <!-- <button class="btn btn-primary"><i class="fa fa-home mr-1"></i> -->
            Registered Lecturers
          <!-- </button> -->
        </a>
    
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />


<script>
$(document).ready(function(){
$('#category').multiselect({
nonSelectedText: 'Select course_unit code',
enableFiltering: true,
enableCaseInsensitiveFiltering: true,
buttonWidth:'400px'
});
$('#category_form').on('submit', function(event){
event.preventDefault();
var form_data = $(this).serialize();
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$.ajax({
url:"{{ url('storelecturer_cu') }}",
method:"POST",
data:form_data,
success:function(data)
{
$('#category option:selected').each(function(){
$(this).prop('selected', false);
});
$('#category').multiselect('refresh');
alert(data['success']);
}
});
});
});
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