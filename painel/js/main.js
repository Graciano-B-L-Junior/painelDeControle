$(function(){
	var open = true;
	var url = 'http://localhost/pj_01/painel'
	var windowSize = $(window)[0].innerWidth;
	if(windowSize<=768){
		$('.menu').css('width','0').css('padding','0')
		open = false;
	}
	$('.menu-btn').click(function(){
		if(open==true){
			$('.menu').animate({'width':'0','padding':'0'});
			$('.content,header').css('width','100%')
			$('.content,header').animate({'left':0})

			open = false;
		}else{
			$('.menu').css('display','block')
			$('.menu').animate({'width':'300','padding':'10'});
			$('.content,header').css('width','calc(100% - 300px)')
			$('.content,header').animate({'left':'300'})
			open=true;
		}
	})
	$('.btn-home').click(function(){
		$(location).attr('href',url);
	})
})	