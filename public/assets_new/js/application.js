
jQuery(document).ready(function() {
		var url_value = window.location.hash.substr(1);
		if(url_value != '')
		{
			setTimeout(function(){
				jQuery("li.side_menu#"+url_value).click();
			},10);
		}
		jQuery('.counter').counterUp({
			delay: 10,
			time: 1000
		});
		setTimeout(function(){
			jQuery("section.mourinze_tomato").find(".tab-pane").each(function()
			{
				var no_product = jQuery(this).find(".no_products").text();
				if(no_product != '') jQuery(this).find("button.btn_veiw_all").hide();
			});
		},10);
});

jQuery(document).ready(function() {
  jQuery('#media').carousel({
    pause: true,
    interval: false,
  });
});




// Starrr plugin (https://github.com/dobtco/starrr)
var __slice = [].slice;

(function(jQuery, window) {
  var Starrr;

  Starrr = (function() {
    Starrr.prototype.defaults = {
      rating: void 0,
      numStars: 5,
      change: function(e, value) {}
    };

    function Starrr(jQueryel, options) {
      var i, _, _ref,
        _this = this;

      this.options = jQuery.extend({}, this.defaults, options);
      this.jQueryel = jQueryel;
      _ref = this.defaults;
      for (i in _ref) {
        _ = _ref[i];
        if (this.jQueryel.data(i) != null) {
          this.options[i] = this.jQueryel.data(i);
        }
      }
      this.createStars();
      this.syncRating();
      this.jQueryel.on('mouseover.starrr', 'span', function(e) {
        return _this.syncRating(_this.jQueryel.find('span').index(e.currentTarget) + 1);
      });
      this.jQueryel.on('mouseout.starrr', function() {
        return _this.syncRating();
      });
      this.jQueryel.on('click.starrr', 'span', function(e) {
        return _this.setRating(_this.jQueryel.find('span').index(e.currentTarget) + 1);
      });
      this.jQueryel.on('starrr:change', this.options.change);
    }

    Starrr.prototype.createStars = function() {
      var _i, _ref, _results;

      _results = [];
      for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
        _results.push(this.jQueryel.append("<span class='glyphicon .glyphicon-star-empty'></span>"));
      }
      return _results;
    };

    Starrr.prototype.setRating = function(rating) {
      if (this.options.rating === rating) {
        rating = void 0;
      }
      this.options.rating = rating;
      this.syncRating();
      return this.jQueryel.trigger('starrr:change', rating);
    };

    Starrr.prototype.syncRating = function(rating) {
      var i, _i, _j, _ref;

      rating || (rating = this.options.rating);
      if (rating) {
        for (i = _i = 0, _ref = rating - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
          this.jQueryel.find('span').eq(i).removeClass('glyphicon-star-empty').addClass('glyphicon-star');
        }
      }
      if (rating && rating < 5) {
        for (i = _j = rating; rating <= 4 ? _j <= 4 : _j >= 4; i = rating <= 4 ? ++_j : --_j) {
          this.jQueryel.find('span').eq(i).removeClass('glyphicon-star').addClass('glyphicon-star-empty');
        }
      }
      if (!rating) {
        return this.jQueryel.find('span').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
      }
    };

    return Starrr;

  })();
  return jQuery.fn.extend({
    starrr: function() {
      var args, option;

      option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
      return this.each(function() {
        var data;

        data = jQuery(this).data('star-rating');
        if (!data) {
          jQuery(this).data('star-rating', (data = new Starrr(jQuery(this), option)));
        }
        if (typeof option === 'string') {
          return data[option].apply(data, args);
        }
      });
    }
  });
})(window.jQuery, window);

jQuery(function() {
  return jQuery(".starrr").starrr();
});

jQuery( document ).ready(function() {
      
  jQuery('#stars').on('starrr:change', function(e, value){
    jQuery('#count').html(value);
  });
  
  jQuery('#stars-existing').on('starrr:change', function(e, value){
    jQuery('#count-existing').html(value);
  });
});



// Inner Page Stars
//the jQuery(document).ready() function is down at the bottom







// Contact Section
jQuery(document).ready(function(){
	jQuery("#getform").click(function(){
		jQuery("#contact-toggle").slideToggle(2000);
	});
});


