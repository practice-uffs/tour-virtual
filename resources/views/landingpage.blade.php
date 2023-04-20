<!DOCTYPE html>
<html lang="en" >
<head>
	<meta charset="UTF-8">
	<title>Tour Virtual UFFS - Conheça e navegue dentro dos campi da Universidade Federal da Fronteira Sul</title>
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<link href="https://practice.uffs.edu.br/tour-virtual" rel="canonical">
	<base href="{{ route('home') }}/">
  
	<meta name="title" content="Tour Virtual UFFS - Conheça e navegue dentro dos campi da Universidade Federal da Fronteira Sul" />
	<meta name="description" content="Tenha acesso aos mapas contendo informações sobre os blocos e a localização das salas, além de acessar a visualização 360 dos principais pontos de cada campus." />
	<meta name='image' content="https://practice.uffs.edu.br/tour-virtual/img/icon/tour-icon.svg" />
	<meta name="rating" content="General" />
	<meta name="expires" content="0" />
	<meta name="language" content="portuguese, PT-BR" />
	<meta name="distribution" content="Global" />
	<meta name="revisit-after" content="7 Days" />
	<meta name="author" content="Practice - https://practice.uffs.edu.br" />
	<meta name="publisher" content="Practice - https://practice.uffs.edu.br" />
	<meta name="copyright" content="Practice"/>
	<meta name="robots" content="index,follow">
	<meta name="googlebot" content="index,follow">
	<meta name="url" content="https://practice.uffs.edu.br/tour-virtual"/>        
  
	<meta property="og:type" content="article"/>
	<meta property="og:title" content="Tour Virtual UFFS - Conheça e navegue dentro dos campi da Universidade Federal da Fronteira Sul" />
	<meta property="og:description" content="Tenha acesso aos mapas contendo informações sobre os blocos e a localização das salas, além de acessar a visualização 360 dos principais pontos de cada campus." />
	<meta property="og:image" content="https://practice.uffs.edu.br/tour-virtual/img/icon/tour-icon.svg" />
	<meta property="og:image:width" content="800">
	<meta property="og:image:height" content="600">
	<meta property="og:url" content="https://practice.uffs.edu.br/tour-virtual" />
	<meta property="og:site_name" content="practice" />
	<meta property="og:locale" content="pt_BR"/>
	<meta property="article:author" content="Practice - https://practice.uffs.edu.br"/>
	<meta property="article:publisher" content="Practice - https://practice.uffs.edu.br"/>   
  
	<meta property="twitter:card" content="summary_large_image"/>
	<meta property="twitter:site" content="https://practice.uffs.edu.br/tour-virtual"/>
	<meta property="twitter:domain" content="https://practice.uffs.edu.br/tour-virtual"/>
	<meta property="twitter:title" content="Tour Virtual UFFS - Conheça e navegue dentro dos campi da Universidade Federal da Fronteira Sul"/>
	<meta property="twitter:description" content="Tenha acesso aos mapas contendo informações sobre os blocos e a localização das salas, além de acessar a visualização 360 dos principais pontos de cada campus."/>
	<meta property="twitter:image:src" content="https://practice.uffs.edu.br/tour-virtual/img/icon/tour-icon.svg/">
	<meta property="twitter:url" content="https://practice.uffs.edu.br/tour-virtual"/>

	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css'>
	<link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Roboto:wght@200;400;500;600;700;800&display=swap'>
	<link rel="stylesheet" href="{{ 'css/landing_page.css' }}">
	<link rel="stylesheet" href="{{ 'css/slider.css' }}">

	<style>
		.swiper-button-prev ::after {
			left: 20% !important;
			color: white !important;
		}

	</style>
