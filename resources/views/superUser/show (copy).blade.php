@extends('baselayout')

@section('content')
 <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- <div class="col-sm-12">
                    <h3 class="page-title"><i class="fa fa-user"></i> {{__('person profile')}}</h3>
                   
                </div> -->
                <div>
                   @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                    @endif
                </div>
            </div>    
        
            @php
                $role = Auth::user()->id;
                $user = Auth::user();
            @endphp
            <div style="margin-left:250px" class="row ">
                <div class="col-md-4">
                    <div class="card card-body">
                        <div class="text-center profile-image">
                            <img  height="75px" width="75px" src="@if($user->profileImage){{ asset('images')}}/{{Auth::user()->profileImage }}@else{{asset('frontend/images/avatar3.png')}}@endif" width="75%" class="rounded-circle" alt="">
                        </div>
                        <p class="text-info text-center mt-4"> {{Auth::user()->name}}</p>
                        <h3 class="text-primary text-center">
                            <!-- <span class="badge badge-primary"> -->
                            
                        </span></h3>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card card-body">                        
                        <form class="form-layout form-layout-1" action="{{route('superUser.upadte')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group my-3">
                                <label class="form-control-label">Namesss: <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="name" value="{{Auth::user()->name}}" placeholder="{{__('name')}}" required>
                                @error('name')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group my-3">
                                <label class="form-control-label">Email: <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="email" value="{{Auth::user()->email}}" placeholder="{{__('email')}}" required>
                                @error('email')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label class="form-control-label">Contact: <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="contact" value="{{Auth::user()->Contact}}" placeholder="{{__('contact')}}" required>
                                @error('contact')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label class="form-control-label">Country: <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="Country" value="{{Auth::user()->country}}" placeholder="{{__('Country')}}" required>
                                @error('Country')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label class="form-control-label">City: <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="City" value="{{old('City',Auth::user()->Town)}}" placeholder="{{__('city')}}" required>
                                @error('City')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-2">
                                <label class="form-control-label">Address: <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="address" value="{{old('address',Auth::user()->address)}}" placeholder="address">
                            </div>
                         
                            <div class="">
                                <div class="form-group mb-2 ">
                                <label class="form-control-label">Photo:</label>                                
                                <label class="custom-file wd-100p">
                                    <input type="file" name="photo" id="photo" class="file-input-styled" accept="image/*">
                                </label>
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
@endsection

@section('script')
<script src="{{asset('master/plugins/styling/uniform.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.file-input-styled').uniform({
            fileButtonClass: 'action btn bg-primary text-white'
        });
    });
</script>
@endsection