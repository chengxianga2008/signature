!function(t){"use strict";function n(){l(),a()}function e(){}function o(){}function i(){}function l(){t(document).on("click",".eltdf-quantity-minus, .eltdf-quantity-plus",function(n){n.stopPropagation();var e,o=t(this),i=o.siblings(".eltdf-quantity-input"),l=parseFloat(i.attr("step")),a=parseFloat(i.attr("max")),c=!1,r=parseFloat(i.val());o.hasClass("eltdf-quantity-minus")&&(c=!0),c?(e=r-l)>=1?i.val(e):i.val(1):(e=r+l,void 0===a?i.val(e):e>=a?i.val(a):i.val(e)),i.trigger("change")})}function a(){(t(".woocommerce-ordering .orderby").length||t("#calc_shipping_country").length)&&(t(".woocommerce-ordering .orderby").select2({minimumResultsForSearch:1/0}),t("#calc_shipping_country").select2())}var c={};eltdf.modules.woocommerce=c,c.eltdfInitQuantityButtons=l,c.eltdfInitSelect2=a,c.eltdfOnDocumentReady=n,c.eltdfOnWindowLoad=e,c.eltdfOnWindowResize=o,c.eltdfOnWindowScroll=i,t(document).ready(n),t(window).load(e),t(window).resize(o),t(window).scroll(i)}(jQuery);