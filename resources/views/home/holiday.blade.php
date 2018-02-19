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
                <h2>Add Holiday</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left" method="POST" action="{{Route('add-holiday')}}" novalidate>
                    {{csrf_field()}}
                    
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Date <span class="required">*</span>
                      </label>
                      <fieldset>
                        <div class="control-group">
                          <div class="controls">
                            <div class="col-md-4 xdisplay_inputx form-group has-feedback">
                              <input type="text" name="date" class="form-control has-feedback-left" id="single_cal1" placeholder="First Name" aria-describedby="inputSuccess2Status">
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
                            <input id="reason" class="form-control col-md-7 col-xs-12" data-validate-length-range="10" name="reason" placeholder="reason" required="required" type="text">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Description
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea id="textarea" name="description" class="form-control col-md-7 col-xs-12"></textarea>
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
                    <th>Date</th>
                    <th>Reason</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($holiday as $holi)
                    <tr>
                        <td>
                            <a href="holi-delete/{{$holi->id}}" class="btn btn-danger fa fa-trash"></a>
                            <a href="holi-edit/{{$holi->id}}" class="btn btn-info fa fa-edit"></a>
                        </td>
                        <td>{{ $holi->date }}</td>
                        <td>{{ $holi->reason }}</td>
                        <td>{{ $holi->description }}</td>
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

@if(session()->has('holiday-update'))
    @section('scripts')
        <script>
            $(document).ready(function() {
                new PNotify({
                title: 'Success',
                text: 'Holiday Details Update Success!!',
                type: 'success',
                styling: 'bootstrap3'
                });
            });
        </script>
    @endsection
@elseif(session()->has('holiday-delete'))
    @section('scripts')
        <script>
            $(document).ready(function() {
                new PNotify({
                title: 'Success',
                text: 'Holiday Details Delete Success!!',
                type: 'success',
                styling: 'bootstrap3'
                });
            });
        </script>
    @endsection
@elseif(session()->has('add-holiday'))
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