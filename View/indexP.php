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
							<img src="images/books.svg" class="svg" alt="">
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
					
					<!-- Register -->

					<div class="register_section d-flex flex-column align-items-center justify-content-center">
						<div class="register_content text-center">
							<h1 class="register_title"><span>MISION</span> </h1>
							<p class="register_text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto unde incidunt commodi explicabo qui nihil quidem iure obcaecati quos minus tempore ipsa possimus enim, nobis omnis suscipit atque dolor fugit!</p><br><br>
							<h1 class="register_title"><span>VISION</span></h1>
							<p class="register_text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestias eius iste asperiores cum harum deserunt sed, eaque necessitatibus ullam, laudantium soluta. Vero obcaecati eos nisi quod a molestiae quibusdam. Rem?</p>
							</div>
					</div>

				</div>

				<div class="col-lg-6 nopadding">
					
					<!-- Search -->

					<div class="search_section d-flex flex-column align-items-center justify-content-center">
						<div class="search_background" style="background-image:url(images/search_background.jpg);"></div>
						<div class="search_content text-center">
							<h1 class="search_title">¿QUIENES SOMOS?</h1>
							<h1 class="register_title"><span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut omnis eaque tempora facilis officia praesentium culpa magnam dolor. Dolorem inventore fugiat voluptatibus numquam accusantium molestiae quibusdam at repellat id totam!</span></h1>
							
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
									<div class="event_day">07</div>
									<div class="event_month">Enero</div>
								</div>
							</div>

							<div class="col-lg-6 order-lg-2 order-3">
								<div class="event_content">
									<div class="event_name"><a class="trans_200" href="#">Inicio de Clases</a></div>
									<div class="event_location">Teatro</div>
									<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptas similique totam omnis cumque animi, tempora, autem natus obcaecati exercitationem labore illo? Earum quaerat corrupti consectetur inventore amet officia facere mollitia!</p>
								</div>
							</div>

							<div class="col-lg-4 order-lg-3 order-1">
								<div class="event_image">
									<img src="images/event_1.jpg" alt="https://unsplash.com/@theunsteady5">
								</div>
							</div>

						</div>	
					</div>
				</div>

				<!-- Event Item -->
				<div class="row event_item">
					<div class="col">
						<div class="row d-flex flex-row align-items-end">

							<div class="col-lg-2 order-lg-1 order-2">
								<div class="event_date d-flex flex-column align-items-center justify-content-center">
									<div class="event_day">04</div>
									<div class="event_month">Febrero</div>
								</div>
							</div>

							<div class="col-lg-6 order-lg-2 order-3">
								<div class="event_content">
									<div class="event_name"><a class="trans_200" href="#">Izada de bandera-Día Mundial de lucha contra el Cáncer</a></div>
									<div class="event_location">Cancha principal</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius nisi perspiciatis animi eos? Numquam perspiciatis natus, quod, possimus repellat ex labore, sed cum rerum minus quis optio eum fugiat tempore!</p>
								</div>
							</div>

							<div class="col-lg-4 order-lg-3 order-1">
								<div class="event_image">
									<img src="images/event_2.jpg" alt="https://unsplash.com/@claybanks1989">
								</div>
							</div>

						</div>	
					</div>
				</div>

				<!-- Event Item -->
				<div class="row event_item">
					<div class="col">
						<div class="row d-flex flex-row align-items-end">

							<div class="col-lg-2 order-lg-1 order-2">
								<div class="event_date d-flex flex-column align-items-center justify-content-center">
									<div class="event_day">19</div>
									<div class="event_month">Marzo</div>
								</div>
							</div>

							<div class="col-lg-6 order-lg-2 order-3">
								<div class="event_content">
									<div class="event_name"><a class="trans_200" href="#">Izada de bandera en conmemoracion al dia del hombre</a></div>
									<div class="event_location">Cancha principal</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio sit hic, nihil modi quidem officiis assumenda illo voluptate nostrum? Hic earum recusandae corrupti dolorum maxime, cum quo modi praesentium inventore!</p>
								</div>
							</div>

							<div class="col-lg-4 order-lg-3 order-1">
								<div class="event_image">
									<img src="images/event_3.jpg" alt="https://unsplash.com/@juanmramosjr">
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

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/scrollTo/jquery.scrollTo.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/custom.js"></script>

</body>
</html>