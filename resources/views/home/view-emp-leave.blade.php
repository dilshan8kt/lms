@extends('shared.employee-layout')
@section('title')
  Leave
@endsection

@section('body')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Employee Leave Details</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li>
                            <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    {{--  <div class="form-horizontal form-label-left">  --}}
                    <div class="row">
                        <div class="item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="name">Employee No</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label class="control-label col-md-6 col-sm-6 col-xs-12" for="name">{{$user->id}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="name">Employee Name</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label class="control-label col-md-6 col-sm-6 col-xs-12" for="name">{{$user->first_name}} {{$user->middle_name}}</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h4>Leave Balance</h4>

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


                    <div class="row">
                        <div class="item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="name">Reason for leave apply</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label class="control-label col-md-6 col-sm-6 col-xs-12" for="name">{{$leave->reason}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="name">Leave type</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label class="control-label col-md-6 col-sm-6 col-xs-12" for="name">{{$leave->leave_type}}</label>
                            </div>
                        </div>
                    </div>

                    <br>
                    <br>
                    <br>
                        
                    <div class="row">
                        <div class="col-md-5">
                            
                        </div>
                        <div class="col-md-1">
                            <form method="POST" action="{{Route('leave-reject')}}">
                                {{csrf_field()}}
                                <input type="hidden" name="id" value="{{$leave->id}}">
                                <button type="submit" class="btn btn-danger" >Reject</button>
                            </form>
                        </div>
                        <div class="col-md-1">
                            <form method="POST" action="{{Route('leave-accept')}}">
                                {{csrf_field()}}
                                <input type="hidden" name="id" value="{{$leave->id}}">
                                <button type="submit" class="btn btn-info" >Accept</button>
                            </form>
                        </div>
                    </div>
                    {{--  </div>  --}}
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection