<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Africa Innovation Market</title>
    <link rel="stylesheet" href="{{url('/')}}/assets/css/bootstrap.min.css">
<link rel="stylesheet" href="{{url('/')}}/assets/css/font-awesome.min.css">
<link rel="stylesheet" href="{{url('/')}}/assets/css/typicons.min.css">
<link rel="stylesheet" href="{{url('/')}}/assets/css/varello-theme.min.css">
<link rel="stylesheet" href="{{url('/')}}/assets/css/varello-skins.min.css">
<link rel="stylesheet" href="{{url('/')}}/assets/css/animate.min.css">
<link rel="stylesheet" href="{{url('/')}}/assets/css/icheck-all-skins.css">
<link rel="stylesheet" href="{{url('/')}}/assets/css/icheck-skins/flat/_all.css">
<link href='https://fonts.googleapis.com/css?family=Hind+Vadodara:400,500,600,700,300' rel='stylesheet' type='text/css'>    <link rel="apple-touch-icon" sizes="57x57" href="apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="{{url('/assets_new')}}/images/logo.png">
<link rel="apple-touch-icon" sizes="72x72" href="{{url('/assets_new')}}/images/logo.png">
<link rel="apple-touch-icon" sizes="76x76" href="{{url('/assets_new')}}/images/logo.png">
<link rel="apple-touch-icon" sizes="114x114" href="{{url('/assets_new')}}/images/logo.png">
<link rel="apple-touch-icon" sizes="120x120" href="{{url('/assets_new')}}/images/logo.png">
<link rel="apple-touch-icon" sizes="144x144" href="{{url('/assets_new')}}/images/logo.png">
<link rel="apple-touch-icon" sizes="152x152" href="{{url('/assets_new')}}/images/logo.png">
<link rel="apple-touch-icon" sizes="180x180" href="{{url('/assets_new')}}/images/logo.png">
<link rel="icon" type="image/png" sizes="192x192"  href="{{url('/assets_new')}}/images/logo.png">
<link rel="icon" type="image/png" sizes="32x32" href="{{url('/assets_new')}}/images/logo.png">
<link rel="icon" type="image/png" sizes="96x96" href="{{url('/assets_new')}}/images/logo.png">
<link rel="icon" type="image/png" sizes="16x16" href="{{url('/assets_new')}}/images/logo.png">
<link rel="manifest" href="manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="{{url('/assets')}}/images/logo.png">
<meta name="theme-color" content="#ffffff">        <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1"></head>
<body >
                <div class="notifications top-right"></div>
    <div class="wrapper">
        <div class="page-wrapper">            
    @include('admin.layouts.leftside')        
    @include('admin.layouts.header')
            <div class="content-wrapper">
                <div class="content-dimmer"></div>

            @yield('breadcrumb')
                
<div class="container-fluid">
    @yield('pagebody')
    
    @include('admin.layouts.footer')
</div>
  
            </div>
        </div>
    </div>
<script src="{{url('/')}}/assets/js/Chart.min.js"></script>
<script src="{{url('/')}}/assets/js/jquery-1.12.3.min.js"></script>
<script src="{{url('/')}}/assets/js/bootstrap.min.js"></script>
<script src="{{url('/')}}/assets/js/jquery.piety.min.js"></script>
<script src="{{url('/')}}/assets/js/varello-theme.js"></script>
<script src="{{url('/')}}/assets/js/icheck.min.js"></script>
<script src="{{url('/')}}/assets/js/dropdown.js"></script></body>
</html>