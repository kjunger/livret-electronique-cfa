$(document).ready(function(){

$('.titre').append('<svg height:"25" width:"25" class=""><polygon points="0,0 25,12.5 0,25" fill="#363636" stroke="none" /></svg>');
$('.conteneur').addClass('open');
sousmenu();
sousliens();
menu();
menu_user();
affichage_deconnexion();
redimensionnement();
contenu_mobile();
appInput();
appSubmit();
$(window).resize(redimensionnement);

//Variables
var largeurEcran = $(window).width();
var hauteurEcran = $(window).height();
//

//Fonctions
function redimensionnement_main(){
	var hauteurMain = $('#main').outerHeight();
	var hauteurHeader = $('header').height();
	var hauteurFooter = $('footer').height();
	var largeurMain = $('#main').outerWidth();
	var largeurMenu = $('#cssmenu').outerWidth() + 3;
	hauteurMain = hauteurMain - hauteurFooter - hauteurHeader;
	largeurMain = largeurMain - largeurMenu;
	$('#main').css('height', hauteurMain);
	$('#main').css('width', largeurMain + 17);
	$('#main').css('left', largeurMenu);
}

function redimensionnement_menu(){
	var hauteurMenu = $('#cssmenu').height();
	var hauteurHeader = $('header').height();
	var hauteurFooter = $('footer').height();
	hauteurMenu = hauteurMenu - hauteurFooter - hauteurHeader + 120;
	$('#cssmenu').css('height', hauteurMenu);
}

function redimensionnement_menu_user(){
	var hauteurMenuUser = $('#contenu-menu-user').height();
	var hauteurP = $('#deconnexion-mobile p').outerHeight();
	var hauteurFooterMenu = $('.footer-menu').outerHeight();
	hauteurMenuUser = hauteurMenuUser - hauteurP - hauteurFooterMenu;
	$('#contenu-menu-user').css('height', hauteurMenuUser);
}

function redimensionnement_main_mobile(){
	var hauteurMain = $('#main').outerHeight();
	var hauteurHeader = $('header').height();
	hauteurMain = hauteurMain - hauteurHeader;
	$('#main').css('height', hauteurMain);
	$('#main').css('width', '');
	$('#main').css('left', '');

}

function affichage_deconnexion(){
	var tailleDeconnexion = $('#deconnexion').width();
	var tailleUser = $('#user').width();
	var tailleNom = $('#nom').width();
	tailleDeconnexion = tailleUser + tailleNom + 140;
	$('#deconnexion').css('width', tailleDeconnexion);
	$('#bouton-deconnexion').on('click', function(){
		var elem = $('#deconnexion');
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

function openMenuUser(){
	$('#bouton-menu-user').addClass('open');	
    $('div.screen').addClass('animate-user');
    $('#deconnexion-mobile').css('display','');
    $('#cssmenu').css('display','none');
    $('div.screen').css('left','');	
    $('div.screen').css('right','80%');	
}
	
function closeMenuUser(){
	$('div.screen').removeClass('animate-user');
	$('#bouton-menu-user').removeClass('open');
	$('#cssmenu').css('display','');
	$('div.screen').css('right','');	
	$('div.screen').css('left','0');	
}

function menu(){
	$('div.bouton').on('click', function(){
		if( !$(this).hasClass('open') ){ 
			openMenu(); 
		}else { 
			closeMenu(); 
		}
	});
}

function menu_user(){
	$('#bouton-menu-user').on('click', function(){
		if( !$(this).hasClass('open') ){ 
			openMenuUser(); 
		}else { 
			closeMenuUser(); 
		}
	});
}

function sousmenu(){
	$('#cssmenu ul ul').css('display', 'none');
	$('#cssmenu li.has-sub>a').on('click', function(){
		$(this).removeAttr('href');
		var element = $(this).parent('li');
		if (element.hasClass('open')) {
			element.removeClass('open');
			element.find('li').removeClass('open');
			element.find('ul').stop().slideUp(200);
		}
		else {
			element.addClass('open');
			element.children('ul').stop().slideDown(200);
			element.siblings('li').children('ul').slideUp(200);
			element.siblings('li').removeClass('open');
			element.siblings('li').find('li').removeClass('open');
			element.siblings('li').find('ul').slideUp(200);
		}
	});
}

function sousliens(){
	$('.sous-ul-liens').css('display', 'none');
	$('.lien-has-sub').on('click', function(){
		$(this).removeAttr('href');
		var element = $(this).parent('li');
		if(element.hasClass('open')){
			element.removeClass('open');
			element.find('li').removeClass('open');
			element.find('ul').stop().slideUp(200);
		}
		else {
			element.addClass('open');
			element.children('ul').stop().slideDown(200);
			element.siblings('li').children('ul').slideUp(200);
			element.siblings('li').removeClass('open');
			element.siblings('li').find('li').removeClass('open');
			element.siblings('li').find('ul').slideUp(200);
		}
	});
}

function redimensionnement(){
	if(window.matchMedia('(min-width: 1000px)').matches){
		$('#cssmenu').css('display','');
		$('#main').css('height', '100%');
		$('#main').css('width', '100%');
		$('#cssmenu').css('height', '100%');
		$('div.conteneur').addClass('open');
		$('div.contenu').slideDown();
		redimensionnement_main();
		redimensionnement_menu();

		$('.titre svg').css('display', 'none');
	} else {
		$('#cssmenu').css('display','none');
		$('div.screen').css('right','0');
		$('div.screen').css('left','0');
		$('#main').css('height', '100%');
		$('#contenu-menu-user').css('height', '100%');
		$('#cssmenu').css('height', '100%');
		redimensionnement_main_mobile();
		redimensionnement_menu_user();

		$('.titre svg').css('display', '');
	}
}

function contenu_mobile(){
	$('.titre svg').on('click', function(){
		var element = $(this).parent('div.titre').parent('div.conteneur');
		if (element.hasClass('open')){
			element.removeClass('open');
			element.find('div.conteneur').removeClass('open');
			element.find('div.contenu').stop().slideUp();
		} else {
			element.addClass('open');
			element.children('div.contenu').stop().slideDown();
		}
		
	});
}

function appInput(){
	var input = $('input[type="text"], input[type="email"], input[type="tel"], input[type="password"], textarea');
	input.addClass('input-field');
	$(input).wrap('<span class="input">');
	$(input).after('<label class="input-label"><span class="input-label-content">');
	$('textarea').addClass('textarea');
	if($('input').hasClass('input-field')){
		$(input).each(function(){
			var placeholder = $(this).attr('placeholder');
			var ident = $(this).attr('id');
			$(this).next('.input-label').attr('for', ident);
			$(this).next('.input-label').children('.input-label-content').prepend(placeholder);
			$(this).attr('placeholder', '');
		});
	}
}

function appSubmit(){
	var submit = $('input[type="submit"');
	submit.addClass('submit-field');
	$(submit).wrap('<span class="submit">');
	$(submit).after('<label class="submit-label"><span class="submit-label-content">');
	$(submit).next('.submit-label').children('.submit-label-content').prepend($(submit).val());
}
//

$('#main').on('click', function(){
	if($('#bouton-menu-user').hasClass('open')){
		closeMenuUser();
	}
	if($('div.bouton').hasClass('open')){
		closeMenu();
	}
});

(function() {
	if (!String.prototype.trim) {
		(function() {
			var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
			String.prototype.trim = function() {
				return this.replace(rtrim, '');
			};
		})();
	}

	[].slice.call( document.querySelectorAll( '.input-field' ) ).forEach( function( inputEl ) {
		// in case the input is already filled..
		if( inputEl.value.trim() !== '' ) {
			classie.add( inputEl.parentNode, 'input--filled' );
		}

		// events:
		inputEl.addEventListener( 'focus', onInputFocus );
		inputEl.addEventListener( 'blur', onInputBlur );
	} );

	function onInputFocus( ev ) {
		classie.add( ev.target.parentNode, 'input--filled' );
	}
	function onInputBlur( ev ) {
		if( ev.target.value.trim() === '' ) {
			classie.remove( ev.target.parentNode, 'input--filled' );
		}
	}
})();

});