!function(t){t("#vc_vendor_qtranslate_langs_front").change(function(){vc.closeActivePanel(),t("#vc_logo").addClass("vc_ui-wp-spinner"),window.location.href=t(this).val()}),vc.ShortcodesBuilder.prototype.getContent=function(){var e,n=t("#vc_vendor_qtranslate_postcontent"),o=n.attr("data-lang"),r=n.val();return vc.shortcodes.sort(),e=this.modelsToString(vc.shortcodes.where({parent_id:!1})),qtrans_integrate(o,e,r)},vc.ShortcodesBuilder.prototype.getTitle=function(){var e=t("#vc_vendor_qtranslate_posttitle"),n=e.attr("data-lang"),o=e.val();return qtrans_integrate(n,vc.title,o)}}(window.jQuery);