jQuery(document).ready(function(){    
    jQuery( "#new_label_date_field" ).datepicker({minDate: 0,dateFormat: 'yy-mm-dd'});
    /* script for auto install */
    jQuery('#auto-install').on('click',function(){
        jQuery('.auto-install-loader').show();
        var demo = jQuery('#auto-install').attr('data-href');
        var auto_update = 'auto_install_layout1';
            auto_update = demo; 
        jQuery.ajax({
            type: 'POST',
            url: js_strings.ajaxurl,
            data: {
                layout: auto_update,
                action: 'auto_install_layout'
            },
            success: function(data, textStatus, XMLHttpRequest){
                jQuery('.auto-install-loader').hide();
                location.reload();
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
                jQuery('.auto-install-loader').hide();
                location.reload();
            }
        });
    });
    jQuery('#remove-auto-install').on('click',function(){
        if (confirm("Do you want to remove sample data?") == true) {
            jQuery('.auto-install-loader').show();
            jQuery.ajax({
                type: 'POST',
                url: js_strings.ajaxurl,
                data: {
                    action: 'remove_auto_update'
                },
                success: function(data, textStatus, XMLHttpRequest){
                    jQuery('.auto-install-loader').hide();
                    location.reload();
                },
                error: function(XMLHttpRequest, textStatus, errorThrown){
                    jQuery('.auto-install-loader').hide();
                    location.reload();
                }
            });
            return true;
        } else {
            return false;
        }
    });
    
    /* jquery auto-install section */

    jQuery('.demo_layout_wrap.select_demo div.bgframe').live('click', function () {
        var tlayout = jQuery(this);
        jQuery('.demo_layout_wrap div.bgframe').each(function () {
            jQuery(this).find('.scroll_image').removeClass('selected');
            jQuery(this).removeClass('selected');
        });
        tlayout.find('.scroll_image').addClass('selected');
        tlayout.addClass('selected');
        var install_path = tlayout.find('.scroll_image').attr('demo-attr');
        jQuery('.demo_install_button').find('a.install_demo').removeClass('disabled');
        jQuery('.demo_install_button').find('.select_demo_msg').remove();
        jQuery('.demo_install_button').find('a.install_demo').attr('data-href', install_path);
    });
    if (jQuery('.demo_layout_wrap a.bgframe').hasClass('selected')) {
        jQuery('.demo_install_button').find('a.install_demo').removeClass('disabled');
    } else {
        jQuery('.demo_install_button').find('a.install_demo').addClass('disabled');
        jQuery('.demo_install_button').find('.start_install').append('<span class="select_demo_msg"> ' + js_strings.select_demo_notice + '</span>');
    }
    jQuery(window).load(function () {
        jQuery('.end_install').find('.select_demo_msg').remove();
    });
    
    
    /* UNLIMITED SIDEBARS */
	
	var delSidebar = '<div class="delete-sidebar">delete</div>';
	
	jQuery('.sidebar-template_trip_custom_sidebar').find('.sidebar-name-arrow').before(delSidebar);
	
	jQuery('.delete-sidebar').click(function(){
		
		var confirmIt = confirm('Are you sure?');
		
		if(!confirmIt) return;
		
		var widgetBlock = jQuery(this).parent().parent().parent();
	
		var data =  {
			'action':'template_trip_delete_sidebar',
			'template_trip_sidebar_name': jQuery(this).parent().find('h2').text()
		};
		
		widgetBlock.hide();
		
		jQuery.ajax({
			url: ajaxurl,
			data: data,
			success: function(response){
				console.log(response);
				widgetBlock.remove();
			},
			error: function(data) {
				alert('Error while deleting sidebar');
				widgetBlock.show();
			}
		});
	});

	
	/* end sidebars */
    
    
	 jQuery(document).on("click", ".upload_image", function (event) {
        event.preventDefault();
		var thisvar = jQuery(this);
        var frame;
        if (frame) {
            frame.open();
            return;
        }
        frame = wp.media({
            title: 'upload image',
            button: {
                text: 'select'
            },
            library: {type: 'image'},
            multiple: false
        });
        frame.on('select', function () {
            var attachment = frame.state().get('selection').first().toJSON();
            thisvar.next('.image_wrap').empty().hide().append('<img src="' + attachment.url + '" alt="" style="max-width:100%; float:left;"/><a class="remove-image" title="remove">remove</a>').slideDown('fast');
            thisvar.prev().val(attachment.url);
            thisvar.next('.image_wrap').parent().closest('.image_div').parent('div').find('.custom_image_position').show();
			jQuery(".image_wrap .remove-image").click(function () {
			jQuery(this).closest('.image_wrap').slideUp('fast');			
			jQuery(this).closest('.image_wrap').parent().closest('.image_div').find(".image_input").val('');
                        jQuery(this).closest('.image_wrap').parent().closest('.image_div').parent('div').find('.custom_image_position').hide();			
			jQuery(this).hide('slow');
			jQuery(this).closest('.image_wrap').empty();
			return false;
		});
        });
		
        frame.open();
    });
    /*-- Remove image --*/
        jQuery(".image_wrap .remove-image").click(function () {
                jQuery(this).closest('.image_wrap').slideUp('fast');			
                jQuery(this).closest('.image_wrap').parent().closest('.image_div').find(".image_input").val('');
                jQuery(this).closest('.image_wrap').parent().closest('.image_div').parent('div').find('.custom_image_position').hide();		
                jQuery(this).hide('slow');
                jQuery(this).closest('.image_wrap').empty();
                return false;
        });
	
	jQuery(document).on('widget-added', function(e, widget){
		jQuery(".image_wrap .remove-image").click(function () {
			jQuery(this).closest('.image_wrap').slideUp('fast');			
			jQuery(this).closest('.image_wrap').parent().closest('.image_div').find(".image_input").val('');			
			jQuery(this).hide('slow');
			jQuery(this).closest('.image_wrap').empty();
			return false;
		});
	});
	jQuery(document).on('widget-updated', function(e, widget){
		jQuery(".remove-image").click(function () {
			jQuery(this).closest('.image_wrap').slideUp('fast');			
			jQuery(this).closest('.image_wrap').parent().closest('.image_div').find(".image_input").val('');			
			jQuery(this).hide('slow');
			jQuery(this).closest('.image_wrap').empty();
			return false;
		});
	});

});