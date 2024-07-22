<div class="clearfix"></div>

@if (session('user_name'))
    <!-- menu profile quick info -->
    <div class="profile clearfix">
        <div class="profile_pic">
            <!-- Use a dynamic image path if user-specific images are implemented -->
            <img src="{{ session('profile_image') ? asset(session('profile_image')) : asset('adminAssets/images/default-profile.jpg') }}" alt="User profile image" class="img-circle profile_img">
        </div>
        <div class="profile_info">
            <span>Welcome,</span>
            <h2>{{ session('user_name') }}</h2>
        </div>
    </div>
@else
    <!-- Static profile image section (if needed) -->
    <div class="profile clearfix">
        <div class="profile_pic">
            <img src="{{ asset('adminAssets/images/default-profile.jpg') }}" alt="Static profile image" class="img-circle profile_img">
        </div>
    </div>
@endif

<br />
