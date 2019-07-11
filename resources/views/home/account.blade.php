@extends('layouts.master')
@section('title','Account')
@section('pagebody')

    <link href="{{url('/')}}/assets_new/css/um.min.css" rel="stylesheet">
<!-- Start Inner Contents -->         
    
    <section class="myaccount-header">
      <div class="container">
        <h1>Account</h1>
        <p></p>
      </div>
    </section>  
    <section class="myaccount-body">
      <div class="container">
        <div class="vtab-nav vtab-nav-hrz clearfix"> 
          <ul class="resp-tabs-list clearfix">
            <li  class=""><a href="{{url('/')}}">Dashboard</a></li>
            <li class="active" id="account"><a href="#">Account</a></li>
            <li class="" id="market-place"><a href="{{url('/market-place/dashboard')}}">MarketPlace </a></li></a>
           </ul>
           <ul class="resp-tabs-list right-tab  clearfix">
            <li class=" " id="messages"><a href="{{url('/messages')}}"><i class="fa fa-commenting-o" aria-hidden="true"></i></a></li>
            <li class=" active" id="account"><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></li>
            <li class="logout"><a href="{{url('/logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
          </ul>
        </div>  
        <div id="s-share-buttons" class="horizontal-w-c-circular s-share-w-c">
          <div class="um um-account um-editing um-um_account_id">
            <div class="um-account-side uimob340-hide uimob500-hide">
              <ul>
                <li>
                  <a data-tab="general" href="#" class="um-account-link current">
                    <!--span class="um-account-icontip uimob800-show um-tip-w" title="Account"><i class="um-faicon-user"></i></span-->
                    <span class="um-account-icon uimob800-hide"><i class="um-faicon-user"></i></span>
                    <span class="um-account-title uimob800-hide"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class="">Account</font></font></span>
                    <span class="um-account-arrow uimob800-hide"><i class="um-faicon-angle-right"></i></span>
                  </a>
                </li>
                @if(Session::get('provider') == '')
                <li>
                  <a data-tab="password" href="#" class="um-account-link ">
                    <!--span class="um-account-icontip uimob800-show um-tip-w" title="Change Password"><i class="um-faicon-asterisk"></i></span-->
                    <span class="um-account-icon uimob800-hide"><i class="um-faicon-asterisk"></i></span>
                    <span class="um-account-title uimob800-hide">Change Password</span>
                    <span class="um-account-arrow uimob800-hide"><i class="um-faicon-angle-right"></i></span>
                  </a>
                </li>
                @endif
                <li>
                  <a data-tab="privacy" href="#" class="um-account-link">
                    <!--span class="um-account-icontip uimob800-show um-tip-w" title="Privacy"><i class="um-faicon-lock"></i></span-->
                    <span class="um-account-icon uimob800-hide"><i class="um-faicon-lock"></i></span>
                    <span class="um-account-title uimob800-hide">Privacy</span>
                    <span class="um-account-arrow uimob800-hide"><i class="um-faicon-angle-right"></i></span>
                  </a>
                </li>
                @if(Session::get('provider') == '')
                <li>
                  <a data-tab="delete" href="#" class="um-account-link">
                    <!--span class="um-account-icontip uimob800-show um-tip-w" title="Delete Account"><i class="um-faicon-trash-o"></i></span-->
                    <span class="um-account-icon uimob800-hide"><i class="um-faicon-trash-o"></i></span>
                    <span class="um-account-title uimob800-hide">Delete Account</span>
                    <span class="um-account-arrow uimob800-hide"><i class="um-faicon-angle-right"></i></span>
                  </a>
                </li>
                @endif
              </ul>
            </div>
            <div class="um-account-main">
              <div class="um-account-tab um-account-tab-general" data-tab="general" style="display:block">
                <div class="um-account-heading uimob340-hide uimob500-hide"><i class="um-faicon-user"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Account</font></font></div>
            <form id="messageform" action="{{url('/account')}}/store" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}   
                  <div class="form-group um-field">
                    <label >User Name <span class="acf-required">*</span></label>               
                    <input name="username" value="{{$userdetails[0]->username}}" size="40" class="form-control" type="text">
                  </div>
                  <div class="form-group um-field">
                    <label >First Name <span class="acf-required">*</span></label>                
                    <input name="firstname" value="{{$userdetails[0]->firstname}}" size="40" class="form-control" type="text">
                  </div>
                  <div class="form-group um-field">
                    <label >Last Name <span class="acf-required">*</span></label>               
                    <input name="lastname" value="{{$userdetails[0]->lastname}}" size="40" class="form-control" type="text">
                  </div>
                @if(Session::get('provider') == '')
                  <div class="form-group um-field">
                    <label >Email Address <span class="acf-required">*</span></label>               
                    <input name="email" value="{{$userdetails[0]->email}}" size="40" class="form-control" type="email">
                  </div>
                  @endif
                  <input type="hidden" value="1" name="savefor">
                  <div class="acf-form-submit">
                    <input value="Update Account" class="button button-primary button-large" type="submit">
                  </div>  
                </form>
              </div>
              <div class="um-account-tab um-account-tab-password" data-tab="password">
                <div class="um-account-heading uimob340-hide uimob500-hide"><i class="um-faicon-asterisk"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Change Password</font></font></div>
            <form id="messageform" action="{{url('/account')}}/store" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}   
                  <div class="form-group um-field">
                    <label >Current Password <span class="acf-required">*</span></label>                
                    <input name="cur_password" value="" size="40" class="form-control" type="password">
                  </div>
                  <div class="form-group um-field">
                    <label >New Password <span class="acf-required">*</span></label>                
                    <input name="password" value="" size="40" class="form-control" type="password">
                  </div>
                  <div class="form-group um-field">
                    <label >Confirm Password <span class="acf-required">*</span></label>                
                    <input name="cpassword" value="" size="40" class="form-control" type="password">
                  </div>    
                  <input type="hidden" value="2" name="savefor">              
                  <div class="acf-form-submit">
                    <input value="Update Password" class="button button-primary button-large" type="submit">
                  </div>  
                </form>
              </div>
              <div class="um-account-tab um-account-tab-privacy" data-tab="privacy">
                <div class="um-account-heading uimob340-hide uimob500-hide"><i class="um-faicon-lock"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Privacy</font></font></div>
                <div class="um-field-label um-field"><label for="hide_in_members">Hide my profile from directory</label><span class="um-tip um-tip-w" title="Here you can hide yourself from appearing in public directory"><i class="um-icon-help-circled"></i></span><div class="um-clear"></div></div>
            <form id="messageform" action="{{url('/account')}}/store" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}                 
                  <div class="form-group um-field">
                    <label >Yes <input name="hide_pfl" value="1" size="40" class="" type="radio"></label> 
                  </div>    
                  <div class="form-group um-field"> 
                    <label >No  <input name="hide_pfl" value="0" size="40" class="" type="radio"></label> 
                  </div>  
                  <input type="hidden" value="3" name="savefor">  
                  <div class="acf-form-submit">
                    <input value="Update Privacy" class="button button-primary button-large" type="submit">
                  </div>  
                </form>
              </div>
              <div class="um-account-tab um-account-tab-delete" data-tab="delete">
                <div class="um-account-heading uimob300-hide uimob500-hide"><i class="um-faicon-trash-o"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Delete Account</font></font></div>
                <p>Are you sure you want to delete your account? This will erase all of your account data from the site. To delete your account enter your password below</p>
            <form id="messageform" action="{{url('/account')}}/store" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}                  
                  <div class="form-group um-field">
                    <label >Password <span class="acf-required">*</span></label>                
                    <input name="password" value="" size="40" class="form-control" type="password">
                  </div>   
                  <input type="hidden" value="4" name="savefor">               
                  <div class="acf-form-submit">
                    <input value="Delete Account" class="button button-primary button-large" type="submit">
                  </div>  
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- End Inner Contents -->    

