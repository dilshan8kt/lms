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
                <h2>Add Leave Categories</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left" method="POST" action="{{Route('add-lcategory')}}" novalidate>
                    {{csrf_field()}}
                    
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Leave Category <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="lcategory" class="form-control col-md-7 col-xs-12" data-validate-length-range="10" name="lcategory" placeholder="leave category name" required="required" type="text">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">No. Of Days Month <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" id="nodm" name="nodm" required="required" data-validate-minmax="1,30" class="form-control col-md-7 col-xs-12">
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
            <h2>Leave Categories</h2>
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
                    <th>Leave Category</th>
                    <th>No.Of Days for Month</th>
                </tr>
                </thead>
    
    
                <tbody>
                @foreach ($lcategory as $cat)
                    <tr>
                        <td>
                            <a href="cat-delete/{{$cat->id}}" class="btn btn-danger fa fa-trash"></a>
                            <a href="cat-edit/{{$cat->id}}" class="btn btn-info fa fa-edit"></a>
                        </td>
                        <td>{{ $cat->name }}</td>
                        <td>{{ $cat->days }}</td>
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



@if(session()->has('add-leave-cat'))
    @section('scripts')
        <script>
            $(document).ready(function() {
                new PNotify({
                title: 'Success',
                text: 'New Leave Category Added Success!!',
                type: 'success',
                styling: 'bootstrap3'
                });
            });
        </script>
    @endsection
@elseif(session()->has('delete-cat'))
    @section('scripts')
        <script>
            $(document).ready(function() {
                new PNotify({
                title: 'Success',
                text: 'Leave Category Delete Success!!',
                type: 'success',
                styling: 'bootstrap3'
                });
            });
        </script>
    @endsection
@endif
