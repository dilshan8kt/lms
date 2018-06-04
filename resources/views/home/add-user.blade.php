@extends('shared.admin-layout')
@section('title')
  Users
@endsection

@section('body')
  <!-- page content -->
  <div class="right_col" role="main">
    <!-- page content -->
    <div class="">

      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif

      <div class="page-title">
        <div class="clearfix"></div>

        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>User Registration <small>Add new user</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <form class="form-horizontal form-label-left" method="POST" action="{{Route('add-user')}}" enctype="multipart/form-data" novalidate>
                  {{csrf_field()}}
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Employee No <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="empno" class="form-control col-md-7 col-xs-12" data-validate-length-range="10" name="empno" placeholder="employee no" required="required" type="text">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Employee Name <span class="required">*</span>
                    </label>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <input id="fname" class="form-control col-md-2 col-xs-12" data-validate-length-range="50" name="fname" placeholder="first name" required="required" type="text">
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <input id="mname" class="form-control col-md-2 col-xs-12" data-validate-length-range="50" name="mname" placeholder="middle name" type="text">
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <input id="lname" class="form-control col-md-2 col-xs-12" data-validate-length-range="50" name="lname" placeholder="last name" type="text">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Telephone <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="tel" id="telephone" name="phone" required="required" data-validate-length-range="10,10" class="form-control col-md-7 col-xs-12" numeric>
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Username <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="uname" class="form-control col-md-7 col-xs-12" data-validate-length-range="10" name="uname" placeholder="username.." required="required" type="text">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label for="password" class="control-label col-md-3">Password</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="password" type="password" name="password" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" required="required">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3">Image :</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input class="form-control" type="file" id="image" name="image" placeholder="User Image"/>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Select User Role</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control" name="role">
                        <option>Employee</option>
                        <option>Admin</option>
                      </select>
                    </div>
                  </div>

                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                      <a href="{{Route('viewusers')}}" class="btn btn-primary">Cancel</a>
                      <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <!-- /page content -->
@endsection