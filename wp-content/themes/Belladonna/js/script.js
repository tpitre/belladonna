$(window).load(function() {

	/*

	var doc_height = $(window).height();
	var doc_width = $(window).width();

	*/


});









$(document).ready(function() {

	var doc_height = $(window).height();


	// active class for home slides
	$('li.home_slide:nth-child(1)').addClass('active');

	$(function() {
    var posOne = 100;
    var posTwo = 200;
    var posThree = 300;
    var posFour = 400;
    var posFive = 500;
    var posSix = 600;
    var posSeven = 700;
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (('li.home_slide:nth-child(4)').hasClass('active')) {
    			$('li.home_slide:nth-child(5)').addClass('active');
        } else if (('li.home_slide:nth-child(3)').hasClass('active')) {
    			$('li.home_slide:nth-child(4)').addClass('active');
        } else if (('li.home_slide:nth-child(2)').hasClass('active')) {
    			$('li.home_slide:nth-child(3)').addClass('active');
        } else if (('li.home_slide:nth-child(1)').hasClass('active')) {
    			$('li.home_slide:nth-child(2)').addClass('active');
        }
    });
	});





	// when browser is resized
	$(window).resize(function() {

		/*

		var doc_height = $(window).height();
		var doc_width = $(window).width();

	  */

	});



   // bug orientation portrait/lanscape IOS //
	if (navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i)) {
		var viewportmeta = document.querySelector('meta[name="viewport"]');
		if (viewportmeta) {
			viewportmeta.content = 'width=device-width, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0';
			document.addEventListener('orientationchange', function () {
				viewportmeta.content = 'width=device-width, minimum-scale=0.25, maximum-scale=1';
			}, false);
		}
	}

});
