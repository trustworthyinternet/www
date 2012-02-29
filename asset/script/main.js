/*
 * jQuery Tools tabs
 */
(function ($) {
	'use strict';
	$(document).ready(function () {
		// setup ul.tabs to work as tabs for each div directly under div.panes
		if (typeof jQuery().tabs !== 'undefined' && jQuery.tabs !== null) {
			$("div.tabs-without-javascript").addClass("tabs");
			$("div.tabs").removeClass("tabs-without-javascript");
			$("div.tabs").tabs("div.panes > div", { history: true });
		}
	});
}(jQuery));