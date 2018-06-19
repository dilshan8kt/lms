<!-- top navigation -->
<div class="top_nav">
  <div class="nav_menu">
    <nav>
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>

      <ul class="nav navbar-nav navbar-right">
        <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            
            @if(Storage::disk('local')->has(Auth::user()->emp_code . '-' . Auth::user()->first_name . '.jpg'))  
              <img src="{{ route('image', ['filename' => Auth::user()->emp_code . '-' . Auth::user()->first_name . '.jpg']) }}" alt=""/>
            @endif
            
            {{Auth::user()->username}}
            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
            <li><a href="{{Route('profile')}}"><i class="fa fa-profile pull-right"></i> Profile</a></li>
            <li><a href="{{Route('signout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
            <li><a href="{{Route('signout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
          </ul>
        </li>

         {{-- <li role="presentation" class="dropdown">
          <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-envelope-o"></i>
            <span class="badge bg-green">6</span>
          </a>
          <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
            <li>
              <a>
                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                <span>
                  <span>John Smith</span>
                  <span class="time">3 mins ago</span>
                </span>
                <span class="message">
                  Film festivals used to be do-or-die moments for movie makers. They were where...
                </span>
              </a>
            </li>
          </ul>
        </li>  --}}
      </ul>
    </nav>
  </div>
</div>
<!-- /top navigation -->