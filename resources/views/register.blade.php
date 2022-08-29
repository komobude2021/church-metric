<!doctype html>
<html lang="en">
  <head>

    @include("include/header")

    <title>Welcome To Church Metric | Register</title>
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
                        <h4><strong>Create a new account!</strong></h4>
                        <p class="text-14">It's quick and simple.</p>
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

                    <div>
                        <form action="/register" method="POST" name="form1" autocomplete="off">
                            @csrf

                            <div class="form-row">

                                <div class="form-group col-md-4">
                                  <input type="text" class="form-control form-body2b" name="surname" 
                                  value="{{ old('surname') }}" placeholder="Surname*" required>
                                </div>

                                <div class="form-group col-md-4">
                                  <input type="text" class="form-control form-body2b" name="firstname" 
                                  value="{{ old('firstname') }}" placeholder="Firstname*" required>
                                </div>

                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control form-body2b" name="othername" 
                                    value="{{ old('othername') }}" placeholder="Othername">
                                </div>

                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                  <input type="email" class="form-control form-body2b" name="email" 
                                  value="{{ old('email') }}" placeholder="Email Address*" required>
                                  <label class="register-label-notice">
                                    Email Address entered should be valid; Verification email will be 
                                    sent for confirmation:
                                  </label>
                                </div>

                                <div class="form-group col-md-6">
                                  <input type="password" class="form-control form-body2b" name="password" 
                                  placeholder="Password*" required>
                                  <label class="register-label-notice">
                                    Password Must Be Minimum of Eight Characters, Password Must 
                                    Contain at-least one Uppercase, Lowercase and Numeric Value:
                                  </label>
                                </div>

                            </div>

                            <div>
                                <hr class="register-hr" />
                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label class="register-label-birth">Gender*:</label>
                                    <select id="inputState" name="gender" class="form-control form-body2b" required>
                                        <option>Choose...</option>
                                        <option value="M" 
                                            @if(old('gender') !== null)
                                                @if(old('gender') == 'M')
                                                    {{ 'selected' }}
                                                @endif
                                            @endif
                                        >Male</option>
                                        <option value="F"
                                            @if(old('gender') !== null)
                                                @if(old('gender') == 'F')
                                                    {{ 'selected' }}
                                                @endif
                                            @endif
                                        >Female</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="register-label-birth">Date of Birth*:</label>
                                    
                                    <div class="form-row">
                                        <div class="col-4">
                                            <select id="inputState" name="day" class="form-control" required>
                                                @for($i=1; $i<=31; $i++)

                                                    @if(old('day') !== null)
                                                        @if($i == old('day'))
                                                        <option value="{{ $i }}" selected>{{ $i }}</option>
                                                        @else
                                                            <option value="{{ $i }}">{{ $i }}</option>
                                                        @endif
                                                    @else
                                                        @if($i == date('d'))
                                                        <option value="{{ $i }}" selected>{{ $i }}</option>
                                                        @else
                                                            <option value="{{ $i }}">{{ $i }}</option>
                                                        @endif
                                                    @endif

                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <select id="inputState" name="month" class="form-control" required>
                                                @php
                                                    $month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 
                                                                'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                                                @endphp
                                                @for($i=1; $i<=12; $i++)

                                                    @if(old('month') !== null)
                                                        @if($i == old('month'))
                                                            <option value="{{ $i }}" selected>{{ $month[$i - 1] }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $i }}">{{ $month[$i - 1]  }}
                                                            </option>
                                                        @endif
                                                    @else
                                                        @if($i == Date("m"))
                                                            <option value="{{ $i }}" selected>{{ $month[$i - 1] }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $i }}">{{ $month[$i - 1]  }}</option>
                                                        @endif
                                                    @endif

                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <select id="inputState" class="form-control" disabled>
                                                <option selected>XXXX</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="text-13">
                                By clicking Sign Up, you agree to our Terms and Privacy Policy. You may receive 
                                email notifications from us and can opt out at any time.
                            </div>

                            <div class="form-group text-center pt-20">
                                <button type="submit" class="btn btn-primary ibtn button-width-50">Sign Up</button>
                            </div>
                        </form>

                        <div class="extra-login clearfix p-10">
                            <span>Already have an account? <a href="/">Login</a></span> 
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include("include/footer")
    
  </body>
</html>