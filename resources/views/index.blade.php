<!DOCTYPE html>
<html>
<head>

	<!-- Basic -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">	

	<title>Psicologo - ONLINE</title>	

	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="Porto - Responsive HTML5 Template">
	<meta name="author" content="okler.net">

	<!-- Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
	<link rel="apple-touch-icon" href="img/apple-touch-icon.png">

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

	<!-- Web Fonts  -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css">

	<!-- Vendor CSS -->
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="vendor/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="vendor/animate/animate.min.css">
	<link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.min.css">
	<link rel="stylesheet" href="vendor/owl.carousel/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="vendor/owl.carousel/assets/owl.theme.default.min.css">
	<link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.min.css">

	<!-- Theme CSS -->
	<link rel="stylesheet" href="css/theme.css">
	<link rel="stylesheet" href="css/theme-elements.css">
	<link rel="stylesheet" href="css/theme-blog.css">
	<link rel="stylesheet" href="css/theme-shop.css">

	<!-- Current Page CSS -->
	<link rel="stylesheet" href="vendor/rs-plugin/css/settings.css">
	<link rel="stylesheet" href="vendor/rs-plugin/css/layers.css">
	<link rel="stylesheet" href="vendor/rs-plugin/css/navigation.css">

	<!-- Demo CSS -->
	<link rel="stylesheet" href="css/demos/demo-app-landing.css">

	<!-- Skin CSS -->
	<link rel="stylesheet" href="css/skins/skin-app-landing.css"> 

	<!-- Theme Custom CSS -->
	<link rel="stylesheet" href="css/custom.css">

	<!-- Head Libs -->
	<script src="vendor/modernizr/modernizr.min.js"></script>

	<style type="text/css">
		.elegant-calencar {
			width: 25em;
			border: 1px solid #c9c9c9;
			-webkit-box-shadow: 0 0 5px #c9c9c9;
			box-shadow: 0 0 5px #c9c9c9;
			text-align: center;
			position: relative;
			margin: auto; 
		}

		#header-calendar {
			font-family: 'HelveticaNeue-UltraLight', 'Helvetica Neue UltraLight', 'Helvetica Neue', Arial, Helvetica, sans-serif;
			height: 14em;
			background-color: #2a3246;
			display: -ms-flexbox;
			display: flex;
			-ms-flex-wrap: wrap;
		}

		.pre-button, .next-button {
			margin-top: 2em;
			font-size: 3em;
			-webkit-transition: -webkit-transform 0.5s;
			transition: transform 0.5s;
			cursor: pointer;
			width: 1em;
			height: 1em;
			line-height: 1em;
			color: #e66b6b;
			border-radius: 50%;
		}

		.pre-button:hover, .next-button:hover {
			-webkit-transform: rotate(360deg);
			-ms-transform: rotate(360deg);
			transform: rotate(360deg);
		}

		.pre-button:active,.next-button:active{
			-webkit-transform: scale(0.7);
			-ms-transform: scale(0.7);
			transform: scale(0.7);
		}

		.pre-button {
			margin: auto;
		}

		.next-button {
			margin: auto;
		}

		/*.head-info {
			float: left;
			width: 264px;
			}*/

			.head-day {
				margin-top: 30px;
				font-size: 8em;
				line-height: 1;
				color: #fff;
			}

			.head-month {
				margin-top: 20px;
				font-size: 2em;
				line-height: 1;
				color: #fff;
			}

			#calendar {
				height: 100%;
				width: 100%;
				margin: 0 auto;
				background-color: white;
			}

			#calendar tr {
				height: 2em;
				line-height: 2em;
			}

			thead tr {
				color: #e66b6b;
				font-weight: 700;
				text-transform: uppercase;
			}

			tbody tr {
				color: #252a25;
			}

			tbody td{
				width: 14%;
				border-radius: 50%;
				cursor: pointer;
				-webkit-transition:all 0.2s ease-in;
				transition:all 0.2s ease-in;
			}

			tbody td:hover, .selected {
				color: #fff;
				background-color: #2a3246;
				border: none;
			}

			tbody td:active {
				-webkit-transform: scale(0.7);
				-ms-transform: scale(0.7);
				transform: scale(0.7);
			}

			#today {
				background-color: #e66b6b;
				color: #fff;
				font-family: serif;
				border-radius: 50%;
			}

			#disabled {
				cursor: default;
				background: #fff0;
			}

			#disabled:hover {
				background: #fff0;
				color: #c9c9c9;
			}

			#reset {
				display: block;
				position: absolute;
				right: 0.5em;
				top: 0.5em;
				transition: all 0.3s ease;
			}

			#reset:hover {
				color: #e66b6b;
				border-color: #e66b6b;
			}

			#reset:active{
				-webkit-transform: scale(0.8);
				-ms-transform: scale(0.8);
				transform: scale(0.8);     
			}

			ol, ul {
				list-style: none;
			}
			blockquote, q {
				quotes: none;
			}
			blockquote:before, blockquote:after,
			q:before, q:after {
				content: '';
				content: none;
			}
			table {
				border-spacing: 2px;
			}
			.clearfix:before,
			.clearfix:after {
				content: " "; /* 1 */
				display: table; /* 2 */
			}

			.clearfix:after {
				clear: both;
			}
