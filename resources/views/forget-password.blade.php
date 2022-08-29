<!doctype html>
<html lang="en">
  <head>

    @include("include/header")

    <title>Welcome To Church Metric | Forget Password</title>
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

                    <div>
                        <h4><strong> Your Account </strong></h4>
                        <p class="text-14">Please enter your email address to search for your account.</p>
                    </div>

                    <div>
                        <hr/>
                    </div>

                    <div>
                        <form action="/forget-password" method="POST" name="form1" autocomplete="off">
                            @csrf
                            <div class="form-group">
                                <input type="email" name="email" class="form-control form-body2" 
                                placeholder="Email Address" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary ibtn">Search</button>
                            </div>
                        </form>

                        <div>
                            <hr/>
                        </div>

                        <div class="extra-login clearfix p-10">
                            <span>
                                <a href="/" class="btn btn-sm btn-info forget-password-login" tabindex="-1" role="button" 
                                    aria-disabled="true">Login</a>
                                <a href="/register">&bull; Register here</a>
                            </span> 
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include("include/footer")
    
  </body>
</html>