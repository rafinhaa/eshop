<!DOCTYPE html>
<html lang="zxx">
<head>
	<!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
    <title><?= $dados->titulo ?></title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="<?= base_url('public/images/favicon.png') ?>">
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
	
	<!-- StyleSheet -->
	
		<!-- Bootstrap -->
		<link rel="stylesheet" href="<?= base_url('public/css-store/bootstrap.css') ?>">
	<!-- Magnific Popup -->
    <link rel="stylesheet" href="<?= base_url('public/css-store/magnific-popup.min.css') ?>">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('public/css-store/font-awesome.css') ?>">
	<!-- Fancybox -->
	<link rel="stylesheet" href="<?= base_url('public/css-store/jquery.fancybox.min.css') ?>">
	<!-- Themify Icons -->
    <link rel="stylesheet" href="<?= base_url('public/css-store/themify-icons.css') ?>">
	<!-- Nice Select css-store -->
    <link rel="stylesheet" href="<?= base_url('public/css-store/niceselect.css') ?>">
	<!-- Animate css-store -->
    <link rel="stylesheet" href="<?= base_url('public/css-store/animate.css') ?>">
	<!-- Flex Slider css-store -->
    <link rel="stylesheet" href="<?= base_url('public/css-store/flex-slider.min.css') ?>">
	<!-- Owl Carousel -->
    <link rel="stylesheet" href="<?= base_url('public/css-store/owl-carousel.css') ?>">
	<!-- Slicknav -->
    <link rel="stylesheet" href="<?= base_url('public/css-store/slicknav.min.css') ?>">
	
	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="<?= base_url('public/css-store/reset.css') ?>">
	<link rel="stylesheet" href="<?= base_url('public/css-store/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/css-store/responsive.css') ?>">

	
	
</head>
<body class="js">
	<!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->
		<?php		
			if(isset($header)){
				$this->load->view($header);
			}
			if(isset($view)){
				$this->load->view($view);
			}
		?>

		<!-- Start Footer Area -->
	<footer class="footer">
		<!-- Footer Top -->
		<div class="footer-top section">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer about">
							<div class="logo">
								<a href="index.html"><img src="<?= base_url('public/images/logo2.png') ?>" alt="#"></a>
							</div>
							<p class="text">O Eshop. é uma aplicação de ecommerce, que permite a criação de uma loja virtual integrada com o gateway de pagamento PAGSEGURO.</p>
							<p class="call">Alguma questão? Ligue agora!<span><a href="tel:<?= $dados->telefone ?>"><?= $dados->telefone ?></a></span></p>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-2 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer links">
							<h4>Informações</h4>
							<ul>
								<li><a href="#">Sobre</a></li>
								<li><a href="#">Faq</a></li>
								<li><a href="#">Termos e Condições</a></li>
								<li><a href="#">Contato</a></li>
								<li><a href="#">Ajuda</a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-2 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer links">
							<h4>Cliente</h4>
							<ul>
								<li><a href="#">Pagamentos</a></li>
								<li><a href="#">Cash Back</a></li>
								<li><a href="#">Devolução</a></li>
								<li><a href="#">Envio</a></li>
								<li><a href="#">Privacidade</a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer social">
							<h4>Contato</h4>
							<!-- Single Widget -->
							<div class="contact">
								<ul>
									<li><?= $dados->endereco ?></li>
									<li><?= $dados->cidade . ' ' . $dados->estado ?></li>
									<li><?= $dados->cep ?></li>
									<li><?= $dados->email ?></li>
									<li><?= $dados->telefone ?></li>
								</ul>
							</div>
							<!-- End Single Widget -->
							<ul>
								<li><a href="#"><i class="ti-facebook"></i></a></li>
								<li><a href="#"><i class="ti-twitter"></i></a></li>
								<li><a href="#"><i class="ti-flickr"></i></a></li>
								<li><a href="#"><i class="ti-instagram"></i></a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Footer Top -->
		<div class="copyright">
			<div class="container">
				<div class="inner">
					<div class="row">
						<div class="col-lg-6 col-12">
							<div class="left">
								<p>Copyright © 2020 <a href="http://www.wpthemesgrid.com" target="_blank">Wpthemesgrid</a>  -  All Rights Reserved. Criado por <a href="https://github.com/rafinhaa" target="_blank">Rafinhaa</a></p>								
							</div>
						</div>
						<div class="col-lg-6 col-12">
							<div class="right">
								<img src="<?= base_url('public/images/payments.png') ?>" alt="#">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
    <!-- /End Footer Area -->
 
<!-- Jquery -->
<script src="<?= base_url('public/js-store/jquery.min.js') ?>"></script> 
<script src="<?= base_url('public/js-store/jquery-migrate-3.0.0.js') ?>"></script>
<script src="<?= base_url('public/js-store/jquery-ui.min.js') ?>"></script>
<!-- Popper JS -->
<script src="<?= base_url('public/js-store/popper.min.js') ?>"></script>
<!-- Bootstrap JS -->
<script src="<?= base_url('public/js-store/bootstrap.min.js') ?>"></script>	
<!-- Slicknav JS -->
<script src="<?= base_url('public/js-store/slicknav.min.js') ?>"></script>
<!-- Owl Carousel JS -->
<script src="<?= base_url('public/js-store/owl-carousel.js') ?>"></script>
<!-- Magnific Popup JS -->
<script src="<?= base_url('public/js-store/magnific-popup.js') ?>"></script>
<!-- Waypoints JS -->
<script src="<?= base_url('public/js-store/waypoints.min.js') ?>"></script>
<!-- Countdown JS -->
<script src="<?= base_url('public/js-store/finalcountdown.min.js') ?>"></script>
<!-- Nice Select JS -->
<script src="<?= base_url('public/js-store/nicesellect.js') ?>"></script>
<!-- Flex Slider JS -->
<script src="<?= base_url('public/js-store/flex-slider.js') ?>"></script>
<!-- ScrollUp JS -->
<script src="<?= base_url('public/js-store/scrollup.js') ?>"></script>
<!-- Onepage Nav JS -->
<script src="<?= base_url('public/js-store/onepage-nav.min.js') ?>"></script>
<!-- Easing JS -->
<script src="<?= base_url('public/js-store/easing.js') ?>"></script>
<!-- Active JS -->
<script src="<?= base_url('public/js-store/active.js') ?>"></script>
</body>
</html>