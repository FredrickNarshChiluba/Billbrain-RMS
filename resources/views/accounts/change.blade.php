@extends('baselayout'))
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div  style="margin-left:250px" class="row">
                <div class="col-sm-12">
                    <h3 class="page-title"><i class="fa fa-user"></i> change password</h3>
                     @if(Session::has('error'))
                    <div style="color: red" class="alert alert-danger">
                        {{Session::get('error')}}
                    </div>
                   @endif
                </div>
            </div>    
        
            <div style="margin-left:200px" class="row">
                <div class="col-md-4">
                    <div style="height:250px;width:300px;mar" class="card card-body">
                        <div class="text-center ">
                            <img src="@if(Auth::user()->profileImage){{ asset('images')}}/{{Auth::user()->profileImage }}@else{{asset('images/avatar3.png')}}@endif" width="65%" class="rounded-circle" alt="">
                        </div>
                        <p class="text-info text-center mt-4">{{$user->name}} </p>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card card-body">                        
                        <form class="form-layout form-layout-1" action="{{route('change.password')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                              
                            <div class="form-group mb-2">
                                <label class="form-control-label">Old Passoword: <span class="text-danger">*</span></label>
                                <input class="form-control @error('old_password') is-invalid @enderror" type="password" name="old_password" placeholder="old password" required>
                                @error('old_password') {{ $message }} @enderror
                            </div>
                           
                            <div class="form-group mb-2">
                                <label class="form-control-label">New Passoword: <span class="text-danger">*</span></label>
                                <input class="form-control @error('new_password') is-invalid @enderror" type="password" name="new_password" placeholder="new password" required>
                                @error('new_password') {{ $message }} @enderror
                            </div>
                            <div class="form-group mb-2">
                                 <label class="form-control-label">Confirm New password: <span class="text-danger">*</span></label>
                                <input class="form-control @error('new_confirm_password') is-invalid @enderror" type="password" name="new_confirm_password" placeholder="{{__('confirm_password')}}" required>
                                @error('new_confirm_password') {{ $message }} @enderror
                            </div>
                            <div class="form-layout-footer text-right mt-4">
                                <button type="submit" class="btn btn-primary tx-20"><i class="fa fa-floppy-o mr-2"></i> Submit</button>
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
