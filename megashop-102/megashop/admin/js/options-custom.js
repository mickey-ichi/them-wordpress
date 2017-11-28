jQuery(document).ready(function($) {
         // Color Preset Options
        $('.color-option.palette').click(function(){
            $('.color-option.palette').each(function(){
                $(this).removeClass('selected');
            });
            $(this).addClass('selected');
            $(this).find('.of-radio-color').prop('checked',true);
            var color_ops = $(this).attr('data-color');
            var color_ops_ar = color_ops.split(',');
            $('#megashop_primary_color').wpColorPicker('color',color_ops_ar[0]);
            $('#megashop_secondary_color').wpColorPicker('color',color_ops_ar[1]);
            $('#megashop_title_color').wpColorPicker('color',color_ops_ar[2]);
            $('#megashop_meta_font_color').wpColorPicker('color',color_ops_ar[3]);
            $('#megashop_pagecontent_color').wpColorPicker('color',color_ops_ar[4]);
        });

	// Loads the color pickers
	$('.of-color').wpColorPicker();

	// Image Options
	$('.of-radio-img-img').click(function(){
		$(this).parent().parent().find('.of-radio-img-img').removeClass('of-radio-img-selected');
		$(this).addClass('of-radio-img-selected');
	});

	$('.of-radio-img-label').hide();
	$('.of-radio-img-img').show();
	$('.of-radio-img-radio').hide();
	
	
	// Loads tabbed sections if they exist
	if ( $('.nav-tab-wrapper').length > 0 ) {
		options_framework_tabs();
	}

	function options_framework_tabs() {

		var $group = $('.group'),
			$navtabs = $('.nav-tab-wrapper a'),
			active_tab = '';

		// Hides all the .group sections to start
		$group.hide();

		// Find if a selected tab is saved in localStorage
		if ( typeof(localStorage) != 'undefined' ) {
			active_tab = localStorage.getItem('active_tab');
		}

		// If active tab is saved and exists, load it's .group
		if ( active_tab != '' && $(active_tab).length ) {
			$(active_tab).fadeIn();
			$(active_tab + '-tab').addClass('nav-tab-active');
		} else {
			$('.group:first').fadeIn();
			$('.nav-tab-wrapper a:first').addClass('nav-tab-active');
		}

		// Bind tabs clicks
		$navtabs.click(function(e) {

			e.preventDefault();

			// Remove active class from all tabs
			$navtabs.removeClass('nav-tab-active');

			$(this).addClass('nav-tab-active').blur();

			if (typeof(localStorage) != 'undefined' ) {
				localStorage.setItem('active_tab', $(this).attr('href') );
			}

			var selected = $(this).attr('href');

			$group.hide();
			$(selected).fadeIn();

		});
	}
	
        
        options_change_hide_show('');
    $('.chk-toggle').on('click', function () {
        options_change_hide_show($(this));
    });
    $('.section-select select').on('change',function() {
        options_change_hide_show($(this));
    });
    $('.of-radio-img-img').on('click',function() {
        options_change_hide_show($(this));
    });
    function options_change_hide_show(current) {
        var current_new = '';
        if(current == '') {
            current_new = $('.c_blockids');
        }
        else {
            var prev_new = current.closest('.section').prev('.section');
            //alert(prev_new.length);
            if(prev_new.length == 0) {
                prev_new = current.closest('.section').prev('h3');
            }
            if(prev_new.length == 0) {
                prev_new = current.closest('.section');
            }
            current_new = prev_new.nextAll('.c_blockids');
        }
        current_new.each(function(){
            if($(this).hasClass('section-checkbox')) {
                if($(this).css('display') != 'none') {
                    var t_checkbox = $(this).find('.chk-toggle');
                    var blockids = t_checkbox.attr('blockids');   
                    //alert(blockids);
                    if(blockids != '' && typeof(blockids) != 'undefined') {
                        var strblockids = blockids.toString();
                        var block_ids1 = strblockids.split(",");
                        if(t_checkbox.prop('checked') == true) {
                            for(var i=0; i< block_ids1.length; i++) {
                               $('#section-'+block_ids1[i]).show();
                            }
                        }
                        else {
                            for(var i=0; i< block_ids1.length; i++) {
                               $('#section-'+block_ids1[i]).hide();
                            }
                        }
                    }
                }
            }
            else if($(this).hasClass('section-select')) {
                if($(this).css('display') != 'none') {
                    var t_select = $(this).find('.chk-select');					
                    var all_blockids = t_select.attr('blockids');
                    if(all_blockids != '' && typeof(all_blockids) != 'undefined') {
                        var strblockids = all_blockids.toString();
                        var block_ids1 = strblockids.split(",");
                        for(var i=0; i< block_ids1.length; i++) {
                           $('#section-'+block_ids1[i]).hide();
                        }
                    }
                    var blockids = t_select.find('option:selected').attr('blockids');
                    if(blockids != '' && typeof(blockids) != 'undefined') {
                        var strblockids = blockids.toString();
                        var block_ids1 = strblockids.split(",");
                        for(var i=0; i< block_ids1.length; i++) {
                           $('#section-'+block_ids1[i]).show();
                        }
                    }
                }
            }
            else if($(this).hasClass('section-images')) {
                if($(this).css('display') != 'none') {
                    var t_select = $(this).find('.img_blockids');
                    var all_blockids = t_select.attr('blockids');
                    //alert(all_blockids);
                    if(all_blockids != '' && typeof(all_blockids) != 'undefined') {
                        var strblockids = all_blockids.toString();
                        var block_ids1 = strblockids.split(",");
                        for(var i=0; i< block_ids1.length; i++) {
                           $('#section-'+block_ids1[i]).hide();
                        }
                    }
                    if(current != '') {
                        var blockids = current.attr('blockids');
                    }
                    else {
                        var blockids = $(this).find('.of-radio-img-selected').attr('blockids');
                    }
                    //alert(blockids);
                    if(blockids != '' && typeof(blockids) != 'undefined') {
                        var strblockids = blockids.toString();
                        var block_ids1 = strblockids.split(",");
                        for(var i=0; i< block_ids1.length; i++) {
                           $('#section-'+block_ids1[i]).show();
                        }
                    }
                }
            }
        });
    }
	
});