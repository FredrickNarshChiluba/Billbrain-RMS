<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact-Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body{
          background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)),url("/jpg/image2.jpg");
          background-repeat:no-repeat;
          background-attachment:fixed;
          background-size: 100% 100%;
          
      
        }
        
      </style>

</head>
<body>
    <section style ="padding-top:60px;">
        <div class ="container" >
            <div class="row" >
                <div class="col-md-6 offset-md-3" >
                    <div class="card" style="border-top: 4px solid orange">
                        <div class = "card-header" >
                            Contact Us
                        </div>
                        <div class="card-body" >
                            @if (Session::has('message_sent'))
                              <div class = "alert alert-success" role="alert">
                                  {{ Session::get('message_sent') }}
                              </div>
                            @endif
                            <form method ="POST" action="{{ route('contact.send') }}" enctype="multipart/form-data" >
                                @csrf
                                <div class="form-group">
                                    <label for ="name">Name</label>
                                    <input type ="text" name="name" class="form-control"required autocomplete="email" autofocus/>
                                </div>
                                <div class="form-group">
                                    <label for ="email">Email</label>
                                    <input type ="text" name="email" class="form-control"required autocomplete="email" autofocus/>
                                </div>
                                <div class="form-group">
                                    <label for ="phone">Phone</label>
                                    <input type ="text" name="phone" class="form-control"required autocomplete="email" autofocus/>
                                </div>
                                <div class="form-group">
                                    <label for ="msg">Message</label>
                                    <textarea name="msg" class="form-control"required autocomplete="email" autofocus></textarea>
                                </div>
                                <div style="padding-top:20px;">
                                
                                <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>
                                </div>
                            </form>
                            
                          @if (Auth::user()->role == 'Student')
                            <a href="{{ route('student.show', ['student' => session('user')])}}" class="nav-link"><button class="btn btn-primary">Back</button></a> 
                          @endif
                        
                          @if (Auth::user()->role == 'Admin')
                            <a href="{{ route('admin.show', ['admin' => session('user')])}}" class="nav-link"><button class="btn btn-primary">Back</button></a> 
                          @endif
                            
                          @if (Auth::user()->role == 'Accountant')
                            <a href="{{ route('accountant.show', ['accountant' => session('user')])}}" class="nav-link"><button class="btn btn-primary">Back</button></a> 
                          @endif
                            
                          @if (Auth::user()->role == 'Super User')
                            <a href="{{ route('superUser')}}" class="nav-link" ><button class="btn btn-primary">Back</button></a> 
                          @endif
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</body>
</html>




