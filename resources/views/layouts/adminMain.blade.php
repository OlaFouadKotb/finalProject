<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
  @include('adminIncludes.head')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-graduation-cap"></i></i> <span>Beverages Admin</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            @include('adminIncludes.menuProfile')
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            @include('adminIncludes.sideBar')
					<!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            @include('adminIncludes.menuFooter')
            
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        @include('adminIncludes.topNav')
        <!-- /top navigation -->

        @yield('content')

        <!-- footer content -->
        @include('adminIncludes.footer')
        <!-- /footer content -->
      </div>
    </div>

   @include('adminIncludes.js')

  </body>
</html>