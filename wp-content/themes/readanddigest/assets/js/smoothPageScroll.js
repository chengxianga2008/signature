function smoothScrollListener(e){e.preventDefault();var o=e.wheelDelta/120||-e.detail/3,l=$window.scrollTop()-parseInt(o*scrollDistance);TweenLite.to($window,scrollTime,{scrollTo:{y:l,autoKill:!0},ease:Power1.easeOut,autoKill:!0,overwrite:5})}var $window=jQuery(window),scrollTime=.4,scrollDistance=300;mobile_ie=-1!==navigator.userAgent.indexOf("IEMobile"),jQuery("html").hasClass("touch")||mobile_ie||window.addEventListener&&(window.addEventListener("mousewheel",smoothScrollListener,!1),window.addEventListener("DOMMouseScroll",smoothScrollListener,!1));