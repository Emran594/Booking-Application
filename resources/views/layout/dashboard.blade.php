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
      @include('includes.sidebar')
      <div class="vertical-overlay"></div>

      <div class="main-content">
      @yield('content')

      @include('includes.footer')
      </div>
    </div>

  @include('includes.scripts')
  </body>
</html>
