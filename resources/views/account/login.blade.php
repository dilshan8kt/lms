<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LMS | Login</title>

        {{--  Bootstrap  --}}
        <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        {{--  Font Awesome  --}}
        <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        {{--  NProgress  --}}
        <link href="{{ asset('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
        {{--  Animate.css  --}}
        <link href="{{ asset('vendors/animate.css/animate.min.css') }}" rel="stylesheet">
        {{--  Custom Theme Style  --}}
        <link href="{{ asset('build/css/custom.min.css') }}" rel="stylesheet">
    </head>

    <body class="login">
        @if(session()->has('message'))
            <div class="alert alert-danger">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form method="POST" action="{{ Route('signin') }}">
                            {{csrf_field()}}
                        <h1>Login Form</h1>
                        <div>
                            <input type="text" class="form-control" placeholder="Username" name="username" required/>
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Password" name="password" required/>
                        </div>
                        <div>
                            <button class="btn btn-default" type="submit">Log in</button>
                            <a class="reset_pass" href="#">Lost your password?</a>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-paw"></i> Intel Access Business Solution</h1>
                                <p>©2018 All Rights Reserved</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </body>
</html>
