<!DOCTYPE html>
<html lang="en">
@include('includes.headSite')
<body>
  <div class="tm-container">
    <div class="tm-row">
      <!-- Site Header -->
      @include('includes.headerLeft')
      
      <div class="tm-right">
        <main class="tm-main">
        @yield('contents')
          <!-- end Contact Page -->
        </main>
      </div>    
    </div>
    @include('includes.footer')
  </div>
  <!-- Background video -->
  @include('includes.video')
  @include('includes.js')
</body>
</html>