<?php
    include "View/template/HeaderP.php";
?>
	<!-- Home -->

	<div class="home">

		<!-- Hero Slider -->
		<div class="hero_slider_container">
			<div class="hero_slider owl-carousel">
				
				<!-- Hero Slide -->
				<div class="hero_slide">
					<div class="hero_slide_background" style="background-image:url(View/images/slider_background.jpg)"></div>
					<div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
						<div class="hero_slide_content text-center">
							<h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">¡Mejorando la <span>Educación</span> para el futuro!</h1>
						</div>
					</div>
				</div>
				<!-- Hero Slide -->
				<div class="hero_slide">
					<div class="hero_slide_background" style="background-image:url(View/images/slider_background.jpg)"></div>
					<div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
						<div class="hero_slide_content text-center">
							<h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">¡Somos <span>Calidad</span> para los alumnos!</h1>
						</div>
					</div>
				</div>

			</div>

			<div class="hero_slider_left hero_slider_nav trans_200"><span class="trans_200"><i class="material-icons">navigate_before</i></span></div>
			<div class="hero_slider_right hero_slider_nav trans_200"><span class="trans_200"><i class="material-icons">navigate_next</i></span></div>
		</div>

	</div>

	<div class="hero_boxes">
		<div class="hero_boxes_inner">
			<div class="container">
				<div class="row">				
					<div class="col-lg-4 hero_box_col" style="margin: auto;">
						<a href="Login" class="hero_box_link">
						<div class="hero_box d-flex flex-row align-items-center justify-content-start">
							<img src="View/images/books.svg"  alt="">
							<div class="hero_box_content">
								<h2 class="hero_box_title">Iniciar Sesión</h2>
								<a href="Login" class="link-color-login">Click aquí para iniciar sesión</a>
							</div>
						</div>
						</a>
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
							<h1 class="register_title"><span>MISI&Oacute;N</span> </h1>
							<h2 id="Mision" class="register_text" style ="text-align: justify;"></h2><br><br>
							<h1 class="register_title"><span>VISI&Oacute;N</span></h1>
							<h2 id="Vision"class="register_text" style ="text-align: justify;"></h2>
							</div>
					</div>
				</div>
				<div class="col-lg-6 nopadding">
					<div class="search_section d-flex flex-column align-items-center justify-content-center">
						<div class="search_background" style="background-image:url(View/images/search_background.jpg);"></div>
						<div class="search_content text-center">
							<h1 class="search_title">¿QUIENES SOMOS?</h1>
							<h2 class="register_title"  style ="text-align: justify;"><span id="Somos"></span></h2>
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
    include "View/template/FooterP.php";
	?>
</div>
<script src="View/js/EveryBody/Index.js"></script>
</body>
</html>