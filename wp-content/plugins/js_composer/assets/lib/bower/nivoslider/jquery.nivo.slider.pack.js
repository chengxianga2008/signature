!function(i){var t=function(t,e){var n=i.extend({},i.fn.nivoSlider.defaults,e),a={currentSlide:0,currentImage:"",totalSlides:0,running:!1,paused:!1,stop:!1,controlNavEl:!1},o=i(t);o.data("nivo:vars",a).addClass("nivoSlider");var r=o.children();r.each(function(){var t=i(this),e="";t.is("img")||(t.is("a")&&(t.addClass("nivo-imageLink"),e=t),t=t.find("img:first"));var n=0===n?t.attr("width"):t.width(),o=0===o?t.attr("height"):t.height();""!==e&&e.css("display","none"),t.css("display","none"),a.totalSlides++}),n.randomStart&&(n.startSlide=Math.floor(Math.random()*a.totalSlides)),n.startSlide>0&&(n.startSlide>=a.totalSlides&&(n.startSlide=a.totalSlides-1),a.currentSlide=n.startSlide),i(r[a.currentSlide]).is("img")?a.currentImage=i(r[a.currentSlide]):a.currentImage=i(r[a.currentSlide]).find("img:first"),i(r[a.currentSlide]).is("a")&&i(r[a.currentSlide]).css("display","block");var s=i("<img/>").addClass("nivo-main-image");s.attr("src",a.currentImage.attr("src")).show(),o.append(s),i(window).resize(function(){o.children("img").width(o.width()),s.attr("src",a.currentImage.attr("src")),s.stop().height("auto"),i(".nivo-slice").remove(),i(".nivo-box").remove()}),o.append(i('<div class="nivo-caption"></div>'));var c=function(t){var e=i(".nivo-caption",o);if(""!=a.currentImage.attr("title")&&void 0!=a.currentImage.attr("title")){var n=a.currentImage.attr("title");"#"==n.substr(0,1)&&(n=i(n).html()),"block"==e.css("display")?setTimeout(function(){e.html(n)},t.animSpeed):(e.html(n),e.stop().fadeIn(t.animSpeed))}else e.stop().fadeOut(t.animSpeed)};c(n);var l=0;if(!n.manualAdvance&&r.length>1&&(l=setInterval(function(){u(o,r,n,!1)},n.pauseTime)),n.directionNav&&(o.append('<div class="nivo-directionNav"><a class="nivo-prevNav">'+n.prevText+'</a><a class="nivo-nextNav">'+n.nextText+"</a></div>"),i(o).on("click","a.nivo-prevNav",function(){if(a.running)return!1;clearInterval(l),l="",a.currentSlide-=2,u(o,r,n,"prev")}),i(o).on("click","a.nivo-nextNav",function(){if(a.running)return!1;clearInterval(l),l="",u(o,r,n,"next")})),n.controlNav){a.controlNavEl=i('<div class="nivo-controlNav"></div>'),o.after(a.controlNavEl);for(var d=0;d<r.length;d++)if(n.controlNavThumbs){a.controlNavEl.addClass("nivo-thumbs-enabled");var v=r.eq(d);v.is("img")||(v=v.find("img:first")),v.attr("data-thumb")&&a.controlNavEl.append('<a class="nivo-control" rel="'+d+'"><img src="'+v.attr("data-thumb")+'" alt="" /></a>')}else a.controlNavEl.append('<a class="nivo-control" rel="'+d+'">'+(d+1)+"</a>");i("a:eq("+a.currentSlide+")",a.controlNavEl).addClass("active"),i("a",a.controlNavEl).bind("click",function(){return!a.running&&!i(this).hasClass("active")&&(clearInterval(l),l="",s.attr("src",a.currentImage.attr("src")),a.currentSlide=i(this).attr("rel")-1,void u(o,r,n,"control"))})}n.pauseOnHover&&o.hover(function(){a.paused=!0,clearInterval(l),l=""},function(){a.paused=!1,""!==l||n.manualAdvance||(l=setInterval(function(){u(o,r,n,!1)},n.pauseTime))}),o.bind("nivo:animFinished",function(){s.attr("src",a.currentImage.attr("src")),a.running=!1,i(r).each(function(){i(this).is("a")&&i(this).css("display","none")}),i(r[a.currentSlide]).is("a")&&i(r[a.currentSlide]).css("display","block"),""!==l||a.paused||n.manualAdvance||(l=setInterval(function(){u(o,r,n,!1)},n.pauseTime)),n.afterChange.call(this)});var m=function(t,e,n){i(n.currentImage).parent().is("a")&&i(n.currentImage).parent().css("display","block"),i('img[src="'+n.currentImage.attr("src")+'"]',t).not(".nivo-main-image,.nivo-control img").width(t.width()).css("visibility","hidden").show();for(var a=i('img[src="'+n.currentImage.attr("src")+'"]',t).not(".nivo-main-image,.nivo-control img").parent().is("a")?i('img[src="'+n.currentImage.attr("src")+'"]',t).not(".nivo-main-image,.nivo-control img").parent().height():i('img[src="'+n.currentImage.attr("src")+'"]',t).not(".nivo-main-image,.nivo-control img").height(),o=0;o<e.slices;o++){var r=Math.round(t.width()/e.slices);o===e.slices-1?t.append(i('<div class="nivo-slice" name="'+o+'"><img src="'+n.currentImage.attr("src")+'" style="position:absolute; width:'+t.width()+"px; height:auto; display:block !important; top:0; left:-"+(r+o*r-r)+'px;" /></div>').css({left:r*o+"px",width:t.width()-r*o+"px",height:a+"px",opacity:"0",overflow:"hidden"})):t.append(i('<div class="nivo-slice" name="'+o+'"><img src="'+n.currentImage.attr("src")+'" style="position:absolute; width:'+t.width()+"px; height:auto; display:block !important; top:0; left:-"+(r+o*r-r)+'px;" /></div>').css({left:r*o+"px",width:r+"px",height:a+"px",opacity:"0",overflow:"hidden"}))}i(".nivo-slice",t).height(a),s.stop().animate({height:i(n.currentImage).height()},e.animSpeed)},h=function(t,e,n){i(n.currentImage).parent().is("a")&&i(n.currentImage).parent().css("display","block"),i('img[src="'+n.currentImage.attr("src")+'"]',t).not(".nivo-main-image,.nivo-control img").width(t.width()).css("visibility","hidden").show();for(var a=Math.round(t.width()/e.boxCols),o=Math.round(i('img[src="'+n.currentImage.attr("src")+'"]',t).not(".nivo-main-image,.nivo-control img").height()/e.boxRows),r=0;r<e.boxRows;r++)for(var c=0;c<e.boxCols;c++)c===e.boxCols-1?(t.append(i('<div class="nivo-box" name="'+c+'" rel="'+r+'"><img src="'+n.currentImage.attr("src")+'" style="position:absolute; width:'+t.width()+"px; height:auto; display:block; top:-"+o*r+"px; left:-"+a*c+'px;" /></div>').css({opacity:0,left:a*c+"px",top:o*r+"px",width:t.width()-a*c+"px"})),i('.nivo-box[name="'+c+'"]',t).height(i('.nivo-box[name="'+c+'"] img',t).height()+"px")):(t.append(i('<div class="nivo-box" name="'+c+'" rel="'+r+'"><img src="'+n.currentImage.attr("src")+'" style="position:absolute; width:'+t.width()+"px; height:auto; display:block; top:-"+o*r+"px; left:-"+a*c+'px;" /></div>').css({opacity:0,left:a*c+"px",top:o*r+"px",width:a+"px"})),i('.nivo-box[name="'+c+'"]',t).height(i('.nivo-box[name="'+c+'"] img',t).height()+"px"));s.stop().animate({height:i(n.currentImage).height()},e.animSpeed)},u=function(t,e,n,a){var o=t.data("nivo:vars");if(o&&o.currentSlide===o.totalSlides-1&&n.lastSlide.call(this),(!o||o.stop)&&!a)return!1;n.beforeChange.call(this),a?("prev"===a&&s.attr("src",o.currentImage.attr("src")),"next"===a&&s.attr("src",o.currentImage.attr("src"))):s.attr("src",o.currentImage.attr("src")),++o.currentSlide===o.totalSlides&&(o.currentSlide=0,n.slideshowEnd.call(this)),o.currentSlide<0&&(o.currentSlide=o.totalSlides-1),i(e[o.currentSlide]).is("img")?o.currentImage=i(e[o.currentSlide]):o.currentImage=i(e[o.currentSlide]).find("img:first"),n.controlNav&&(i("a",o.controlNavEl).removeClass("active"),i("a:eq("+o.currentSlide+")",o.controlNavEl).addClass("active")),c(n),i(".nivo-slice",t).remove(),i(".nivo-box",t).remove();var r=n.effect,l="";"random"===n.effect&&(l=new Array("sliceDownRight","sliceDownLeft","sliceUpRight","sliceUpLeft","sliceUpDown","sliceUpDownLeft","fold","fade","boxRandom","boxRain","boxRainReverse","boxRainGrow","boxRainGrowReverse"),void 0===(r=l[Math.floor(Math.random()*(l.length+1))])&&(r="fade")),-1!==n.effect.indexOf(",")&&(l=n.effect.split(","),void 0===(r=l[Math.floor(Math.random()*l.length)])&&(r="fade")),o.currentImage.attr("data-transition")&&(r=o.currentImage.attr("data-transition")),o.running=!0;var d=0,v=0,u="",f="",g="",x="";if("sliceDown"===r||"sliceDownRight"===r||"sliceDownLeft"===r)m(t,n,o),d=0,v=0,u=i(".nivo-slice",t),"sliceDownLeft"===r&&(u=i(".nivo-slice",t)._reverse()),u.each(function(){var e=i(this);e.css({top:"0px"}),v===n.slices-1?setTimeout(function(){e.animate({opacity:"1.0"},n.animSpeed,"",function(){t.trigger("nivo:animFinished")})},100+d):setTimeout(function(){e.animate({opacity:"1.0"},n.animSpeed)},100+d),d+=50,v++});else if("sliceUp"===r||"sliceUpRight"===r||"sliceUpLeft"===r)m(t,n,o),d=0,v=0,u=i(".nivo-slice",t),"sliceUpLeft"===r&&(u=i(".nivo-slice",t)._reverse()),u.each(function(){var e=i(this);e.css({bottom:"0px"}),v===n.slices-1?setTimeout(function(){e.animate({opacity:"1.0"},n.animSpeed,"",function(){t.trigger("nivo:animFinished")})},100+d):setTimeout(function(){e.animate({opacity:"1.0"},n.animSpeed)},100+d),d+=50,v++});else if("sliceUpDown"===r||"sliceUpDownRight"===r||"sliceUpDownLeft"===r){m(t,n,o),d=0,v=0;var w=0;u=i(".nivo-slice",t),"sliceUpDownLeft"===r&&(u=i(".nivo-slice",t)._reverse()),u.each(function(){var e=i(this);0===v?(e.css("top","0px"),v++):(e.css("bottom","0px"),v=0),w===n.slices-1?setTimeout(function(){e.animate({opacity:"1.0"},n.animSpeed,"",function(){t.trigger("nivo:animFinished")})},100+d):setTimeout(function(){e.animate({opacity:"1.0"},n.animSpeed)},100+d),d+=50,w++})}else if("fold"===r)m(t,n,o),d=0,v=0,i(".nivo-slice",t).each(function(){var e=i(this),a=e.width();e.css({top:"0px",width:"0px"}),v===n.slices-1?setTimeout(function(){e.animate({width:a,opacity:"1.0"},n.animSpeed,"",function(){t.trigger("nivo:animFinished")})},100+d):setTimeout(function(){e.animate({width:a,opacity:"1.0"},n.animSpeed)},100+d),d+=50,v++});else if("fade"===r)m(t,n,o),(f=i(".nivo-slice:first",t)).css({width:t.width()+"px"}),f.animate({opacity:"1.0"},2*n.animSpeed,"",function(){t.trigger("nivo:animFinished")});else if("slideInRight"===r)m(t,n,o),(f=i(".nivo-slice:first",t)).css({width:"0px",opacity:"1"}),f.animate({width:t.width()+"px"},2*n.animSpeed,"",function(){t.trigger("nivo:animFinished")});else if("slideInLeft"===r)m(t,n,o),(f=i(".nivo-slice:first",t)).css({width:"0px",opacity:"1",left:"",right:"0px"}),f.animate({width:t.width()+"px"},2*n.animSpeed,"",function(){f.css({left:"0px",right:""}),t.trigger("nivo:animFinished")});else if("boxRandom"===r)h(t,n,o),g=n.boxCols*n.boxRows,v=0,d=0,(x=p(i(".nivo-box",t))).each(function(){var e=i(this);v===g-1?setTimeout(function(){e.animate({opacity:"1"},n.animSpeed,"",function(){t.trigger("nivo:animFinished")})},100+d):setTimeout(function(){e.animate({opacity:"1"},n.animSpeed)},100+d),d+=20,v++});else if("boxRain"===r||"boxRainReverse"===r||"boxRainGrow"===r||"boxRainGrowReverse"===r){h(t,n,o),g=n.boxCols*n.boxRows,v=0,d=0;var b=0,S=0,I=[];I[b]=[],x=i(".nivo-box",t),"boxRainReverse"!==r&&"boxRainGrowReverse"!==r||(x=i(".nivo-box",t)._reverse()),x.each(function(){I[b][S]=i(this),++S===n.boxCols&&(S=0,I[++b]=[])});for(var y=0;y<2*n.boxCols;y++){for(var R=y,N=0;N<n.boxRows;N++)R>=0&&R<n.boxCols&&(function(e,a,o,s,c){var l=i(I[e][a]),d=l.width(),v=l.height();"boxRainGrow"!==r&&"boxRainGrowReverse"!==r||l.width(0).height(0),s===c-1?setTimeout(function(){l.animate({opacity:"1",width:d,height:v},n.animSpeed/1.3,"",function(){t.trigger("nivo:animFinished")})},100+o):setTimeout(function(){l.animate({opacity:"1",width:d,height:v},n.animSpeed/1.3)},100+o)}(N,R,d,v,g),v++),R--;d+=100}}},p=function(i){for(var t,e,n=i.length;n;t=parseInt(Math.random()*n,10),e=i[--n],i[n]=i[t],i[t]=e);return i},f=function(i){this.console&&void 0!==console.log&&console.log(i)};return this.stop=function(){i(t).data("nivo:vars").stop||(i(t).data("nivo:vars").stop=!0,f("Stop Slider"))},this.start=function(){i(t).data("nivo:vars").stop&&(i(t).data("nivo:vars").stop=!1,f("Start Slider"))},n.afterLoad.call(this),this};i.fn.nivoSlider=function(e){return this.each(function(n,a){var o=i(this);if(o.data("nivoslider"))return o.data("nivoslider");var r=new t(this,e);o.data("nivoslider",r)})},i.fn.nivoSlider.defaults={effect:"random",slices:15,boxCols:8,boxRows:4,animSpeed:500,pauseTime:3e3,startSlide:0,directionNav:!0,controlNav:!0,controlNavThumbs:!1,pauseOnHover:!0,manualAdvance:!1,prevText:"Prev",nextText:"Next",randomStart:!1,beforeChange:function(){},afterChange:function(){},slideshowEnd:function(){},lastSlide:function(){},afterLoad:function(){}},i.fn._reverse=[].reverse}(jQuery);