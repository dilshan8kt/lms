<div class="navbar nav_title" style="border: 0;">
    <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Intel Access</span></a>
</div>

<div class="clearfix"></div>
 
 <!-- menu profile quick info -->
 <div class="profile clearfix">
    <div class="profile_pic">
        <img src="/images/img.jpg" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
        <span>Welcome,</span>
        {{--  {{ $user->hasRole('Admin') ? 'Admin':'Employee' }}  --}}
        <h2>{{ Auth::user()->first_name }} {{ Auth::user()->middle_name }}</h2>
    </div>
</div>
<!-- /menu profile quick info -->

<br />

<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            
            <li>
                <a  href="{{Route('index-admin')}}">
                    <i class="fa fa-home"></i> Dashboard <span class="fa fa-chevron"></span>
                </a>
            </li>

            <li>
                <a>
                    <i class="fa fa-user"></i> User <span class="fa fa-chevron-down"></span>
                </a>
                <ul class="nav child_menu">
                    <li><a href="{{Route('adduser')}}">Add User</a></li>
                    {{--  <li><a href="{{Route('edituser')}}">Edit Users</a></li>  --}}
                    <li><a href="{{Route('viewusers')}}">All Users</a></li>
                </ul>
            </li>

            <li>
                <a>
                    <i class="fa fa-edit"></i> Leave <span class="fa fa-chevron-down"></span>
                </a>
                <ul class="nav child_menu">
                    <li><a href="{{Route('leave')}}">All Leave</a></li>
                    <li><a href="{{Route('leave-category')}}">Add Leave Category</a></li>
                </ul>
            </li>

            <li>
                <a>
                    <i class="fa fa-info"></i> Holiday <span class="fa fa-chevron-down"></span>
                </a>
                <ul class="nav child_menu">
                    <li><a href="{{Route('holiday')}}">Add Holiday</a></li>
                </ul>
            </li>

            <li>
                <a>
                    <i class="fa fa-table"></i> Special Notices <span class="fa fa-chevron-down"></span>
                </a>
                <ul class="nav child_menu">
                    <li><a href="{{Route('notice')}}">Add Notices</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- /sidebar menu -->