jQuery(document).ready(function(){
jQuery(function(){
  jQuery('.crsl-items').carousel({
    visible: 4,
    itemMinWidth: 200,
  });
  
  jQuery("a[href=#]").on('click', function(e) {
    e.preventDefault();
  });
});
});



/*jQuery(document).ready(function(){
    var ariaexpanded = 1;
  jQuery(".dropdown-toggle").click(function(){
    if(ariaexpanded = 1){
    jQuery(".select-bar").css({"position" : "relative" , "z-index" : "-99999"});
  }
  else{
    jQuery(".select-bar").css({"position" : "relative" , "z-index" : "99999"});
  }

    });

});*/



jQuery(document).ready(function() {
    jQuery('.collapse').on('show.bs.collapse', function() {
        var id = jQuery(this).attr('id');
        jQuery('a[href="#' + id + '"]').closest('.panel-heading').addClass('active-faq');
        jQuery('a[href="#' + id + '"] .panel-title span').html('<i class="fa fa-minus"></i>');
    });
    jQuery('.collapse').on('hide.bs.collapse', function() {
        var id = jQuery(this).attr('id');
        jQuery('a[href="#' + id + '"]').closest('.panel-heading').removeClass('active-faq');
        jQuery('a[href="#' + id + '"] .panel-title span').html('<i class="fa fa-plus"></i>');
    });
});

jQuery(document).ready(function() {
   jQuery("#shareit-menu").hover(function(){
      jQuery("#share-submenu").slideToggle("slow");
   });
});







