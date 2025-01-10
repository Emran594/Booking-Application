<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset("assets/images/logo-sm.png") }}" alt="" height="50">
            </span>
            <span class="logo-lg">
                <img src="{{ asset("assets/images/logo-dark.png") }}" alt="" height="50">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset("assets/images/logo-sm.png") }}" alt="" height="50">
            </span>
            <span class="logo-lg">
                <img src="{{ asset("assets/images/logo-light.png") }}" alt="" height="50">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <div class="nav-item">
                    <a class="nav-link menu-link" href="{{ url('/userdashboard') }}">
                        <i data-feather="home" class="icon-dual"></i> Dashboards
                    </a>
                </div>
                <div class="nav-item">
                    <a class="nav-link menu-link" href="{{ url('/booking-history') }}">
                        <i data-feather="activity" class="layers"></i> My Booking History
                    </a>
                </div>
            </ul>
        </div>
    </div>

    <div class="sidebar-background"></div>
  </div>
