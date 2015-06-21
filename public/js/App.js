$(document).ready(function(){
	
	if($("#messengerSendSelect").val() == 'oneUser')
			$('.extraOptions').show();
	
	$("#messengerSendSelect").on('change',function(){
		if($(this).val() == 'oneUser')
			$('.extraOptions').show();
		else		
			$('.extraOptions').hide();
	});
	
	if($('#messageStatus').html() != ''){
			$('.statusBar').fadeIn('slow',function(){
				setTimeout(function(){$('.statusBar').fadeOut('slow');},3000);
			});
	}

	$('.click-inside').on('click', function(){
			window.location = $(this).find('a').attr('href');
	});

});