// My Account Page
var fakewaffle = ( function ( jQuery, fakewaffle ) {
	'use strict';

	fakewaffle.responsiveTabs = function ( collapseDisplayed ) {

		fakewaffle.currentPosition = 'tabs';

		var tabGroups = jQuery( '.nav-tabs.responsive' );
		var hidden    = '';
		var visible   = '';
		var activeTab = '';

		if ( collapseDisplayed === undefined ) {
			collapseDisplayed = [ 'xs', 'sm' ];
		}

		jQuery.each( collapseDisplayed, function () {
			hidden  += ' hidden-' + this;
			visible += ' visible-' + this;
		} );

		jQuery.each( tabGroups, function ( index ) {
			var collapseDiv;
			var jQuerytabGroup = jQuery( this );
			var tabs      = jQuerytabGroup.find( 'li a' );

			if ( jQuerytabGroup.attr( 'id' ) === undefined ) {
				jQuerytabGroup.attr( 'id', 'tabs-' + index );
			}

			collapseDiv = jQuery( '<div></div>', {
				'class' : 'panel-group responsive' + visible,
				'id'    : 'collapse-' + jQuerytabGroup.attr( 'id' )
			} );

			jQuery.each( tabs, function () {
				var jQuerythis          = jQuery( this );
				var oldLinkClass   = jQuerythis.attr( 'class' ) === undefined ? '' : jQuerythis.attr( 'class' );
				var newLinkClass   = 'accordion-toggle';
				var oldParentClass = jQuerythis.parent().attr( 'class' ) === undefined ? '' : jQuerythis.parent().attr( 'class' );
				var newParentClass = 'panel panel-default';
				var newHash        = jQuerythis.get( 0 ).hash.replace( '#', 'collapse-' );

				if ( oldLinkClass.length > 0 ) {
					newLinkClass += ' ' + oldLinkClass;
				}

				if ( oldParentClass.length > 0 ) {
					oldParentClass = oldParentClass.replace( /\bactive\b/g, '' );
					newParentClass += ' ' + oldParentClass;
					newParentClass = newParentClass.replace( /\s{2,}/g, ' ' );
					newParentClass = newParentClass.replace( /^\s+|\s+jQuery/g, '' );
				}

				if ( jQuerythis.parent().hasClass( 'active' ) ) {
					activeTab = '#' + newHash;
				}

				collapseDiv.append(
					jQuery( '<div>' ).attr( 'class', newParentClass ).html(
						jQuery( '<div>' ).attr( 'class', 'panel-heading' ).html(
							jQuery( '<h4>' ).attr( 'class', 'panel-title' ).html(
								jQuery( '<a>', {
									'class'       : newLinkClass,
									'data-toggle' : 'collapse',
									'data-parent' : '#collapse-' + jQuerytabGroup.attr( 'id' ),
									'href'        : '#' + newHash,
									'html'        : jQuerythis.html()
								} )
							)
						)
					).append(
						jQuery( '<div>', {
							'id'    : newHash,
							'class' : 'panel-collapse collapse'
						} )
					)
				);
			} );

			jQuerytabGroup.next().after( collapseDiv );
			jQuerytabGroup.addClass( hidden );
			jQuery( '.tab-content.responsive' ).addClass( hidden );

			if ( activeTab ) {
				jQuery( activeTab ).collapse( 'show' );
			}
		} );

		fakewaffle.checkResize();
		fakewaffle.bindTabToCollapse();
	};

	fakewaffle.checkResize = function () {

		if ( jQuery( '.panel-group.responsive' ).is( ':visible' ) === true && fakewaffle.currentPosition === 'tabs' ) {
			fakewaffle.tabToPanel();
			fakewaffle.currentPosition = 'panel';
		} else if ( jQuery( '.panel-group.responsive' ).is( ':visible' ) === false && fakewaffle.currentPosition === 'panel' ) {
			fakewaffle.panelToTab();
			fakewaffle.currentPosition = 'tabs';
		}

	};

	fakewaffle.tabToPanel = function () {

		var tabGroups = jQuery( '.nav-tabs.responsive' );

		jQuery.each( tabGroups, function ( index, tabGroup ) {

			// Find the tab
			var tabContents = jQuery( tabGroup ).next( '.tab-content' ).find( '.tab-pane' );

			jQuery.each( tabContents, function ( index, tabContent ) {
				// Find the id to move the element to
				var destinationId = jQuery( tabContent ).attr( 'id' ).replace ( /^/, '#collapse-' );

				// Convert tab to panel and move to destination
				jQuery( tabContent )
					.removeClass( 'tab-pane' )
					.addClass( 'panel-body fw-previous-tab-pane' )
					.appendTo( jQuery( destinationId ) );

			} );

		} );

	};

	fakewaffle.panelToTab = function () {

		var panelGroups = jQuery( '.panel-group.responsive' );

		jQuery.each( panelGroups, function ( index, panelGroup ) {

			var destinationId = jQuery( panelGroup ).attr( 'id' ).replace( 'collapse-', '#' );
			var destination   = jQuery( destinationId ).next( '.tab-content' )[ 0 ];

			// Find the panel contents
			var panelContents = jQuery( panelGroup ).find( '.panel-body.fw-previous-tab-pane' );

			// Convert to tab and move to destination
			panelContents
				.removeClass( 'panel-body fw-previous-tab-pane' )
				.addClass( 'tab-pane' )
				.appendTo( jQuery( destination ) );

		} );

	};

	fakewaffle.bindTabToCollapse = function () {

		var tabs     = jQuery( '.nav-tabs.responsive' ).find( 'li a' );
		var collapse = jQuery( '.panel-group.responsive' ).find( '.panel-collapse' );

		// Toggle the panels when the associated tab is toggled
		tabs.on( 'shown.bs.tab', function ( e ) {

			if (fakewaffle.currentPosition === 'tabs') {
				var jQuerycurrent  = jQuery( e.currentTarget.hash.replace( /#/, '#collapse-' ) );
				jQuerycurrent.collapse( 'show' );

				if ( e.relatedTarget ) {
					var jQueryprevious = jQuery( e.relatedTarget.hash.replace( /#/, '#collapse-' ) );
					jQueryprevious.collapse( 'hide' );
				}
			}

		} );

		// Toggle the tab when the associated panel is toggled
		collapse.on( 'shown.bs.collapse', function ( e ) {

			if (fakewaffle.currentPosition === 'panel') {
				// Activate current tabs
				var current = jQuery( e.target ).context.id.replace( /collapse-/g, '#' );
				jQuery( 'a[href="' + current + '"]' ).tab( 'show' );

				// Update the content with active
				var panelGroup = jQuery( e.currentTarget ).closest( '.panel-group.responsive' );
				jQuery( panelGroup ).find( '.panel-body' ).removeClass( 'active' );
				jQuery( e.currentTarget ).find( '.panel-body' ).addClass( 'active' );
			}

		} );
	};

	jQuery( window ).resize( function () {
		fakewaffle.checkResize();
	} );

	return fakewaffle;
}( window.jQuery, fakewaffle || { } ) );
