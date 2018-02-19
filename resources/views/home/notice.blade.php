@extends('shared.admin-layout')
@section('title')
  Notice
@endsection

@section('body')
<!-- page content -->
<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Add Notice</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left" method="POST" action="{{Route('add-notice')}}" novalidate>
                    {{csrf_field()}}

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Subject <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="subject" class="form-control col-md-7 col-xs-12" data-validate-length-range="10" name="subject" placeholder="reason" required="required" type="text">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Description<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea id="textarea" name="description" required="required" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                    </div>
    
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-3">
                        <a href="#" class="btn btn-primary">Cancel</a>
                        <button type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>
                </form>
            </div>
        </div>
    </div>   




    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
            <h2>Holiday Details</h2>
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
                    <th>Subject</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($notice as $noti)
                    <tr>
                        <td>
                            <a href="noti-delete/{{$noti->id}}" class="btn btn-danger fa fa-trash"></a>
                            <a href="noti-edit/{{$noti->id}}" class="btn btn-info fa fa-edit"></a>
                        </td>
                        <td>{{ $noti->subject }}</td>
                        <td>{{ $noti->description }}</td>
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

@if(session()->has('notice-update'))
    @section('scripts')
        <script>
            $(document).ready(function() {
                new PNotify({
                title: 'Success',
                text: 'Notice Details Update Success!!',
                type: 'success',
                styling: 'bootstrap3'
                });
            });
        </script>
    @endsection
@elseif(session()->has('notice-delete'))
    @section('scripts')
        <script>
            $(document).ready(function() {
                new PNotify({
                title: 'Success',
                text: 'Notice Details Delete Success!!',
                type: 'success',
                styling: 'bootstrap3'
                });
            });
        </script>
    @endsection
@elseif(session()->has('add-notice'))
    @section('scripts')
        <script>
            $(document).ready(function() {
                new PNotify({
                title: 'Success',
                text: 'Holiday Details Added Success!!',
                type: 'success',
                styling: 'bootstrap3'
                });
            });
        </script>
    @endsection
@endif