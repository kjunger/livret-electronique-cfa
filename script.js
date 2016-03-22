$(document).ready(function(){

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

	var ecran = $(window).width();
	if (ecran > 1000){

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
	}
	else{

$('div.screen').css('right','0');
$('div.screen').css('left','0');

$('div.bouton').on('click', function(){
			if( !$(this).hasClass('open') ){ 
				openMenu(); 
			}else { 
				closeMenu(); 
			}
});

$('div #cssmenu ul li a').on('click', function(e){
		e.preventDefault();
		closeMenu();
});
	
function openMenu(){
	
	$('div.bouton').addClass('open');	
    $('div.y').fadeOut(100);
    $('div.screen').addClass('animate');
    $('#deconnexion-mobile').css('display','none');
    $('div.screen').css('left','80%');	
		
	setTimeout(function(){					
		$('div.x').addClass('rotate30'); 
		$('div.z').addClass('rotate150'); 
		setTimeout(function(){				
			$('div.x').addClass('rotate45'); 
			$('div.z').addClass('rotate135');  
		}, 100);
	}, 10);			
}
	
function closeMenu(){
	
	$('div.screen').removeClass('animate');
	$('div.y').fadeIn(150);
	$('div.bouton').removeClass('open');	
	$('div.x').removeClass('rotate45').addClass('rotate30'); 
	$('div.z').removeClass('rotate135').addClass('rotate150');	
	$('div.screen').css('left','0');
	$('#deconnexion-mobile').css('display','');			
		
	setTimeout(function(){ 			
		$('div.x').removeClass('rotate30'); 
		$('div.z').removeClass('rotate150'); 			
	}, 50);
	setTimeout(function(){				
		$('div.x, div.z').removeClass('collapse');
	}, 70);													
		
}

$('header #user').on('click', function(){
			if( !$(this).hasClass('open') ){ 
				openMenuUser(); 
			}else { 
				closeMenuUser(); 
			}
});
	
function openMenuUser(){
	$('header #user').addClass('open');	
    $('div.screen').addClass('animate-user');
    $('#cssmenu').css('display','none');
    $('div.screen').css('left','');	
    $('div.screen').css('right','80%');	
}
	
function closeMenuUser(){
	
	$('div.screen').removeClass('animate-user');
	$('header #user').removeClass('open');
	$('#cssmenu').css('display','');
	$('div.screen').css('right','80%');	
	$('div.screen').css('left','0');	
}

	}

});
































































