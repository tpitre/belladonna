$(document).ready(function() {

	// Canvas enabled water transition slider.
	if (document.querySelector('#home_slider')) {

		var timer = 7000;
		var masks = {
			m1: {
				img: loadImg('/wp-content/themes/Belladonna/images/transition-imgs/trans1-min.png', setInterval(slideTransition, timer)),
				cols: 6,
				rows: 7,
				width: 1920,
				height: 1680
			},
			// m2: {
			// 	img: loadImg('/wp-content/themes/Belladonna/images/transition-imgs/trans2-min.png'),
			// 	cols: 5,
			// 	rows: 6,
			// 	width: 1845,
			// 	height: 1620
			// }
		};

		var slides = home_slides.map(function(slide){
			return {
				img: loadImg(slide.img),
				src: slide.img,
				title: slide.title
			}
		});

		var docElemStyle = document.documentElement.style;
		var transitionProp = typeof docElemStyle.transition == 'string' ? 'transition' : 'WebkitTransition';
		var canvas = document.querySelector('.home_slide_canvas_container canvas');
		var slideImageElement = document.querySelector('.home_slide img');
		var slideTitleElement = document.querySelector('.home_gallery_title');
		var ctx = canvas.getContext('2d');
		var width = canvas.width = window.innerWidth;
		var height = canvas.height = document.querySelector('.hero_image_slider').offsetHeight;

		window.addEventListener('resize', function() {
			width = canvas.width = window.innerWidth;
			height = canvas.height = document.querySelector('.hero_image_slider').offsetHeight;
		}, false);

		//
		// Start
		//
		function slideTransition() {
			var cur_img = document.querySelector('.home_slide img').getAttribute('src');
			var cur_slide = slides.filter(function(slide) {
				return slide.src == cur_img;
			})[0];
			var next_slide_index = slides.indexOf(cur_slide) + 1 === slides.length ? 0 : slides.indexOf(cur_slide) + 1;
			// If the image is loaded lets transition.
			if (slides[next_slide_index].img.loaded) {
				animate(slides[next_slide_index].img, masks.m1, function() {
					slideImageElement.setAttribute('src', slides[next_slide_index].src);
					slideTitleElement.classList.remove('fade-in');
					slideTitleElement.innerHTML = slides[next_slide_index].title.replace(/(^|<\/?[^>]+>|\s+)([^\s<]+)/g, '$1<span>$2</span>');
					let spans = slideTitleElement.querySelectorAll('span');
					for ( var i=1; i <= spans.length; i++ ) {
						var span = spans[i-1];
						// stagger transition with transitionDelay
						span.style[ transitionProp + 'Delay' ] = ( i * 200 ) + 'ms';
					}
					slideTitleElement.classList.add('top');
					setTimeout(function(){slideTitleElement.classList.add('fade-in')}, 100);
				});
				slideTitleElement.classList.remove('top');
			}
		}

		function fit(contains) {
			return function(parentWidth, parentHeight, childWidth, childHeight, scale = 1, offsetX = 0.5, offsetY = 0.5) {
				const childRatio = childWidth / childHeight
				const parentRatio = parentWidth / parentHeight
				let width = parentWidth * scale
				let height = parentHeight * scale

				if (contains ? (childRatio > parentRatio) : (childRatio < parentRatio)) {
					height = width / childRatio
				} else {
					width = height * childRatio
				}

				return {
					width,
					height,
					offsetX: (parentWidth - width) * offsetX,
					offsetY: (parentHeight - height) * offsetY
				}
			}
		}

		function animate(img, mask, callback) {
			var speed = 60;
			var last = performance.now();
			var lastFrameUpdate = 0;
			var mWidth = mask.width / mask.cols;
			var mHeight = mask.height / mask.rows;
			var index = 0;
			var direction = 1;
			var img_dimensions = fit(false)(width, height, img.width, img.height);

			(function update(now) {
				var elapsed = now - last;
				last = now;
				lastFrameUpdate += elapsed;
				while (lastFrameUpdate >= speed) {
					lastFrameUpdate -= speed;
					index += direction;
					if (index < 0) {
						index = 0;
						direction = 1;
					}
					else if (index >= mask.cols * mask.rows) {
						if (typeof callback === 'function') {
							callback();
						}
						return true
					}
				}

				ctx.clearRect(0, 0, width, height);

				ctx.globalCompositeOperation = 'source-over';
				ctx.drawImage(
					mask.img,
					(index % mask.cols) * mWidth,
					Math.floor(index / mask.cols) * mHeight,
					mWidth, mHeight,
					0, 0, width, height
				);

				ctx.globalCompositeOperation = 'source-atop';
				// Draw image with same dimensions as 'cover';
				ctx.drawImage(img, img_dimensions.offsetX, img_dimensions.offsetY, img_dimensions.width, img_dimensions.height);

				requestAnimationFrame(update);

			}(performance.now()));
		}


		function loadImg(src, callback) {
			var img = new Image();

			img.onload = function() {
				img.loaded = true;
				if (typeof callback == 'function') {
					callback();
				}
			};
			img.src = src;

			return img;
		}
	}



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

	/* Page Promo Carousel */
	// rotation speed and timer
	var promo_speed = 6000;
	var run = setInterval(rotate, promo_speed);
	var $container = $('.js-promo-carousel-slides ul');

	// if user clicked on button
	$('.js-promo-carousel-btns a').click(function (e) {
			e.preventDefault();

			// fade the item
			if ($container.is('.is-animated')) {
					return false;
			}
			$container.addClass('is-animated')
			.find('.active').removeClass('active').each(function(){
				let $siblings = $(this).siblings();
				let $newSlide = $(e.target).is('.prev') ? ($(this).prev().length ? $(this).prev() : $siblings.eq($siblings.length - 1))  : ($(this).next().length ? $(this).next() : $siblings.eq(0));

				setTimeout(function(){
					$newSlide.addClass('active');
					$container.removeClass('is-animated');
				}, 300);
			});
	});

	// if mouse hover, pause the auto rotation, otherwise rotate it
	$container.parent().mouseenter(function () {
			clearInterval(run);
	}).mouseleave(function () {
			run = setInterval(rotate, promo_speed);
	});

	// a simple function to click next link
	// a timer will call this function, and the rotation will begin

	function rotate() {
		$('.promo-carousel__next').click();
	}

	/* About Promo Carousel */
	if ($('.slider.center').length){
		$('.slider.center').slick({
			slidesToShow: 3,
			responsive: [
				{
					breakpoint: 768,
					settings: {
						arrows: false,
						centerMode: true,
						centerPadding: '40px',
						slidesToShow: 1
					}
				},
				{
					breakpoint: 480,
					settings: {
						arrows: false,
						centerMode: true,
						centerPadding: '40px',
						slidesToShow: 1
					}
				}
			]
		});
	}

});
