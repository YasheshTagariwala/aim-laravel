;(function ($, window, document, undefined) {
	$.fn.inputMenu = function (options) {
		var settings = $.extend({
			inputWidth: '100%',
			menuText: 'Menu: ',
			padding: '0px',
			breakpoint: 768, //in pixels
			navID: '#input-menu' //you most likely need to change this to the ID that wraps your menu's <ul>
		}, options);

		var inputMenu ='<select onChange="window.location.href=this.value" id="selectID" style="width:' + settings.inputWidth + '"><option id="inputMenuOpen">Select Country</option></select>',
		menuClone = $(settings.navID).clone(), //keep a copy of the original menu around
		menuArray = [],
		linkArray = [];

		if($(settings.navID + " ul li ul")) {
			$(settings.navID + " ul li ul li a").prepend('>> ');
		}

		$(settings.navID + " ul li a:first-child").each(function () {
			linkArray.push($(this).attr('href').trim()); //assume the first a tag is the link and ignore any other ones
		});

		$(settings.navID + " ul li a:first-child").each(function () {
			menuArray.push($(this).text().trim());
		});

		function makeMenu() {
			$(settings.navID).html(inputMenu);
			for (var i = 0; i < linkArray.length; i++) {
				$('#selectID').append('<option value=' + linkArray[i] + '>' + menuArray[i] + '</option>');
			}
			$(settings.navID).css('padding', settings.padding);
		}

		return this.each(function () {
			if ($(window).width() <= settings.breakpoint) {
				makeMenu();
			} else if ($(window).width() >= settings.breakpoint) {
				$(settings.navID).replaceWith(menuClone.clone());
				$(settings.navID).css('padding', 'initial');
			}

			$(window).resize(function () {
				if ($(window).width() <= settings.breakpoint) {
					makeMenu();
				} else if ($(window).width() >= settings.breakpoint) {
					$(settings.navID).replaceWith(menuClone.clone());
					$(settings.navID).css('padding', 'initial');
				}
			});
		});
	};
})(jQuery, window, document);
