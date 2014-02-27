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
});

