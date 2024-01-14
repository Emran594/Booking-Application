@include('includes.header');

  <body>
    <!-- Begin page -->
    <div id="layout-wrapper">
      <header id="page-topbar">
        <div class="layout-width">
          @include('includes.navbar_header')
        </div>
      </header>
      </div>
      <!-- /.modal -->
      <!-- ========== App Menu ========== -->
      @include('includes.sidebar')
      <!-- Left Sidebar End -->
      <!-- Vertical Overlay-->
      <div class="vertical-overlay"></div>

      <!-- ============================================================== -->
      <!-- Start right Content here -->
      <!-- ============================================================== -->
      <div class="main-content">
      @yield('content')
        <!-- End Page-content -->

      @include('includes.footer')
      </div>
      <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

  @include('includes.scripts')
  </body>
</html>
