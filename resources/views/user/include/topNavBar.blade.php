<nav class="navbar top-navbar navbar-expand-md navbar-dark">
    
    <div class="navbar-header avbar-header-bg">
        <a class="navbar-brand" href="/dashboard">
            <img src="{{ asset("images/rccg-logo-text.png") }}" class="d-none d-md-block d-lg-block d-xl-block logo-md" 
                alt="PowerConnection" />
            <img src="{{ asset("images/rccg-logo-text.png") }}" class="d-block d-md-none logo-sm" alt="PowerConnection" />
        </a>
    </div>

    <div class="navbar-collapse">
        
        <ul class="navbar-nav me-auto">
            <li class="nav-item"> 
                <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark notification-icon" href="javascript:void(0)">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </a> 
            </li>
            <li class="nav-item"> 
                <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark notification-icon"
                href="javascript:void(0)">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </a>
            </li>
        </ul>

        <ul class="navbar-nav my-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-bs-toggle="dropdown" 
                aria-haspopup="true" aria-expanded="false"> <i class="fa fa-envelope-o notification-icon2" 
                aria-hidden="true"></i>
                    <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end mailbox animated bounceInDown">
                    <ul>
                        <li>
                            <div class="drop-title">Notifications</div>
                        </li>
                        <li>
                            <div class="message-center">

                                <!-- Message -->
                                <a href="javascript:void(0)">
                                    <div class="btn btn-danger btn-circle text-white">
                                        <i class="fa fa-link"></i>
                                    </div>
                                    <div class="mail-contnet">
                                        <h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span>
                                        <span class="time">9:30 AM</span> 
                                    </div>
                                </a>

                                <!-- Message -->
                                <a href="javascript:void(0)">
                                    <div class="btn btn-danger btn-circle text-white">
                                        <i class="fa fa-link"></i>
                                    </div>
                                    <div class="mail-contnet">
                                        <h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> 
                                        <span class="time">9:30 AM</span> 
                                    </div>
                                </a>

                            </div>
                        </li>
                    </ul>
                </div>
            </li>
            
            <li class="nav-item right-side-toggle"> 
                <a class="nav-link  waves-effect waves-light" href="javascript:void(0)">
                    <i class="fa fa-cog notification-icon2" aria-hidden="true"></i>
                </a>
            </li>

        </ul>
    </div>
</nav>