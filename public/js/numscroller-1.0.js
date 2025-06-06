/**
 * jQuery scroroller Plugin 1.0
 *
 * http://www.tinywall.net/
 *
 * Developers: Arun David, Boobalan
 * Copyright (c) 2014
 */
!(function ($) {
	function numberRoller(t) {
		var i = $(".roller-title-number-" + t).attr("data-min"),
			o = $(".roller-title-number-" + t).attr("data-max"),
			e = $(".roller-title-number-" + t).attr("data-delay");
		numberRoll(t, i, o, $(".roller-title-number-" + t).attr("data-increment"), (1e3 * e) / (o - i));
	}

	function numberRoll(slno, min, max, increment, timeout) {
		min <= max
			? ($(".roller-title-number-" + slno).html(formatNumber(min)),
			  (min = parseInt(min) + parseInt(increment)),
			  setTimeout(function () {
					numberRoll(eval(slno), eval(min), eval(max), eval(increment), eval(timeout));
			  }, timeout))
			: $(".roller-title-number-" + slno).html(formatNumber(max));
	}

	function formatNumber(number) {
		return parseInt(number).toLocaleString("pt-BR");
	}

	$(window).on("load", function () {
		$(document).scrollzipInit(), $(document).rollerInit();
	}),
		$(window).on("load scroll resize", function () {
			$(".numscroller").scrollzip({
				showFunction: function () {
					numberRoller($(this).attr("data-slno"));
				},
				wholeVisible: !1,
			});
		}),
		($.fn.scrollzipInit = function () {
			$("body").prepend("<div style='position:fixed;top:0px;left:0px;width:0;height:0;' id='scrollzipPoint'></div>");
		}),
		($.fn.rollerInit = function () {
			var t = 0;
			$(".numscroller").each(function () {
				t++, $(this).attr("data-slno", t), $(this).addClass("roller-title-number-" + t);
			});
		}),
		($.fn.scrollzip = function (t) {
			var i = $.extend(
				{
					showFunction: null,
					hideFunction: null,
					showShift: 0,
					wholeVisible: !1,
					hideShift: 0,
				},
				t
			);
			return this.each(function (t, o) {
				return (
					$(this).addClass("scrollzip"),
					$.isFunction(i.showFunction) &&
						!$(this).hasClass("isShown") &&
						$(window).outerHeight() + $("#scrollzipPoint").offset().top - i.showShift >
							$(this).offset().top + (i.wholeVisible ? $(this).outerHeight() : 0) &&
						$("#scrollzipPoint").offset().top + (i.wholeVisible ? $(this).outerHeight() : 0) <
							$(this).outerHeight() + $(this).offset().top - i.showShift &&
						($(this).addClass("isShown"), i.showFunction.call(this)),
					$.isFunction(i.hideFunction) &&
						$(this).hasClass("isShown") &&
						($(window).outerHeight() + $("#scrollzipPoint").offset().top - i.hideShift <
							$(this).offset().top + (i.wholeVisible ? $(this).outerHeight() : 0) ||
							$("#scrollzipPoint").offset().top + (i.wholeVisible ? $(this).outerHeight() : 0) >
								$(this).outerHeight() + $(this).offset().top - i.hideShift) &&
						($(this).removeClass("isShown"), i.hideFunction.call(this)),
					this
				);
			});
		});
})(jQuery);
