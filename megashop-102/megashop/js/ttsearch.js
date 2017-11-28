jQuery( document ).ready( function($) {	
    var currentRequest = null;	
    jQuery("#tt_pro_search_input").on('input',function(e){		
        e.stopPropagation();
        var input_val = $(this).val();
        var category = $(this).next().find('select').val();		
        if( input_val.length >= $(this).data('min-chars') )
        {
            currentRequest = jQuery.ajax({
                url : screenReaderText.ajaxurl,
                type : 'post',
                data : {
                    action : 'megashop_tt_ajax_pro_search',
                    keyword : input_val,
                    category : category
                },
                beforeSend : function()    {
                    if(currentRequest != null) {
                        currentRequest.abort();
                    }
                    if($('body').hasClass('rtl')){
                        $('#tt_pro_search_input').css({
                            'background-image': 'url('+ajax_search_loader+')', 
                            'background-repeat': 'no-repeat', 
                            'background-position': '15px center'
                        });
                    }else{
                        $('#tt_pro_search_input').css({
                            'background-image': 'url('+ajax_search_loader+')', 
                            'background-repeat': 'no-repeat', 
                            'background-position': 'right center'
                        });
                    }				
					
                    $('.tt_ajax_search_results').hide();
                },
                success : function( response ) 
                {
                    var obj = jQuery.parseJSON( response );					
                    var html = '';
                    $.each(obj.search_results, function (i,result) {										
                        //console.log( result.value );						
                        var pro_val = result.value.replace(new RegExp(input_val, 'gi'), '<strong>'+input_val+'<\/strong>');
                        if(result.id == 0 ){
                            html += '<div class="ajax_search_result" data-pname="' + result.value + '" data-index="' + i + '"><a id="pro-'+ result.id +'" href="'+ result.url +'">' + pro_val + '</a></div>';
                        }else{
                            html += '<div class="ajax_search_result" data-pname="' + result.value + '" data-index="' + i + '"><a id="pro-'+ result.id +'" href="'+ result.url +'"><img src="' + result.image + '" alt="'+pro_val+'"><div class="pro_title">' + pro_val + '</div></a></div>';
                        }			
                    });					
                    $('#tt_pro_search_input').css({
                        'background-image': '', 
                        'background-repeat': 'no-repeat', 
                        'background-position': 'right center'
                    });
                    $('.tt_ajax_search_results').html(html).show();
                    $(".ajax_search_result").mouseenter(function(){
                        if($(".tt_ajax_search_results .ajax_search_result").hasClass('ac_over')){
                            $('.tt_ajax_search_results .ajax_search_result').removeClass('ac_over');
                            $(this).addClass('ac_over');
                        }else{
                            $(this).addClass('ac_over');
                        }

                    });
                }				
            });			
        }
        else
        {			
            $('.tt_ajax_search_results').hide();			
        }		
    });	
});
jQuery(document).ready(function($){
   
    $('#tt_pro_search_input').on('keydown',function(e){
		
        var $listItems = $('.ajax_search_result');
        //console.log($listItems);
	var key = e.keyCode,
		
        $selected = $listItems.filter('.result_selected'),			
        $current;
        if ( key != 40 && key != 38 ) return;
        $listItems.removeClass('result_selected');
        if ( key == 40 ) // Down key
        {
            if ( ! $selected.length || $selected.is(':last-child') ) {				
                $current = $listItems.eq(0);
            }
            else {
                $current = $selected.next();
            }			
        }
        else if ( key == 38 ) // Up key
        {
            if ( ! $selected.length || $selected.is(':first-child') ) {				
                $current = $listItems.last();				
            }
            else {				
                $current = $selected.prev();
            }			
        }		
        var replace_code = $current.data('pname').replace(/â†’/g, "&rarr;");
		
        $('#tt_pro_search_input').val(replace_code);
		
        $current.addClass('result_selected');
        $(".ajax_search_result").mouseenter(function(){
            if($(".tt_ajax_search_results .ajax_search_result").hasClass('ac_over')){
                $('.tt_ajax_search_results .ajax_search_result').removeClass('ac_over');
                $(this).addClass('ac_over');
            }else{
                $(this).addClass('ac_over');
            }                        
        });
    });
	
    jQuery('body').bind('click',function(e){ 
        $('.tt_ajax_search_results').hide();

    });	 
    jQuery("#tt_pro_search_input").bind('click',function(e){		
        e.stopPropagation();
        var inputval = $(this).val();
        if(inputval.length <= $(this).data('min-chars')){
            $('.tt_ajax_search_results').hide();
        }else{
            $('.tt_ajax_search_results').show();
            $(".ajax_search_result").mouseenter(function(){
                if($(".tt_ajax_search_results .ajax_search_result").hasClass('ac_over')){
                    $('.tt_ajax_search_results .ajax_search_result').removeClass('ac_over');
                    $(this).addClass('ac_over');
                }else{
                    $(this).addClass('ac_over');
                }                        
            });
        }
        $('.tt_ajax_search_results .search_result').html('');	 
    });
});