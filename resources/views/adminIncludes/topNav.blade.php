
<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
            <ul class=" navbar-right">
                <!-- User Profile -->
                <li class="nav-item dropdown open">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                        <img src="{{asset('adminAssets/images/img.jpg')}}" alt="">
                      
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="javascript:;"> Profile</a>
                        <a class="dropdown-item" href="javascript:;">
                            <span class="badge bg-red pull-right">50%</span>
                            <span>Settings</span>
                        </a>
                        <a class="dropdown-item" href="javascript:;">Help</a>
                        <a class="dropdown-item" href="#"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                </li>

                <!-- Messages Dropdown -->
                <li role="presentation" class="nav-item dropdown open">
                    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green">{{ App\Models\Message::where('is_read', false)->count() }}</span>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                        @foreach(App\Models\Message::where('is_read', false)->take(5)->get() as $message)
                            <li class="nav-item">
                                <a class="dropdown-item">
                                    <span class="image"><img src="{{asset('adminAssets/images/img.jpg')}}" alt="Profile Image" /></span>
                                    <span>
                                        <span>{{ $message->full_name }}</span>
                                        <span class="time">{{ $message->created_at->diffForHumans() }}</span>
                                    </span>
                                    <span class="message">
                                        {{ Str::limit($message->message, 50) }}
                                    </span>
                                </a>
                            </li>
                        @endforeach
                        <li class="nav-item">
                            <div class="text-center">
                                <a class="dropdown-item" href="{{ route('messages.index') }}">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->