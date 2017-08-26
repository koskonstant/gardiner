$(document).ready(function(){
	
function setFooterStyle() {
    var docHeight = $(window).height();
    var footerHeight = $('footer').outerHeight();
    var footerTop = $('footer').position().top + footerHeight;
    if (footerTop < docHeight) {
        $('footer').css('margin-top', (docHeight - footerTop) + 'px');
    } else {
        $('footer').css('margin-top', '');
    }
    $('footer').removeClass('invisible');
}

function layout_settings() {
	$(".button-collapse").sideNav();
	$('.carousel.carousel-slider').carousel({fullWidth: true});
	$('.collapsible').collapsible();
	$('select').material_select();
	$('.datepicker').pickadate({
	    selectMonths: true, // Creates a dropdown to control month
	    selectYears: 200// Creates a dropdown of 15 years to control year
	});	
}


setFooterStyle();
layout_settings();
window.onresize = setFooterStyle;
});