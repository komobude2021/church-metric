<!doctype html>
<html lang="en">
  <head>
    
    @include("include/header")

    <title>Welcome To Church Metric | Verification Email Sent</title>
  </head>
  <body>    

    <div class="container-fluid">
        <div class="row p70">
            <div class="col-md-8 offset-md-2">
                <div class="bg-white">
                    <div class="text-center">
                        <img class="img-50" src="{{ asset("images/logo.jpg") }}" alt="RCCG POWER-CONNECTIONS" />
                    </div>

                    <div>
                        <hr/>
                    </div>

                    <div class="text-center">
                        <h4><strong>Please verify your email!</strong></h4>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
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

                    @if (session('Success'))
                        <div class="alert alert-success alert-dismissible fade show alert-tune2 text-center" role="alert">
                            {{ session('Success') }} | Kindly Check Email and Spam Folder | Thanks                    
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="text-center text-13">
                        you are almost there! We sent an email to <b>{{ session('verify_email') }}</b><br/><br/>

                        Just click on the link in that email to complete your Signup.<br/>
                        If you don't see the email, you may need to <b>check your spam</b> folder<br/><br/>

                        Still can't find the email?<br/><br/>
                        
                        <form name="form1" action="/resendemail" method="POST">
                            @csrf
                            <input type="hidden" name="email" value="{{ session('verify_email') }}">
                            <button type="submit" class="btn btn-primary">Resend Email</button>
                        </form>
                    </div>

                    <div>
                        <hr/>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @include("include/footer")
    
  </body>
</html>