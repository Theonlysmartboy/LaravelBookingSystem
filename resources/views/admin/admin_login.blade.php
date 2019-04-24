<!DOCTYPE html>
<html lang="en">

    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="apple-touch-icon" sizes="57x57" href="{{asset('images/backend_images/icons/apple-icon-57x57.png')}}"/>
        <link rel="apple-touch-icon" sizes="60x60" href="{{asset('images/backend_images/icons/apple-icon-60x60.png')}}"/>
        <link rel="apple-touch-icon" sizes="72x72" href="{{asset('images/backend_images/icons/apple-icon-72x72.png')}}"/>
        <link rel="apple-touch-icon" sizes="76x76" href="{{asset('images/backend_images/icons/apple-icon-76x76.png')}}"/>
        <link rel="apple-touch-icon" sizes="114x114" href="{{asset('images/backend_images/icons/apple-icon-114x114.png')}}"/>
        <link rel="apple-touch-icon" sizes="120x120" href="{{asset('images/backend_images/icons/apple-icon-120x120.png')}}"/>
        <link rel="apple-touch-icon" sizes="144x144" href="{{asset('images/backend_images/icons/apple-icon-144x144.png')}}"/>
        <link rel="apple-touch-icon" sizes="152x152" href="{{asset('images/backend_images/icons/apple-icon-152x152.png')}}"/>
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('images/backend_images/icons/apple-icon-180x180.png')}}"/>
        <link rel="icon" type="image/png" sizes="192x192"  href="{{asset('images/backend_images/icons/android-icon-192x192.png')}}"/>
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('images/backend_images/icons/favicon-32x32.png')}}"/>
        <link rel="icon" type="image/png" sizes="96x96" href="{{asset('images/backend_images/icons/favicon-96x96.png')}}"/>
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/backend_images/icons/favicon-16x16.png')}}"/>
        <link rel="manifest" href="{{asset('images/backend_images/icons/manifest.json')}}"/>
        <meta name="msapplication-TileColor" content="#2E363F"/>
        <meta name="msapplication-TileImage" content="{{asset('images/backend_images/icons/ms-icon-144x144.png')}}"/>
        <meta name="theme-color" content="#2E363F"/>
        <title>Admin Login</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="{{asset('css/backend_css/bootstrap.min.css')}}" />
        <link rel="stylesheet" href="{{asset('css/backend_css/bootstrap-responsive.min.css')}}" />
        <link rel="stylesheet" href="{{asset('css/backend_css/matrix-login.css')}}" />
        <link href="{{asset('fonts/backend_fonts/css/font-awesome.css')}}" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div id="loginbox"> 
            @if(Session::has('flash_message_error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong>{!!session('flash_message_error')!!}</strong>
            </div>
            @endif
            @if(Session::has('flash_message_success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong>{!!session('flash_message_success')!!}</strong>
            </div>
            @endif
            <form id="loginform" class="form-vertical" method="post" action="{{url('admin')}}"> {{ csrf_field() }}
                <div class="control-group normal_text"> <h3><img src="{{asset('images/backend_images/logo.png')}}" alt="Logo" width="200px" height="200px" /></h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="email" name="email" placeholder="Email" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="password" placeholder="Password" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span>
                    <span class="pull-right"><input type="submit" class="btn btn-success" value="Login" /></span>
                </div>
            </form>
            <form id="recoverform" action="#" class="form-vertical">
                <p class="normal_text">Enter your e-mail address below and we will send you instructions on how to recover a password.</p>

                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
                    </div>
                </div>

                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
                    <span class="pull-right"><a class="btn btn-info"/>Recover</a></span>
                </div>
            </form>
        </div>
        <script src="{{asset('js/backend_js/jquery.min.js')}}"></script>  
        <script src="{{asset('js/backend_js/matrix.login.js')}}"></script>
        <script src="{{asset('js/backend_js/bootstrap.min.js')}}"></script> 
    </body>

</html>
