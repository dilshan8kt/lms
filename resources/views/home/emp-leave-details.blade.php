@extends('shared.admin-layout')
@section('title')
  Leaves
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
                            <h2>Leave Balance | {{$user->id}} - {{$user->first_name}} {{$user->last_name}}</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="col-md-12">
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
                                
                                <div class="row">
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Leave Start</th>
                                                <th>Leave End</th>
                                                <th>No.Of Days</th>
                                                <th>Leave Type</th>
                                                <th>Reason</th>
                                                <th>Approved by</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($leave as $lea)
                                                <tr>
                                                    <td>{{ $lea->leave_start }}</td>
                                                    <td>{{ $lea->leave_end }}</td>
                                                    <td>{{ $lea->days }}</td>
                                                    <td>{{ $lea->leave_type }}</td>
                                                    <td>{{ $lea->reason }}</td>
                                                    <td>{{ $lea->approved_by }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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