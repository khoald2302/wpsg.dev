!function(n){var t=n(window),e=t.height();t.resize(function(){e=t.height()}),n.fn.parallax=function(o,r,u){function i(){var u=t.scrollTop();c.each(function(){var t=n(this),i=t.offset().top,h=l(t);u>i+h||i>u+e||c.css("backgroundPosition",o+" "+Math.round((a-u)*r)+"px")})}var l,a,c=n(this);c.each(function(){a=c.offset().top}),l=u?function(n){return n.outerHeight(!0)}:function(n){return n.outerHeight()},(arguments.length<1||null===o)&&(o="50%"),(arguments.length<2||null===r)&&(r=.1),(arguments.length<3||null===u)&&(u=!0),t.bind("scroll",i).resize(i),i()}}(jQuery);