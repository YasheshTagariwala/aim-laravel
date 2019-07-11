// JavaScript Document 
var bostonLatlng;
jQuery(document).ready(function($) { 
 $('#menu-item-58').find('a').addClass('btndanger');
  		$(".dropdown").hover(            
            function() {
                $('.dropdown-menu', this).stop( true, true ).fadeIn("fast");
                $(this).toggleClass('open');
                $('b', this).toggleClass("caret caret-up");                
            },
            function() {
                $('.dropdown-menu', this).stop( true, true ).fadeOut("fast");
                $(this).toggleClass('open');
                $('b', this).toggleClass("caret caret-up");                
            });
			
			$('.dropdown-toggle').click(function(){
				var currentUrl=$(this).attr('href');
				if(currentUrl!='#')location.href=currentUrl;
			});
 
 
 $('div.insert-map').each(function() {
	 
    var data = $(this).data(), // Get the data from this element
        options = { // Create map options object
            center: new google.maps.LatLng(data.lat, data.lng), // Set center from the specified lat and lng
            disableDefaultUI: data.showcontrols || false, // Show or hide default controls
            zoom: data.zoom || 10, // Set zoom level from specified zoom or default to 10
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

    // Create and display the map
    var map = new google.maps.Map(this, options);
	
	var marker = new google.maps.Marker({
      position: new google.maps.LatLng(data.lat, data.lng),
      map: map,
      title: data.title
  });
	
	
	
});
 
 
  var owl = $("#owl-demo");

      owl.owlCarousel({ 
      items : 2, //10 items above 1000px browser width
      itemsDesktop : [1000,2], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,2], // 3 items betweem 900px and 601px
      itemsTablet: [600,2], //2 items between 600 and 0;
      itemsTablet: [480,1], //2 items between 600 and 0;
      itemsMobile : true // itemsMobile disabled - inherit from itemsTablet option
      
      });

      // Custom Navigation Events
      $(".next").click(function(){
        owl.trigger('owl.next');
      })
      $(".prev").click(function(){
        owl.trigger('owl.prev');
      })
      $(".play").click(function(){
        owl.trigger('owl.play',1000);
      })
      $(".stop").click(function(){
        owl.trigger('owl.stop');
      })


 
    $('#carousel').carousel({
        interval: 3500
    });
		 
		if ($(window).width() > 768) {
			$('#input-menu').slimScroll({
					position: 'left',
					height:'360px',
					alwaysVisible : true, 
			});
		}
		else {
			 $('#input-menu').inputMenu();
		}
		
		
		 $('.circlegraph').circliful();
		 
});


		 
var Core = null;;
(function($) {

    "use strict";

    Core = {

        initialized: false,
        initialize: function() {

            if (this.initialized) return;
            this.initialized = true;

            this.build();
            this.events();

        },

        build: function() {

            // Adds window smooth scroll on chrome.
            if ($("html").hasClass("chrome")) {
                $.smoothScroll();
            }
            // Nav Menu
            this.navMenu();
        },

        events: function() {

            // Window Resize
            $(window).on("resize", function() {
                var timer = window.setTimeout(function() {
                    window.clearTimeout(timer);


                }, 50);
            });

            // URL Aware Tab
            var hash = window.location.hash;
            hash && $('.nav-tabs a[href="' + hash + '"]').tab('show');
        },

        navMenu: function() {

            // Responsive Menu Events
            var addActiveClass = false;

            $("#mainMenu li.dropdown > a, #mainMenu li.dropdown-submenu > a").on("click", function(e) {

                if ($(window).width() > 979) return;

                e.preventDefault();

                addActiveClass = $(this).parent().hasClass("resp-active");

                $("#mainMenu").find(".resp-active").removeClass("resp-active");

                if (!addActiveClass) {
                    $(this).parents("li").addClass("resp-active");
                }

                return;
            });
        },

        stickyMenu: function() {

            if ($("body").hasClass("boxed"))
                return false;

            var header = $("body header:first"),
                headerHeight = header.height(),
                logoWrapper = header.find(".logo"),
                logo = header.find(".logo img"),
                logoWidth = logo.width(),
                logoHeight = logo.height(),
                $this = this,
                logoPaddingTop = 10,
                logoSmallHeight =(logoHeight * 90)/100;

            logo
                .css("height", logoSmallHeight);

            var logoSmallWidth = (logo.width() * 90)/100;

            logo
                .css("height", "auto")
                .css("width", "auto");

            var flatParentItems = $("header.flat-menu ul.nav-main > li > a");

            $this.checkStickyMenu = function() {

                if ($(window).scrollTop() > ((headerHeight - 15) - logoSmallHeight) && $(window).width() > 991) {

                    if ($("body").hasClass("sticky-menu-active"))
                        return false;

                    logo.stop(true, true);

                    $("body").addClass("sticky-menu-active").css("padding-top", headerHeight);
                    flatParentItems.addClass("sticky-menu-active");

                    logoWrapper.addClass("logo-sticky-active");

                    logo.animate({
                        width: logoSmallWidth,
                        height: logoSmallHeight,
                        top: logoPaddingTop + "px"
                    }, 200, function() {});

                } else {

                    if ($("body").hasClass("sticky-menu-active")) {

                        $("body").removeClass("sticky-menu-active").css("padding-top", 0);
                        flatParentItems.removeClass("sticky-menu-active");

                        logoWrapper.removeClass("logo-sticky-active");

                        logo.animate({
                            width: logoWidth,
                            height: logoHeight,
                            top: "0px"
                        }, 200, function() {

                            logo.css({
                                width: "auto",
                                height: "auto"
                            });

                        });

                    }
                }
            }

            $(window).on("scroll", function() {
                $this.checkStickyMenu();
            });

            $this.checkStickyMenu();

        },

        moveCloud: function() {

            var $this = this;

            $(".cloud").animate({
                "top": "+=20px"
            }, 3000, "linear", function() {
                $(".cloud").animate({
                    "top": "-=20px"
                }, 3000, "linear", function() {
                    $this.moveCloud();
                });
            });

        },
    };

    Core.initialize();
    $(window).load(function() {
        Core.stickyMenu();
    });

})(jQuery);

jQuery(document).ready(function($) {
    // browser window scroll (in pixels) after which the "back to top" link is shown
    var offset = 100,
        //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
        offset_opacity = 200,
        //duration of the top scrolling animation (in ms)
        scroll_top_duration = 700,
        //grab the "back to top" link
        $back_to_top = $('.cd-top');

    //hide or show the "back to top" link
    $(window).scroll(function() {
        ($(this).scrollTop() > offset) ? $back_to_top.addClass('cd-is-visible'): $back_to_top.removeClass('cd-is-visible cd-fade-out');
        if ($(this).scrollTop() > offset_opacity) {
            $back_to_top.addClass('cd-fade-out');
        }
    });

    //smooth scroll to top
    $back_to_top.on('click', function(event) {
        event.preventDefault();
        $('body,html').animate({
            scrollTop: 0,
        }, scroll_top_duration);
    });


});