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
                <h2>Edit Notice</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left" method="POST" action="{{Route('edit-notice')}}" novalidate>
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$notice->id}}">
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Subject <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="subject" value="{{$notice->subject}}" class="form-control col-md-7 col-xs-12" data-validate-length-range="10" name="subject" placeholder="reason" required="required" type="text">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Description<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea id="textarea" name="description" value="{{$notice->description}}" required="required" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                    </div>
    
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <a href="{{Route('notice')}}" class="btn btn-primary">Cancel</a>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>   
</div>
<!-- /page content -->
@endsection