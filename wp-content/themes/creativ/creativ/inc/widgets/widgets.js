!function(a){"use strict";jQuery(document).ready(function(a){var t,r;a("body").on("click",function(t){var r=a(t.target);0!=r.parents(".shopping_cart_dropdown").length||r.hasClass("shopping_cart_dropdown")||a(".widget_searchform_content,.shopping_cart_dropdown, .widget_cart_search_wrap [data-display]").removeClass("active")}),a(".widget_searchform_content,.shopping_cart_dropdown").on("click",function(a){a.stopPropagation()}),a(".widget_cart_search_wrap [data-display]").on("click",function(o){var s=a(this).parents(".widget_cart_search_wrap");o.stopPropagation();var e=a(this);t=e.attr("data-display"),r=e.attr("data-no_display"),e.toggleClass("active"),a(t,s).hasClass("active")?a(t,s).removeClass("active"):(a(t,s).addClass("active"),a(r,s).removeClass("active"))})})}(jQuery);