@extends('shared.admin-layout')
@section('title')
  Holiday
@endsection

@section('body')
<!-- page content -->
<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Holiday</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left" method="POST" action="{{Route('edit-holiday')}}" novalidate>
                    {{csrf_field()}}
                    <input type="hidden" value="{{$holiday->id}}" name="id">
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Date <span class="required">*</span>
                      </label>
                      <fieldset>
                        <div class="control-group">
                          <div class="controls">
                            <div class="col-md-4 xdisplay_inputx form-group has-feedback">
                              <input type="text" name="date" class="form-control has-feedback-left" select="{{$holiday->date}}" id="single_cal1" placeholder="First Name" aria-describedby="inputSuccess2Status">
                              <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                              <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>
                          </div>
                        </div>
                      </fieldset>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Reason <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="reason" class="form-control col-md-7 col-xs-12" value="{{$holiday->reason}}" data-validate-length-range="10" name="reason" placeholder="reason" required="required" type="text">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Description
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea id="textarea" name="description" value="{{$holiday->description}}" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                    </div>
    
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                        <a href="{{Route('holiday')}}" class="btn btn-primary">Cancel</a>
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