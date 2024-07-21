<!DOCTYPE html>
<html lang="en">
@include('includes.headSite')
<body>
  <div class="tm-container">
    <div class="tm-row">
      <!-- Site Header -->
      <div class="tm-left">
        <div class="tm-left-inner">
          <div class="tm-site-header">
            <i class="fas fa-coffee fa-3x tm-site-logo"></i>
            <h1 class="tm-site-name">Wave Cafe</h1>
          </div>
          @include('includes.nav')
        </div>        
      </div>
      
      <div class="tm-right">
        <main class="tm-main">
<div id="drink" class="tm-page-content">
<nav class="tm-black-bg tm-drinks-nav">
              <ul>
                <li>
                  <a href="{{route('beverages')}}" class="tm-tab-link active" data-id="cold">Iced Coffee</a>
                </li>
                <li>
                  <a href="#" class="tm-tab-link" data-id="hot">Hot Coffee</a>
                </li>
                <li>
                  <a href="#" class="tm-tab-link" data-id="juice">Fruit Juice</a>
                </li>
              </ul>
            </nav>
  @include('includes.drinkMenu')
  @include('includes.aboutUs')
  @include('includes.special')
  @include('includes.contact')

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