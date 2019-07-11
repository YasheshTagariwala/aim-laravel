@extends('layouts.master')
@section('title', 'View Orders')
@section('pagebody')

    
        <!-- Start Inner Contents -->               
        
        <section class="myaccount-header">
    <div class="container">
    <h1>Oreder Details</h1>
        </div>
</section>
<section class="myaccount-body">
    <div class="myaccount-document">
    <div class="container">
<div class="vtab-nav clearfix vtab-nav-hrz"> 
              <ul class="resp-tabs-list clearfix">
                <li class=""><a href="{{url('/')}}">Dashboard</a></li>
                <!-- <li class=" "><a href="blog/add">Blog</a></li> -->
                <li class="active" id="Orders"><a href="#">Orders</a></li>
                <li class="" id="marketplace"><a href="{{url('/market-place/dashboard')}}">Market Place </a></li></a>
           </ul>
           <ul class="resp-tabs-list right-tab  clearfix">
                                <li class="side_menu" id="messages"><a href="{{url('/messages')}}"><i class="fa fa-commenting-o" aria-hidden="true"></i></a></li>
                                <li class="side_menu" id="account"><a href="{{url('/account')}}"><i class="fa fa-user" aria-hidden="true"></i></a></li> 
                                <li class="logout"><a href="{{url('/logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
              </ul>
              </div> 
     <div class="resp-tab">

<div class="woocommerce-MyAccount-content">
  <p>Order #<mark class="order-number">4845</mark> was placed on <mark class="order-date">September 19, 2018</mark> and is currently <mark class="order-status">Processing</mark>.</p>


<h1 class="cart-title">Order Details</h1>
<table class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th width="50%" class="product-name">Product</th>
      <th class="product-total">Total</th>
    </tr>
  </thead>
  <tbody>
    <tr class="order_item">
  <td class="product-name">
    <a href="https://africainnovationmarket.org/product/product-3/">Product 3</a> <strong class="product-quantity">&times; 1</strong> </td>
  <td class="product-total">
    <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#36;</span>300.00</span>  </td>
</tr>
      </tbody>
  <tfoot>
            <tr>
          <th scope="row">Subtotal:</th>
          <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#36;</span>300.00</span></td>
        </tr>
                <tr>
          <th scope="row">Payment Method:</th>
          <td>Credit Card</td>
        </tr>
                <tr>
          <th scope="row">Total:</th>
          <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#36;</span>300.00</span></td>
        </tr>
          </tfoot>
</table>

<div style="clear:both"></div>
  <header><h1 class="cart-title">Customer Details</h1></header>

<table class="table table-striped table-bordered" cellspacing="0" width="100%">
  
      <tr>
      <th width="50%">Email:</th>
      <td>linkedin_user_investor_aim@example.com</td>
    </tr>
  
      <tr>
      <th width="50%">Telephone:</th>
      <td>1111222211</td>
    </tr>
  
  </table>


<header class="title">
  <h1 class="cart-title">Billing Address</h1>
</header>
<address class="billing-details">
  Test User<br/>H. 123 Test Street<br/>Test city - 112233<br/>Chhattisgarh, India</address>

</div>

    </div>
  </div>
  </div>
</section>
        <!-- End Inner Contents -->



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

        this.data.d1 = <?php echo json_encode(''); ?>;



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