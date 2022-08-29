<!doctype html>
<html lang="en">
  <head>
    
    @include("include/header")

    <link href="{{ asset("css/chosen.min.css") }}" rel="stylesheet" type="text/css">
    <script src="{{ asset("js/chosen.jquery.js") }}"></script>

    <title>Welcome To Church Metric | Profile</title>
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
                        <h4><strong>Hello {{ strtoupper(Auth::user()->surname . " " . 
                            Auth::user()->firstname . " " . Auth::user()->othername)}} </strong>
                        <p class="text-15">This is the phrase of our registration process</p>
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
                        <form action="/profile" method="POST" name="form1" autocomplete="off">
                            @csrf

                            <div class="form-row">

                                <div class="form-group col-md-4">
                                    <label class="register-label-birth">Mobile Contact Number
                                        <span class="required">*</span>:
                                    </label>
                                    <div class="form-row">
                                        <div class="col-4 profile-m0">
                                            <select class="form-control" name="mobile_code">
                                                <option value="+44" selected>+44</option>
                                            </select>
                                        </div>
                                        <div class="col-8 profile-m0">
                                            <input type="text" class="form-control form-body2b" name="mobile_number" 
                                            value="{{ old('mobile_number') }}" placeholder="Mobile Contact*" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="register-label-birth">Church Group<span class="required">*</span>:
                                    </label>
                                    <select class="form-control" name="group" required>
                                        <option selected>Select Group</option>
                                        @foreach($groups as $group)
                                            @if($group->id == old("group"))
                                                <option value="{{ $group->id }}" selected>{{ $group->name }}</option>
                                            @else
                                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="register-label-birth">Whatsapp Contact Number:</label>
                                    <div class="form-row">
                                        <div class="col-4 profile-m0">
                                            <select class="form-control" name="whatsapp_code">
                                                <option value="+44" 
                                                    @if(empty(old("whatsapp_code")))
                                                        {{ "selected" }}
                                                    @elseif(old("whatsapp_code") == "+44")
                                                        {{ "selected" }}
                                                    @endif
                                                >+44</option>
                                                <option value="+234"
                                                    @if(old("whatsapp_code") == "+234")
                                                        {{ "selected" }}
                                                    @endif
                                                >+234</option>
                                            </select>
                                        </div>
                                        <div class="col-8 profile-m0">
                                            <input type="text" class="form-control form-body2b" name="whatsapp_number" 
                                            value="{{ old('whatsapp_number') }}" placeholder="Whatsapp Contact">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-row">
                                <label class="register-label-birth">Address Details<span class="required">*</span>:
                                </label>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control" placeholder="House Number" 
                                        name="house_number" value="{{ old('house_number') }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" placeholder="Street Details" 
                                        name="street_details" value="{{ old('street_details') }}">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="text" class="form-control" placeholder="Post Code" 
                                        name="post_code" value="{{ old('post_code') }}">
                                    </div>
                                </div>
                            </div>

                            <div>
                                <hr class="register-hr" />
                            </div>

                            <div class="form-row">
                                
                                <div class="form-group col-md-12">
                                    <div class="form-row">
                                        <label class="register-label-birth">Please Select the Ministry/Department 
                                            you belong | Multiple Selections Allowed (<b>Only For Church Workers</b>):
                                        </label>
                                        <select multiple class="form-control ministry" name="ministry[]">
                                            @foreach($ministries as $ministry)
                                                <option value="{{ $ministry->id }}">{{ $ministry->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group text-center pt-20">
                                <button type="submit" class="btn btn-primary ibtn button-width-70 ">
                                    Complete Registration
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include("include/footer")
    
    <script>
        $('.ministry').chosen('Select Ministry Department(s)');
    </script>

  </body>
</html>