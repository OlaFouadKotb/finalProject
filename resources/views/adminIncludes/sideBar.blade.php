<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ route('users') }}">Users List</a></li>
                    <li><a href="{{ route('addUsers') }}">Add User</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-edit"></i> Categories <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ route('addCategories') }}">Add Category</a></li>
                    <li><a href="{{ route('categories') }}">Categories List</a></li>
                </ul>
            </li> 
            <li><a><i class="fa fa-desktop"></i> Beverages <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ route('beverages.create') }}">Add Beverage</a></li>
                    <li><a href="{{ route('beverages') }}">Beverages List</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-envelope"></i> Messages <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('messages.index')}}">Messages List</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
