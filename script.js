$(document).ready(function(){

var largeurEcran = $(window).width();
var hauteurEcran = $(window).height();

function redimensionnement_main(){
var hauteurMain = $('main').height();
var hauteurHeader = $('header').height();
var hauteurFooter = $('footer').height();
var largeurMain = $('main').width();
var largeurMenu = $('#cssmenu').outerWidth() + 3;
hauteurMain = hauteurMain - hauteurFooter - hauteurHeader;
largeurMain = largeurMain - largeurMenu;
$('main').css('height', hauteurMain);
$('main').css('width', largeurMain + 17);
$('main').css('left', largeurMenu);
}

function redimensionnement_menu(){
var hauteurMenu = $('#cssmenu').height();
var hauteurHeader = $('header').height();
var hauteurFooter = $('footer').height();
hauteurMenu = hauteurMenu - hauteurFooter - hauteurHeader + 120;
$('#cssmenu').css('height', hauteurMenu);
}

function redimensionnement_main_mobile(){
var hauteurMain = $('main').height();
var hauteurHeader = $('header').height();
hauteurMain = hauteurMain - hauteurHeader;
$('main').css('height', hauteurMain);
}

/*$("#fake-button").click(function(){
	alert($('#cssmenu').height());
	alert($('main').height());
});*/
if (largeurEcran > 999){
	redimensionnement_menu();
	redimensionnement_main();

	$(window).resize(function() {
		$('main').css('height', '100%');
		$('main').css('width', '100%');
		redimensionnement_main();
		$('#cssmenu').css('height', '100%');
		redimensionnement_menu();
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
}

if (largeurEcran <= 999){

	$('#deconnexion-mobile').css('display','none');
	$('#cssmenu').css('display','none');

	redimensionnement_main_mobile();

	$(window).resize(function() {
		$('main').css('height', '100%');
		redimensionnement_main_mobile();
	});


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
    $('#cssmenu').css('display','');
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
    $('#deconnexion-mobile').css('display','');
    $('#cssmenu').css('display','none');
    $('div.screen').css('left','');	
    $('div.screen').css('right','80%');	
}
	
function closeMenuUser(){
	
	$('div.screen').removeClass('animate-user');
	$('header #user').removeClass('open');
	$('#cssmenu').css('display','');
	$('div.screen').css('right','');	
	$('div.screen').css('left','0');	
}


}


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

	$('#menu-landscape li.has-sub>a').on('click', function(){
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



	if (largeurEcran > 1000){

		
	}
	else{



	}

	/*if (hauteurEcran < largeurEcran && largeurEcran < 999){

		$('div.screen').css('top','0');

		$('div.bouton-landscape').on('click', function(){
			if( !$(this).hasClass('open') ){ 
				openMenuLandscape(); 
			}else { 
				closeMenuLandscape(); 
			}
		});
		
		function openMenuLandscape(){
			$('div.bouton-landscape').addClass('open');
			$('div.x').addClass('active');
			$('div.y').addClass('active');
			$('div.z').addClass('active');	
			$('div.y').fadeOut(100);
		    $('div.screen').addClass('animate-landscape');
		    $('div.screen').css('top','');
		    $('div.screen').css('display','none');

		    setTimeout(function(){					
				$('div.x').addClass('rotate30'); 
				$('div.z').addClass('rotate150'); 
				setTimeout(function(){				
					$('div.x').addClass('rotate45'); 
					$('div.z').addClass('rotate135');  
				}, 100);
			}, 10);
		}
		
		function closeMenuLandscape(){
			
			$('div.screen').removeClass('animate-landscape');
			$('div.x').removeClass('active');
			$('div.y').removeClass('active');
			$('div.z').removeClass('active');	
			$('div.y').fadeIn(150);
			$('div.bouton-landscape').removeClass('open');
			$('div.x').removeClass('rotate45').addClass('rotate30'); 
			$('div.z').removeClass('rotate135').addClass('rotate150');
			$('div.screen').css('top','0');
			$('div.screen').css('display','');

			setTimeout(function(){ 			
				$('div.x').removeClass('rotate30'); 
				$('div.z').removeClass('rotate150'); 			
			}, 50);
			setTimeout(function(){				
				$('div.x, div.z').removeClass('collapse');
			}, 70);		
		}
	}else {
		$('#menu-landscape').css('display','none');
	}


function menuLandscape(){
	$('div.screen').css('top','0');

		$('div.bouton-landscape').on('click', function(){
			if( !$(this).hasClass('open') ){ 
				openMenuLandscape(); 
			}else { 
				closeMenuLandscape(); 
			}
		});
		
		function openMenuLandscape(){
			$('div.bouton-landscape').addClass('open');
			$('div.x').addClass('active');
			$('div.y').addClass('active');
			$('div.z').addClass('active');	
			$('div.y').fadeOut(100);
		    $('div.screen').addClass('animate-landscape');
		    $('div.screen').css('top','');
		    $('div.screen').css('display','none');

		    setTimeout(function(){					
				$('div.x').addClass('rotate30'); 
				$('div.z').addClass('rotate150'); 
				setTimeout(function(){				
					$('div.x').addClass('rotate45'); 
					$('div.z').addClass('rotate135');  
				}, 100);
			}, 10);
		}
		
		function closeMenuLandscape(){
			
			$('div.screen').removeClass('animate-landscape');
			$('div.x').removeClass('active');
			$('div.y').removeClass('active');
			$('div.z').removeClass('active');	
			$('div.y').fadeIn(150);
			$('div.bouton-landscape').removeClass('open');
			$('div.x').removeClass('rotate45').addClass('rotate30'); 
			$('div.z').removeClass('rotate135').addClass('rotate150');
			$('div.screen').css('top','0');
			$('div.screen').css('display','');

			setTimeout(function(){ 			
				$('div.x').removeClass('rotate30'); 
				$('div.z').removeClass('rotate150'); 			
			}, 50);
			setTimeout(function(){				
				$('div.x, div.z').removeClass('collapse');
			}, 70);		
		}
}*/


});

















































