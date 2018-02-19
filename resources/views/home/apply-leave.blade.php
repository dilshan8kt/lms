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
                    <h2>Apply Leave</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li>
                            <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form class="form-horizontal form-label-left" method="POST" action="{{Route('apply-leave')}}" novalidate>
                        {{csrf_field()}}
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                Select Date <span class="required">*</span>
                            </label> 
                            <div class="control-group col-md-3">
                                <div class="input-prepend input-group">
                                    <span class="add-on input-group-addon">
                                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                    </span>
                                    <input type="text" style="width: 200px" name="daterange" id="reservation" class="form-control" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Leave Type</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" name="ltype">
                                    @foreach($lcategory as $cat)
                                        <option>{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Reason <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="textarea" required="required" name="reason" class="form-control col-md-7 col-xs-12"></textarea>
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
    </div>
    <!-- /page content -->
@endsection

@if(session()->has('apply-leave'))
  @section('scripts')
    <script>
        $(document).ready(function() {
            new PNotify({
            title: 'Successfully',
            text: 'Leave Apply Success!!',
            type: 'success',
            styling: 'bootstrap3'
            });
        });
    </script>
  @endsection
@elseif(session()->has('error1'))
    @section('scripts')
        <script>
            $(document).ready(function() {
                new PNotify({
                title: 'Error',
                text: 'You only can apply leave 3 months forword',
                type: 'error',
                styling: 'bootstrap3'
                });
            });
        </script>
    @endsection
@elseif(session()->has('error2'))
    @section('scripts')
        <script>
            $(document).ready(function() {
                new PNotify({
                title: 'Error',
                text: 'You only can apply leave 1 month before',
                type: 'error',
                styling: 'bootstrap3'
                });
            });
        </script>
    @endsection
@endif