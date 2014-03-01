#!/usr/bin/env node

function rgb2hex(args) {
	return '(' + args + ') => ' + toHex(args[0]) + toHex(args[1]) + toHex(args[2]);
}

function toHex(n) {
	var n = parseInt(n, 10);
	if (isNaN(n)) return "00";
	n = Math.max(0, Math.min(n, 255));
	return "0123456789ABCDEF".charAt((n-n%16)/16)
		+ "0123456789ABCDEF".charAt(n%16);
}

(function() {
	console.log(rgb2hex(process.argv.slice(2)));
})();
