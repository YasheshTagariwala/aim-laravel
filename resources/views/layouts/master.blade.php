<!DOCTYPE html>
<html >
<head>
    <?php               
        $currentroute = Route::getCurrentRoute()->getActionName();      
        $currentroute = @explode("@", $currentroute);
        $routeaction = $currentroute[1];
        $routecontroller = @explode("\\", $currentroute[0]);
        $routecontroller = end($routecontroller);       
    ?>
    <title>@yield('title') | Africa Innovation Market</title> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('/')}}/assets_new/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url('/')}}/assets_new/css/bootstrap.min.css">
    <link rel="shortcut icon" href="{{url('/')}}/assets_new/img/favicon.ico" />
    <link href="{{url('/')}}/assets_new/includes/css/gybi.css" rel="stylesheet" type="text/css">
    <link href="{{url('/')}}/assets_new/css/gybi-styles.css" rel="stylesheet" type="text/css">
    <link href="{{url('/')}}/assets_new/css/slider.css" rel="stylesheet" type="text/css">
    <link href="{{url('/')}}/assets_new/css/fonts.css" rel="stylesheet">    
    <link rel='stylesheet' id='tooltipster-css-css' href='{{url("/")}}/assets_new/css/tooltipster.css?ver=4.6.1' type='text/css' media='all'/>
    <link rel='stylesheet' id='ssb-css-css' href='{{url("/")}}/assets_new/css/ssb-style.css?ver=4.6.1' type='text/css' media='all'/>
    <link rel='stylesheet' id='ssb-admin-css-css' href='{{url("/")}}/assets_new/css/ssb-admin.css?ver=4.6.1' type='text/css' media='all'/>
    <link rel='stylesheet' id='ParaAdmin-css' href='{{url("/")}}/assets_new/css/ParaAdmin.css?ver=4.6.1' type='text/css' media='all'/>
    <link href="{{url('/')}}/assets_new/css/vendor_dashboard.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <script type='text/javascript' src='{{url("/")}}/assets_new/js/wp-jquery.js'></script>
    <script type='text/javascript' src='{{url("/")}}/assets_new/js/wp-jquery-migrate.min.js'></script>

    @if($routecontroller == "HomeController" || $routecontroller == "EntrepreneurController" || $routecontroller == "SupporterController" || $routecontroller == "OrganizationController" || $routecontroller == "InvestorController")    

<!-- <meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="{{url('/')}}/assets/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">    <link rel="stylesheet" href="{{url('/')}}/assets/css/fullcalendar.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1"></head>
        <script src="{{url('/')}}/assets/js/Chart.min.js"></script>
        <script src="{{url('/')}}/assets/js/jquery-1.12.3.min.js"></script>
        <script src="{{url('/')}}/assets/js/bootstrap.min.js"></script> -->
<!--         <script src="{{url('/')}}/assets/js/jquery.piety.min.js"></script>
        <script src="{{url('/')}}/assets/js/varello-theme.js"></script>
        <script src="{{url('/')}}/assets/js/icheck.min.js"></script>
        <script src="{{url('/')}}/assets/js/dropdown.js"></script><script src="{{url('/')}}/assets/js/moment.min.js"></script>
        <script src="{{url('/')}}/assets/js/jquery-ui.custom.min.js"></script> -->
        <!-- <script src="{{url('/')}}/assets/js/fullcalendar.min.js"></script>
        <script src="{{url('/')}}/assets/js/pages/calendar.js"></script> -->
    @endif
</head>
<body id="gybi">
    <div class="wrapper">
     
@include('layouts.header')   

@yield('pagebody')

@include('layouts.footer')
    </div>



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script type="text/javascript" src="{{url('/')}}/assets_new/js/300/addthis_widget.js#pubid=ra-5531caff78e1f8ac" async="async"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{url('/')}}/assets_new/js/bootstrap.min.js"></script>
    <script src="{{url('/')}}/assets_new/js/application.js"></script>

    <script src="{{url('/')}}/assets_new/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script type='text/javascript' src='{{url("/")}}/assets_new/js/jquery.tooltipster.js?ver=4.6.1'></script>    
    <script type='text/javascript' src='{{url("/")}}/assets_new/js/ssb-scripts.js?ver=4.6.1'></script>
    <script type='text/javascript' src='{{url("/")}}/assets_new/js/jquery.tablednd.js?ver=4.6.1'></script>
    <script type='text/javascript' src='{{url("/")}}/assets_new/js/ParaAdmin.js?ver=4.6.1'></script>
    <script src="{{url('/')}}/assets_new/js/jquery.counterup.min.js"></script>
    <script src="{{url('/')}}/assets_new/includes/js/jquery.circliful.js"></script>
    <script src="{{url('/')}}/assets_new/includes/js/gybi.js"></script>


    <!-- flags -->
    <script src="{{url('/')}}/assets_new/js/jquery.flagstrap.min.js"></script>

    <!-- custom -->
    <script src="{{url('/')}}/assets_new/js/swiper.min.js"></script>

    <!-- banner -->
    <script src="{{url('/')}}/assets_new/js/slider.banners.js"></script>
    <script src="{{url('/')}}/assets_new/js/custom.js"></script>
    <!-- Responsive Slider -->
    <script type="text/javascript" src="{{url('/')}}/assets_new/js/responsiveCarousel.min.js"></script>
    <!-- easy-responsive-tabs -->
    <script type="text/javascript" src="{{url('/')}}/assets_new/js/easy-responsive-tabs.js"></script>

<script>
jQuery(document).ready(function(e) {
    jQuery(".dropdown").find("dd").show();
    jQuery("form.subscribe_form").submit(function(e) {
        var re = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-]{1,})+\.)+([a-zA-Z0-9]{2,})+$/;
        if (!re.test(jQuery("input.subscribe_email").val())) {
            alert("The email is not correct");
            return false;
        }

    });
    jQuery("input[value='Register']").click(function(e) {
        if (!jQuery("input[name='role']:checked").val()) {
            jQuery("input[value='entrepreneur']").attr("checked", "checked");
        }
    });
});
</script>
<style>
.yasr-total-average-container {
    display: none;
}
</style>

</body></html>