@extends('shared.admin-layout')
@section('title')
  Dashboard
@endsection

@section('active')
  class="active"
@endsection

@section('body')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="row top_tiles">
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="tile-stats">
            <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
            <div class="count">{{$ucount}}</div>
            <h3>Total Employees</h3>
            <p>Total registerd employees</p>
          </div>
        </div>


          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
              <div class="icon"><i class="fa fa-comments-o"></i></div>
              <div class="count">{{$leave}}</div>
              <h3>
                @if($leave > 0)
                <a href="{{Route('leave')}}">
                  Arrived Requests
                </a>
                @else
                  Arrived Requests
                @endif
              </h3>
              <p>Employee leave requests</p>
            </div>
          </div>

          
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="tile-stats">
            <div class="icon"><i class="fa fa-check-square-o"></i></div>
            <div class="count">{{$acount}}</div>
            <h3>Admin Users</h3>
            <p>Total system admin users</p>
          </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="tile-stats">
            <div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
            <div class="count">LMS</div>
            <h3>!!!</h3>
            <p>Intel Access Business Solution</p>
          </div>
        </div>
      </div>

      {{--  <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Transaction Summary <small>Weekly progress</small></h2>
              
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

            </div>

            </div>
          </div>
        </div>
      </div>  --}}

      <div class="row">
        <div class="col-md-6">
          <div class="x_panel">
            <div class="x_title">
              <h2>Special Notices <small>Monthly progress</small></h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              @foreach($notice as $noti)
                <article class="media event">
                  <a class="pull-left date">
                    <p class="month">
                      @if(\Carbon\Carbon::parse($noti->created_at)->month === 1)
                        Jan
                      @elseif(\Carbon\Carbon::parse($noti->created_at)->month === 2)
                        Feb
                      @elseif(\Carbon\Carbon::parse($noti->created_at)->month === 3)
                        Mar
                      @elseif(\Carbon\Carbon::parse($noti->created_at)->month === 4)
                        Apr
                      @elseif(\Carbon\Carbon::parse($noti->created_at)->month === 5)
                        May
                      @elseif(\Carbon\Carbon::parse($noti->created_at)->month === 6)
                        Jun
                      @elseif(\Carbon\Carbon::parse($noti->created_at)->month === 7)
                        Jul
                      @elseif(\Carbon\Carbon::parse($noti->created_at)->month === 8)
                        Aug
                      @elseif(\Carbon\Carbon::parse($noti->created_at)->month === 9)
                        Sep
                      @elseif(\Carbon\Carbon::parse($noti->created_at)->month === 10)
                        Oct
                      @elseif(\Carbon\Carbon::parse($noti->created_at)->month === 11)
                        Nov
                      @elseif(\Carbon\Carbon::parse($noti->created_at)->month === 12)
                        Dec
                      @endif
                    </p>
                    <p class="day">{{\Carbon\Carbon::parse($noti->created_at)->day}}</p>
                  </a>
                  <div class="media-body">
                    <a class="title" href="#">{{$noti->subject}}</a>
                    <p>{{$noti->description}}</p>
                  </div>
                </article>
              @endforeach
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="x_panel">
            <div class="x_title">
              <h2>Holiday Details <small>yearly progress</small></h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              @foreach($holiday as $holi)
                <article class="media event">
                  <a class="pull-left date">
                    <p class="month">
                      @if(\Carbon\Carbon::parse($holi->date)->month === 1)
                        Jan
                      @elseif(\Carbon\Carbon::parse($holi->date)->month === 2)
                        Feb
                      @elseif(\Carbon\Carbon::parse($holi->date)->month === 3)
                        Mar
                      @elseif(\Carbon\Carbon::parse($holi->date)->month === 4)
                        Apr
                      @elseif(\Carbon\Carbon::parse($holi->date)->month === 5)
                        May
                      @elseif(\Carbon\Carbon::parse($holi->date)->month === 6)
                        Jun
                      @elseif(\Carbon\Carbon::parse($holi->date)->month === 7)
                        Jul
                      @elseif(\Carbon\Carbon::parse($holi->date)->month === 8)
                        Aug
                      @elseif(\Carbon\Carbon::parse($holi->date)->month === 9)
                        Sep
                      @elseif(\Carbon\Carbon::parse($holi->date)->month === 10)
                        Oct
                      @elseif(\Carbon\Carbon::parse($holi->date)->month === 11)
                        Nov
                      @elseif(\Carbon\Carbon::parse($holi->date)->month === 12)
                        Dec
                      @endif
                    </p>
                    <p class="day">{{\Carbon\Carbon::parse($holi->date)->day}}</p>
                  </a>
                  <div class="media-body">
                    <a class="title" href="#">{{$holi->reason}}</a>
                    <p>{{$holi->description}}</p>
                  </div>
                </article>
              @endforeach
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- /page content -->
@endsection