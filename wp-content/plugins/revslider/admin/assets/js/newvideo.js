var video=this,jvideo=jQuery(this);jvideo.parent().hasClass("html5vid")||jvideo.wrap('<div class="html5vid" style="position:relative;top:0px;left:0px;width:auto;height:auto"></div>');var html5vid=jvideo.parent();video.addEventListener?video.addEventListener("loadedmetadata",function(){html5vid.data("metaloaded",1)}):video.attachEvent("loadedmetadata",function(){html5vid.data("metaloaded",1)}),clearInterval(html5vid.data("interval")),html5vid.data("interval",setInterval(function(){if(1==html5vid.data("metaloaded")||NaN!=video.duration){clearInterval(html5vid.data("interval")),html5vid.hasClass("HasListener")||(html5vid.addClass("HasListener"),"none"!=nextcaption.data("dottedoverlay")&&void 0!=nextcaption.data("dottedoverlay")&&1!=nextcaption.find(".tp-dottedoverlay").length&&html5vid.append('<div class="tp-dottedoverlay '+nextcaption.data("dottedoverlay")+'"></div>'),void 0==jvideo.attr("control")&&(0==html5vid.find(".tp-video-play-button").length&&html5vid.append('<div class="tp-video-play-button"><i class="revicon-right-dir"></i><div class="tp-revstop"></div></div>'),html5vid.find("video, .tp-poster, .tp-video-play-button").click(function(){html5vid.hasClass("videoisplaying")?video.pause():video.play()})),(1==nextcaption.data("forcecover")||nextcaption.hasClass("fullscreenvideo"))&&(1==nextcaption.data("forcecover")&&(updateHTML5Size(html5vid,opt.container),html5vid.addClass("fullcoveredvideo"),nextcaption.addClass("fullcoveredvideo")),html5vid.css({width:"100%",height:"100%"})),video.addEventListener("play",function(){html5vid.addClass("videoisplaying"),opt.videoplaying=!0,"mute"==nextcaption.data("volume")&&(video.muted=!0),"loopandnoslidestop"==nextcaption.data("videoloop")&&(opt.videoplaying=!1,opt.container.trigger("starttimer"),opt.container.trigger("revolution.slide.onvideostop"))}),video.addEventListener("pause",function(){html5vid.removeClass("videoisplaying"),opt.videoplaying=!1,opt.container.trigger("starttimer"),opt.container.trigger("revolution.slide.onvideostop")}),video.addEventListener("ended",function(){html5vid.removeClass("videoisplaying"),opt.videoplaying=!1,opt.container.trigger("starttimer"),opt.container.trigger("revolution.slide.onvideostop"),1==opt.nextslideatend&&opt.container.revnext()}));var t=!1;1!=nextcaption.data("autoplayonlyfirsttime")&&"true"!=nextcaption.data("autoplayonlyfirsttime")||(t=!0);var e=16/9;if("4:3"==nextcaption.data("aspectratio")&&(e=4/3),html5vid.data("mediaAspect",e),1==html5vid.closest(".tp-caption").data("forcecover")&&(updateHTML5Size(html5vid,opt.container),html5vid.addClass("fullcoveredvideo")),jvideo.css({display:"block"}),opt.nextslideatend=nextcaption.data("nextslideatend"),1!=nextcaption.data("autoplay")&&1!=t||("loopandnoslidestop"==nextcaption.data("videoloop")?(opt.videoplaying=!1,opt.container.trigger("starttimer"),opt.container.trigger("revolution.slide.onvideostop")):(opt.videoplaying=!0,opt.container.trigger("stoptimer"),opt.container.trigger("revolution.slide.onvideoplay")),"on"!=nextcaption.data("forcerewind")||html5vid.hasClass("videoisplaying")||video.currentTime>0&&(video.currentTime=0),"mute"==nextcaption.data("volume")&&(video.muted=!0),html5vid.data("timerplay",setTimeout(function(){"on"!=nextcaption.data("forcerewind")||html5vid.hasClass("videoisplaying")||video.currentTime>0&&(video.currentTime=0),"mute"==nextcaption.data("volume")&&(video.muted=!0),setTimeout(function(){video.play()},500)},10+nextcaption.data("start")))),void 0==html5vid.data("ww")&&html5vid.data("ww",jvideo.attr("width")),void 0==html5vid.data("hh")&&html5vid.data("hh",jvideo.attr("height")),!nextcaption.hasClass("fullscreenvideo")&&1==nextcaption.data("forcecover"))try{html5vid.width(html5vid.data("ww")*opt.bw),html5vid.height(html5vid.data("hh")*opt.bh)}catch(t){}clearInterval(html5vid.data("interval"))}}),100);