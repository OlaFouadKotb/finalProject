<div class="clearfix"></div>

<!-- menu profile quick info -->
@if (Auth::check())
<div class="profile clearfix">
  <div class="profile_pic">
    <img src="{{ asset('adminAssets/images/img.jpg') }}" alt="..." class="img-circle profile_img">
  </div>
  <div class="profile_info">
    <span>Welcome,</span>
    <h2>{{ Auth::user()->user_name }}</h2>
  </div>
</div>
@endif
<!-- /menu profile quick info -->

<br />
