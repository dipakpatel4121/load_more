//var $ = jQuery.noConflict();
$(function() {
    
    $("#load_more").click(function(){
    	var offset = $(this).data('offset');
    	console.log('offset is '+offset);

    	$.ajax({
		    type: "POST",
		    // dataType: "json",
		    url: my_ajax_object.ajax_url,
		    data: {
		    	action:'get_data',
		    	offset:offset
		    },
		    success: function(response){
		        if(response.success){
					// var data = response.data.data_arr;
					// for (var i = 0; i < data.length; i++) {
			    	// 	$('.my-posts').append('<div class="titlepost">'+ data[i].title +'</div>');
			    	// }
		        	$('.my-posts').append(response.data.html_data);
		        	$("#load_more").data('offset',response.data.offset);
		        }else{
		        	$("#load_more").hide();
		        }
		        return false;
		    }
		});

    });	
	
});