<script type="text/javascript" src="{{url('/')}}/assets_new/js/um.min.js"></script>
    
<script>
jQuery(document).ready(function () {
jQuery('#horizontalTab').easyResponsiveTabs({
type: 'default', //Types: default, vertical, accordion           
width: 'auto', //auto or any width like 600px
fit: true,   // 100% fit in a container
closed: 'accordion', // Start closed if in accordion view
activate: function(event) { // Callback function if tab is switched
var $tab = jQuery(this);
var $info = jQuery('#tabInfo');
var $name = jQuery('span', $info);
$name.text($tab.text());
$info.show();
}
});
jQuery('#verticalTab').easyResponsiveTabs({
type: 'default',
width: 'auto',
fit: true
});
});
</script>

<script type="text/javascript">

      jQuery( 'ul.nav.nav-tabs  a' ).click( function ( e ) {
        e.preventDefault();
        jQuery( this ).tab( 'show' );
      } );

      ( function( $ ) {
          // Test for making sure event are maintained
          jQuery( '.js-alert-test' ).click( function () {
            alert( 'Button Clicked: Event was maintained' );
          } );
          fakewaffle.responsiveTabs( [ 'xs', 'sm' ] );
      } )( jQuery );

    </script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-17600125-2', 'openam.github.io');
      ga('send', 'pageview');
    </script>
    <script>

