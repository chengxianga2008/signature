!function(t){function i(t){(t.attr("title")||"string"!=typeof t.attr("original-title"))&&t.attr("original-title",t.attr("title")||"").removeAttr("title")}function e(e,s){this.$element=t(e),this.options=s,this.enabled=!0,i(this.$element)}e.prototype={show:function(){var i=this.getTitle();if(i&&this.enabled){var e=this.tip();e.find(".tipsy-inner")[this.options.html?"html":"text"](i),e[0].className="tipsy",e.remove().css({top:0,left:0,visibility:"hidden",display:"block"}).appendTo(document.body);var s,n=t.extend({},this.$element.offset(),{width:this.$element[0].offsetWidth,height:this.$element[0].offsetHeight}),o=e[0].offsetWidth,l=e[0].offsetHeight,a="function"==typeof this.options.gravity?this.options.gravity.call(this.$element[0]):this.options.gravity;switch(a.charAt(0)){case"n":s={top:n.top+n.height+this.options.offset,left:n.left+n.width/2-o/2};break;case"s":s={top:n.top-l-this.options.offset,left:n.left+n.width/2-o/2};break;case"e":s={top:n.top+n.height/2-l/2,left:n.left-o-this.options.offset};break;case"w":s={top:n.top+n.height/2-l/2,left:n.left+n.width+this.options.offset}}2==a.length&&("w"==a.charAt(1)?s.left=n.left+n.width/2-15:s.left=n.left+n.width/2-o+15),e.css(s).addClass("tipsy-"+a),this.options.fade?e.stop().css({opacity:0,display:"block",visibility:"visible"}).animate({opacity:this.options.opacity}):e.css({visibility:"visible",opacity:this.options.opacity})}},hide:function(){this.options.fade?this.tip().stop().fadeOut(function(){t(this).remove()}):this.tip().remove()},getTitle:function(){var t=this.$element,e=this.options;i(t);var s;return"string"==typeof(e=this.options).title?s=t.attr("title"==e.title?"original-title":e.title):"function"==typeof e.title&&(s=e.title.call(t[0])),(s=(""+s).replace(/(^\s*|\s*$)/,""))||e.fallback},tip:function(){return this.$tip||(this.$tip=t('<div class="tipsy"></div>').html('<div class="tipsy-arrow"></div><div class="tipsy-inner"/></div>')),this.$tip},validate:function(){this.$element[0].parentNode||(this.hide(),this.$element=null,this.options=null)},enable:function(){this.enabled=!0},disable:function(){this.enabled=!1},toggleEnabled:function(){this.enabled=!this.enabled}},t.fn.tipsy=function(i){function s(s){var n=t.data(s,"tipsy");return n||(n=new e(s,t.fn.tipsy.elementOptions(s,i)),t.data(s,"tipsy",n)),n}if(!0===i)return this.data("tipsy");if("string"==typeof i)return this.data("tipsy")[i]();if((i=t.extend({},t.fn.tipsy.defaults,i)).live||this.each(function(){s(this)}),"manual"!=i.trigger){var n=i.live?"live":"bind",o="hover"==i.trigger?"mouseenter":"focus",l="hover"==i.trigger?"mouseleave":"blur";this[n](o,function(){var t=s(this);t.hoverState="in",0==i.delayIn?t.show():setTimeout(function(){"in"==t.hoverState&&t.show()},i.delayIn)})[n](l,function(){var t=s(this);t.hoverState="out",0==i.delayOut?t.hide():setTimeout(function(){"out"==t.hoverState&&t.hide()},i.delayOut)})}return this},t.fn.tipsy.defaults={delayIn:0,delayOut:0,fade:!1,fallback:"",gravity:"n",html:!1,live:!1,offset:0,opacity:.8,title:"title",trigger:"hover"},t.fn.tipsy.elementOptions=function(i,e){return t.metadata?t.extend({},e,t(i).metadata()):e},t.fn.tipsy.autoNS=function(){return t(this).offset().top>t(document).scrollTop()+t(window).height()/2?"s":"n"},t.fn.tipsy.autoWE=function(){return t(this).offset().left>t(document).scrollLeft()+t(window).width()/2?"e":"w"}}(jQuery);