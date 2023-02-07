@extends('baselayout')

</style>

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           @if (auth()->user()->role != 'Accountant')
         <!--
            <a href="#Add_Specialities_details" data-toggle="modal"><button class="btn btn-primary">Register Lecture</button></a>
            <a href="#Add_Specialities_details" data-toggle="modal"><button class="btn btn-primary">Register Admin</button></a> -->
            <a href="{{route('userss-admins')}}"><button class="btn btn-primary">Register Employee</button></a>

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
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Employee List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Photo</th>
                    <th>Employee Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Gender</th>
                    <th>Role</th>
                    <th>Edit</th>
                    @if (auth()->user()->role != 'Admin')
                    <th>Delete</th>
                    @endif
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td> <img width="50px" height="50px" src="{{ asset('images')}}/{{$student->profileImage }}" class="img-circle elevation-2" alt="photo"/></td>
                            <td><a href="">{{ $student->name }}</a></td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->Phone_1 }}/{{ $student->Phone_2 }}</td>
                            <td>{{ $student->gender }}</td>
                            <td>{{ $student->role }}</td>
                            <td>

								<a  href="{{route('edit-admins',$student->id)}}"><i class="fa fa-edit mr-1"></i>Edit</a>

                             </td>
                            <td>
                              <form action="{{ route('employees.destroy',['admins'=>$student]) }}" method="get">
                                  @csrf
                                  <input type="hidden" value="$student->id" name="admin_id">
                                  <!-- <button  class="btn btn-xs btn-danger show_confirm" type="submit" data-toggle="tooltip" title='Delete'>Delete</button> -->
                              </form>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Photo</th>
                    <th>Employee Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Gender</th>
                    <th>Role</th>
                    <th>Edit</th>
                    @if (auth()->user()->role != 'Admin')
                    <th>Delete</th>
                    @endif
                  </tr>
                  </tfoot>
                </table>

              <!-- /.card-body  max-width: 900px;-->
            </div>
             <!-- Add Modal -->
			<div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" style="width: 950%; ">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Create Account</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
            <form action="" enctype="multipart/form-data" method="post">
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

            <h5>1.1: EMPLOYEE’S PERSONAL INFORMATION</h5>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="course">Name:</label>
                  <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="form-group">
                  <label for="gender">Gender:</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gender" value="Male">
                    <label style="margin-left: 20px;" class="form-check-label">Male</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gender" value="Female">
                    <label style="margin-left: 20px;" class="form-check-label">Female</label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="date_of_birth">Date Of Birth:</label>
                  <input type="date" class="form-control" name="date_of_birth" id="date_of_birth">
                </div>
                <div class="form-group">
                  <label for="country">Country of residence:</label>
                  <select class="form-control select2" placeholder="Select a Country" name="country" style="width: 100%;">

                    <option value="">select Country</option>
                    <option>Uganda<n/option>
                    <option>Kenya</option>
                    <option>S.Sudan</option>
                    <option>Rwanda</option>
                    <option>Tanzania</option>
                    <option>Burundian/option>
                    <option>Eritrea</option>
                    <option>DRC</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="nationality">Nationality:</label>
                  <select class="form-control select2" placeholder="Select a Nationality" name="nationality" style="width: 100%;">

                    <option value="">select Nationality</option>
                    <option>Ugandan<n/option>
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
                  <input type="text" class="form-control" name="district" id="district">
                </div>
                <div class="form-group">
                  <label for="Town">Town:</label>
                  <input type="text" class="form-control" name="Town" id="Town">
                </div>
                <div class="form-group">
                  <label for="postal">P.O BOX:</label>
                  <input type="text" class="form-control" name="postal" id="postal">
                </div>
                <div class="form-group">
                  <label for="religion">Religion:</label>
                  <input type="text" class="form-control" name="religion" id="religion">
                </div>
                <div class="form-group">
                  <label for="marital_status">Marital Status:</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="marital_status" id="marital_status" value="Single">
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
                <div class="form-group">
                  <label for="disability">Do you have any disability?</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="disability" id="name" value="Yes">
                    <label style="margin-left: 20px;" class="form-check-label">Yes</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="disability" id="name" value="No">
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
                  <input type="email" class="form-control" name="email" id="email">
                </div>
                <div class="form-group">
                  <label for="phone_1">Phone Number:</label>
                  <input type="tel" class="form-control" name="phone_1" id="phone_1">
                </div>
                <div class="form-group">
                  <label for="phone_2">Alt Phone Number:</label>
                  <input type="tel" class="form-control" name="phone_2" id="phone_2">
                </div>
              </div>
            </div>

            <h5>1.4 PARENTS/GUARDIAN’S (next of kin) CONTACT</h5>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="father_name">Father's (Guardian) Name:</label>
                  <input type="father_name" class="form-control" name="father_name" id="father_name">
                </div>

                <div class="form-group">
                  <label for="father_contact">Father's (Guardian) Contact:</label>
                  <input type="tel" class="form-control" name="father_contact" id="father_contact">
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

                <div class="form-group">
                  <label for="image">Choose Profile Image</label>
                  <div style="margin-left:5px;" class="row">
                    <input type="file" class="btn btn-default col-md-10" name="file" onchange="previewFile(this)">
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

            <button class="btn btn-primary" type="submit">Register</button>
          </div>
          <!-- /.card-body -->
        </form>

						</div>
					</div>
				</div>
			</div>
			<!-- /ADD Modal -->
            <!-- Edit Details Modal -->
        @foreach ($students as $student)
        <div class="modal fade" id="edit_personal_details{{$student->id}}" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document" >
            <div style="width: 950%; " class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><strong>{{$student->name}} Details</strong> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="row form-row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input name="name" type="text" class="form-control" value="{{$student->name}}">
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Date of Birth</label>
                                    <div class="cal-icon">
                                        <input name="Date_of_Birth" type="text" class="form-control" value="{{$student->Date_of_Birth}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Email ID</label>
                                    <input name="email" type="email" class="form-control" value="{{$student->email}}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Mobile 1</label>
                                    <input name="mobile" type="text" value="{{$student->phone_1}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Mobile< 2/label>
                                    <input name="mobile" type="text" value="{{$student->phone_2}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-12">
                                <h5 class="form-title"><span><strong>Postal</strong> </span></h5>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                <label>Address</label>
                                    <input name="address" type="text" class="form-control" value="{{$student->postal}}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>City</label>
                                    <input name="location" type="text" class="form-control" value="{{$student->Town}}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Division</label>
                                    <input name="division" type="text" class="form-control" value="{{$student->district}}">
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Country</label>
                                    <input name="country" type="text" class="form-control" value="{{$student->country}}">
                                </div>
                            </div>
                                <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">upload photo</label>
                                <input class="form-control @error('photo') is-invalid @enderror" type="file" id="photo" name="photo" accept="image/*"/>
                                @error('logo') {{ $message }} @enderror
                            </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <!-- /Edit Details Modal -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->


      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></scrip>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
  <script type="text/javascript">


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

  </script>
  <!-- /.content-wrapper -->

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <?php
      function cons($mes){
        echo '<script type="text/javascript"> '. 'console.log('.$mes.');</script>';
      }
      cons('hello');
       ?>

        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>


@endsection
