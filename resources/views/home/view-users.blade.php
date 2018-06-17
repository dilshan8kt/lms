@extends('shared.admin-layout')
@section('title')
  Users
@endsection

@section('body')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>User Details</h2>
          <a class="btn btn-danger" href="{{ route('report') }}">User Report Generate</a>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <table id="datatable-buttons" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Action</th>
                <th>EmpNumber</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Middle Name</th>
                <th>Email</th>
                <th>Leave</th>
              </tr>
            </thead>


            <tbody>
              @foreach ($users as $user)
                <tr>
                  <td>
                    <a href="user-delete/{{$user->id}}" class="btn btn-danger fa fa-trash"></a>
                    <a href="user-edit/{{$user->id}}" class="btn btn-info fa fa-edit"></a>
                  </td>
                  <td>{{ $user->emp_code }}</td>
                  <td>{{ $user->first_name }}</td>
                  <td>{{ $user->last_name }}</td>
                  <td>{{ $user->middle_name }}</td>
                  <td>{{ $user->email }}</td>
                  <td><a href="view-leave-details/{{$user->id}}">View Leave</a></td>
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


@if(session()->has('new-user'))
  @section('scripts')
    <script>
      $(document).ready(function() {
        new PNotify({
          title: 'Success',
          text: 'New Employee Registerd Success!!',
          type: 'success',
          styling: 'bootstrap3'
        });
      });
    </script>
  @endsection
@elseif(session()->has('delete-user'))
  @section('scripts')
    <script>
      $(document).ready(function() {
        new PNotify({
          title: 'Success',
          text: 'Employee Removed Success!!',
          type: 'success',
          styling: 'bootstrap3'
        });
      });
    </script>
  @endsection
@elseif(session()->has('update-user'))
  @section('scripts')
    <script>
      $(document).ready(function() {
        new PNotify({
          title: 'Success',
          text: 'Employee Update Success!!',
          type: 'info',
          styling: 'bootstrap3'
        });
      });
    </script>
  @endsection
@endif

