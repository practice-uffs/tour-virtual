<!DOCTYPE html>
<html lang="en" >
<head>
	<meta charset="UTF-8">
	<title>Tour Virtual UFFS</title>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css'>
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto&amp;display=swap"rel="stylesheet'>
	<link rel="stylesheet" href="{{ 'css/landing_page.css' }}">
</head>
<body>

	<!-- header -->
	<div class="header">
		<div class="container-large">
			<a href="/" class="logo-header">
				<img src="img/icon/tour-icon.svg" class="header-main-icon">
				<h1 class="header-title">Tour Virtual UFFS</h1>
			</a>
			<a class="btn-header" href="{{route('map.ls')}}">
				<h2>Acessar o tour</h2>
				<img src="img/icon/pin-map.svg">
			</a>
		</div>
	</div>


	<!-- slider component -->
	<div class="app">

		<!-- text content slider -->
		<div class="infoList">
			<div class="info__wrapper">
				<a href="/ferramenta" class="info current--info">
					<img src="img/icon/explore-solid-svgrepo-com.svg" class="icon-explore-slider">
					<div class="box-text-slider">
						<p class="text description">Explorar</p>
						<h4 class="text campus-title">Campus Laranjeiras do Sul</h4>
					</div>
				</a>
				<a href="/ferramenta" class="info next--info">
					<img src="img/icon/explore-solid-svgrepo-com.svg" class="icon-explore-slider">
					<div class="box-text-slider">
						<p class="text description">Explorar</p>
						<h4 class="text campus-title">Campus Chapecó</h4>
					</div>
				</a>
				<a href="/ferramenta" class="info previous--info">
					<img src="img/icon/explore-solid-svgrepo-com.svg" class="icon-explore-slider">
					<div class="box-text-slider">
						<p class="text description">Explorar</p>
						<h4 class="text campus-title">Campus Realeza</h4>
					</div>
				</a>
			</div>
		</div>

		<!-- card images slider -->
		<div class="cardList">
			<button class="cardList__btn btn btn--left">
				<div class="icon">
					<svg>
						<use xlink:href="#arrow-left"></use>
					</svg>
				</div>
			</button>
			<div class="cards__wrapper">
				<div class="card current--card">
					<div class="card__image">
						<img src="img/slider/WhatsApp Image 2023-01-31 at 10.59.20.jpeg" alt="" />
					</div>
				</div>
				<div class="card next--card">
					<div class="card__image">
						<img src="img/slider/thumbnail_foto-aerea-UFFS-Campus-Erechim.png" alt="" />
					</div>
				</div>
				<div class="card previous--card">
					<div class="card__image">
						<img src="img/slider/maxresdefault.jpg" alt="" />
					</div>
				</div>
			</div>
			<button class="cardList__btn btn btn--right">
				<div class="icon">
					<svg>
						<use xlink:href="#arrow-right"></use>
					</svg>
				</div>
			</button>
		</div>

		<!-- background slider -->
		<div class="app__bg">
			<div class="app__bg__image current--image">
				<img src="img/slider/WhatsApp Image 2023-01-31 at 10.59.20.jpeg" alt="" />
			</div>
			<div class="app__bg__image next--image">
				<img src="img/slider/thumbnail_foto-aerea-UFFS-Campus-Erechim.png" alt="" />
			</div>
			<div class="app__bg__image previous--image">
				<img src="img/slider/maxresdefault.jpg" alt="" />
			</div>
		</div>

		<img src="img/icon/logoUFFS.png" class="logo-uffs-slide">
	</div>

	<!-- loader slider -->
	<div class="loading__wrapper">
		<div class="loader--text">Loading...</div>
		<div class="loader">
			<span></span>
		</div>
	</div>

	<!-- arrows slider -->
	<svg class="icons" style="display: none;">
		<symbol id="arrow-left" xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'>
			<polyline points='328 112 184 256 328 400'
						style='fill:none;stroke:#fff;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px' />
		</symbol>
		<symbol id="arrow-right" xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'>
			<polyline points='184 112 328 256 184 400'
						style='fill:none;stroke:#fff;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px' />
		</symbol>
	</svg>

	<!-- initial footer -->
	<div class="header-footer" id="header-footer-transaction">
		<img src="img/icon/practice.svg">
	</div>

	<!-- content section 1-->
	<div class="main-content">
		<div class="detail-content-section-responsive"></div>
		<img src="img/icon/detail-icon-practice.svg" class="detail-content-section">
		<div class="container-small">
			<img src="img/icon/title-main-content.svg" class="tour-virtual-text">

			<div class="text-main-content">Conheça e navegue dentro dos campus da Universidade Federal da Fronteira Sul</div>
			<img src="img/icon/chapeco-map.svg" class="item-map-content">
			<div class="align-main-content">
				<img src="img/icon/btn-mapas-detalhados.svg" class="item-content" id="item-content-1">
				<img src="img/icon/btn-interatividade.svg" class="item-content" id="item-content-2">
				<img src="img/icon/btn-visao-panoramica.svg" class="item-content" id="item-content-3">
			</div>

		</div>
	</div>

	<!-- content section 2 -->
	<div class="secondary-content">

		<div class="align-descriptions">
			<div class="title-secondary-content"><p>Veja seu campus</p>por outra perspectiva</div>
			<div class="description-secondary-content">Encontre a informação que você precisa ou publique seu próprio conteúdo e contribua com este projeto</div>
		</div>
		<img src="img/icon/erechim-map.svg" class="first-map">
		<img src="img/icon/chapeco-map.svg" class="second-map">
		<img src="img/icon/laranjeiras-map.svg" class="thirty-map">

	</div>



	<div class="footer-bkgd">

		<a onclick="scrollTopPage()" class="logo-header" id="logo-footer">
			<img src="img/icon/tour-icon.svg" class="header-main-icon">
			<div class="container-logo-footer">
				<h2 class="header-title">Tour Virtual UFFS</h2>
				<div>voltar ao topo</div>
			</div>
		</a>

		<div class="content-footer">

			<div class="align-content-footer">
				<div class="top-content-footer">
					<a class="social-icon"><img src="img/icon/instagram-f-svgrepo-com.svg" class="header-main-icon"></a>
					<a class="social-icon"><img src="img/icon/facebook-round-svgrepo-com.svg" class="header-main-icon"></a>
					<a class="social-icon"><img src="img/icon/twitter-2-svgrepo-com.svg" class="header-main-icon"></a>
					<a class="social-icon"><img src="img/icon/github-svgrepo-com.svg" class="header-main-icon"></a>
					<a class="social-icon"><img src="img/icon/youtube-round-svgrepo-com.svg" class="header-main-icon"></a>
					<a class="social-icon"><img src="img/icon/website-ui-web-svgrepo-com.svg" class="header-main-icon"></a>
				</div>
				<div class="bottom-content-footer">
					<div>DESENVOLVIDO POR<img src="img/icon/practice.svg" class="footer-icon"></div>
				</div>
			</div>
		</div>
		<div class="logo-uffs-footer"><img src="img/icon/logo_uffs_verde.png"></div>
	</div>


	<!-- partial -->
	<script src="{{ 'js/imagesloaded.pkgd.min.js' }}"></script>
	<script src="{{ 'js/gsap.min.js' }}"></script>
	<script  src="{{ 'js/slider.js' }}"></script>

	<script>
		// Get the button:
		let mybutton = document.getElementById("header-footer-transaction");

		// When the user scrolls down 20px from the top of the document, show the button
		window.onscroll = function() {scrollFunction()};

		function scrollFunction() {
			if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
				mybutton.style.height = "25%";
			} else {
				mybutton.style.height = "13.5%";
			}
		}

		// When the user clicks on the button, scroll to the top of the document
		function scrollTopPage() {
			document.body.scrollTop = 0; // For Safari
			document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
		}

	</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script>
	$.fn.isInViewport = function() {
		var elementTop = $(this).offset().top;
		var elementBottom = elementTop + $(this).outerHeight() / 1.1;
		var viewportTop = $(window).scrollTop();
		var viewportHalf = viewportTop + $(window).height() / 1.1;
		return elementBottom > viewportTop && elementTop < viewportHalf;
	};

	function delay(time) {
		return new Promise(resolve => setTimeout(resolve, time));
	}

	$(window).on('load resize scroll', function() {
		if ($('.logo-header').isInViewport()) {
			delay(400).then(() => $('.logo-header').addClass("in-view-opacity-1s"));
		}

		if ($('.btn-header ').isInViewport()) {
			delay(800).then(() => $('.btn-header').addClass("in-view-opacity-1s"));
		}

		if ($('.text-main-content').isInViewport()) {
			$('.item-map-content').addClass("in-view-opacity-2s");
		}

		if ($('#item-content-1').isInViewport()) {
			delay(500).then(() => $('#item-content-1').addClass("in-view-opacity-2s"));
		}

		if ($('#item-content-2').isInViewport()) {
			delay(750).then(() => $('#item-content-2').addClass("in-view-opacity-2s"));
		}

		if ($('#item-content-3').isInViewport()) {
			delay(1000).then(() => $('#item-content-3').addClass("in-view-opacity-2s"));
		}


		if ($('.detail-content-section-responsive').isInViewport()) {
			delay(1000).then(() => $('.detail-content-section-responsive').addClass("in-view-opacity-1s"));
		}

		if ($('.description-secondary-content').isInViewport()) {
			delay(500).then(() => $('.second-map').addClass("in-view-opacity-1s"));
			delay(1000).then(() => $('.thirty-map').addClass("in-view-opacity-1s"));
			delay(1500).then(() => $('.first-map').addClass("in-view-opacity-1s"));
		}

		if ($('#logo-footer').isInViewport()) {
			delay(1000).then(() => $('.footer-icon').addClass("in-view-opacity-1s"));
		}
	});

	// var logo_footer_transition = 0;
	// while(1){
	// 	if (logo_footer_transition) {
	// 		delay(1500).then(() => $('.logo-footer').addClass("in-view-opacity-1s"));
	// 	}else{
	// 		delay(1500).then(() => $('.logo-footer').removeClass("in-view-opacity-1s"));
	// 	}
	// }

	// var logo_footer_transition = 0;
	// const interval = setInterval(function() {
	// 	if (logo_footer_transition) {
	// 		logo_footer_transition = 0;
	// 		delay(1500).then(() => $('.logo-footer').removeClass("in-view-opacity-1s"));
	// 	}else{
	// 		logo_footer_transition = 1;
	// 		delay(1500).then(() => $('.logo-footer').addClass("in-view-opacity-1s"));
	// 	}
	// }, 500);

	// clearInterval(interval);


</script>



</body>
</html>