/**
 * For IE 6/7 only
 * Include this rule to trigger hasLayout and contain floats.
 */
 .clearfix {
 	*zoom: 1;
 }
</style>

</head>
<body>
	<body data-spy="scroll" data-target=".header-nav-main nav" data-offset="65">
		<header id="header" class="header-transparent header-transparent-black-bottom-border header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}">
			<div class="header-body border-top-0 bg-color-black box-shadow-none">
				<div class="header-container container">
					<div class="header-row">
						<div class="header-column">
							<div class="header-row">
								<div class="header-logo">
									<a href="demo-app-landing.html">
										<img alt="Porto" width="101" height="23" src="img/demos/app-landing/serraa.png">
									</a>
								</div>
							</div>
						</div>
						<div class="header-column justify-content-end">
							<div class="header-row">
								<div class="header-nav header-nav-links header-nav-dropdowns-dark header-nav-black-text order-2 order-lg-1">
									<div class="header-nav-main header-nav-main-mobile-dark header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-effect-2 header-nav-main-sub-effect-1">
										<nav class="collapse">
											<ul class="nav nav-pills" id="mainNav">
												<li>
													<a class="nav-link active" href="#overview" data-hash style="color:white;">
														INICIO
													</a>
												</li>
												<li>
													<a class="nav-link" href="#comofunciona" data-hash data-hash-offset="62" style="color:white;">
														COMO TRABALHAMOS
													</a>
												</li>
												<li>
													<a class="nav-link" href="#faq" data-hash data-hash-offset="62" style="color:white;">
														FAQ
													</a>
												</li>
												<li>
													<a class="nav-link" href="#consulta" data-hash style="color:white;">
														CONSULTA
													</a>
												</li>
											</ul>
										</nav>
									</div>
									<button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
										<i class="fas fa-bars"></i>
									</button>
								</div>
								<div class="order-1 order-lg-2">
									<div class="d-inline-flex">
										<ul class="header-social-icons social-icons custom-social-icons-style-1 _white d-none d-sm-block">
											<li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-square"></i></a></li>
											<li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter-square"></i></a></li>
											<li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>

		<div role="main" class="main">

			<section id="overview" class="section m-0 custom-background-style-1 m-0" style="background-color: #781e20;">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-lg-8">
							<div class="custom-top-title-box">
								<span class="text-color-light font-weight-semibold">Psicologo Online</span>
								<h1 class="text-color-black">SUA CONSULTA</h1>
								<span class="text-color-light font-weight-semibold mb-5">Aqui e agora!</span>
								<a href="#consulta" class="btn custom-btn-style-1 text-color-light mb-5" data-hash>MARQUE UMA CONSULTA</a>
								<a href="#comofunciona" class="btn btn-primary custom-btn-style-1 _borders text-color-light ml-2 mb-5" data-hash data-hash-offset="62">COMO TRABALHAMOS</a>
							</div>
						</div>
						<div class="col-8 col-md-4 col-lg-4 mx-auto">
							<div class="owl-carousel custom-arrows-style-1 custom-left-pos-1 custom-background-1 m-0" data-plugin-options="{'items': 1, 'loop': true, 'dots': false, 'nav': true, 'autoplay': true, 'autoplayTimeout': 3000}">
								<div>
									<img src="img/demos/app-landing/product/unnamed.png" alt class="img-fluid" />
								</div>	
								<div>
									<img src="img/demos/app-landing/product/0_RfjinZQ4QtWcttRH.png" alt class="img-fluid" />
								</div>	
								<div>
									<img src="img/demos/app-landing/product/unnamed.png" alt class="img-fluid" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<div id="home-intro" class="home-intro custom-home-intro bg-color-black m-0">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 col-sm-8">
							<p class="text-color-m-0">
								Esta com duvidas? <strong>tire suas duvidas no FAQ.</strong>
								<span class="pt-0 text-2">Nossa plataforma de serviço, é totalmente online e segura.</span>
							</p>
						</div>
						<div class="col-lg-4 col-sm-4">
							<a href="#faq" class="btn btn-primary custom-btn-style-1 text-uppercase font-weight-semibold float-md-right mt-1" data-hash data-hash-offset="62"><i class="icon-cloud-download icons mr-3"></i>SAIBA MAIS</a>
						</div>
					</div>
				</div>
			</div>

			<section id="comofunciona">
			</section>
			<br>
			<br>
			<br>
			<br>

			<section id="how-it-work" class="section bg-color-light m-0">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-md-8 col-lg-5">
							<!-- Free Resources: http://www.pixeden.com / http://www.premiumpixels.com/ -->

							<img src="img/demos/app-landing/product/0_RfjinZQ4QtWcttRH.png" data-appear-animation="fadeInLeft" data-appear-animation-delay="300" data-plugin-options="{'accY': 200}" alt="" class="custom-product-image-pos-1 _litle-big img-fluid d-none d-lg-block" />
						</div>
						<div class="col-md-10 col-lg-7 text-center text-lg-left">
							<h2 class="custom-bar _left text-color-dark">Como Trabalhamos</h2>
							<p class="mb-5 pb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam illo error adipisci, placeat aliquam asperiores aut ut, quia labore fuga hic quas molestias molestiae eveniet sed. Aliquam, nihil, culpa, placeat numquam aperiam quod, ipsa animi possimus officiis tenetur soluta.</p>
							<div class="row justify-content-center justify-content-lg-start">
								<div class="custom-wrap-icons">
									<div class="custom-box-icon">
										<svg version="1.1" id="sign-up" x="0px" y="0px" width="65px" height="65px" viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve">
											<path class="icon appear-animation" data-appear-animation="icons-anim" data-appear-animation-duration="1500ms" data-appear-animation-delay="500ms" fill="#F1645B" stroke="#F1645B" d="M25,0C15.263,0,6.343,5.724,2.274,14.583c-0.23,0.502-0.01,1.096,0.492,1.326
											c0.5,0.228,1.095,0.01,1.326-0.492C7.835,7.267,16.042,1.9,25,1.9c12.683,0,23.1,10.417,23.1,23.1
											c0,5.288-1.815,10.179-4.847,14.088c-1.48-1.421-4.474-2.818-10.732-5.03C31,33.52,31,33.52,31,32.141v-1.81
											c0.616-0.971,0.988-2.755,1.172-3.872c0.12-0.049,0.245-0.111,0.375-0.19c1.001-0.608,1.855-1.901,2.177-3.292
											c0.396-1.697-0.049-3.437-0.973-4.243c0.019-0.352,0.049-0.843,0.078-1.296C33.905,16.238,34,14.746,34,13.834
											c0-3.865-1.818-4.967-3.544-5.142C29.505,7.497,28.016,7,25.495,7c-1.681,0-2.909,0.49-3.993,0.924
											c-0.998,0.398-1.859,0.742-3.025,0.742c-0.596,0-1.668,0.259-2.158,1.988c-0.219,0.77-0.319,1.769-0.318,3.144
											c0.001,1.488,0.126,3.395,0.201,4.534c0.01,0.155,0.02,0.296,0.027,0.418c-0.91,0.813-1.345,2.541-0.953,4.225
											c0.322,1.393,1.177,2.686,2.178,3.294c0.13,0.079,0.255,0.142,0.375,0.19c0.184,1.117,0.556,2.901,1.172,3.872v1.81
											c0,1.379,0,1.379-1.521,1.917c-6.191,2.188-9.189,3.579-10.686,4.984c-1.053-1.367-1.966-2.857-2.701-4.459
											c-0.231-0.502-0.825-0.721-1.326-0.492c-0.502,0.23-0.723,0.824-0.492,1.326C6.343,44.276,15.263,50,25,50
											c13.785,0,25-11.215,25-25S38.785,0,25,0z M21,32.141V30c0-0.256-0.111-0.515-0.286-0.7c-0.313-0.331-0.785-2.124-1.013-3.837
											c-0.037-0.284-0.194-0.538-0.432-0.698c-0.206-0.139-0.458-0.194-0.699-0.161c-0.313-0.122-1.074-0.903-1.347-2.08
											c-0.284-1.222,0.14-2.146,0.296-2.268c0.797-0.222,0.762-0.759,0.677-2.055c-0.072-1.115-0.195-2.981-0.196-4.405
											c-0.003-2.753,0.478-3.126,0.477-3.13c1.551,0,2.678-0.45,3.768-0.885C23.249,9.379,24.198,9,25.495,9
											c2.625,0,3.219,0.612,3.569,1.187c0.182,0.298,0.505,0.479,0.854,0.479c1.008,0,2.082,0.245,2.082,3.168
											c0,0.849-0.093,2.306-0.167,3.477c-0.153,2.422-0.174,2.733,0.595,2.923c0.209,0.145,0.633,1.068,0.348,2.292
											c-0.271,1.175-1.033,1.956-1.346,2.078c-0.244-0.034-0.492,0.022-0.699,0.161c-0.237,0.16-0.395,0.415-0.432,0.698
											c-0.227,1.712-0.699,3.505-1.012,3.836C29.103,29.486,29,29.738,29,30v2.141c0,1.759,0.21,2.665,2.063,3.486
											C29.413,37.143,27.273,38,25,38s-4.413-0.857-6.063-2.373C20.789,34.806,21,33.899,21,32.141z M25,48.1
											c-6.512,0-12.618-2.846-16.909-7.525c1.101-1.096,3.71-2.339,8.795-4.181C18.972,38.687,21.883,40,25,40s6.028-1.313,8.114-3.606
											c5.161,1.869,7.772,3.122,8.844,4.229C37.727,45.209,31.679,48.1,25,48.1z"/>
											<path class="plus appear-animation" data-appear-animation="icons-anim" data-appear-animation-duration="1500ms" data-appear-animation-delay="800" fill="#F1645B" d="M11,24H7v-4c0-0.553-0.447-1-1-1s-1,0.447-1,1v4H1c-0.553,0-1,0.447-1,1c0,0.552,0.447,1,1,1h4v4
											c0,0.552,0.447,1,1,1s1-0.448,1-1v-4h4c0.553,0,1-0.448,1-1C12,24.447,11.553,24,11,24z"/>
										</svg>
										<span class="appear-animation" data-appear-animation="fadeInDown" data-appear-animation-delay="1500">Marque uma consulta</span>
									</div>
									<div class="custom-box-icon">
										<div class="wrap-dashed-lines">
											<svg version="1.1" id="connect-people" x="0px" y="0px" width="65px" height="65px" viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve">
												<path class="icon appear-animation" data-appear-animation="icons-anim" data-appear-animation-duration="3500ms" data-appear-animation-delay="700" fill="#F1645B" d="M25,0C11.215,0,0,11.215,0,25s11.215,25,25,25s25-11.215,25-25S38.785,0,25,0z M25,1.9
												c12.737,0,23.1,10.363,23.1,23.1c0,2.692-0.467,5.276-1.317,7.682c-1.166-0.639-3.022-1.385-6.269-2.545
												c-0.639-0.229-0.767-0.346-0.772-0.346c-0.026-0.068-0.033-0.286-0.035-0.47c2.533-0.387,4.554-2.089,4.649-2.17
												c0.293-0.251,0.416-0.647,0.316-1.021c-0.093-0.343-0.359-0.61-0.699-0.704c-0.397-0.193-1.385-1.569-1.385-5.731
												c0-4.315-2.997-7.695-6.823-7.695c-0.898,0-1.776,0.216-2.596,0.585c-0.225-2.953-1.739-3.861-3.199-4.025
												C29.094,7.459,27.732,7,25.445,7c-1.535,0-2.651,0.455-3.637,0.857c-0.887,0.361-1.653,0.674-2.68,0.674
												c-0.565,0-1.583,0.246-2.04,1.892c-0.163,0.586-0.25,1.327-0.277,2.272c-0.045-0.019-0.086-0.032-0.133-0.051
												C15.933,12.342,15.087,12,13.907,12c-1.82,0-3.114,0.386-3.856,1.148c-2.109,0.292-2.109,2.438-2.109,3.758
												c0,0.621,0.063,1.626,0.113,2.435c0.018,0.269,0.033,0.516,0.045,0.714c-0.623,0.654-0.904,1.85-0.629,3.043
												c0.232,1.02,0.86,1.969,1.6,2.419c0.073,0.044,0.145,0.083,0.214,0.115c0.234,0.749,0.601,1.78,1.01,2.425v1.106
												c0,0.188,0,0.538-0.021,0.606c-0.02,0.021-0.146,0.138-0.786,0.367c-3.208,1.146-5.09,1.904-6.268,2.547
												C2.368,30.278,1.9,27.693,1.9,25C1.9,12.263,12.263,1.9,25,1.9z M41.716,36.734c-1.255-1.385-3.913-2.695-9.775-4.816
												c1.576-0.618,1.883-1.289,1.883-2.755v-0.764c0-0.552-0.447-1-1-1c-0.632,0-1.327-0.151-2.044-0.433
												c0.269-0.676,0.501-1.38,0.662-1.909c0.124-0.047,0.253-0.11,0.389-0.192c0.93-0.565,1.723-1.778,2.02-3.089
												c0.356-1.562-0.041-3.164-0.872-3.939c0.017-0.32,0.044-0.76,0.069-1.167c0.034-0.557,0.073-1.183,0.104-1.774
												C33.923,14.326,34.833,14,35.765,14c2.338,0,4.823,1.996,4.823,5.695c0,3.71,0.729,5.631,1.473,6.625
												c-0.826,0.497-2.067,1.079-3.354,1.079c-0.553,0-1,0.448-1,1v0.764c0,1.544,0.322,2.208,2.134,2.856
												c2.851,1.019,5.02,1.856,6.183,2.536c-0.773,1.694-1.744,3.278-2.885,4.724C42.769,38.244,42.301,37.379,41.716,36.734z
												M31.823,29.322c-0.001,0.183-0.005,0.396-0.021,0.447c-0.02,0.021-0.146,0.138-0.786,0.366c-0.351,0.126-0.687,0.247-1.01,0.364
												C30.001,30.404,30,30.301,30,30.184v-1.375C30.618,29.056,31.228,29.232,31.823,29.322z M6.862,39.279
												c-1.141-1.445-2.112-3.029-2.885-4.725c1.164-0.68,3.333-1.518,6.183-2.535c1.812-0.648,2.134-1.313,2.134-2.856V27.73
												c0-0.24-0.12-0.51-0.277-0.691c-0.207-0.24-0.666-1.424-0.981-2.533c-0.126-0.442-0.564-0.719-0.97-0.727
												c-0.174-0.131-0.511-0.537-0.646-1.128c-0.132-0.573,0.004-1.013,0.096-1.171c0.662-0.242,0.627-0.801,0.535-2.265
												c-0.049-0.78-0.109-1.751-0.109-2.309c0-1.791,0.131-1.791,0.617-1.791c0.351,0,0.675-0.183,0.855-0.483
												C11.557,14.397,12.241,14,13.907,14c0.791,0,1.362,0.23,2.022,0.498c0.288,0.116,0.588,0.229,0.904,0.332
												c0.039,0.986,0.103,1.976,0.146,2.663c0.009,0.133,0.017,0.255,0.023,0.363c-0.818,0.782-1.208,2.372-0.854,3.92
												c0.225,0.99,0.731,1.922,1.365,2.564c-0.027,0.055-0.062,0.106-0.079,0.167c-0.315,1.109-0.774,2.292-0.977,2.528
												c-0.181,0.187-0.282,0.437-0.282,0.696v1.433c0,1.466,0.307,2.137,1.883,2.756c-5.862,2.12-8.521,3.431-9.775,4.814
												C7.7,37.378,7.231,38.244,6.862,39.279z M18.984,30.137c-0.639-0.229-0.767-0.346-0.772-0.346c-0.035-0.09-0.035-0.439-0.035-0.628
												v-1.106c0.298-0.47,0.571-1.144,0.789-1.764c0.292,0.815,0.653,1.689,1.034,2.26v1.631c0,0.117-0.001,0.221-0.006,0.316
												C19.671,30.383,19.335,30.262,18.984,30.137z M25,48.1c-6.502,0-12.38-2.703-16.582-7.041c0.312-1.307,0.77-2.342,1.349-2.982
												c0.981-1.082,3.704-2.376,9.104-4.324C20.761,33.069,22,32.453,22,30.184v-1.967c0-0.259-0.1-0.508-0.279-0.693
												c-0.336-0.35-1.005-2.158-1.419-3.627c-0.134-0.476-0.575-0.771-1.068-0.723c-0.261-0.134-0.897-0.797-1.134-1.841
												c-0.234-1.028,0.076-1.821,0.261-2.011c0.727-0.235,0.69-0.787,0.616-1.957c-0.065-1.023-0.176-2.735-0.177-4.039
												c-0.002-2.381,0.376-2.79,0.329-2.795c1.419,0,2.49-0.437,3.435-0.822C23.458,9.344,24.302,9,25.445,9
												c2.499,0,2.889,0.653,3.122,1.043c0.18,0.303,0.506,0.488,0.858,0.488c0.664,0,1.774,0,1.774,2.83c0,0.776-0.083,2.112-0.149,3.186
												c-0.135,2.164-0.159,2.554,0.591,2.776c0.185,0.192,0.492,0.983,0.258,2.011c-0.235,1.042-0.872,1.705-1.133,1.839
												c-0.479-0.047-0.935,0.248-1.068,0.724c-0.405,1.438-1.088,3.281-1.419,3.627C28.1,27.709,28,27.958,28,28.217v1.967
												c0,2.27,1.239,2.886,3.129,3.568c5.4,1.948,8.123,3.242,9.104,4.324c0.581,0.642,1.038,1.678,1.349,2.982
												C37.38,45.396,31.502,48.1,25,48.1z"/>
											</svg>
											<span class="appear-animation" data-appear-animation="fadeInDown" data-appear-animation-delay="3700">Conecte com o Psicologo</span>
											<svg version="1.1" id="dashed-line-1" class="dashed-line _left" x="0px" y="0px" width="98.5px" height="26.5px" viewBox="0 0 98.5 26.5" enable-background="new 0 0 98.5 26.5" xml:space="preserve">
												<path class="line" data-appear-animation="line-anim" data-appear-animation-duration="1000ms" data-appear-animation-delay="2000" fill="none" stroke="#010101" stroke-miterlimit="10" stroke-dasharray="3,3" d="M4,16.93c0,0,40.589-36.872,83.192,1.084"/>
												<path class="line-mask" fill="none" stroke="#FFF" stroke-miterlimit="10" stroke-dasharray="3,3" d="M4,16.93c0,0,40.589-36.872,83.192,1.084"/>
												<circle class="circle appear-animation" data-appear-animation="line-circle-anim" data-appear-animation-duration="700ms" data-appear-animation-delay="2700" fill="none" stroke="#010101" stroke-miterlimit="10" stroke-dasharray="3,3" cx="91.01" cy="21.014" r="4.627"/>
												<circle class="circle-mask" fill="none" stroke="#FFF" stroke-miterlimit="10" stroke-dasharray="3,3" cx="91.01" cy="21.014" r="4.627"/>
											</svg>
											<svg version="1.1" id="dashed-line-2" class="dashed-line _right" x="0px" y="0px" width="98.5px" height="26.5px" viewBox="0 0 98.5 26.5" enable-background="new 0 0 98.5 26.5" xml:space="preserve">
												<path class="line" data-appear-animation="line-anim" data-appear-animation-duration="1s" data-appear-animation-delay="4000" fill="none" stroke="#010101" stroke-miterlimit="10" stroke-dasharray="3,3" d="M4,9.57c0,0,40.589,36.871,83.192-1.084"/>
												<path class="line-mask" fill="none" stroke="#FFF" stroke-miterlimit="10" stroke-dasharray="3,3" d="M4,9.57c0,0,40.589,36.871,83.192-1.084"/>
												<circle class="circle appear-animation" data-appear-animation="line-circle-anim" data-appear-animation-duration="1000ms" data-appear-animation-delay="4700" fill="none" stroke="#010101" stroke-miterlimit="10" stroke-dasharray="3,3" cx="91.01" cy="5.486" r="4.627"/>
												<circle class="circle-mask" fill="none" stroke="#FFF" stroke-miterlimit="10" stroke-dasharray="3,3" cx="91.01" cy="5.486" r="4.627"/>
											</svg>
										</div>
									</div>
									<div class="custom-box-icon">
										<svg version="1.1" id="share" x="0px" y="0px" width="65px" height="65px" viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve">
											<path class="icon appear-animation" data-appear-animation="icons-anim" data-appear-animation-duration="3000ms" data-appear-animation-delay="3500" fill="#F1645B" d="M32,27c-1.923,0-3.577,1.104-4.413,2.699l-4.625-1.321C22.972,28.251,23,28.129,23,28
											c0-0.854-0.235-1.647-0.615-2.352l4.512-3.76C27.752,22.573,28.822,23,30,23c2.757,0,5-2.243,5-5s-2.243-5-5-5s-5,2.243-5,5
											c0,0.855,0.235,1.648,0.615,2.353l-4.511,3.759C20.249,23.427,19.179,23,18,23c-2.757,0-5,2.243-5,5s2.243,5,5,5
											c1.923,0,3.576-1.104,4.412-2.699l4.626,1.322C27.028,31.749,27,31.871,27,32c0,2.757,2.243,5,5,5s5-2.243,5-5S34.757,27,32,27z
											M30,15c1.654,0,3,1.346,3,3s-1.346,3-3,3s-3-1.346-3-3S28.346,15,30,15z M18,31c-1.654,0-3-1.346-3-3s1.346-3,3-3s3,1.346,3,3
											S19.654,31,18,31z M32,35c-1.654,0-3-1.346-3-3s1.346-3,3-3s3,1.346,3,3S33.654,35,32,35z"/>
											<circle class="icons-circle appear-animation" data-appear-animation="icons-circle-anim" data-appear-animation-duration="1000ms" data-appear-animation-delay="5300" fill="none" stroke="#F1645B" stroke-width="2" stroke-miterlimit="50" cx="25.027" cy="25.092" r="24.062"/>
										</svg>
										<span class="appear-animation" data-appear-animation="fadeInDown" data-appear-animation-delay="5800">Saia Renovado</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section id="consulta">
			</section>
			<br>
			<br>
			<br>

			<div class="p-relative">
				<section id="downloads" class="section section-parallax m-0" data-plugin-parallax data-plugin-options="{'speed': 1.5}" data-image-src="img/demos/app-landing/parallax/downloads-parallax.png" style="background-color: #781e20;">
					<div class="container">
						<div class="row">
							<div class="col-md-12 text-center">
								<h2 class=" text-color-black">AGENDE SUA CONSULTA</h2>
								<p class="text-color-light custom-font-secondary text-4 mb-0">Escolha um dia <strong>Ideal</strong></p>
								<p class="text-2 text-color-light custom-font-secondary mb-4 pb-3">Para você agendar uma consulta com um psicologo</p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 text-center">
								<!-- CALENDÁRIO -->
								<div class="elegant-calencar">
									<button class="btn btn-primary" id="reset">Limpar</button>
									<div id="header-calendar">

										<div class="col-md-2 pre-button">
											<i class="fas fa-angle-left"></i>
										</div>

										<div class="col-md-8">
											<div class="head-day"></div>
											<div class="head-month"></div>
										</div>

										<div class="col-md-2 next-button">
											<i class="fas fa-angle-right"></i>
										</div>
									</div>
									<table id="calendar">
										<thead>
											<tr>
												<th>Dom</th>
												<th>Seg</th>
												<th>Ter</th>
												<th>Qua</th>
												<th>Qui</th>
												<th>Sex</th>
												<th>Sáb</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
										</tbody>
									</table>
								</div>
								<!-- FIM CALENDÁRIO -->
							</div>
						</div>
					</div>
					
				</section>

			</div>

			<section id="faq" class="section bg-color-light m-0">
				<div class="container">
					<div class="row text-center mb-3">
						<div class="col-lg-8 m-auto">
							<h2 class="custom-bar _center text-color-dark">FAQ'S</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur repudiandae et saepe, veniam aliquam molestias quod, quasi minus sequi, doloremque dolorum eaque similique eligendi omnis ea!</p>
						</div>
					</div>
					<div class="row mb-5">
						<div class="col-lg-10 m-auto">
							<div class="accordion custom-accordion-style-1" id="accordion">
								<div class="card card-default">
									<div class="card-header">
										<h4 class="card-title m-0">
											<a class="accordion-toggle text-color-dark" data-toggle="collapse" data-parent="#accordion" href="#collapse1One">
												Lorem ipsum dolor sit amet, consectetur adipisicing ?
											</a>
										</h4>
									</div>
									<div id="collapse1One" class="collapse show">
										<div class="card-body">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque eos laborum non molestiae dignissimos accusamus architecto amet beatae eveniet omnis. Animi eos dolore totam dolorum magni impedit optio alias qui nobis dicta deserunt ipsum porro veritatis incidunt ullam ducimus, velit non voluptate a. Rem aut vel necessitatibus officiis, sit quo, at fugit labore minima obcaecati reprehenderit ipsum.</p>
										</div>
									</div>
								</div>
								<div class="card card-default">
									<div class="card-header">
										<h4 class="card-title m-0">
											<a class="accordion-toggle text-color-dark collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse1Two">
												Lorem ipsum dolor sit amet, consectetur adipisicing ?
											</a>
										</h4>
									</div>
									<div id="collapse1Two" class="collapse">
										<div class="card-body">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque eos laborum non molestiae dignissimos accusamus architecto amet beatae eveniet omnis. Animi eos dolore totam dolorum magni impedit optio alias qui nobis dicta deserunt ipsum porro veritatis incidunt ullam ducimus, velit non voluptate a. Rem aut vel necessitatibus officiis, sit quo, at fugit labore minima obcaecati reprehenderit ipsum.</p>
										</div>
									</div>
								</div>
								<div class="card card-default">
									<div class="card-header">
										<h4 class="card-title m-0">
											<a class="accordion-toggle text-color-dark collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse1Three">
												Lorem ipsum dolor sit amet, consectetur adipisicing elit ?
											</a>
										</h4>
									</div>
									<div id="collapse1Three" class="collapse">
										<div class="card-body">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque eos laborum non molestiae dignissimos accusamus architecto amet beatae eveniet omnis. Animi eos dolore totam dolorum magni impedit optio alias qui nobis dicta deserunt ipsum porro veritatis incidunt ullam ducimus, velit non voluptate a. Rem aut vel necessitatibus officiis, sit quo, at fugit labore minima obcaecati reprehenderit ipsum.</p>
										</div>
									</div>
								</div>
								<div class="card card-default">
									<div class="card-header">
										<h4 class="card-title m-0">
											<a class="accordion-toggle text-color-dark collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse1Four">
												Lorem ipsum dolor sit amet, consectetur ?
											</a>
										</h4>
									</div>
									<div id="collapse1Four" class="collapse">
										<div class="card-body">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque eos laborum non molestiae dignissimos accusamus architecto amet beatae eveniet omnis. Animi eos dolore totam dolorum magni impedit optio alias qui nobis dicta deserunt ipsum porro veritatis incidunt ullam ducimus, velit non voluptate a. Rem aut vel necessitatibus officiis, sit quo, at fugit labore minima obcaecati reprehenderit ipsum.</p>
										</div>
									</div>
								</div>
								<div class="card card-default">
									<div class="card-header">
										<h4 class="card-title m-0">
											<a class="accordion-toggle text-color-dark collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse1Five">
												Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum ?
											</a>
										</h4>
									</div>
									<div id="collapse1Five" class="collapse">
										<div class="card-body">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque eos laborum non molestiae dignissimos accusamus architecto amet beatae eveniet omnis. Animi eos dolore totam dolorum magni impedit optio alias qui nobis dicta deserunt ipsum porro veritatis incidunt ullam ducimus, velit non voluptate a. Rem aut vel necessitatibus officiis, sit quo, at fugit labore minima obcaecati reprehenderit ipsum.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row text-center">
						<div class="col">
							<p class="text-color-dark custom-font-secondary text-4 mb-0">Sanamos suas duvidas? <strong>Marque uma consulta</strong></p>
							<br>
							<a href="#consulta" class="btn btn-outline btn-primary text-color-dark custom-btn-style-2">AGENDE SUA CONSULTA</a>
						</div>
					</div>
				</div>
			</section>


			<footer id="footer" class="bg-color-light">
				<div class="container">
					<div class="footer-copyright bg-color-light pb-5">
						<div class="container">
							<div class="row">
								<div class="col-lg-6 text-center text-md-left">
									<span class="copyright-text">
										© Copyright 2019. All Rights Reserved.
										<ul class="social-icons custom-social-icons-style-1 _colored">
											<li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-square"></i></a></li>
											<li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter-square"></i></a></li>
											<li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
										</ul>
									</span>
								</div>
								<div class="col-lg-6">
									<nav>
										<ul class="nav nav-pills float-right" id="footerNav">
											<li class="nav-item">
												<a class="nav-link text-color-dark" href="#comofunciona" data-hash>
													COMO TRABALHAMOS
												</a>
											</li>
										</ul>
									</nav>
								</div>
							</div>
						</div>
					</div>
				</footer>
			</div>

			<!-- Vendor -->
			<script src="vendor/jquery/jquery.min.js"></script>
			<script src="vendor/jquery.appear/jquery.appear.min.js"></script>
			<script src="vendor/jquery.easing/jquery.easing.min.js"></script>
			<script src="vendor/jquery.cookie/jquery.cookie.min.js"></script>
			<script src="vendor/popper/umd/popper.min.js"></script>
			<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
			<script src="vendor/common/common.min.js"></script>
			<script src="vendor/jquery.validation/jquery.validate.min.js"></script>
			<script src="vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
			<script src="vendor/jquery.gmap/jquery.gmap.min.js"></script>
			<script src="vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
			<script src="vendor/isotope/jquery.isotope.min.js"></script>
			<script src="vendor/owl.carousel/owl.carousel.min.js"></script>
			<script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
			<script src="vendor/vide/jquery.vide.min.js"></script>
			<script src="vendor/vivus/vivus.min.js"></script>

			<!-- Theme Base, Components and Settings -->
			<script src="js/theme.js"></script>

			<!-- Current Page Vendor and Views -->
			<script src="vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
			<script src="vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

			<!-- Current Page Vendor and Views -->
			<script src="js/views/view.contact.js"></script>


			<!-- Theme Custom -->
			<script src="js/custom.js"></script>

			<!-- Theme Initialization Files -->
			<script src="js/theme.init.js"></script>

			<script type="text/javascript">
				document.addEventListener('DOMContentLoaded', function(){
					var today = new Date(),
					year = today.getFullYear(),
					month = today.getMonth(),
					monthTag =["Jan","Fev","Mar","Abr","Mai","Jun","Jul","Ago","Set","Out","Nov","Dez"],
					day = today.getDate(),
					days = document.getElementsByTagName('td'),
					selectedDay,
					setDate,
					daysLen = days.length;

					function Calendar(selector, options) {
						this.options = options;
						this.draw();
					}

					Calendar.prototype.draw  = function() {
						this.getCookie('selected_day');
						this.getOptions();
						this.drawDays();
						var that = this,
						reset = document.getElementById('reset'),
						pre = document.getElementsByClassName('pre-button'),
						next = document.getElementsByClassName('next-button');

						pre[0].addEventListener('click', function(){that.preMonth(); });
						next[0].addEventListener('click', function(){that.nextMonth(); });
						reset.addEventListener('click', function(){that.reset(); });
						while(daysLen--) {
							days[daysLen].addEventListener('click', function(){that.clickDay(this); });
						}
					};

					Calendar.prototype.drawHeader = function(e) {
						var headDay = document.getElementsByClassName('head-day'),
						headMonth = document.getElementsByClassName('head-month');

						e?headDay[0].innerHTML = e : headDay[0].innerHTML = day;
						headMonth[0].innerHTML = monthTag[month] +" - " + year;        
					};

					Calendar.prototype.drawDays = function() {
						var startDay = new Date(year, month, 1).getDay(),  
						nDays = new Date(year, month + 1, 0).getDate(),

						n = startDay; 
						for(var k = 0; k <35; k++) {
							days[k].innerHTML = '';
							days[k].id = '';
							days[k].className = '';
						}

						for(var i  = 1; i <= nDays ; i++) {
							days[n].innerHTML = i; 
							n++;
						}

						for(var j = 0; j < 35; j++) {
							if(days[j].innerHTML === ""){

								days[j].id = "disabled";

							}else if(j === day + startDay - 1){
								if((this.options && (month === setDate.getMonth()) && (year === setDate.getFullYear())) || (!this.options && (month === today.getMonth())&&(year===today.getFullYear()))){
									this.drawHeader(day);
									days[j].id = "today";
								}
							}
							if(selectedDay){
								if((j === selectedDay.getDate() + startDay - 1)&&(month === selectedDay.getMonth())&&(year === selectedDay.getFullYear())){
									days[j].className = "selected";
									this.drawHeader(selectedDay.getDate());
								}
							}
						}
					};

					Calendar.prototype.clickDay = function(o) {
						var selected = document.getElementsByClassName("selected"),
						len = selected.length;
						if(len !== 0){
							selected[0].className = "";
						}
						o.className = "selected";
						selectedDay = new Date(year, month, o.innerHTML);
						this.drawHeader(o.innerHTML);
						this.setCookie('selected_day', 1);

					};

					Calendar.prototype.preMonth = function() {
						if(month < 1){ 
							month = 11;
							year = year - 1; 
						}else{
							month = month - 1;
						}
						this.drawHeader(1);
						this.drawDays();
					};

					Calendar.prototype.nextMonth = function() {
						if(month >= 11){
							month = 0;
							year =  year + 1; 
						}else{
							month = month + 1;
						}
						this.drawHeader(1);
						this.drawDays();
					};

					Calendar.prototype.getOptions = function() {
						if(this.options){
							var sets = this.options.split('-');
							setDate = new Date(sets[0], sets[1]-1, sets[2]);
							day = setDate.getDate();
							year = setDate.getFullYear();
							month = setDate.getMonth();
						}
					};

					Calendar.prototype.reset = function() {
						month = today.getMonth();
						year = today.getFullYear();
						day = today.getDate();
						this.options = undefined;
						this.drawDays();
					};

					Calendar.prototype.setCookie = function(name, expiredays){
						if(expiredays) {
							var date = new Date();
							date.setTime(date.getTime() + (expiredays*24*60*60*1000));
							var expires = "; expires=" +date.toGMTString();
						}else{
							var expires = "";
						}
						document.cookie = name + "=" + selectedDay + expires + "; path=/";
					};

					Calendar.prototype.getCookie = function(name) {
						if(document.cookie.length){
							var arrCookie  = document.cookie.split(';'),
							nameEQ = name + "=";
							for(var i = 0, cLen = arrCookie.length; i < cLen; i++) {
								var c = arrCookie[i];
								while (c.charAt(0)==' ') {
									c = c.substring(1,c.length);

								}
								if (c.indexOf(nameEQ) === 0) {
									selectedDay =  new Date(c.substring(nameEQ.length, c.length));
								}
							}
						}
					};
					var calendar = new Calendar();


				}, false);
			</script>
		<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
			ga('create', 'UA-12345678-1', 'auto');
			ga('send', 'pageview');
		</script>
	-->


</body>
</html>