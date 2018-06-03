<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LMS | @yield('title')</title>

        {{--  Bootstrap  --}}
        <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        {{--  Font Awesome  --}}
        <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        {{--  NProgress  --}}
        <link href="{{ asset('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
        {{--  bootstrap-daterangepicker  --}}
        <link href="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
        {{--  Custom Theme Style  --}}
        <link href="{{ asset('build/css/custom.min.css') }}" rel="stylesheet">
        {{--  jQuery custom content scroller  --}}
        <link href="{{ asset('vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css') }}" rel="stylesheet"/> 

        {{--  PNotify  --}}
        <link href="{{ asset('vendors/pnotify/dist/pnotify.css') }}" rel="stylesheet">
        <link href="{{ asset('vendors/pnotify/dist/pnotify.buttons.css') }}" rel="stylesheet">
        <link href="{{ asset('vendors/pnotify/dist/pnotify.nonblock.css') }}" rel="stylesheet">

        {{--  FullCalendar  --}}
        <link href="{{ asset('vendors/fullcalendar/dist/fullcalendar.min.css') }}" rel="stylesheet">
        <link href="{{ asset('vendors/fullcalendar/dist/fullcalendar.print.css') }}" rel="stylesheet" media="print">

        {{--  Datatables  --}}
        <link href="{{ asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">

        {{--  <link href="{{ asset('css/app.css') }}" rel="stylesheet">  --}}
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col menu_fixed">
                    <div class="left_col scroll-view">
            
                        @include("shared.employee-side-nav")
            
                        {{--  menu footer buttons  --}}
                        <div class="sidebar-footer hidden-small">
                            <a data-toggle="tooltip" data-placement="top" title="Settings">
                                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Lock">
                                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                            </a>
                        </div>
                        {{--  menu footer buttons  --}}
                    </div>
                </div>
            
                @include("shared.top-nav")
                
                @yield('body')

            </div>
        </div>
        
        {{--  jQuery  --}}
        <script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
        {{--  Bootstrap  --}}
        <script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        {{--  FastClick  --}}
        <script src="{{ asset('vendors/fastclick/lib/fastclick.js') }}"></script>
        {{--  NProgress  --}}
        <script src="{{ asset('vendors/nprogress/nprogress.js') }}"></script>
        {{--  Chart.js  --}}
        <script src="{{ asset('vendors/Chart.js/dist/Chart.min.js') }}"></script>
        {{--  jQuery Sparklines  --}}
        <script src="{{ asset('vendors/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
        {{--  Flot  --}}
        <script src="{{ asset('vendors/Flot/jquery.flot.js') }}"></script>
        <script src="{{ asset('vendors/Flot/jquery.flot.pie.js') }}"></script>
        <script src="{{ asset('vendors/Flot/jquery.flot.time.js') }}"></script>
        <script src="{{ asset('vendors/Flot/jquery.flot.stack.js') }}"></script>
        <script src="{{ asset('vendors/Flot/jquery.flot.resize.js') }}"></script>
        {{--  Flot plugins  --}}
        <script src="{{ asset('vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
        <script src="{{ asset('vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
        <script src="{{ asset('vendors/flot.curvedlines/curvedLines.js') }}"></script>
        {{--  DateJS  --}}
        <script src="{{ asset('vendors/DateJS/build/date.js') }}"></script>
        {{--  bootstrap-daterangepicker  --}}
        <script src="{{ asset('vendors/moment/min/moment.min.js') }}"></script>
        <script src="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
        {{--  validator  --}}
        <script src="{{ asset('vendors/validator/validator.js') }}"></script>
        {{--  Custom Theme Scripts  --}}
        <script src="{{ asset('build/js/custom.min.js') }}"></script>
        {{--  jQuery custom content scroller  --}}
        <script src="{{ asset('vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>

        {{--  Datatables  --}}
        <script src="{{ asset('vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
        <script src="{{ asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
        <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
        <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('vendors/jszip/dist/jszip.min.js') }}"></script>
        <script src="{{ asset('vendors/pdfmake/build/pdfmake.min.js') }}"></script>
        <script src="{{ asset('vendors/pdfmake/build/vfs_fonts.js') }}"></script>

        {{--  PNotify  --}}
        <script src="{{ asset('vendors/pnotify/dist/pnotify.js') }}"></script>
        <script src="{{ asset('vendors/pnotify/dist/pnotify.buttons.js') }}"></script>
        <script src="{{ asset('vendors/pnotify/dist/pnotify.nonblock.js') }}"></script>

        {{--  FullCalendar  --}}
        <script src="{{ asset('vendors/moment/min/moment.min.js') }}"></script>
        <script src="{{ asset('vendors/fullcalendar/dist/fullcalendar.min.js') }}"></script>
        
        <script>
            $(document).ready(function() {
                $(".dark").remove();
            });
        </script>
        @yield('scripts')
    </body>
</html>