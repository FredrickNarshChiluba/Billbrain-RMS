@extends('baselayout')

@section('content')
{{-- <div class="content-wrapper" > --}}
 <div class="content">
        <div class="container-fluid">
                <div style="margin-bottom:10px;">
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">
                      <div style="text-align:center;"> {{Session::get('message')}}</div>
                    </div>
                @endif
                </div>    
            @php
                $role = Auth::user()->id;
                $user = Auth::user();
            @endphp
            <div style="margin-left:250px" class="row ">
                <div class="col-md-4">
                    <div class="card card-body" style="border-radius: 2em;">
                        <div class="text-center profile-image">
                            <img  height="150px" width="150px" src="@if($user->profileImage){{ asset('images')}}/{{Auth::user()->profileImage }}
                            @else{{asset('frontend/images/avatar3.png')}}@endif" width="75%" class="rounded-circle" alt="">
                        </div>
                        <p class="text-info text-center mt-4"> {{Auth::user()->name}}</p>
                        <h3 class="text-primary text-center">
                    </div>

                </div>
                <div class="col-md-8">
                    <div class="card card-body" style="border-radius: 2em;">                        
                        <form class="form-layout form-layout-1" action="{{route('superUser.image_change')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group my-3">
                                <label class="form-control-label">Name:</label>
                                <input disabled class="form-control" type="text" name="name" value="{{Auth::user()->name}}" placeholder="{{__('name')}}" >
                                @error('name')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group my-3">
                                <label class="form-control-label">Email:</label>
                                <input disabled class="form-control" type="text" name="email" value="{{Auth::user()->email}}" placeholder="{{__('email')}}" >
                                @error('email')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- <div class="form-group mb-2">
                                <label class="form-control-label">Contact: <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="contact" value="{{Auth::user()->Contact}}" placeholder="{{__('contact')}}" required>
                                @error('contact')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> -->
                            <div class="form-group mb-2">
                                <label class="form-control-label">Country:</label>
                                <input disabled  class="form-control" type="text" name="Country" value="{{Auth::user()->country}}" placeholder="{{__('Country')}}" >
                                @error('Country')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label class="form-control-label">City:</label>
                                <input disabled class="form-control" type="text" name="City" value="{{old('City',Auth::user()->Town)}}" placeholder="{{__('city')}}">
                                @error('City')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                           <div class="row">
                                <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label class="form-control-label">Phone 1:</label>
                                                <input  class="form-control" type="text" name="phone_1" value="{{old('phone_1',Auth::user()->phone_1)}}" placeholder="{{__('city')}}" disabled>
                                                @error('phone_1')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                </div>
                                <div class="col-md-6">
                               <div class="form-group mb-2">
                                <label class="form-control-label">Phone 2:</label>
                                <input class="form-control" type="text" name="phone_2" value="{{old('phone_2',Auth::user()->phone_2)}}" placeholder="{{__('city')}}" disabled>
                                @error('phone_2')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                               </div>
                          
                          
                           </div>

                            <div class="form-group mb-2">
                                <label class="form-control-label">Address:</label>
                                <input disabled class="form-control" type="text" name="address" value="{{old('address',Auth::user()->postal)}}" placeholder="address">
                            </div>
                         
                            <div class="">
                                <div class="col-md-12">
                                  <div class="form-group">
                                  <label for="image">Change Profile Image</label>
                                  <div><input type="file" name="file" onchange="previewFile(this)"></div>
                                  <div><img id="previewImg" alt="profile image" src="{{ asset('images') }}/{{ Auth::user()->profileImage }}" style="max-width:130px; margin-top:20px; margin-bottom:20px;"/></div>
                                  @if($errors->has('profileImage'))
                                     <strong>{{ $errors->first('profileImage') }}</strong>
                                  @endif
                                 
                                    </div>
                                </div>
                              </div>                          
                            
                            <div class="form-layout-footer text-center mt-3">
                                <button type="submit" class="btn btn-primary tx-20"><i class="fa fa-floppy-o mr-2"></i>save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>                
    </div>
</div>
</section>

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