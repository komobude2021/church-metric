<!DOCTYPE html>
<html lang="en">
<head>
    @include("user.include.header")
    <title>Dashboard - {{ ucwords(Auth::user()->surname . " " . Auth::user()->firstname) }}</title>
    <link href="{{ asset("css/chosen.min.css") }}" rel="stylesheet" type="text/css">
    <script src="{{ asset("js/chosen.jquery.js") }}"></script>
</head>

<body class="skin-default fixed-layout logo-center card-no-border">
    @include("user.include.loader")

    <div id="main-wrapper">
        <header class="topbar topbar-shadow">
            
            @include("user.include.topNavBar")
        </header>

        <aside class="left-sidebar left-sidebar-bg-shadow">
            <div class="scroll-sidebar">
                <div class="user-profile">
                    <div class="user-pro-body">
                        <div>
                            <img src="{{ asset("images/2.jpg") }}" alt="user-img" class="img-circle">
                        </div>
                        <div class="dropdown">
                            <a href="javascript:void(0)" class="u-dropdown link hide-menu">
                                {{ ucwords(Auth::user()->surname . " " . Auth::user()->firstname) }}
                                <span class="caret"></span>
                            </a>
                        </div>
                    </div>
                </div>
                
                @include("user.include.sideNavBar")
                
            </div>
        </aside>


        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">RCCG PowerConnections</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
                

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form>
                                    <div class="form-row">
                                      <div class="form-group col-md-4">
                                        <label>Surname</label>
                                        <input type="text" class="form-control" placeholder="Surname" value="{{ ucwords(Auth::user()->surname) }}" disabled required>
                                      </div>
                                      <div class="form-group col-md-4">
                                        <label>Firstname</label>
                                        <input type="text" class="form-control" placeholder="Firstname" value="{{ ucwords(Auth::user()->firstname) }}" disabled required>
                                      </div>
                                      <div class="form-group col-md-4">
                                        <label>Othername</label>
                                        <input type="text" class="form-control" placeholder="Othername" value="{{ ucwords(Auth::user()->othername) }}" disabled required>
                                      </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                          <label>Email</label>
                                          <input type="text" class="form-control" placeholder="Email" value="{{ ucwords(Auth::user()->email) }}" disabled required>
                                        </div>
                                        <div class="form-group col-md-4">
                                          <label>Date of Birth</label>
                                          <input type="text" class="form-control" placeholder="Date of Birth" value="{{ date("jS F", strtotime(Auth::user()->dob)) }}" disabled required>
                                        </div>
                                        <div class="form-group col-md-4">
                                          <label>Gender</label>
                                          <input type="text" class="form-control" placeholder="Church Group" value="@if (Auth::user()->gender == "M") {{ "MALE" }} @else {{ "FEMALE" }} @endif" disabled required>
                                        </div>
                                      </div>

                                      
                                      <div class="form-row">

                                        <div class="form-group col-md-4">
                                            <label class="register-label-birth">Mobile Contact Number<span class="required">*</span>:</label>
                                            <div class="form-row">
                                                <div class="col-4 profile-m0">
                                                    <select class="form-control" name="mobile_code">
                                                        <option value="+44" selected>+44</option>
                                                    </select>
                                                </div>
                                                <div class="col-8 profile-m0">
                                                    <input type="text" class="form-control form-body2" name="mobile_number" value="{{ Auth::user()->phone_number }}" placeholder="Mobile Contact*" required>
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="form-group col-md-4">
                                            <label class="register-label-birth">Church Group<span class="required">*</span>:</label>
                                            <select class="form-control" name="group" required>
                                                <option selected>Select Group</option>
                                                @foreach($groups as $group)
                                                    @if($group->id == Auth::user()->church_group_id)
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
                                                            @if(empty(Auth::user()->whatsapp_code))
                                                                {{ "selected" }}
                                                            @elseif(Auth::user()->whatsapp_code == "+44")
                                                                {{ "selected" }}
                                                            @endif
                                                        >+44</option>
                                                        <option value="+234"
                                                            @if(Auth::user()->whatsapp_code == "+234")
                                                                {{ "selected" }}
                                                            @endif
                                                        >+234</option>
                                                    </select>
                                                </div>
                                                <div class="col-8 profile-m0">
                                                    <input type="text" class="form-control form-body2" name="whatsapp_number" value="{{ Auth::user()->whatsapp }}" placeholder="Whatsapp Contact">
                                                </div>
                                            </div>
                                        </div>
        
                                    </div>
        
                                    <div class="form-row">
                                      <div class="form-group col-md-4">
                                        <label for="inputCity">House Number</label>
                                        <input type="text" class="form-control" id="inputCity">
                                      </div>

                                      <div class="form-group col-md-6">
                                        <label for="inputCity">Street Details</label>
                                        <input type="text" class="form-control" id="inputCity">
                                      </div>
                                      <div class="form-group col-md-2">
                                        <label for="inputZip">Post Code</label>
                                        <input type="text" class="form-control" id="inputZip">
                                      </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update My Personal Record</button>
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="row p-12">
                                    <div class="col-md-6">
                                        <h4 class="text-themecolor">Ministries/Department(s)</h4>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="text-right">
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                                                <i class="fa fa-plus" aria-hidden="true"></i> Add New Ministry/Department
                                            </button>
                                        </div>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">Add New Department/Ministry</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <form name="form2" id="form2" method="POST" action="/addMinistry">
                                                        @csrf
                                                        <div class="modal-body">
                                                                <div class="form-group">
                                                                    <select multiple class="form-control ministry" name="ministry[]">
                                                                        @foreach($remainingMinistries as $remainingMinistry)
                                                                            <option value='{{ $remainingMinistry->id }}'>{{ $remainingMinistry->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" name="submit2" id="submit2" class="btn btn-success">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="p-14">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" width="15%">#</th>
                                                        <th scope="col" width="65%">Ministry/Department</th>
                                                        <th scope="col" width="20%"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @if(count($memberMinistries) == 0)
                                                    <tr>
                                                        <td colspan="3">
                                                            {{ "<b>No Department/Ministry Found!</b>" }}
                                                        </td>
                                                    </tr>
                                                @else
                                                    @php $i = 1; @endphp
                                                    @foreach($memberMinistries as $memberMinistry)
                                                        <tr>
                                                            <th scope="row" class="table-baseline">{{ $i }}</th>
                                                            <td class="table-baseline">{{ $memberMinistry->name }}</td>
                                                            <td class="table-baseline">
                                                                <button type="button" class="btn btn-sm btn-danger">Delete</button>
                                                            </td>
                                                        </tr>
                                                        @php $i++; @endphp
                                                    @endforeach
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
        @include("user.include.footer")
        <script>
            $('.ministry').chosen('Select Ministry Department(s)');
        </script>

    </div>
</body>
</html>