(function($)

{



sales_chart =

  {

    data:

    {

      d1: []

    },



    plot: null,



    options:

    {

      grid:

      {

        autoHighlight: false,

        backgroundColor: null,

        color: '#c6f4eb',

        borderWidth: 0,

        borderColor: "transparent",

        clickable: true,

        hoverable: true

      },

      series: {

        lines: {

          show: true,

          fill: false,

          lineWidth: 2,

          steps: false

        },

        points: {

          show:true,

          radius: 3,

          lineWidth: 2,

          fill: true,

          fillColor: "#000"

        }

      },

      xaxis: {

      mode: "time",

    timeformat: "%d/%m"   },

      yaxis: {

        tickSize: 3000,

        tickColor: '#F1F2F7'

      },

      legend: { show:false },

      shadowSize: 0,

      tooltip: true,

      tooltipOpts: {

        content: "%s : %y.3",

        shifts: {

          x: -30,

          y: -50

        },

        defaultTheme: false

      }

    },



    placeholder: "#sales-chart",



    init: function()

    {

      this.options.colors = ["#3598db"];

      this.options.grid.backgroundColor = null;



      var that = this;



      if (this.plot == null)

      {

        this.data.d1 = <?php $jsondata=''; echo json_encode($jsondata); ?>;



      }

        //var months = ["January", "February", "March", "April", "May", "Juny", "July", "August", "September", "October", "November", "December"];

      this.plot = jQuery.plot(

        jQuery(this.placeholder),

        [{

          label: "Data 1",

          data: this.data.d1,

          lines: { fill: 0.00 },

          points: { fillColor: "#fff" }

        }], this.options);

    }

  };





  function showTooltip(x, y, contents) {

    jQuery('<div class="chart-tooltip">$' + contents + '</div>').css( {

      position: 'absolute',

      display: 'none',

      top: y + 5,

      left: x + 5,

      opacity: 0.80

    }).appendTo("body").fadeIn(200);

  }





  jQuery('#sales-chart').bind("plothover", function (event, pos, item) {

    jQuery("#x").text(pos.x.toFixed(2));

    jQuery("#y").text(pos.y.toFixed(2));



    if (item) {

      if (previousPoint != item.dataIndex) {

        previousPoint = item.dataIndex;



        jQuery(".chart-tooltip").remove();

        var x = item.datapoint[0].toFixed(2),

          y = item.datapoint[1].toFixed(2);



        showTooltip(item.pageX, item.pageY, y);

      }

    }

    else {

      jQuery(".chart-tooltip").remove();

      previousPoint = null;

    }

  });





   sales_chart.init();





})(jQuery);

    