</head>
<body>

	<!-- header -->
	<div class="header">
		<div class="container-large">
			<a href="{{ route('home')}}" class="logo-header">
				<img src="{{ 'img/icon/tour-icon.svg' }}" class="header-main-icon">
				<h1 class="header-title">Tour Virtual UFFS</h1>
			</a>
		
				
			

			<div class="dropdown btn-header">
				<button class="dropbtn " type="button" data-toggle="dropdown">
					<h2>Acessar o tour</h2>
					<img src="{{ 'img/icon/pin-map.svg' }}">
				</button>
				<div class="dropdown-content">
					<a class="" href="{{ route('map.cl')}}">Cerro Largo</a>
					<a class="" href="{{ route('map.ch')}}">Chapecó</a>
					<a class="" href="{{ route('map.er')}}">Erechim</a>
					<a class="" href="{{ route('map.ls')}}">Laranjeiras do Sul</a>
					<a class="" href="{{ route('map.pf')}}">Passo Fundo</a>
					<a class="" href="{{ route('map.re')}}">Realeza</a>
				</div>
			</div>
		</div>
	</div>


	
	<swiper-container class="mySwiper" navigation="true"  effect="fade" autoplay-delay="2500" autoplay-disable-on-interaction="true" swiper-pagination-left="20%">
		<swiper-slide>
			<div class="background-slider" style='background-image: url("{{ 'img/slider/cl_slider.png' }}")'></div>
			<a href="{{ route('map.cl')}} " class="item-slider">
				<div class="container-item-slider">
					<div class="info">
						<img src="{{ 'img/icon/explore-solid-svgrepo-com.svg' }}" class="icon-explore-slider">
						<div class="box-text-slider">
							<p class="text description">Explorar</p>
							<h4 class="text campus-title">Campus Cerro Largo</h4>
						</div>
					</div>
				</div>
			</a>
		</swiper-slide>
		<swiper-slide>
			<div class="background-slider" style='background-image: url("{{ 'img/slider/ch_slider.jpeg' }}")'></div>
			<a href="{{ route('map.ch')}} " class="item-slider">
				<div class="container-item-slider">
					<div class="info">
						<img src="{{ 'img/icon/explore-solid-svgrepo-com.svg' }}" class="icon-explore-slider">
						<div class="box-text-slider">
							<p class="text description">Explorar</p>
							<h4 class="text campus-title">Campus Chapecó</h4>
						</div>
					</div>
				</div>
			</a>
		</swiper-slide>
		<swiper-slide>
			<div class="background-slider" style='background-image: url("{{ 'img/slider/er_slider.jpeg' }}")'></div>
			<a href="{{ route('map.er')}} " class="item-slider">
				<div class="container-item-slider">
					<div class="info">
						<img src="{{ 'img/icon/explore-solid-svgrepo-com.svg' }}" class="icon-explore-slider">
						<div class="box-text-slider">
							<p class="text description">Explorar</p>
							<h4 class="text campus-title">Campus Erechim</h4>
						</div>
					</div>
				</div>
			</a>
		</swiper-slide>
		<swiper-slide>
			<div class="background-slider" style='background-image: url("{{ 'img/slider/ls_slider.jpeg' }}")'></div>
			<a href="{{ route('map.ls')}} " class="item-slider">
				<div class="container-item-slider">
					<div class="info">
						<img src="{{ 'img/icon/explore-solid-svgrepo-com.svg' }}" class="icon-explore-slider">
						<div class="box-text-slider">
							<p class="text description">Explorar</p>
							<h4 class="text campus-title">Campus Laranjeiras do Sul</h4>
						</div>
					</div>
				</div>
			</a>
		</swiper-slide>
		<swiper-slide>
			<div class="background-slider" style='background-image: url("{{ 'img/slider/pf_slider.jpeg' }}")'></div>
			<a href="{{ route('map.pf')}} " class="item-slider">
				<div class="container-item-slider">
					<div class="info">
						<img src="{{ 'img/icon/explore-solid-svgrepo-com.svg' }}" class="icon-explore-slider">
						<div class="box-text-slider">
							<p class="text description">Explorar</p>
							<h4 class="text campus-title">Campus Passo Fundo</h4>
						</div>
					</div>
				</div>
			</a>
		</swiper-slide>
		<swiper-slide>
			<div class="background-slider" style='background-image: url("{{ 'img/slider/rl_slider.jpeg' }}")'></div>
			<a href="{{ route('map.re')}} " class="item-slider">
				<div class="container-item-slider">
					<div class="info">
						<img src="{{ 'img/icon/explore-solid-svgrepo-com.svg' }}" class="icon-explore-slider">
						<div class="box-text-slider">
							<p class="text description">Explorar</p>
							<h4 class="text campus-title">Campus Realeza</h4>
						</div>
					</div>
				</div>
			</a>
		</swiper-slide>
	</swiper-container>
	<a href="https://uffs.edu.br/" target='_blank'><img src="{{ 'img/icon/logoUFFS.png' }}" class="logo-uffs-slide"></a>
	 



	<!-- initial footer -->
	<div class="header-footer" id="header-footer-transaction">
		<img src="{{ 'img/icon/practice.svg' }}">
	</div>


	<!-- content section 1-->
	<div class="main-content">
		<div class="detail-content-section-responsive"></div>
		<div class="detail-content-section"></div>
		<div class="container-small">
			<img src="{{ 'img/icon/title-main-content.svg' }}" class="tour-virtual-text">

			<div class="text-main-content">Conheça e navegue dentro dos campi da Universidade Federal da Fronteira Sul</div>
			<img src="{{ 'img/slider/maps_slider/Chapecó.svg' }}" class="item-map-content">
			<div class="align-main-content" id="item-content-1">
				<img src="{{ 'img/icon/btn-mapas-detalhados.svg' }}" style="padding: 8px;" class="item-content">
				<p>Mapas Detalhados</p>
			</div>
			<div class="align-main-content" id="item-content-2">
				<img src="{{ 'img/icon/btn-interatividade.svg' }}" class="item-content">
				<p>Interatividade</p>
			</div>
			<div class="align-main-content" id="item-content-3">
				<img src="{{ 'img/icon/btn-visao-panoramica.svg' }}" class="item-content" style="padding: 5px;">
				<p>Visão Panorâmica</p>
			</div>
		</div>
	</div>

	<!-- content section 2 -->
	<div class="secondary-content">

		<div class="align-descriptions">
			<div class="title-secondary-content"><p>Veja seu campus</p>por outra perspectiva</div>
			<div class="description-secondary-content">Encontre a informação que você precisa ou publique seu próprio conteúdo e contribua com este projeto</div>
		</div>
		<a href="{{ route('map.ls') }}" class="first-map"><img style="width: 100%; height: 100%;" src="{{ 'img/slider/maps_slider/Laranjeiras do Sul.svg' }}"><span>Laranjeiras do Sul</span></a>
		<a href="{{ route('map.er') }}" class="second-map"><img style="width: 100%; height: 100%;" src="{{ 'img/slider/maps_slider/Erechim.svg' }}"><span>Erechim</span></a>
		<a href="{{ route('map.cl') }}" class="thirty-map"><img style="width: 100%; height: 100%;" src="{{ 'img/slider/maps_slider/Cerro Largo.svg' }}"><span>Cerro Largo</span></a>

	</div>

	<!-- content section 2 -->
	<div class="secondary-content" style="margin-top: 5vw; padding-top:5vw">
		<a href="{{ route('map.re') }}" class="first-map"><img style="width: 100%; height: 100%;" src="{{ 'img/slider/maps_slider/Realeza.svg' }}"><span>Realeza</span></a>
		<a href="{{ route('map.pf') }}" class="second-map"><img style="width: 100%; height: 100%;" src="{{ 'img/slider/maps_slider/Passo Fundo.svg' }}"><span>Passo Fundo</span></a>
		<a href="{{ route('map.ch') }}" class="thirty-map"  style="top: 5vw"><img style="width: 100%; height: 100%;" src="{{ 'img/slider/maps_slider/Chapecó.svg' }}"><span>Chapecó</span></a>
	</div>
	

	<swiper-container class="mySwiper2" navigation="true"  effect="fade" autoplay-disable-on-interaction="true" swiper-pagination-left="20%">
		<swiper-slide><a href="{{ route('map.ls') }}" class="item_slider_minimap"><img src="{{ 'img/slider/maps_slider/Laranjeiras do Sul.svg' }}"><span class="text campus-title">Laranjeiras do Sul</span></a></swiper-slide>
		<swiper-slide><a href="{{ route('map.pf') }}" class="item_slider_minimap"><img src="{{ 'img/slider/maps_slider/Passo Fundo.svg' }}"><span class="text campus-title">Passo Fundo</span></a></swiper-slide>
		<swiper-slide><a href="{{ route('map.cl') }}" class="item_slider_minimap"><img src="{{ 'img/slider/maps_slider/Cerro Largo.svg' }}"><span class="text campus-title">Cerro Largo</span></a></swiper-slide>
		<swiper-slide><a href="{{ route('map.ch') }}" class="item_slider_minimap"><img src="{{ 'img/slider/maps_slider/Chapecó.svg' }}"><span class="text campus-title">Chapecó</span></a></swiper-slide>
		<swiper-slide><a href="{{ route('map.er') }}" class="item_slider_minimap"><img src="{{ 'img/slider/maps_slider/Erechim.svg' }}"><span class="text campus-title">Erechim</span></a></swiper-slide>
		<swiper-slide><a href="{{ route('map.re') }}" class="item_slider_minimap"><img src="{{ 'img/slider/maps_slider/Realeza.svg' }}"><span class="text campus-title">Realeza</span></a></swiper-slide>
	</swiper-container>



	<div class="footer-bkgd">

		<a onclick="scrollTopPage()" class="logo-header" id="logo-footer">
			<img src="{{ 'img/icon/tour-icon.svg' }}" class="header-main-icon">
			<div class="container-logo-footer">
				<h2 class="header-title">Tour Virtual UFFS</h2>
				<div>voltar ao topo</div>
			</div>
		</a>

		<div class="content-footer">

			<div class="align-content-footer">
				<div class="top-content-footer">
					<a href="https://www.instagram.com/practiceuffs/" target='_blank' class="social-icon"><img src="{{ 'img/icon/instagram-f-svgrepo-com.svg' }}" class="header-main-icon"></a>
					<a href="https://www.facebook.com/profile.php?id=100063468824805" target='_blank' class="social-icon"><img src="{{ 'img/icon/facebook-round-svgrepo-com.svg' }}" class="header-main-icon"></a>
					<a href="https://github.com/practice-uffs" target='_blank' class="social-icon"><img src="{{ 'img/icon/github-svgrepo-com.svg' }}" class="header-main-icon"></a>
					<a href="https://www.youtube.com/channel/UCu3jAl8MTMPkaxb3u0_xESw?view_as=subscriber" target='_blank' class="social-icon"><img src="{{ 'img/icon/youtube-round-svgrepo-com.svg' }}" class="header-main-icon"></a>
					<a href="https://practice.uffs.edu.br/" target='_blank' class="social-icon"><img src="{{ 'img/icon/website-ui-web-svgrepo-com.svg' }}" class="header-main-icon"></a>
				</div>
				<a class="bottom-content-footer" href="https://practice.uffs.edu.br/" target="_blank">
					<div>DESENVOLVIDO POR<img src="{{ 'img/icon/practice.svg' }}" class="footer-icon"></div>
				</a>
			</div>
		</div>
		<a class="logo-uffs-footer" href="https://uffs.edu.br" target="_blank"><img src="{{ 'img/icon/logo_uffs_verde.png' }}"></a>
	</div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
	<script src="{{'js/swiper-element-bundle.min.js'}}"></script>

	<script>
		//efeito de aumentar tamanho da section logo do practice
		let header_footer_element = document.getElementById("header-footer-transaction");

		window.onscroll = function() {scrollFunction()};

		function scrollFunction() {
			if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
				header_footer_element.style.height = "25%";
			} else {
				header_footer_element.style.height = "13.5%";
			}
		}

		// When the user clicks on the button, scroll to the top of the document
		function scrollTopPage() {
			document.body.scrollTop = 0; // For Safari
			document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
		}

	</script>


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

	document.addEventListener("DOMContentLoaded", function() {
		var dropdowns = document.getElementsByClassName("dropdown");
		for (var i = 0; i < dropdowns.length; i++) {
			var dropdown = dropdowns[i];
			dropdown.addEventListener("click", function(event) {
			this.classList.toggle("show");
			event.stopPropagation();
			});
		}

		document.addEventListener("click", function(event) {
			var dropdowns = document.getElementsByClassName("dropdown");
			for (var i = 0; i < dropdowns.length; i++) {
			var dropdown = dropdowns[i];
			if (dropdown.classList.contains("show") && !dropdown.contains(event.target)) {
				dropdown.classList.remove("show");
			}
			}
		});
	});


</script>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-J157BT7FS9"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-J157BT7FS9');
</script>

</body>
</html>
