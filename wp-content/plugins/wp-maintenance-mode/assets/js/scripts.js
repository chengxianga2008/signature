jQuery(function(a){var s=a(".countdown");if(s.length>0){var t=new Date(s.data("end"));s.countdown({until:t,compact:!0,layout:'<span class="day">{dn}</span> <span class="separator">:</span> <span class="hour">{hnn}</span> <span class="separator">:</span> <span class="minutes">{mnn}</span> <span class="separator">:</span> <span class="seconds">{snn}</span>'})}var n=a(".social");n.length>0&&1==n.data("target")&&n.find("a").attr("target","_blank");var e=a(".subscribe_form");if(e.length>0&&e.validate({submitHandler:function(s){var t="action=wpmm_add_subscriber&"+e.serialize();return a.post(wpmm_vars.ajax_url,t,function(s){if(!s.success)return alert(s.data),!1;a(".subscribe_wrapper").html(s.data)},"json"),!1}}),a(".contact").length>0){a(".contact_us").click(function(){var s=a(this).data("open"),t=a(this).data("close");a(".contact").fadeIn(200),a("."+s).addClass(t)});var r=a(".contact_form");r.validate({submitHandler:function(s){var t="action=wpmm_send_contact&"+r.serialize();return a.post(wpmm_vars.ajax_url,t,function(s){if(!s.success)return alert(s.data),!1;r.parent().append('<div class="response">'+s.data+"</div>"),r.hide(),setTimeout(function(){a(".contact").hide(),r.parent().find(".response").remove(),r.trigger("reset"),r.show()},2e3)},"json"),!1}}),a("body").on("click",".contact",function(s){if(a(s.target).hasClass("contact")){var t=a(".contact_us").data("close");a(".form",a(this)).removeClass(t),a(this).hide()}})}});