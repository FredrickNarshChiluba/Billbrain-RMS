@include('partials.header')

<style>
  body {
    background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.5)), url("/jpg/bg_img.jpg");
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 100% 100%;
  }
</style>

<body class="hold-transition login-page">
  <img src="{{ asset('dist/img/logo.jpg')}}" alt="Logo" class="brand-image img-circle elevation-1 p-3" style="opacity: .9; Width: 120px;height: 120px;">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card" style="border-radius: 2em;">
      <!-- <div class="card-header text-center"> -->
      @if(Session::has('error'))
      <div style="color: red;border-radius: 2em;" class="alert alert-danger text-center">
        {{Session::get('error')}}
      </div>
      @endif
      <!-- <img src="{{ asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-1" style="opacity: .8; Width: 50px"> -->
      <!-- <div><a href="" class="h1">{{ config('app.name', 'Laravel') }}</a></div> -->
      <!-- </div> -->
      <div class="card-body p-5">
        <!-- <p class="login-box-msg">Sign in to start your session</p> -->

        <form action="{{ route('login') }}" method="post" id="myForm">
          @csrf
          <div class="input-group mb-3">
            <div class="input-group-addon" style="border-radius: 2em;">
              <div class="input-group-text">
                <span class="fas fa-envelope" id="addon1"></span>
              </div>
            </div>
            <input aria-describedby="addon1" style="border-radius: 2em;" type="email" pattern="[a-z.]*[@]bit.ac.ug|[a-z.]*[@]stud.bit.ac.ug" class="form-control {{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" name="email" id="email" value="{{ old('username') ?: old('email') }}" required autocomplete="username" || autocomplete="email" autofocus>
            @if ($errors->has('username') || $errors->has('email'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
            </span>
            @endif
          </div>

          <div class="input-group mb-3">
            <div class="input-group-addon" style="border-radius: 2em;">
              <div class="input-group-text">
                <span class="fas fa-lock" id="addon2"></span>
              </div>
            </div>
            <input aria-describedby="addon2" style="border-radius: 2em;" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="row">
            <div class="col-8 pl-4">
              <div class="icheck-primary">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8 pl-2">
              @if (Route::has('password.request'))
              <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
              </a>
              @endif
            </div>
            <!-- /.col -->
            <div class="col-4 pr-4 add-spinner-here">
              <button type="submit" class="btn btn-primary btn-block btn1" style="border-radius: 2em;">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>


        <!-- @if (Route::has('password.request'))
        <a class="btn btn-link" href="{{ route('password.request') }}">
          {{ __('Forgot Your Password?') }}
        </a>
        @endif -->
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script>
    $(document).ready(function() {
      $(".btn1").click(function() {
        $(".btn1").hide();
        $(".add-spinner-here").html("<button class='btn btn-primary btn-block btn2' type='button' style='border-radius: 2em;' disabled><span class='spinner-border spinner-border-sm'></span>Loading..</button>");
        $("#myForm").submit();
      });
    });

  </script> -->
  @include('partials.scripts')