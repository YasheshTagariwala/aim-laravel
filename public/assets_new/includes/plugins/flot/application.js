	var app = function() {

    var init = function() {

        tooltips();
        toggleMenuLeft();
        toggleMenuRight();
        switcheryToggle();
        menu();
        togglePanel();
        closePanel();
		
		
		
    };

    var tooltips = function() {
        jQuery('#toggle-left').tooltip();
		
		
		
		
		
    };
	
	var perfectScroller=function() {
	
	 var notif_widget = jQuery(".notification-widget").height();
        jQuery('.notification-widget').height(notif_widget).perfectScrollbar({
            suppressScrollX: true
        });	
		
	}

    var togglePanel = function() {
        jQuery('.actions > .fa-chevron-down').click(function() {
            jQuery(this).parent().parent().next().slideToggle('fast');
            jQuery(this).toggleClass('fa-chevron-down fa-chevron-up');
        });

    };

    var toggleMenuLeft = function() {
        jQuery('#toggle-left').bind('click', function(e) {
           jQuery('body').removeClass('off-canvas-open')    
            var bodyEl = $('#container');
            (jQuery(window).width() > 768) ? $(bodyEl).toggleClass('sidebar-mini'): jQuery(bodyEl).toggleClass('sidebar-opened');
        });
    };

    var toggleMenuRight = function() {
         jQuery('#toggle-right').click(function(){
             $('.off-canvas').toggleClass('off-canvas-open');
         });
    };

    var switcheryToggle = function() {
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        elems.forEach(function(html) {
            var switchery = new Switchery(html, { size: 'small' });
        });
    };

    var closePanel = function() {
        jQuery('.actions > .fa-times').click(function() {
           jQuery(this).parent().parent().parent().fadeOut();
        });

    }

    var menu = function() {
     

    };
    //End functions

    //Dashboard functions
    var timer = function() {
        jQuery('.timer').countTo();
    };


    //Vector Maps
    var map = function() {
		
		
		var plants = [
    {name: 'Investor 1, New York, USA', coords: [40.7127, -74.0059], status: 'closed', offsets: [0, 2]},
    {name: 'Investor 2, Washington, USA', coords: [47.5000, -120.5000], status: 'activeUntil2018', offsets: [0, 2]},
    {name: 'Investor 3, Boston, USA', coords: [42.3601, -71.0589], status: 'activeUntil2022', offsets: [0, 2]}
	];
		
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
        legend:false
      }]
    }
        });

    };

    var weather = function() {
        var icons = new Skycons({
            "color": "white"
        });

        icons.set("clear-day", Skycons.CLEAR_DAY);
        icons.set("clear-night", Skycons.CLEAR_NIGHT);
        icons.set("partly-cloudy-day", Skycons.PARTLY_CLOUDY_DAY);
        icons.set("partly-cloudy-night", Skycons.PARTLY_CLOUDY_NIGHT);
        icons.set("cloudy", Skycons.CLOUDY);
        icons.set("rain", Skycons.RAIN);
        icons.set("sleet", Skycons.SLEET);
        icons.set("snow", Skycons.SNOW);
        icons.set("wind", Skycons.WIND);
        icons.set("fog", Skycons.FOG);

        icons.play();
    }

    //morris pie chart
    var morrisPie = function() {

        Morris.Donut({
            element: 'donut-example',
            data: [{
                    label: "Chrome",
                    value: 73
                }, {
                    label: "Firefox",
                    value: 71
                }, {
                    label: "Safari",
                    value: 69
                }, {
                    label: "Internet Explorer",
                    value: 40
                }, {
                    label: "Opera",
                    value: 20
                }, {
                    label: "Android Browser",
                    value: 10
                }

            ],
            colors: [
                '#1abc9c',
                '#293949',
                '#e84c3d',
                '#3598db',
                '#2dcc70',
                '#f1c40f'
            ]
        });
    }

    //Sliders
    var sliders = function() {
        jQuery('.slider-span').slider()
    };


    //return functions
    return {
        init: init,
        timer: timer,
        map: map,
		perfectScroller:perfectScroller,
        sliders: sliders,
        weather: weather,
        morrisPie: morrisPie

    };
}();

//Load global functions
jQuery(document).ready(function() {
    app.init();

});