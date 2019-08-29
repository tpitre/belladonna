$(window).load(function() {
	/*
	var doc_height = $(window).height();
	var doc_width = $(window).width();
	*/

	// parallax elements
  var titlePos = (scrollPos / 13) * -1;
  var imageBlockPos = (scrollPos / 20) - 10;
  $('h1.page-title').css('margin-top', titlePos);
  $('.block_image_left').css('margin-top', imageBlockPos);


});









$(document).ready(function() {
	/*
	var doc_height = $(window).height();
	var doc_width = $(window).width();
  */


	// active class for home slides
	$('li.home_slide:nth-of-type(1)').addClass('active');
	var slideNum = $('li.home_slide').length;
	var scrollHeight = slideNum * 500;
	$('.scroll_box').css('height', scrollHeight);

  var posOne = 400;
  var posTwo = 800;
  var posThree = 1200;
  var posFour = 1600;
  var posFive = 2000;
  var posSix = 2400;
  var posSeven = 2800;

  $(window).scroll(function() {
      var scrollPos = $(window).scrollTop();
      if (scrollPos >= posOne) {
      	$('li.home_slide:nth-of-type(2)').addClass('active');
      }
      if (scrollPos >= posTwo) {
      	$('li.home_slide:nth-of-type(3)').addClass('active');
      }
      if (scrollPos >= posThree) {
      	$('li.home_slide:nth-of-type(4)').addClass('active');
      }
      if (scrollPos >= posFour) {
      	$('li.home_slide:nth-of-type(5)').addClass('active');
      }
      if (scrollPos >= posFive) {
      	$('li.home_slide:nth-of-type(6)').addClass('active');
      }
      if (scrollPos >= posSix) {
      	$('li.home_slide:nth-of-type(7)').addClass('active');
      }

      if (scrollPos <= (posOne - 200)) {
      	$('li.home_slide:nth-of-type(2)').removeClass('active');
      }
      if (scrollPos <= (posTwo - 200)) {
      	$('li.home_slide:nth-of-type(3)').removeClass('active');
      }
      if (scrollPos <= (posThree - 200)) {
      	$('li.home_slide:nth-of-type(4)').removeClass('active');
      }
      if (scrollPos <= (posFour - 200)) {
      	$('li.home_slide:nth-of-type(5)').removeClass('active');
      }
      if (scrollPos <= (posFive - 200)) {
      	$('li.home_slide:nth-of-type(6)').removeClass('active');
      }
      if (scrollPos <= (posSix - 200)) {
      	$('li.home_slide:nth-of-type(7)').removeClass('active');
      }

      // parallax elements
      var titlePos = (scrollPos / 13) * -1;
      var imageBlockPos = (scrollPos / 20) - 10;
      $('h1.page-title').css('margin-top', titlePos);
      $('.block_image_left').css('margin-top', imageBlockPos);
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
