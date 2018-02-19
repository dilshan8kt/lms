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
                <h2>Edit Leave Categories</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left" method="POST" action="{{Route('edit-cat')}}" novalidate>
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{ $lcategory->id }}">
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Leave Category <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="lcategory" class="form-control col-md-7 col-xs-12" data-validate-length-range="10" name="lcategory" placeholder="leave category name" value="{{ $lcategory->name }}" required="required" type="text">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">No. Of Days Month <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" id="nodm" name="nodm" required="required" data-validate-minmax="1,30" value="{{ $lcategory->days }}" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
    
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                        <a href="{{ Route('leave-category') }}" class="btn btn-primary">Cancel</a>
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

@if(session()->has('cat-update'))
    @section('scripts')
        <script>
            $(document).ready(function() {
                new PNotify({
                title: 'Updated',
                text: 'Leave Category Updated!!',
                type: 'success',
                styling: 'bootstrap3'
                });
            });
        </script>
    @endsection
@endif