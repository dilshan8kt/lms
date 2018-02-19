@extends('shared.employee-layout')
@section('title')
  Employee
@endsection

@section('active')
  class="active"
@endsection

@section('body')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
        

      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Leave Balance</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="col-md-9">
                <ul class="stats-overview">

                  @foreach($leavebalance as $lb)
                    <li>
                      <span class="name">{{$lb->name}}</span>
                      <span class="value text-success">
                        <span id="casualLbl">
                          {{$lb->days}}
                        </span>
                      </span>

                      @foreach($lbemployee as $l)
                        @if($lb->name === $l->leave_type)
                          Balance
                          <span class='{{$lb->days - $l->total < 0 ? 'value text-danger':'value text-success'}}'>
                            <span id="casualLbl">
                              {{ $lb->days - $l->total }}
                            </span>
                          </span>
                        @endif
                      @endforeach

                    </li>
                  @endforeach
                </ul>

                <div id="mainb" style="height:20px;"></div>
                <div>
                  <h4>Notifications !</h4>
                  <!-- end of user messages -->
                  <ul class="messages">
                    @foreach($notice as $noti)
                    <li>
                      <div class="fa-hover col-md-3 col-sm-4 col-xs-12">
                        <i class="fa fa-plus-square"></i>
                      </div>
                      <div class="message_wrapper">
                        <h4 class="heading">
                          <span>{{$noti->subject}}</span>
                        </h4>
                        <span>{{$noti->description}}</span>
                        <br>
                      </div>
                    </li>
                    @endforeach
                  </ul>
                  <!-- end of user messages -->
                </div>
              </div> 
              <div class="col-md-3">
                <br>
                <div class="x_title">
                  <h2>System Description</h2>
                  <div class="clearfix"></div>
                </div>

                <div class="panel-body">
                  <h3 class="green"><i class="fa fa-paint-brush"></i> LMS</h3>
                  <p>Here have showed your entitled leave balance.also from the Leave sevtion you can easily apply for a leave and waiting for the approval.</p>
                  <br />
                  <div class="project_detail">
                    <p class="title">Client Company</p>
                    <p>Deveint Inc</p>
                    <p class="title">Reporting Manager</p>
                     <label>Tony Chicken<label>
                  </div>
                  <br><br>
                </div>
              </div> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /page content -->
@endsection