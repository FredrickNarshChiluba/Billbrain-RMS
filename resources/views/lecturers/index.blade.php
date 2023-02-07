@extends('baselayout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          @if (auth()->user()->role != 'Accountant')
            <a href="{{ route('lecturer.create') }}"><button class="btn btn-primary" style="border-radius: 2em;">Register Lecturer</button></a>
            <a href="{{route('lecturer-cu')}}"><button class="btn btn-primary" style="border-radius: 2em;">Assign Course unit</button></a>
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
                <h3 class="card-title">Lecturer List</h3>
                @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                  <div> {{Session::get('success')}}</div>
                  </div>
                </div>
                @endif
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Employ ID</th>
                    <th>Lecture Name</th>
                    <th>Email</th>
                    <th>Country</th>
                    @if (auth()->user()->role != 'Accountant')
                    <th>Course unit</th>
                    <th>Edit</th>
                    
                    @endif
                  </tr>
                  </thead>
        <?php

      //$lecture_course_code=App\Models\Lecture_Course_units::all();
       use App\Models\Lecturer;
       use App\Models\Lecture_Course_units;
       use Illuminate\Database\Eloquent\Model;
    
    
       
       ?>
                  <tbody>
                    @foreach ($students as $student)
                    <?php
                    $lecture_course_code= App\Models\Lecture_Course_units::where('user_id', $student->user->id)->get();
                    $course_code=App\Models\Course_unit::all();
                    echo ('hello');
                    ?>
                        <tr>
                            <td>{{ $student->EmployID }}</td>
                            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="detailsButton" value="{{ $student->id }}">
                              {{ $student->user->name }}</button></td>
                            <td>{{ $student->user->email }}</td>
                            <td>{{ $student->user->country }}</td>
                            @if (auth()->user()->role != 'Accountant')
                           
                            <td>
                           
                            @foreach ($lecture_course_code as $lc)
                              <p style=" overflow: hidden;
                              display: block-level-block;
                              text-overflow: ellipsis;
                              white-space: nowrap;
                              width:90px; ">{{ $lc->course_unit_code}}</p>
              
                            @endforeach
                            </td>

                            
                          
                            <td><a href="{{ route('lecturers.edit',$student->user_id) }}">Edit</a></td>
                            {{-- <td>
                                <form action="{{ route('lecturer.destroy',['lecturer'=>$student]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button  class="btn btn-xs btn-danger show_confirm" type="submit" data-toggle="tooltip" title='Delete'>Delete</button>
                                </form>
                            </td> --}}
                            @endif
                        </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Employ ID</th>
                    <th>Lecture Name</th>
                    <th>Email</th>
                    <th>Country</th>
                    @if (auth()->user()->role != 'Accountant')
                    <th>Course unit</th>
                    <th>Edit</th>
                    
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
              <h5 class="modal-title" id="exampleModalLabel">Lectuer Details</h5>
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
                      
                      <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"   style="max-width:100px;" src="{{ asset('images')}}/" id="studentDetailsImage">
                        <input type="hidden" value="{{ asset('images')}}/" id="imageUrl"/>
                       </div>
                      <h3 class="profile-username text-center" id="lecturerDetailsName"></h3>
                      <p class="text-center"  id="lecturerDetailsEmployId"></p>
                      
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                  <!-- About Me Box -->
                  <div class="card card-primary" style="width:460px;" >
                    <div class="card-body" >
                      <strong>Qualification</strong>
        
                      <p class="text-muted" id="lecturerDetailsQualification"></p>
        
                      <hr>
        
                      <strong></i>Institution</strong>
        
                      <p class="text-muted" id="lecturerDetailsInstitution"></p> 
        
                      <hr>
        
                      <strong>Year Of Study</strong>
        
                      <p class="text-muted" id="lecturerDetailsYear"></p>
        
                      <hr>
        
                      <strong>Specialization</strong>
        
                      <p class="text-muted" id="lecturerDetailsSpecialization"></p>
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
                            <p id="lecturerDetailsNames"></p>
                          </div>
                        </div>

                          <div class="row">
                            <div class="col-md-6">
                              <h5>Gender:</h5>
                            </div>
                            <div class="col-md-6">
                              <p id="lecturerDetailsGender"></p>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <h5>Date Of Birth:</h5>
                            </div>
                            <div class="col-md-6">
                              <p id="lecturerDetailsDate_of_birth"></p>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <h5>Email:</h5>
                            </div>
                            <div class="col-md-6">
                              <p id="lecturerDetailsEmail"></p>
                            </div>
                          </div>
                         
                        <div class="row">
                          <div class="col-md-6">
                            <h5>Country:</h5>
                          </div>
                          <div class="col-md-6">
                            <p id="lecturerDetailsCountry"></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <h5>Nationality:</h5>
                          </div>
                          <div class="col-md-6">
                            <p id="lecturerDetailsNationality"></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <h5>District:</h5>
                          </div>
                          <div class="col-md-6">
                            <p id="lecturerDetailsDistrict"></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <h5>Town:</h5>
                          </div>
                          <div class="col-md-6">
                            <p id="lecturerDetailsTown"></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <h5>Postal:</h5>
                          </div>
                          <div class="col-md-6">
                            <p id="lecturerDetailsPostal"></p>
                          </div>
                        </div>
                       
                        <div class="row">
                          <div class="col-md-6">
                            <h5>Phone Numbers:</h5>
                          </div>
                          <div class="col-md-6">
                            <p id="lecturerDetailsPhone_1"></p>
                            <p id="lecturerDetailsPhone_2"></p>
                          </div>
                        </div>  
                       
                       
                        <div class="row">
                          <div class="col-md-6">
                            <h5>Religion:</h5>
                          </div>
                          <div class="col-md-6">
                            <p id="lecturerDetailsReligion"></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <h5>Marital Status:</h5>
                          </div>
                          <div class="col-md-6">
                            <p id="lecturerDetailsMarital_status"></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <h5>Spouse Name:</h5>
                          </div>
                          <div class="col-md-6">
                            <p id="lecturerDetailsSpouse_name"></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <h5>Spouse Contact:</h5>
                          </div>
                          <div class="col-md-6">
                            <p id="lecturerDetailsSpouse_contact"></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <h5>Disability:</h5>
                          </div>
                          <div class="col-md-6">
                            <p id="lecturerDetailsDisability"></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <h5>Nature of Disability:</h5>
                          </div>
                          <div class="col-md-6">
                            <p id="lecturerDetailsNature_of_disability"></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <h5>Next_Of_Kin 1 Name:</h5>
                          </div>
                          <div class="col-md-6">
                            <p id="lecturerDetailsnextOfKin1_name"></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <h5>Next_Of_Kin 1 Contact:</h5>
                          </div>
                          <div class="col-md-6">
                            <p id="lecturerDetailsnextOfKin1_contact"></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <h5>Next_Of_Kin 2 Name:</h5>
                          </div>
                          <div class="col-md-6">
                            <p id="lecturerDetailsnextOfKin2_name"></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <h5>Next_Of_Kin 2 Contact:</h5>
                          </div>
                          <div class="col-md-6">
                            <p id="lecturerDetailsnextOfKin2_contact"></p>
                          </div>
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
    
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              
            </div>
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
				url:'{!!URL::to('Lecturer/lecturer_details')!!}',
				data:{'user_id':e.target.value},
				dataType:'json',//return data will be json
				success:function(data){
         
            document.getElementById("lecturerDetailsName").innerHTML=data.data.name
            document.getElementById("lecturerDetailsNames").innerHTML=data.data.name
            document.getElementById("lecturerDetailsEmployId").innerHTML=data.data.EmployID
            document.getElementById("lecturerDetailsQualification").innerHTML=data.data.qualification
            document.getElementById("lecturerDetailsInstitution").innerHTML=data.data.institution
            document.getElementById("lecturerDetailsYear").innerHTML=data.data.yearOfStudy
            document.getElementById("lecturerDetailsSpecialization").innerHTML=data.data.specialzation
            document.getElementById("lecturerDetailsCountry").innerHTML=data.data.country
            document.getElementById("lecturerDetailsNationality").innerHTML=data.data.nationality
            document.getElementById("lecturerDetailsDistrict").innerHTML=data.data.district
            document.getElementById("lecturerDetailsPostal").innerHTML=data.data.postal
            document.getElementById("lecturerDetailsTown").innerHTML=data.data.Town
            document.getElementById("lecturerDetailsEmail").innerHTML=data.data.email
            document.getElementById("lecturerDetailsPhone_1").innerHTML=data.data.phone_1
            document.getElementById("lecturerDetailsPhone_2").innerHTML=data.data.phone_2
            document.getElementById("lecturerDetailsGender").innerHTML=data.data.gender
            document.getElementById("lecturerDetailsDate_of_birth").innerHTML=data.data.date_of_birth
            document.getElementById("lecturerDetailsReligion").innerHTML=data.data.religion
            document.getElementById("lecturerDetailsMarital_status").innerHTML=data.data.marital_status
            document.getElementById("lecturerDetailsSpouse_name").innerHTML=data.data.spouse_name
            document.getElementById("lecturerDetailsSpouse_contact").innerHTML=data.data.spouse_contact
            document.getElementById("lecturerDetailsDisability").innerHTML=data.data.disability
            document.getElementById("lecturerDetailsNature_of_disability").innerHTML=data.data.nature_of_disability
            document.getElementById("lecturerDetailsnextOfKin1_name").innerHTML=data.data.nextOfKin1Name
            document.getElementById("lecturerDetailsnextOfKin1_contact").innerHTML=data.data.nextOfKin1Contact
            document.getElementById("lecturerDetailsnextOfKin2_name").innerHTML=data.data.nextOfKin2Name
            document.getElementById("lecturerDetailsnextOfKin2_contact").innerHTML=data.data.nextOfKin2Contact
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