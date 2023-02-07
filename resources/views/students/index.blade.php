@extends('baselayout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            @if(auth()->user()->role =='Lecturer')
            @else
              @if (auth()->user()->role != 'Accountant')
              <a href="{{ route('student.create') }}"><button class="btn btn-primary" style="border-radius: 2em;">Register Student</button></a>
              @endif
            @endif
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card" style="border-radius: 2em;">
              <div class="card-header">
                <h3 class="card-title">Student List</h3>
                @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
          <div> {{Session::get('success')}}</div>
          </div>
        </div>
        @endif
              </div>
              <?php
              $lect=App\Models\Lecture_Course_units::where(['user_id'=>auth()->user()->id])->get();
              $unit=App\Models\Course_unit::all();
              $cours=App\Models\Course::all();
              $stud= App\Models\Student::all();
              $rec=App\Models\Payment::all();
              $payment=App\Models\Payment::all();
              $num=0; $num++; $num=sprintf('%07d',$num);
              ?>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Course</th>
                    @if (auth()->user()->role =='Lecturer')
                    <th>Code</th>
                    <th> CU Code</th>
                    <th>CU Name</th>
                    <th>Year of Study</th>
                    <th>Semester</th>
                    @endif
                    @if (auth()->user()->role !=='Lecturer')
                    <th>Delivery</th>
                    <th>Intake</th>
                    <th>Update</th>
                    {{-- <th>Delete</th> --}}
                    @endif
                  </tr>
                  </thead>
                  <tbody>
                  @if (auth()->user()->role !='Lecturer')
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->studentID }}</td>
                            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="detailsButton" value="{{ $student->id }}">
                              {{ $student->user->name }}</button></td>
                            <td>{{ $student->course }}</td>
                            <td>{{ $student->delivery }}</td>
                            <td>{{ $student->intake }}</td>
                            <td><a href="{{ route('student.edit',['student'=>$student]) }}">Update</a></td>
                            {{-- <td>
                                <form action="{{ route('student.destroy',['student'=>$student]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button  class="btn btn-xs btn-danger show_confirm" type="submit" data-toggle="tooltip" title='Delete'>Delete</button>
                                </form>
                            </td> --}}
                        </tr>
                    @endforeach
                  @else
                  @foreach ($stud as $student)
                  @foreach ($cours as $cour)
                  @foreach ($unit as $units)
                  @foreach ($lect as $lec)
                      @if($student->course_id==$cour->id)
                      @if($units->course_code==$cour->code)
                      @if($units->course_unit_code==$lec->course_unit_code)
                            <tr>
                                <td>{{ $student->studentID }}</td>
                                {{-- <td><a href="{{ route('student.show' ,['student'=>$student]) }}">{{ $student->user->name }}</a></td> --}}
                                <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="detailsButton" value="{{ $student->id }}">
                                  {{ $student->user->name }}</button></td>
                                <td>{{ $student->course }}</td>

                                <td>{{ $units->course_code }}</td>
                                <td>{{ $units->course_unit_code }}</td>
                                <td>{{ $units->course_name }}</td>

                                <td>{{ $units->YearOfStudy }}</td>
                                <td>{{ $units->Semester }}</td>
                                <!-- <td><a href="{{ route('student.edit',['student'=>$student]) }}">View</a></td> -->
                                <!-- <td>
                                    <form action="{{ route('student.destroy',['student'=>$student]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button  class="btn btn-xs btn-danger show_confirm" type="submit" data-toggle="tooltip" title='Delete'>Delete</button>
                                    </form>
                                </td> -->
                            </tr>
                        @endif
                        @endif
                        @endif
                    @endforeach
                    @endforeach
                    @endforeach
                    @endforeach
                  @endif  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Course</th>
                    @if (auth()->user()->role =='Lecturer')
                    <th>Code</th>
                    <th> CU Code</th>
                    <th>CU Name</th>
                    <th>Year of Study</th>
                    <th>Semester</th>
                    @endif                    
                    @if (auth()->user()->role !=='Lecturer')
                    <th>Delivery</th>
                    <th>Intake</th>
                    <th>Update</th>
                    {{-- <th>Delete</th> --}}
                    @endif
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Student Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-4">
        
                  <!-- Profile Image -->
                  <div class="card card-primary card-outline" style="border-top-color: #f4a02e; width:460px;">
                    <div class="card-body box-profile">
                      {{-- <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                             src="{{ asset('images')}}/{{$student->user->profileImage }}" style="max-width:100px;"
                             alt="User profile picture">
                      </div> --}}
                      <div class="text-center">
                       <img class="profile-user-img img-fluid img-circle"   style="max-width:100px;" src="{{ asset('images')}}/" id="studentDetailsImage">
                       <input type="hidden" value="{{ asset('images')}}/" id="imageUrl"/>
                      </div>
                      <h3 class="profile-username text-center" id="studentDetailsName"></h3>
                      <p class="text-center"  id="studentDetailsStudentId"></p>
                      <p class="text-muted text-center" id="studentDetailsCourse"></p>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                  <!-- About Me Box -->
                  <div class="card card-primary" style="width:460px;" >
                    <div class="card-body" >
                      <strong>Intake</strong>
        
                      <p class="text-muted" id="studentDetailsIntake"></p>
        
                      <hr>
        
                      <strong></i>Academic Year</strong>
        
                      <p class="text-muted" id="studentDetailsYear"></p>
        
                      <hr>
        
                      <strong>Mode of Delivery</strong>
        
                      <p class="text-muted" id="studentDetailsDelivery"></p>
        
                      <hr>
        
                      <strong>Sponsorship</strong>
        
                      <p class="text-muted" id="studentDetailsSponsorship"></p>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col -->
                <div style="width:463px;">
                  <div class="card card-default">
                    <div class="card-header">
                      <h3 class="card-title">
                        <i class="fas fa-user"></i>
                        Personal Information
                      </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body"  style="width:460px;">
                      <div class="callout">
                        <div class="row">
                          <div class="col-md-6">
                            <h5>Name:</h5>
                          </div>
                          <div class="col-md-6">
                            <p id="studentDetailsNames"></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <h5>Country:</h5>
                          </div>
                          <div class="col-md-6">
                            <p id="studentDetailsCountry"></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <h5>Nationality:</h5>
                          </div>
                          <div class="col-md-6">
                            <p id="studentDetailsNationality"></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <h5>District:</h5>
                          </div>
                          <div class="col-md-6">
                            <p id="studentDetailsDistrict"></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <h5>Town:</h5>
                          </div>
                          <div class="col-md-6">
                            <p id="studentDetailsTown"></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <h5>Postal:</h5>
                          </div>
                          <div class="col-md-6">
                            <p id="studentDetailsPostal"></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <h5>Email:</h5>
                          </div>
                          <div class="col-md-6">
                            <p id="studentDetailsEmail"></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <h5>Phone Numbers:</h5>
                          </div>
                          <div class="col-md-6">
                            <p id="studentDetailsPhone_1"></p>
                            <p id="studentDetailsPhone_2"></p>
                          </div>
                        </div>  
                        <div class="row">
                          <div class="col-md-6">
                            <h5>Gender:</h5>
                          </div>
                          <div class="col-md-6">
                            <p id="studentDetailsGender"></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <h5>Date Of Birth:</h5>
                          </div>
                          <div class="col-md-6">
                            <p id="studentDetailsDate_of_birth"></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <h5>Religion:</h5>
                          </div>
                          <div class="col-md-6">
                            <p id="studentDetailsReligion"></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <h5>Marital Status:</h5>
                          </div>
                          <div class="col-md-6">
                            <p id="studentDetailsMarital_status"></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <h5>Spouse Name:</h5>
                          </div>
                          <div class="col-md-6">
                            <p id="studentDetailsSpouse_name"></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <h5>Spouse Contact:</h5>
                          </div>
                          <div class="col-md-6">
                            <p id="studentDetailsSpouse_contact"></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <h5>Disability:</h5>
                          </div>
                          <div class="col-md-6">
                            <p id="studentDetailsDisability"></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <h5>Nature of Disability:</h5>
                          </div>
                          <div class="col-md-6">
                            <p id="studentDetailsNature_of_disability"></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <h5>Father's (Guardian) Name:</h5>
                          </div>
                          <div class="col-md-6">
                            <p id="studentDetailsFather_name"></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <h5>Father's (Guardian) Contact:</h5>
                          </div>
                          <div class="col-md-6">
                            <p id="studentDetailsFather_contact"></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <h5>Mother's (Guardian) Name:</h5>
                          </div>
                          <div class="col-md-6">
                            <p id="studentDetailsMother_name"></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <h5>Mother's (Guardian) Contact:</h5>
                          </div>
                          <div class="col-md-6">
                            <p id="studentDetailsMother_contact"></p>
                          </div>
                        </div>
                      </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              
            </div>
          </div>
        </div>
      </div>
      
    </section>

    
    <!-- /.content -->
  </div>
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
  <script type="text/javascript">
  	$(document).ready(function(){

    $(document).on('click', "#detailsButton", function(e) {
      console.log(e.target.value)
      $.ajax({
				type:'get',
				url:'{!!URL::to('student_details')!!}',
				data:{'id':e.target.value},
				dataType:'json',//return data will be json
				success:function(data){
         
            document.getElementById("studentDetailsName").innerHTML=data.data.name
            document.getElementById("studentDetailsNames").innerHTML=data.data.name
            document.getElementById("studentDetailsStudentId").innerHTML=data.data.studentID
            document.getElementById("studentDetailsIntake").innerHTML=data.data.intake
            document.getElementById("studentDetailsYear").innerHTML=data.data.academic_year
            document.getElementById("studentDetailsDelivery").innerHTML=data.data.delivery
            document.getElementById("studentDetailsSponsorship").innerHTML=data.data.sponsorship
            document.getElementById("studentDetailsCountry").innerHTML=data.data.country
            document.getElementById("studentDetailsNationality").innerHTML=data.data.nationality
            document.getElementById("studentDetailsDistrict").innerHTML=data.data.district
            document.getElementById("studentDetailsPostal").innerHTML=data.data.postal
            document.getElementById("studentDetailsTown").innerHTML=data.data.Town
            document.getElementById("studentDetailsEmail").innerHTML=data.data.email
            document.getElementById("studentDetailsPhone_1").innerHTML=data.data.phone_1
            document.getElementById("studentDetailsPhone_2").innerHTML=data.data.phone_2
            document.getElementById("studentDetailsGender").innerHTML=data.data.gender
            document.getElementById("studentDetailsDate_of_birth").innerHTML=data.data.date_of_birth
            document.getElementById("studentDetailsReligion").innerHTML=data.data.religion
            document.getElementById("studentDetailsMarital_status").innerHTML=data.data.marital_status
            document.getElementById("studentDetailsSpouse_name").innerHTML=data.data.spouse_name
            document.getElementById("studentDetailsSpouse_contact").innerHTML=data.data.spouse_contact
            document.getElementById("studentDetailsDisability").innerHTML=data.data.disability
            document.getElementById("studentDetailsNature_of_disability").innerHTML=data.data.nature_of_disability
            document.getElementById("studentDetailsFather_name").innerHTML=data.data.father_name
            document.getElementById("studentDetailsFather_contact").innerHTML=data.data.father_contact
            document.getElementById("studentDetailsMother_name").innerHTML=data.data.mother_name
            document.getElementById("studentDetailsMother_contact").innerHTML=data.data.mother_contact
            // document.getElementById("studentDetailsImage").src={{ asset('images')}}/data.data.profileImage imageUrl
            const url = document.getElementById("imageUrl").value
             const source = document.getElementById("studentDetailsImage").src;
            document.getElementById("studentDetailsImage").src=url+data.data.profileImage
        },
				error: function(e){
            console.log(e.responseText);
          }
			});
    })
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
    });
  
  </script>
  <!-- /.content-wrapper -->

@endsection