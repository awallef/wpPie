var columnsClasses = ['three','two','noMarginLeft','noRightMargin'];
var steps = [800, 500];

function resizeVideo()
{
	var ratio = 560 / 315;
	
	var w = $('.flex').width();
	var h = w / ratio;
	
	$('#mainVideo iframe').attr({
		width: '100%',
		height: h + 'px'
	});
	
	var count = 0;
	
	$('.videoThumb').each(function(){
		
		removeClasses( this );
		
		if( w > steps[0] )
		{
			$(this).addClass( columnsClasses[0] );
			if( count%3 == 0 ) $(this).addClass( columnsClasses[2] );
			if( count%3 == 2 ) $(this).addClass( columnsClasses[3] );
		}else if( w < steps[0] && w > steps[1] )
		{
			$(this).addClass( columnsClasses[1] );
			if( count%2 == 0 ) $(this).addClass( columnsClasses[2] );
			if( count%2 == 1 ) $(this).addClass( columnsClasses[3] );
		}
		count++;
	});
	
	if( w < steps[0] )
	{
		lw = w * 0.4;
		$('#headerLogo').width( lw );
		
	}
	
	var baseTitle = 3;
	var baseSubTitle = 16 / 12;
	var baseCopyrights = 1;
	var correction = 0.4;
	
	
	if( w > steps[0]  ){
		$('.headerInfoTitle').css({ 'font-size' : baseTitle + 'em' });
		$('.headerInfoSubTitle').css({ 'font-size' : baseSubTitle + 'em' });
		$('#footer').css({ 'font-size' : baseCopyrights + 'em' })
	}else{
		$('.headerInfoTitle').css({ 'font-size' : Math.min( ( ( w / 960 ) * baseTitle ) + correction, baseTitle ) + 'em' });
		$('.headerInfoSubTitle').css({ 'font-size' : Math.min( ( ( w / 960 ) * baseSubTitle ) + correction, baseSubTitle ) + 'em' });
		$('#footer').css({ 'font-size' : Math.min( ( ( w / 960 ) * baseCopyrights ) + correction, baseCopyrights ) + 'em' })
	}
	
}

function removeClasses( elem )
{
	for( i in columnsClasses )
	{
		$(elem).removeClass( columnsClasses[i] );
	}
	
}

$(document).ready(function(){
	$(window).bind('resize', resizeVideo );
	resizeVideo();
});