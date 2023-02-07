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
          <h3 class="card-title">Register Accountant</h3>
          @if(Session::has('success'))
            <div style="color: green" class="alert alert-success">
                {{Session::get('success')}}
            </div>
          @endif

        </div>
        <!-- /.card-header -->
        <form action="{{ route ('admin123.update', ['admin'=>$accountant]) }}" enctype="multipart/form-data" method="post">
          @csrf
          @method('PUT')
          <div class="card-body">
            <h5>1.1: ACCOUNTANT'S PERSONAL INFORMATION</h5>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="course">Name:</label>
                  <input type="text" class="form-control" name="name" id="name" value="{{ $accountant->name }}">
                </div>
                <div class="form-group">
                  <label style="margin-left: 20px;" for="gender">Gender:</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gender" value="Male" {{ $accountant->gender == 'Male' ? 'checked' : ''}}>
                    <label style="margin-left: 20px;" style="margin-left: 20px;" class="form-check-label">Male</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gender" value="Female" {{ $accountant->gender == 'Female' ? 'checked' : ''}}>
                    <label style="margin-left: 20px;" class="form-check-label">Female</label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="date_of_birth">Date Of Birth:</label>
                  <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="{{$accountant->date_of_birth}}">
                </div>
                <div class="form-group">
                  <label for="religion">Religion:</label>
                  <input type="text" class="form-control" name="religion" id="religion" value="{{$accountant->religion}}">
                </div>
                <div class="form-group">
                  <label for="marital_status">Marital Status:</label>
                  <input type="text" class="form-control" name="marital_status" id="marital_status" value="{{$accountant->marital_status}}">
                </div>
                <div class="form-group">
                  <label for="spouse_name">Spouse Name:</label>
                  <input type="text" class="form-control" name="spouse_name" id="spouse_name" value="{{$accountant->spouse_name}}">
                </div>
        
                <div class="form-group">
                  <label for="spouse_contact">Spouse Contact:</label>
                  <input type="tel" class="form-control" name="spouse_contact" id="spouse_contact" value="{{$accountant->spouse_contact}}">
                </div>
              </div>
            </div>

            <h5>1.2: DISABILITY</h5>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="disability">Do you have any disability?</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="disability" id="name" value="Yes" {{ $accountant->disability == "Yes" ? 'checked' : ''}}>
                    <label style="margin-left: 20px;" class="form-check-label">Yes</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="disability" id="name" value="No" {{ $accountant->disability == "No" ? 'checked' : ''}}>
                    <label style="margin-left: 20px;" class="form-check-label">No</label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="nature_of_disability">Nature Of Disability:</label>
                  <input type="text" class="form-control" name="nature_of_disability" id="nature_of_disability" value="{{$accountant->nature_of_disability}}">
                </div>
              </div>
            </div>

            <h5>1.3: ACCOUNTANT’S CONTACT</h5>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" name="email" id="email" value="{{$accountant->email}}">
                </div>
                <div class="form-group">
                  <label for="phone_1">Phone Number:</label>
                  <input type="tel" class="form-control" name="phone_1" id="phone_1" value="{{$accountant->phone_1}}">                
                </div>
                <div class="form-group">
                  <label for="phone_2">Alt Phone Number:</label>
                  <input type="tel" class="form-control" name="phone_2" id="phone_2" value="{{$accountant->phone_2}}">                 
                </div>
              </div>
            </div>

            <h5>1.4 PARENTS/GUARDIAN’S (next of kin) CONTACT</h5>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="father_name">Father's (Guardian) Name:</label>
                  <input type="text" class="form-control" name="father_name" id="father_name" value="{{$accountant->father_name}}">
                </div>
        
                <div class="form-group">
                  <label for="father_contact">Father's (Guardian) Contact:</label>
                  <input type="tel" class="form-control" name="father_contact" id="father_contact" value="{{$accountant->father_contact}}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="mother_name">Mother's (Guardian) Name:</label>
                  <input type="text" class="form-control" name="mother_name" id="mother_name" value="{{$accountant->mother_name}}">
                </div>
        
                <div class="form-group">
                  <label for="mother_contact">Mother (Guardian) Contact:</label>
                  <input type="tel" class="form-control" name="mother_contact" id="mother_contact" value="{{$accountant->mother_contact}}">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                  <label style="margin-left:20px" for="image" class="col-form-label">Choose Profile Image</label>
                  <div style="margin-left:20px"><input type="file" name="file" onchange="previewFile(this)"></div>
                  <div style="margin-left:20px"><img id="previewImg" alt="profile image" src="{{ asset('images') }}/{{ $accountant->profileImage }}" style="max-width:130px; margin-top:20px; margin-bottom:20px;"/></div>
                  @if($errors->has('profileImage'))
                     <strong>{{ $errors->first('profileImage') }}</strong>
                  @endif
                 
                    </div>
                </div>
              </div>
            </div>
            
            <button class="btn btn-primary" type="submit">Update</button>
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