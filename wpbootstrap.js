function footerbg() {
	var c = document.getElementById("footerbg");
	var ctx = c.getContext("2d");
	var width = c.scrollWidth;
	var height = c.scrollHeight;
	var step = 10;
	var border = 1;
	c.setAttribute("width", width);
	c.setAttribute("height", height);
	console.log(width + ", " + height);
	
	ctx.fillStyle = "black";
	ctx.fillRect(0, 0, width, height);
	/*
	for (var w = 0; w <= width; w += step) {
		ctx.moveTo(w, 0);
		ctx.lineTo(w, height);
	}
	for (var h = 0; h <= height; h += step) {
		ctx.moveTo(0, h);
		ctx.lineTo(width, h);
	}
	ctx.stroke();
	*/
	ctx.fillStyle = "blue";
	for (var h = 1; h < height; h += step) {
		for (var w = 1; w < width; w += step) {
			if (Math.random() > 0.5) {
				ctx.fillRect(w, h, step-border*2, step-border*2);
			}
		}
	}
}

//footerbg();

/*
 * enable tooltip
 */
jQuery(document).ready(function ($) {
	if ($("[rel=tooltip]").length) {
		$("[rel=tooltip]").tooltip($);
	}
	if ($("[rel=popover]").length) {
		$("[rel=popover]").popover({
			trigger: "hover"
		});
	}
	$('#back-to-top').hide(); // init status: hide
	// show when 100px or greater to the top
	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			$('#back-to-top').fadeIn('slow');
		} else {
			$('#back-to-top').fadeOut('slow');
		}
	});
	$('#back-to-top').click(function () {
		$("html, body").animate({ scrollTop: 0 }, 500);
		return false;
	});
	/*
	 * scroll bar
	 */
	$('a[href*=#]:not([href=#])').click(function() {
		console.log("clicked");
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
			|| location.hostname == this.hostname) {

			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				$('html,body').animate({
					scrollTop: target.offset().top
				}, 500);
				return false;
			}
		}
	});
});
