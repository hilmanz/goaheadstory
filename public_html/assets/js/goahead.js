
/* Custom Scripts */

function calculateScroll() {
	var contentTop      =   [];
	var contentBottom   =   [];
	var winTop      =   $(window).scrollTop();
	var rangeTop    =   200;
	var rangeBottom =   500;
	$.each( contentTop, function(i){
		if ( winTop > contentTop[i] - rangeTop && winTop < contentBottom[i] - rangeBottom ){
			$('.navmenu li a')
			.removeClass('active')
			.eq(i).addClass('active');
			
			jQuery('.mobile_menu_wrapper').css({'display' : 'none'});
			
		}
	})
};

jQuery(document).ready(function() {
	//Fixed Menu
	if (jQuery('.fixed-menu').size() && fixed_menu == true) {
		
		jQuery('.fixed-menu').append('<div class="fixed-menu-wrapper">'+jQuery('#top header').html()+'</div>');
		jQuery('.fixed-menu').find('.menu').children('li').each(function(){
			jQuery(this).children('a').append('<div class="menu_fadder"/>');
		});
		
		var fixd_menu = setInterval(scrolled_menu, 100);
	}
	
	//MobileMenu
	jQuery('#top header').append('<a href="javascript:void(0)" class="menu_toggler"/>');
	jQuery('#top').append('<div class="mobile_menu_wrapper"><ul class="mobile_menu container"/></div>');
	jQuery('#top').append('<a class="scrolling" id="logo2" href="#top">&nbsp;</a>      ');	
	jQuery('.mobile_menu').html(jQuery('#top header').find('.navmenu').html());
	jQuery('.mobile_menu_wrapper').hide();
	jQuery('.menu_toggler').click(function(){
		jQuery('.mobile_menu_wrapper').slideToggle(300);
	});
		
	// if single_page
	if (jQuery("body").hasClass("single_page")) {			
	}
	else {
		$(window).scroll(function(event) {
			calculateScroll();
		});
		$('.navmenu ul li a, .mobile_menu ul li a, .next_section, #logo a,a.scrolling').click(function() {  
			$('html, body').animate({scrollTop: $(this.hash).offset().top - 80}, 1000);
			return false;
		});
	};
	//Iframe transparent
	$("iframe").each(function(){
		var ifr_source = $(this).attr('src');
		var wmode = "wmode=transparent";
		if(ifr_source.indexOf('?') != -1) {
		var getQString = ifr_source.split('?');
		var oldString = getQString[1];
		var newString = getQString[0];
		$(this).attr('src',newString+'?'+wmode+'&'+oldString);
		}
		else $(this).attr('src',ifr_source+'?'+wmode);
	});	
					
});
function scrolled_menu() {
	if (jQuery(window).scrollTop() > 0) {
		jQuery('.fixed-menu').addClass('fixed_show');
	} else {
		jQuery('.fixed-menu').removeClass('fixed_show');
	}
};

$(document).ready(function() { 
    // 140 is the max message length
	$(".story-message,.max-length").charCount({
		allowed: 140,		
		warning: 20,
		counterText: 'Characters left: '	
	});
	
	// popup
	$("a.showPopup").click(function(){
		$(".popup").fadeOut();
		var targetID = jQuery(this).attr('href');
		$(".popup-container").css({ top: ""+ (event.pageY )-100 +"px" });
		$("#bg-popup").fadeIn();
		$(targetID).fadeIn();
		$(targetID).addClass('visible');
 	    return false;
	});
	$("a.backtop").click(function(){
		$("html, body").animate({ scrollTop: 0 }, 3000);
	});
	$("a.showPopup2").click(function(){
		$(".artist-box").fadeOut();
		$(".popup2").fadeOut();
		var targetID = jQuery(this).attr('href');
		$(targetID).fadeIn();
		$(targetID).addClass('visible');
 	    return false;
	});
	$("a.closePopup,#bg-popup").click(function(){
		$("#bg-popup").fadeOut();
		$(".popup,.popup2").fadeOut();
		$(".artist-box").fadeIn();
   	    return false;
	});
	
	//story
	$('#story-ex').innerfade({
		animationtype: 'fade',
		speed: 1500,
		timeout: 6000,
		type: 'sequence',
		containerheight: '1em'
	});
	// initialise plugin
	var navigation = $('#navigation').superfish({
		//add options here if required
	});
	$(window).scroll(function(){
		console.log($(window).scrollTop());
		if($(window).scrollTop()<=150){
			$('#backtop').removeClass('show');
		}else{
			$('#backtop').addClass('show');
		}
	});

});

