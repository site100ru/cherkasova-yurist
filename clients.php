<?php
	
	/*
		Template Name: Наши клиенты
		Template Post Type: page
	*/
	
	// get_header();
	
	include 'header.php';
	
?>
		
<div id="main" class="container-fluid">
	<div class="overlay">
	</div>
	<div class="container pt-5 pb-5">
		<div class="row justify-content-end text-white">
			<div class="col">
				<h1 class="text-white text-center">Наши клиенты</h1>
			</div>
		</div>
	</div>
</div>

<div id="clients" class="container-fluid bg-wjite pt-5 pb-4">
	<div class="container">
		<div class="client-feedback row justify-content-center align-items-center">
			<div class="col-md-4 mb-4">
				<div class="zoom">
					<a href="<?php site_url(); ?>/wp-content/themes/lawyers/img/lilya-opinion-1.jpg"><img src="<?php site_url(); ?>/wp-content/themes/lawyers/img/lilya-opinion-1.jpg"></a>
				</div>
			</div>
			<div class="col-md-4 mb-4">
				<div class="zoom">
					<a href="<?php site_url(); ?>/wp-content/themes/lawyers/img/lilya-opinion-2.jpg"><img src="<?php site_url(); ?>/wp-content/themes/lawyers/img/lilya-opinion-2.jpg"></a>
				</div>
			</div>
			
		</div>
	</div>
</div>


<!--
<div id="complementary-sevices" class="container-fluid bg-light pt-5 pb-5">
	<div class="container">
		<div class="row">
			<div class="col text-center mb-4">
				<h2>Дополнительные услуги</h2>
			</div>
		</div>
		<div class="row align-items-center">
			<div class="col-md-4 mb-4">
				<div class="card w-100 text-white" style="background: url(img/service1.jpg);">
					<div class="overlay">
					</div>
					<div class="card-body">
						<h5 class="card-title">Оспаривание кадастровой стоимости</h5>
						<a href="service-description" class="btn btn-primary">Подробнее</a>
					</div>
				</div>
			</div>
			<div class="col-md-4 mb-4">
				<div class="card w-100 text-white" style="background: url(img/service2.jpg);">
					<div class="overlay">
					</div>
					<div class="card-body">
						<h5 class="card-title">Административные дела</h5>
						<a href="service-description" class="btn btn-primary">Подробнее</a>
					</div>
				</div>
			</div>
			<div class="col-md-4 mb-4">
				<div class="card w-100 text-white" style="background: url(img/service3.jpg);">
					<div class="overlay">
					</div>
					<div class="card-body">
						<h5 class="card-title">Правовое сопровождение сделок</h5>
						<a href="service-description" class="btn btn-primary">Подробнее</a>
					</div>
				</div>
			</div>
			<div class="col-md-4 mb-4">
				<div class="card w-100 text-white" style="background: url(img/service4.jpg);">
					<div class="overlay">
					</div>
					<div class="card-body">
						<h5 class="card-title">Составление исков</h5>
						<a href="service-description" class="btn btn-primary">Подробнее</a>
					</div>
				</div>
			</div>
			<div class="col-md-4 mb-4">
				<div class="card w-100 text-white" style="background: url(img/service5.jpg);">
					<div class="overlay">
					</div>
					<div class="card-body">
						<h5 class="card-title">Договорное право</h5>
						<a href="service-description" class="btn btn-primary">Подробнее</a>
					</div>
				</div>
			</div>
			<div class="col-md-4 mb-4">
				<div class="card w-100 text-white" style="background: url(img/service6.jpg);">
					<div class="overlay">
					</div>
					<div class="card-body">
						<h5 class="card-title">Иные услуги</h5>
						<a href="service-description" class="btn btn-primary">Подробнее</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="client-feedback" class="container-fluid bg-white pt-5 pb-5">
	<div class="container">
		<div class="row">
			<div class="col text-center mb-4">
				<h2>Отзывы наших клиентов</h2>
			</div>
		</div>
		<div class="row align-items-center">
			<div class="col-md-3 mb-4">
				<div class="zoom">
					<img src="img/letter1.jpg">
				</div>
			</div>
			<div class="col-md-3 mb-4">
				<div class="zoom">
					<img src="img/letter1.jpg">
				</div>
			</div>
			<div class="col-md-3 mb-4">
				<div class="zoom">
					<img src="img/letter1.jpg">
				</div>
			</div>
			<div class="col-md-3 mb-4">
				<div class="zoom">
					<img src="img/letter1.jpg">
				</div>
			</div>
		</div>
	</div>
</div>

<div id="paerners" class="container-fluid bg-light pt-5 pb-5">
	<div class="container">
		<div class="row">
			<div class="col text-center mb-4">
				<h2>Партнеры и сотрудники</h2>
			</div>
		</div>
		<div class="row align-items-center">
			<div class="col-md-6 mb-4">
				<div class="card mb-3 w-100">
					<div class="row no-gutters">
						<div class="col-md-4">
							<img src="img/partner1.jpg" class="card-img" alt="...">
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<h5 class="card-title">Партнер 1</h5>
								<p class="mb-1"><i class="fas fa-phone-alt"></i> 8-800-800-80-80</p>
								<p><i class="fas fa-envelope"></i> mail@mail.ru</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 mb-4">
				<div class="card mb-3 w-100">
					<div class="row no-gutters">
						<div class="col-md-4">
							<img src="img/partner1.jpg" class="card-img" alt="...">
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<h5 class="card-title">Партнер 2</h5>
								<p class="mb-1"><i class="fas fa-phone-alt"></i> 8-800-800-80-80</p>
								<p><i class="fas fa-envelope"></i> mail@mail.ru</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 mb-4">
				<div class="card mb-3 w-100">
					<div class="row no-gutters">
						<div class="col-md-4">
							<img src="img/partner1.jpg" class="card-img" alt="...">
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<h5 class="card-title">Партнер 3</h5>
								<p class="mb-1"><i class="fas fa-phone-alt"></i> 8-800-800-80-80</p>
								<p><i class="fas fa-envelope"></i> mail@mail.ru</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 mb-4">
				<div class="card mb-3 w-100">
					<div class="row no-gutters">
						<div class="col-md-4">
							<img src="img/partner1.jpg" class="card-img" alt="...">
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<h5 class="card-title">Партнер 4</h5>
								<p class="mb-1"><i class="fas fa-phone-alt"></i> 8-800-800-80-80</p>
								<p><i class="fas fa-envelope"></i> mail@mail.ru</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
-->
		
<?php include 'footer.php'; ?>