!function(s){window.InlineShortcodeView_vc_column=window.InlineShortcodeViewContainerWithParent.extend({controls_selector:"#vc_controls-template-vc_column",resizeDomainName:"columnSize",_x:0,css_width:12,prepend:!1,initialize:function(s){window.InlineShortcodeView_vc_column.__super__.initialize.call(this,s),_.bindAll(this,"startChangeSize","stopChangeSize","resize")},render:function(){return window.InlineShortcodeView_vc_column.__super__.render.call(this),this.prepend=!1,s('<div class="vc_resize-bar"></div>').appendTo(this.$el).mousedown(this.startChangeSize),this.setColumnClasses(),this.customCssClassReplace(),this},destroy:function(s){var e=this.model.get("parent_id");window.InlineShortcodeView_vc_column.__super__.destroy.call(this,s),vc.shortcodes.where({parent_id:e}).length||vc.shortcodes.get(e).destroy()},customCssClassReplace:function(){var s,e,i;e=/.*(vc_custom_\d+).*/,(i=!(!(s=this.$el.find(".wpb_column").attr("class"))||!s.match)&&s.match(e))&&i[1]&&(this.$el.addClass(i[1]),this.$el.find(".wpb_column").attr("class",s.replace(i[1],"").trim()))},setColumnClasses:function(){var s=this.getParam("offset")||"",e=this.getParam("width")||"1/1",i=this.$el.find("> .wpb_column");this.css_class_width=this.convertSize(e).replace(/[^\d]/g,""),i.removeClass("vc_col-sm-"+this.css_class_width),s.match(/vc_col\-sm\-\d+/)||this.$el.addClass("vc_col-sm-"+this.css_class_width),vc.responsive_disabled&&(s=s.replace(/vc_col\-(lg|md|xs)[^\s]*/g,"")),_.isEmpty(s)||(i.removeClass(s),this.$el.addClass(s))},startChangeSize:function(e){var i=this.getParam(i)||12;this._grid_step=this.parent_view.$el.width()/i,vc.frame_window.jQuery("body").addClass("vc_column-dragging").disableSelection(),this._x=parseInt(e.pageX),vc.$page.bind("mousemove."+this.resizeDomainName,this.resize),s(vc.frame_window.document).mouseup(this.stopChangeSize)},stopChangeSize:function(){this._x=0,vc.frame_window.jQuery("body").removeClass("vc_column-dragging").enableSelection(),vc.$page.unbind("mousemove."+this.resizeDomainName)},resize:function(s){var e,i,t=this.model.get("params");i=s.pageX-this._x,Math.abs(i)<this._grid_step||(this._x=parseInt(s.pageX),e=""+this.css_class_width,0<i?this.css_class_width+=1:0>i&&(this.css_class_width-=1),12<this.css_class_width&&(this.css_class_width=12),1>this.css_class_width&&(this.css_class_width=1),t.width=vc.getColumnSize(this.css_class_width),this.model.save({params:t},{silent:!0}),this.$el.removeClass("vc_col-sm-"+e).addClass("vc_col-sm-"+this.css_class_width))},convertSize:function(s){var e=s?s.split("/"):[1,1],i=_.range(1,13),t=!_.isUndefined(e[0])&&0<=_.indexOf(i,parseInt(e[0],10))&&parseInt(e[0],10),c=!_.isUndefined(e[1])&&0<=_.indexOf(i,parseInt(e[1],10))&&parseInt(e[1],10);return!1!==t&&!1!==c?"vc_col-sm-"+12*t/c:"vc_col-sm-12"},allowAddControl:function(){return vc_user_access().shortcodeAll("vc_column")}})}(window.jQuery);