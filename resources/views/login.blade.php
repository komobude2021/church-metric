<!doctype html>
<html lang="en">
  <head>
    
    @include("include/header")

    <title>Welcome To Church Metric | Login</title>
  </head>
  <body>    

    <div class="container-fluid">
        <div class="row p70">
            <div class="col-md-4 offset-md-4">
                <div class="bg-white">
                    <div>
                        <img class="img-100" src="{{ asset("images/logo.jpg") }}" alt="RCCG POWER-CONNECTIONS" />
                    </div>

                    <div>
                        <hr/>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            
                            <ul class="ul-error-list">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if (session('Error'))
                        <div class="alert alert-danger alert-dismissible fade show alert-tune" role="alert">
                            {{ session('Error') }}                     
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if (session('Success'))
                        <div class="alert alert-success alert-dismissible fade show alert-tune" role="alert">
                            {{ session('Success') }}                     
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div>
                        <h4><strong>Log In to Your Account! </strong></h4>
                        <p class="text-14">Get Access to Power Connections Interactive Dashboard, 
                            Events Notifications, Hands-on Church Calendar and many more.
                        </p>
                    </div>

                    <div>
                        <hr/>
                    </div>

                    <div>
                        <form action="/" method="POST" name="form1" autocomplete="off">
                            @csrf
                            <div class="form-group">
                                <input type="email" name="email" class="form-control form-body2" value="{{ old('email') }}" placeholder="Email Address" required>
                            </div>

                            <div class="form-group">
                                <input type="password" name="password" class="form-control form-body2" placeholder="Password" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary ibtn">Login</button>
                                <a href="/forget-password">Forget password?</a>
                            </div>
                        </form>

                        <div class="extra-login clearfix p-10">
                            <span>Don't have an account? <a href="/register">Register here</a></span> 
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include("include/footer")
    
  </body>
</html>