jQuery(document).ready(function($) {

var p = '';
jQuery.post(ajaxurl,{ action:'gybi_get_investors_country'},function(data) {
  var i =0;
      //var plants = data;


//console.log(array);
    // }, 'json');
    //Vector Maps
    var map = function() {
//var plants = [p];   

    
    var plants = [
    {name: 'Investor 1, New York, USA', coords: [40.7127, -74.0059], status: 'closed', offsets: [0, 2]},
    {name: 'Investor 2, Washington, USA<br/>', coords: [20.593684,78.96288], status: 'open', offsets: [0, 2]},
    {name: 'Investor 2, Washington, USA\nInvestor 3, Boston, USA', coords: [47.5000, -120.5000], status: 'open', offsets: [0, 2]}
  ];
    console.log(plants);
        jQuery('#map').vectorMap({
            map: 'world_mill_en',
            backgroundColor: 'transparent',
            regionStyle: {
                initial: {
                    fill: '#3598db',
                },
                hover: {
                    "fill-opacity": 0.8
                }
            },
      markers: plants.map(function(h){ return {name: h.name, latLng: h.coords} }),
         labels: false,
       series: {
      markers: [{
        attribute: 'image',
        scale: {
          'closed': '/gybi/wp-content/uploads/ultimatemember/19/profile_photo-190.jpg?1429955016',
          'activeUntil2018': '/gybi/wp-content/uploads/ultimatemember/6/profile_photo-190.jpg?1429955016',
          'activeUntil2022': '/gybi/wp-content/uploads/ultimatemember/20/profile_photo-190.jpg?1429955016'
        },
        values: plants.reduce(function(p, c, i){ p[i] = c.status; return p }, {}),
        legend: false
      }]
    }
        });

    };
  map();
}, 'json');
   

    jQuery('#calendar').fullCalendar({

       

      header: {

        left: 'prev,next today',

        center: 'title',

        right: 'month,agendaWeek,agendaDay'

      },

            editable: false,

            droppable: false, // this allows things to be dropped onto the calendar

      eventLimit: true, // allow "more" link when too many events

      events: {

      url : "",

      data : { action: "entterprenuer_events_details",  userid:   },

      method: 'post'

    },

    eventClick:  function(event, jsEvent, view) {

            jQuery('#modalsTitle').html(event.title);

      jQuery('span#modelsDate').html(event.date);

            jQuery('span#startTime').html(event.starttime);

      jQuery('span#endTime').html(event.endtime);

      jQuery("span#messageContent").html(event.message);

      if(event.approve == '1'){

        jQuery("span.bodyResult").html("Scheduled");

      }else if(event.approve == '2'){

        jQuery("span.bodyResult").html("Rejected");

      }else{

        jQuery("span.bodyResult").html("Pending Approval");

      }

      jQuery("div#moduleReply").html(event.link);

            jQuery('#fullCalModals').modal();

        }

    });

    

});

    </script>
        
        
        
        <!--- Organization JAVAscript -->
        
        <script>
    jQuery(document).ready(function() {
    app.timer();
       app.perfectScroller();
     
     jQuery(".live-tile").liveTile();
     
  jQuery(".post-block").click(function(){
    var prId = jQuery(this).attr('data-id');
    jQuery.post(ajaxurl,{ projectid: prId,action: "project_status_decline" },function(info) {
      jQuery("div."+prId).text("Block");
     });
  });
  jQuery(".post-publish").click(function(){
    var prId = jQuery(this).attr('data-id');
    jQuery.post(ajaxurl,{ projectid: prId,action: "project_status_update" },function(info) {
      jQuery("div."+prId).text("Publish");
     });
  });
  

     
    });
    </script>
    <script>
jQuery(document).ready(function(){
  jQuery(".post-publish").click(function(){
    var prId = jQuery(this).attr('data-id');
    jQuery.post(ajaxurl,{ projectid: prId,action: "project_status_update" },function(info) {
      jQuery("div."+prId).text("publish");
     });
  });
});
</script>
<!-- Supporter JAVAscript -->
<script>
jQuery(document).ready(function(e) {
    jQuery("li.update_profile").click(function(e) {
        window.location.hash = jQuery(this).attr('data-href');
    });
  setTimeout(function(){
    var n = window.location.hash.substring(1);
    if(n != undefined && n!= '') jQuery("li."+n).click();
  }, 20000);
});
</script>

@endsection