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
                <h2>User Details</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Leave Start</th>
                            <th>Leave End</th>
                            <th>No.Of Days</th>
                            <th>Leave Type</th>
                            <th>Reason</th>
                            <th>Status</th>
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
                                @if($lea->status === 1)
                                    <td><lable class="label label-success">Accepted</lable></td>
                                @elseif($lea->status === 2)
                                    <td><lable class="label label-danger">Reject</lable></td>
                                @else
                                    <td><lable class="label label-info">Pending</lable></td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@endsection