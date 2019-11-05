<!DOCTYPE html>
<html lang="en">
<head>
<title>School Admin</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Course Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css"> 
</head>
<body>

<div class="super_container">
<?php
    include "template/headerP.php";
?>
	<!-- Home -->

	<div class="home">

		<!-- Hero Slider -->
		<div class="hero_slider_container">
			<div class="hero_slider owl-carousel">
				
				<!-- Hero Slide -->
				<div class="hero_slide">
					<div class="hero_slide_background" style="background-image:url(images/slider_background.jpg)"></div>
					<div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
						<div class="hero_slide_content text-center">
							<h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">Mejorando la <span>Educación</span> para el futuro!</h1>
						</div>
					</div>
				</div>
				<!-- Hero Slide -->
				<div class="hero_slide">
					<div class="hero_slide_background" style="background-image:url(images/slider_background.jpg)"></div>
					<div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
						<div class="hero_slide_content text-center">
							<h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">Somos <span>Calidad</span> para los alumnos!</h1>
						</div>
					</div>
				</div>

			</div>

			<div class="hero_slider_left hero_slider_nav trans_200"><span class="trans_200">Anterior</span></div>
			<div class="hero_slider_right hero_slider_nav trans_200"><span class="trans_200">Siguiente</span></div>
		</div>

	</div>

	<div class="hero_boxes">
		<div class="hero_boxes_inner">
			<div class="container">
				<div class="row">

					

					<div class="col-lg-4 hero_box_col" style="margin: auto;">
						<div class="hero_box d-flex flex-row align-items-center justify-content-start">
							<img src="images/books.svg"  alt="">
							<div class="hero_box_content">
								<h2 class="hero_box_title">Iniciar Sesión</h2>
								<a href="Login.php" class="hero_box_link">Click aquí para iniciar sesión</a>
							</div>
						</div>
					</div>


				</div>
			</div>
		</div>
	</div>

	<!-- Popular -->



	<!-- Register -->

	<div class="register">

		<div class="container-fluid">
			<div class="row row-eq-height">
				<div class="col-lg-6 nopadding">
					<div class="register_section d-flex flex-column align-items-center justify-content-center">
						<div class="register_content text-center">
							<h1 class="register_title"><span>MISION</span> </h1>
							<p id="Mision" class="register_text"></p><br><br>
							<h1 class="register_title"><span>VISION</span></h1>
							<p id="Vision"class="register_text"></p>
							</div>
					</div>
				</div>
				<div class="col-lg-6 nopadding">
					<div class="search_section d-flex flex-column align-items-center justify-content-center">
						<div class="search_background" style="background-image:url(images/search_background.jpg);"></div>
						<div class="search_content text-center">
							<h1 class="search_title">¿QUIENES SOMOS?</h1>
							<h1 class="register_title"><span id="Somos" ></span></h1>
						</div> 
					</div>
				</div>
			</div>
		</div>
	</div>




	<!-- Events -->

	<div class="events page_section">
		<div class="container">
			
			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1>Nuestros Eventos</h1>
					</div>
				</div>
			</div>
			
			<div class="event_items">
				<!-- Event Item -->
				<div class="row event_item">
					<div class="col">
						<div class="row d-flex flex-row align-items-end">

							<div class="col-lg-2 order-lg-1 order-2">
								<div class="event_date d-flex flex-column align-items-center justify-content-center">
									<div id="Fecha" class="event_day">DD/MM/AAAA</div>
								</div>
							</div>

							<div class="col-lg-6 order-lg-2 order-3">
								<div class="event_content">
									<div id="Titulo" class="event_name"></div>
									<div id="Ubicacion" class="event_location">Cancha principal</div>
									<p id="Descripcion"></p>
								</div>
							</div>

							<div class="col-lg-4 order-lg-3 order-1">
								<div id="Foto" class="event_image">
									
								</div>
							</div>

						</div>	
					</div>
				</div>

			</div>
				
		</div>
	</div>
	<?php
    include "template/footerP.php";
	?>
</div>
<script src="js/Index.js"></script>
</body>
</html>