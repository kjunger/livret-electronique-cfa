$(document).ready(function(){

	var ecran = $(window).width();
	if (ecran > 1000){
		$('#cssmenu li.has-sub>a').on('click', function(){
			$(this).removeAttr('href');
			var element = $(this).parent('li');
			if (element.hasClass('open')) {
				element.removeClass('open');
				element.find('li').removeClass('open');
				element.find('ul').slideUp(200);
			}
			else {
				element.addClass('open');
				element.children('ul').slideDown(200);
				element.siblings('li').children('ul').slideUp(200);
				element.siblings('li').removeClass('open');
				element.siblings('li').find('li').removeClass('open');
				element.siblings('li').find('ul').slideUp(200);
			}
		});

		$('header #user').on('click', function(){
			var elem = $('header #deconnexion');
			if(elem.hasClass('open')){
				$('header p').css('color', '');
				elem.removeClass('open');
				elem.css('display','none');
				$('header ul').addClass('hidden');

			} else{
				$('header p').css('color', '#363636');
				elem.addClass('open');
				elem.css('display','');
				$('header ul').removeClass('hidden');
			}
		});
	}else{
	}

});
