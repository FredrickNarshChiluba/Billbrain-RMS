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
      <div style="margin-bottom:20px">
      <a href="{{url('/registered-employees')}}"><button class="btn btn-primary">Registered Admin</button></a>
      </div>

      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Register Admin</h3>
        </div>
        <!-- /.card-header -->
        @if(Session::has('student_added'))
        <div class="alert alert-success" role="alert">
          <div> {{Session::get('student_added')}}</div>
          </div>
        </div>
        @endif
        <form action="{{route('AdminStore')}}" enctype="multipart/form-data" method="post">
          @csrf
          <div class="card-body">
           
            <h5>SECTION 1</h5>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="course">User Role:</label>
                  <select required class="form-control select2" placeholder="Select user type" name="usertype" style="width: 100%;">
                   <option value="">Select Role</option>
                      <option >Accountant</option>
                      <option >Admin</option>
                      <option >Super User</option>
                    
                  </select>
                </div>
<!--                
                <label for="delivery">Mode of Delivery:</label>
                <div class="form-group">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="delivery" id="name" value="Weekend">
                    <label style="margin-left: 20px;" class="form-check-label">Physical</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="delivery" id="name" value="Distance Learning">
                    <label  style="margin-left: 20px;"class="form-check-label">Distance Learning</label>
                  </div>
                </div> -->
              </div>
            </div>

            <h5>1.1: ADMIN’S PERSONAL INFORMATION</h5>
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                <div class=" col-md-6 form-group">
                  <label for="course">Name:</label>
                  <input type="text" class="form-control" name="name" id="name" required>
                </div>
               
                <div class="col-md-6 form-group">
                  <label for="date_of_birth">Date Of Birth:</label>
                  <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" required>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6  form-group">
                  <label for="country">Country of residence:</label>
                  <select class="form-control select2" placeholder="Select a Country" name="country" style="width: 100%;" required>
                   
                    <option value="">select Country</option>
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
                <div class=" col-md-6 form-group">
                  <label for="nationality">Nationality:</label>
                  <select class="form-control select2" placeholder="Select a Nationality" name="nationality" style="width: 100%;" required>
                   
                    <option value="">select Nationality</option>
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
                </div>
                <div class="row">
                <div class="col-md-6 form-group">
                  <label for="district">Home District:</label>
                  <input type="text" class="form-control" name="district" id="district" required>
                </div>
                <div class=" col-md-6 form-group">
                  <label for="Town">Town:</label>
                  <input type="text" class="form-control" name="Town" id="Town" required>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6 form-group">
                  <label for="postal">P.O BOX:</label>
                  <input type="text" class="form-control" name="postal" id="postal" >
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
                </div>
                <div class="row">
                <div class="col-md-6 form-group">
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
                <div class="col-md-6 form-group">
                  <label for="marital_status">Marital Status:</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="marital_status" id="marital_status" value="Single" required>
                    <label style="margin-left: 20px;" class="form-check-label">Single</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="marital_status" id="marital_status" value="Married">
                    <label style="margin-left: 20px;" class="form-check-label">Married</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="marital_status" id="marital_status" value="Others">
                    <label style="margin-left: 20px;" class="form-check-label">Others</label>
                  </div>
                  <!-- <input type="text" class="form-control" name="marital_status" id="marital_status"> -->
                </div>
                </div>
               
               <div class="row">
               <div class=" col-md-6 form-group">
                  <label for="spouse_name">Spouse Name:</label>
                  <input type="text" class="form-control" name="spouse_name" id="spouse_name">
                </div>
        
                <div class="col-md-6 form-group">
                  <label for="spouse_contact">Spouse Contact:</label>
                  <input type="tel" class="form-control" name="spouse_contact" id="spouse_contact">
                </div>
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

            <h5>1.3: EMPLOYEE’S CONTACT</h5>
            <div class="row">
              <div class="col-md-12">
                  <div class="row">
                  <div class=" col-md-6 form-group">
                  <label for="phone_1">Phone Number:</label>
                  <input type="tel" class="form-control" name="phone_1" id="phone_1" required>                
                </div>
                <div class=" col-md-6 form-group">
                  <label for="phone_2">Alt Phone Number:</label>
                  <input type="tel" class="form-control" name="phone_2" id="phone_2">                 
                </div>
                  </div>
                  <div class="row">
                  <div class="col-md-6 form-group">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div> 
                  <div class=" col-md-6 form-group">
                  <label for="image">Choose Profile Image</label>
                  <div style="margin-left:5px;" >
                    <input type="file" class="btn btn-default col-md-12" name="file" onchange="previewFile(this)" required>
                    <img id="previewImg" alt="" style="max-width:130px; margin-top:20px; margin-bottom:20px;"/>
                    @if($errors->has('profileImage'))
                      <strong>{{ $errors->first('profileImage') }}</strong>
                    @endif
                  </div>
                </div>
                
                  </div>
                
                
              </div>
            </div>

            <h5>1.4 NEXT OF KIN CONTACT</h5>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="father_name">Father's  Name:</label>
                  <input type="father_name" class="form-control" name="father_name" id="father_name" >
                </div>
        
                <div class="form-group">
                  <label for="father_contact">Father's  Contact:</label>
                  <input type="tel" class="form-control" name="father_contact" id="father_contact" >
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="mother_name">Mother's  Name:</label>
                  <input type="text" class="form-control" name="mother_name" id="mother_name">
                </div>
        
                <div class="form-group">
                  <label for="mother_contact">Mother  Contact:</label>
                  <input type="tel" class="form-control" name="mother_contact" id="mother_contact">
                </div>
              </div>
            </div>

              
              </div>
            </div>
            <!-- <input type="hidden" name="role" value="Lecturer"> -->
            <input type="hidden" name="password" value="password">
            
            <button style="margin-left:20px; " class="btn btn-primary" type="submit">Register</button>
            <a style="margin-left:30px;" href="{{url('/registered-employees')}}">Registered Admin</a>
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
  @if(Session::has('student_added'))
    <script>
      swal("Congratulations!","{!! Session::get('student_added') !!}","success",{
        button:"OK",
      })
    </script>
    
  @endif
<!-- /.content-wrapper -->
@endsection