jQuery(function(i){i(".wpmm_notices").on("click",".notice-dismiss",function(){var n=i(this).parent().data("key");i.post(ajaxurl,{action:"wpmm_dismiss_notices",notice_key:n},function(i){if(!i.success)return!1},"json")})});