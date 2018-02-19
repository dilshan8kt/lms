@extends('shared.admin-layout')
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
                            <th>Employee Number</th>
                            <th>Employee Name</th>
                            <th>Laave Start</th>
                            <th>Leave End</th>
                            <th>No.Of Days</th>
                            <th>Leave Type</th>
                            <th>Reason</th>
                            <th>Action</th>
                        </tr>
                    </thead>
      
      
                    <tbody>
                        @foreach ($leave as $leaves)
                            <tr>
                                <td>{{ $leaves->emp_id }}</td>
                                <td>{{ $leaves->emp_name }}</td>
                                <td>{{ $leaves->leave_start }}</td>
                                <td>{{ $leaves->leave_end }}</td>
                                <td>{{ $leaves->days }}</td>
                                <td>{{ $leaves->leave_type }}</td>
                                <td>{{ $leaves->reason }}</td>
                                <td>
                                    <a href="leave-reject/{{$leaves->id}}" class="btn btn-danger btn-sm">Reject</a>
                                    <a href="leave-accept/{{$leaves->id}}" class="btn btn-info btn-sm">Accept</a>
                                    <a href="leave-view/{{$leaves->id}}/{{$leaves->emp_id}}" class="btn btn-success btn-sm">View</a>
                                </td>
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


@if(session()->has('rejected'))
  @section('scripts')
    <script>
      $(document).ready(function() {
        new PNotify({
          title: 'Rejected',
          text: 'Leave Rejected Success!!',
          type: 'success',
          styling: 'bootstrap3'
        });
      });
    </script>
  @endsection
@elseif(session()->has('accepted'))
    @section('scripts')
        <script>
        $(document).ready(function() {
            new PNotify({
            title: 'Accepted',
            text: 'Leave Accept Success!!',
            type: 'success',
            styling: 'bootstrap3'
            });
        });
        </script>
    @endsection
@endif