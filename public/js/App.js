$(document).ready(function(){
	
	$("#messengerSendSelect").on('change',function(){
		if($(this).val() == 'oneUser')
			$('.extraOptions').show();
		else		
			$('.extraOptions').hide();
	});


});
