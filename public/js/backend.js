!function(e){"use strict";e("#sidebarToggle, #sidebarToggleTop").on("click",(function(o){e("body").toggleClass("sidebar-toggled"),e(".sidebar").toggleClass("toggled"),e(".sidebar").hasClass("toggled")&&e(".sidebar .collapse").collapse("hide")})),e(window).resize((function(){e(window).width()<768&&e(".sidebar .collapse").collapse("hide"),e(window).width()<480&&!e(".sidebar").hasClass("toggled")&&(e("body").addClass("sidebar-toggled"),e(".sidebar").addClass("toggled"),e(".sidebar .collapse").collapse("hide"))})),e("body.fixed-nav .sidebar").on("mousewheel DOMMouseScroll wheel",(function(o){var l;768<e(window).width()&&(l=(l=o.originalEvent).wheelDelta||-l.detail,this.scrollTop+=30*(l<0?1:-1),o.preventDefault())})),e(document).on("scroll",(function(){100<e(this).scrollTop()?e(".scroll-to-top").fadeIn():e(".scroll-to-top").fadeOut()})),e(document).on("click","a.scroll-to-top",(function(o){var l=e(this);e("html, body").stop().animate({scrollTop:e(l.attr("href")).offset().top},1e3,"easeInOutExpo"),o.preventDefault()}))}(jQuery),$(document).ready((function(){$(".alert").delay(5e3).slideUp(200,(function(){$(this).alert("close")})),$("th[data-href]").on("click",(function(){window.location.href=$(this).attr("data-href")}))}));