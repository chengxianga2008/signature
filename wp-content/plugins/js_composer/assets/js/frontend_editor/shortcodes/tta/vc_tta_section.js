!function(t){vc.ttaSectionActivateOnClone=!1,window.InlineShortcodeView_vc_tta_section=window.InlineShortcodeViewContainerWithParent.extend({events:{'click > .vc_controls [data-vc-control="destroy"]':"destroy",'click > .vc_controls [data-vc-control="edit"]':"edit",'click > .vc_controls [data-vc-control="clone"]':"clone",'click > .vc_controls [data-vc-control="prepend"]':"prependElement",'click > .vc_controls [data-vc-control="append"]':"appendElement",'click > .vc_controls [data-vc-control="parent.destroy"]':"destroyParent",'click > .vc_controls [data-vc-control="parent.edit"]':"editParent",'click > .vc_controls [data-vc-control="parent.clone"]':"cloneParent",'click > .vc_controls [data-vc-control="parent.append"]':"addSibling","click .vc_tta-panel-body > [data-js-panel-body].vc_empty-element":"appendElement","click > .vc_controls .vc_control-btn-switcher":"switchControls",mouseenter:"resetActive",mouseleave:"holdActive"},controls_selector:"#vc_controls-template-vc_tta_section",previousClasses:!1,activeClass:"vc_active",render:function(){var t=this.model;return window.InlineShortcodeView_vc_tta_section.__super__.render.call(this),_.bindAll(this,"bindAccordionEvents"),this.refreshContent(),this.moveClasses(),_.defer(this.bindAccordionEvents),this.isAsActiveSection()&&window.vc.frame_window.vc_iframe.addActivity(function(){window.vc.frame_window.jQuery('[data-vc-accordion][data-vc-target="[data-model-id='+t.get("id")+']"]').trigger("click")}),this},allowAddControl:function(){return vc_user_access().shortcodeAll("vc_tta_section")},clone:function(t){vc.ttaSectionActivateOnClone=!0,window.InlineShortcodeView_vc_tta_section.__super__.clone.call(this,t)},addSibling:function(t){window.InlineShortcodeView_vc_tta_section.__super__.addSibling.call(this,t)},parentChanged:function(){return window.InlineShortcodeView_vc_tta_section.__super__.parentChanged.call(this),this.refreshContent(!0),this},changed:function(){this.allowAddControlOnEmpty()&&0===this.$el.find(".vc_element[data-tag]").length?this.$el.addClass("vc_empty").find(".vc_tta-panel-body > [data-js-panel-body]").addClass("vc_empty-element"):this.$el.removeClass("vc_empty").find(".vc_tta-panel-body > [data-js-panel-body].vc_empty-element").removeClass("vc_empty-element")},moveClasses:function(){var t;this.previousClasses&&(this.$el.get(0).className=this.$el.get(0).className.replace(this.previousClasses,"")),t=this.$el.find(".vc_tta-panel").get(0).className,this.$el.attr("data-vc-content",this.$el.find(".vc_tta-panel").data("vcContent")),this.previousClasses=t,this.$el.find(".vc_tta-panel").get(0).className="",this.$el.get(0).className=this.$el.get(0).className+" "+this.previousClasses,this.$el.find(".vc_tta-panel-title [data-vc-target]").attr("data-vc-target","[data-model-id="+this.model.get("id")+"]")},refreshContent:function(e){var c,n,o,i,a;o=vc.shortcodes.get(this.model.get("parent_id")),_.isObject(o)&&(a=vc.getDefaultsAndDependencyMap(o.get("shortcode")),i=_.extend({},a.defaults,o.get("params")),c=this.$el.find(".vc_tta-controls-icon"),i&&!_.isUndefined(i.c_icon)&&0<i.c_icon.length?(c.length?c.attr("data-vc-tta-controls-icon",i.c_icon):this.$el.find("[data-vc-tta-controls-icon-wrapper]").append(t('<i class="vc_tta-controls-icon" data-vc-tta-controls-icon="'+i.c_icon+'"></i>')),!_.isUndefined(i.c_position)&&0<i.c_position.length&&(n=this.$el.find("[data-vc-tta-controls-icon-position]")).length&&n.attr("data-vc-tta-controls-icon-position",i.c_position)):(c.remove(),this.$el.find("[data-vc-tta-controls-icon-position]").attr("data-vc-tta-controls-icon-position","")),!0!==e&&o.view&&o.view.sectionUpdated&&o.view.sectionUpdated(this.model))},setAsActiveSection:function(t){this.model.set("isActiveSection",!!t)},isAsActiveSection:function(){return!!this.model.get("isActiveSection")},bindAccordionEvents:function(){var t=this;window.vc.frame_window.jQuery('[data-vc-target="[data-model-id='+this.model.get("id")+']"]').on("show.vc.accordion hide.vc.accordion",function(e){t.setAsActiveSection("show"===e.type)})},destroy:function(t){var e,c;c=this.model.get("parent_id"),window.InlineShortcodeView_vc_tta_section.__super__.destroy.call(this,t),e=vc.shortcodes.get(c),vc.shortcodes.where({parent_id:c}).length?e.view&&e.view.removeSection&&e.view.removeSection(this.model.get("id")):e.destroy()}})}(window.jQuery);