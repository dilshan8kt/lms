<div class="navbar nav_title" style="border: 0;">
    <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Intel Access</span></a>
</div>

<div class="clearfix"></div>
    
    <!-- menu profile quick info -->
    <div class="profile clearfix">
        @if(Storage::disk('local')->has(Auth::user()->emp_code . '-' . Auth::user()->first_name . '.jpg')) 
            <div class="profile_pic">
                <img class="img-circle profile_img" src="{{ route('image', ['filename' => Auth::user()->emp_code . '-' . Auth::user()->first_name . '.jpg']) }}" alt=""/>
            </div>
        @endif
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
                <a  href="{{Route('index-employee')}}">
                    <i class="fa fa-home"></i> Dashboard <span class="fa fa-chevron"></span>
                </a>
            </li>

            <li>
                <a>
                    <i class="fa fa-edit"></i> Leave <span class="fa fa-chevron-down"></span>
                </a>
                <ul class="nav child_menu">
                    <li><a href="{{Route('apply-leave')}}">Apply Leave</a></li>
                    <li><a href="{{Route('my-leave')}}">My Leave</a></li>
                </ul>
            </li>

            <li>
                <a>
                    <i class="fa fa-info"></i> Calender <span class="fa fa-chevron-down"></span>
                </a>
                <ul class="nav child_menu">
                    <li><a href="{{Route('calender')}}">View Calender</a></li>
                    <li><a href="{{Route('emp-holiday')}}">View Holiday</a></li>
                </ul>
            </li>

            <li>
                <a>
                    <i class="fa fa-table"></i> Report <span class="fa fa-chevron-down"></span>
                </a>
                <ul class="nav child_menu">
                    <li><a href="{{Route('my-leave')}}">Leave Records</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- /sidebar menu -->