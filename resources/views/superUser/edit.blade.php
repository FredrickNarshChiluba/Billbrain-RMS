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
    <div style="margin-bottom:10px;">
    <a  href="{{url('/registered-employees')}}"><button class="btn btn-primary">Registered Admin</button></a>
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
          <div> {{Session::get('success')}}</div>
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
        <form action="{{ route ('admin123.update', ['admin'=>$admin]) }}" enctype="multipart/form-data" method="post">
          @csrf
          @method('PUT')
          <div class="card-body">
            <h5>1.1: ADMIN’S PERSONAL INFORMATION</h5>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="course">Name:</label>
                  <input type="text" class="form-control" name="name" id="name" value="{{ $admin->name }}">
                </div>
                <div class="col-md-6  form-group">
                  <label for="country">Country of residence:</label>
                  <select class="form-control select2" placeholder="Select a Country" name="country" style="width: 100%;">
                  @if($admin->country)  
                  <option>{{ $admin->country }}</option>
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
                <input type="hidden" name="id" value="{{$admin->id}}">
                <div class=" col-md-6 form-group">
                  <label for="nationality">Nationality:</label>
                  <select class="form-control select2" placeholder="Select a Nationality" name="nationality" style="width: 100%;">
                  @if($admin->nationality)  
                  <option>{{ $admin->nationality }}</option>
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

            <h5>1.3: ADMIN’S CONTACT</h5>
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

            <h5>1.4 PARENTS/GUARDIAN’S (next of kin) CONTACT</h5>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="father_name">Father's (Guardian) Name:</label>
                  <input type="text" class="form-control" name="father_name" id="father_name" value="{{$admin->father_name}}">
                </div>
        
                <div class="form-group">
                  <label for="father_contact">Father's (Guardian) Contact:</label>
                  <input type="tel" class="form-control" name="father_contact" id="father_contact" value="{{$admin->father_contact}}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="mother_name">Mother's (Guardian) Name:</label>
                  <input type="text" class="form-control" name="mother_name" id="mother_name" value="{{$admin->mother_name}}">
                </div>
        
                <div class="form-group">
                  <label for="mother_contact">Mother (Guardian) Contact:</label>
                  <input type="tel" class="form-control" name="mother_contact" id="mother_contact" value="{{$admin->mother_contact}}">
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
            <a style="margin-left:30px;" href="{{url('/registered-employees')}}"><i class="fa fa-home mr-1"></i>Registered Admins</a>
    
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