jQuery(document).on("acf/setup_fields",function(t,e){setTimeout(function(){"tinymce"===getUserSetting("editor")?jQuery("#content-tmce").trigger("click"):jQuery("#content-html").trigger("click")},10)});