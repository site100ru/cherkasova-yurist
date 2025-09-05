<?php
	
	/*
		Template Name: Главная
		Template Post Type: page, service
	*/
	
	// get_header();
	
	include 'header.php';
	
?>
<section id="main-screen" class="container-fluid" style="background: linear-gradient(131.81deg, #000000 25.37%, #1A0F03 72.38%); margin-top:-3px;">
	<div class="row">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h1>Черкасова Лилия Сергеевна</h1>
					<h2>Юрист</h2>
					<p class="py-3">ДИРЕКТОР ООО ЮК «ЧЕРКАСОВА И ПАРТНЕРЫ»</p>
					<a class="consultation w-100 d-block text-white" data-toggle="modal" data-target="#exampleModal2">Получить консультацию</a>
					<div class="icons">
						<a href="https://wa.me/79109028564" onclick="ym(70333189,'reachGoal','click-whatsapp'); return true;" target="_blank"><img src="<?php site_url(); ?>/wp-content/themes/lawyers/img/ico/ico-whatsapp.png"></a>
						<a href="viber://chat?number=+79109028564" onclick="ym(70333189,'reachGoal','click-viber'); return true;" target="_blank"><img src="<?php site_url(); ?>/wp-content/themes/lawyers/img/ico/ico-viber.png"></a>
					</div>
				</div>
				<div class="col-md-6">
					<img src="<?php site_url(); ?>/wp-content/themes/lawyers/img/main-photo.png" class="img-fluid" />
				</div>
			</div>
		</div>
	</div>
</section>
<section id="advantages" class="container-fluid">
	<div class="row">
		<div class="container">
			<div class="row py-5">
				<div class="col-md-4">
					<div class="wrapper-adv">
						<img src="<?php site_url(); ?>/wp-content/themes/lawyers/img/ico/ico-opyt.png">
						<p>18 лет</p>
						<p>судебной практики</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="wrapper-adv">
						<img src="http://xn----7sbahnwj7apgggn1dyg.xn--p1ai/wp-content/uploads/2020/11/law-office.png">
						<p>13 лет</p>
						<p>в судах общей юрисдикции</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="wrapper-adv">
						<img src="http://xn----7sbahnwj7apgggn1dyg.xn--p1ai/wp-content/uploads/2020/11/city-hall.png">
						<p>5 лет</p>
						<p>в крупной компании</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>		

<!-- Won cases -->
<div id="won-cases" class="container-fluid bg-light pt-5 pb-5">
	<div class="container">
		<div class="row">
			<div class="col text-center mb-4">
				<h2>Примеры выигранных дел</h2>
			</div>
		</div>
		<div class="row justify-content-center align-items-center">
			
			<?php
				
				// Выводим все имеющиеся категории первого уровня
				$categories = get_categories( [
					'taxonomy'     => 'won-case-cat',
					'type'         => 'won-case',
					'child_of'     => 0,
					'parent'       => 0,
					'orderby'      => 'name',
					'order'        => 'ASC',
					'hide_empty'   => 1,
					'hierarchical' => 1,
					'exclude'      => '',
					'include'      => '',
					'number'       => 0,
					'pad_counts'   => false,
					// полный список параметров смотрите в описании функции http://wp-kama.ru/function/get_terms
				] );

				if( $categories ){
					foreach( $categories as $cat ){
						
						?>
						
							<div class="col-md-4 mb-4">
								<div class="card w-100 text-white" style="background: url(<?php echo get_template_directory_uri(); ?>/img/service6.jpg);">
									<div class="overlay">
									</div>
									<div class="card-body">
										<h5 class="card-title"><?php echo $cat->name; ?></h5>
										<a href="<?php echo get_category_link( $cat->term_id ); ?>" class="btn btn-primary">Подробнее</a>
									</div>
								</div>
							</div>
						
						<?php

					}
				}
				
			?>
										
		</div>
	</div>
</div>

<!--
<div id="first-block" class="container-fluid pt-5 pb-5">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-5">
				<ul class="pl-0">
					<li><h5><i class="fas fa-check"></i> Споры с застройщиком (приемка квартир)</h5></li>
					<li><h5><i class="fas fa-check"></i> Возврат прав</h5></li>
					<li><h5><i class="fas fa-check"></i> Штраф за перегруз</h5></li>
					<li><h5><i class="fas fa-check"></i> Кредитные споры с банками</h5></li>
					<li><h5><i class="fas fa-check"></i> Представительство в государственных органах, оспаривание действий (бездействий) и постановлений</h5></li>
				</ul>
			</div>
			<div class="col-md-7 text-justify">
				<p>Предоставляем Вам высококвалифицированную юридическую помощь в решении правовых вопросов любой сложности. Выстраиваем тактику защиты интересов клиентов, используя все тонкости законодательства. Предлагаем Вам индивидуальный подход и доступные цены. <strong>Единственная просьба, перед личным обращением предварительно записаться на прием удобным для Вас способом - по телефону, с помощью обратной связи на сайте либо по электронной почте.</strong></p>
			</div>
		</div>
	</div>
</div>

<section class="section-kpk container-fluid">
	<div class="row row_shadow">
		<div class="container">
			<div class="row">
				<div class="col pt-5 pb-5">
					<h3 class="text-center mb-4">Внимание вкладчиков КПК «Инвест Рязань»!</h3>
					<p>СУДЕБНЫМ РЕШЕНИЕМ Советского районного суда города Рязани от 05 ноября 2019 года по иску Центрального Банка Российской Федерации принято решение ЛИКВИДИРОВАТЬ КПК «Инвест Рязань».</p>
					<p>Судебное решение вступило в законную силу. Проводя собрание 28 ноября 2019 года в КДЦ «Октябрь» руководство кооператива уже знало о вынесенном судебном решении.</p>
					<p>Сейчас Вы имеете: закрытый офис, отсутствие персонала, отсутствие ответа на телефонные звонки, ОТСУТСТВИЕ ВОЗВРАТОВ ЗАЙМОВ.</p>
					<h4 class="text-center mb-3">НЕ бездействуйте!!!</h4>
					<p>Важно! По всем вопросам, если не знаете, что делать и куда обращаться, ВЫ (вкладчики) можете обратиться к юристам ЮРИДИЧЕСКОЙ КОМПАНИИ «Колиогло, Черкасова и партнеры».</p>
					<p>Наши специалисты владеют всеми законными способами защиты ваших прав, помогут составить все необходимые документы и предоставлять ваши интересы в судах и службе судебных приставов, в арбитражном деле о банкротстве кооператива.</p>
				</div>
			</div>
		</div>
	</div>
</section>
-->

<div id="people-sevices" class="container-fluid bg-white pt-5 pb-5">
	<div class="container">
		<div class="row">
			<div class="col text-center mb-4">
				<h2>Юридические услуги гражданам</h2>
			</div>
		</div>
		<div class="row justify-content-center align-items-center">
			<?php
				// Выводим все имеющиеся категории первого уровня
				$categories = get_categories( [
					'taxonomy'     => 'service-tax',
					'type'         => 'service',
					'child_of'     => '',
					'parent'       => 5,
					'orderby'      => 'name',
					'order'        => 'ASC',
					'hide_empty'   => 1,
					'hierarchical' => 1,
					'exclude'      => '',
					'include'      => '',
					'number'       => 0,
					'pad_counts'   => false,
					// полный список параметров смотрите в описании функции http://wp-kama.ru/function/get_terms
				] );

				if( $categories ){
					foreach( $categories as $cat ){
						?>
							<div class="col-md-4 mb-4">
								<div class="card w-100 text-white" style="background: url(<?php echo get_template_directory_uri(); ?>/img/service6.jpg);">
									<div class="overlay">
									</div>
									<div class="card-body">
										<h5 class="card-title"><?php echo $cat->name; ?></h5>
										<a href="<?php echo get_category_link( $cat->term_id ); ?>" class="btn btn-primary">Подробнее</a>
										<?php // echo $cat->cat_ID;?>
									</div>
								</div>
							</div>
						<?php
					}
				}
			?>						
		</div>
	</div>
</div>

<div id="company-sevices" class="container-fluid bg-light pt-5 pb-5">
	<div class="container">
		<div class="row">
			<div class="col text-center mb-4">
				<h2>Юридические услуги организациям</h2>
			</div>
		</div>
		<div class="row justify-content-center align-items-center">
			<?php
				// задаем нужные нам критерии выборки данных из БД
				$args = array(
					'post_type' => 'service',
					'service-tax' => 'юридические-услуги-организациям',
				);

				$query = new WP_Query( $args );

				// Цикл
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) { $query->the_post(); ?>
						<div class="col-md-4 mb-4">
							<div class="card w-100 text-white" style="background: url(<?php echo get_template_directory_uri(); ?>/img/service6.jpg);">
								<div class="overlay">
								</div>
								<div class="card-body">
									<h5 class="card-title"><?php the_title(); ?></h5>
									<a href="<?php the_permalink(); ?>" class="btn btn-primary">Подробнее</a>
								</div>
							</div>
						</div>
					<?php }
				} 
				// Возвращаем оригинальные данные поста. Сбрасываем $post.
				wp_reset_postdata();
			?>						
		</div>
	</div>
</div>

<div id="complementary-sevices" class="container-fluid bg-white pt-5 pb-5">
	<div class="container">
		<div class="row">
			<div class="col text-center mb-4">
				<h2>Дополнительные юридические услуги</h2>
			</div>
		</div>
		<div class="row justify-content-center align-items-center">
			<?php
				// задаем нужные нам критерии выборки данных из БД
				$args = array(
					'post_type' => 'service',
					'service-tax' => 'дополнительные-юридические-услуги',
				);

				$query = new WP_Query( $args );

				// Цикл
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) { $query->the_post(); ?>
						<div class="col-md-4 mb-4">
							<div class="card w-100 text-white" style="background: url(<?php echo get_template_directory_uri(); ?>/img/service6.jpg);">
								<div class="overlay">
								</div>
								<div class="card-body">
									<h5 class="card-title"><?php the_title(); ?></h5>
									<a href="<?php the_permalink(); ?>" class="btn btn-primary">Подробнее</a>
								</div>
							</div>
						</div>
					<?php }
				} 
				// Возвращаем оригинальные данные поста. Сбрасываем $post.
				wp_reset_postdata();
			?>						
		</div>
	</div>
</div>

<div class="container-fluid bg-light pt-5 pb-5">
	<div class="container">
		<div class="row">
			<div class="col text-center mb-4">
				<h2>Благодарности и отзывы клиентов за юридическую помощь</h2>
			</div>
		</div>
		<div class="client-feedback row align-items-center">
			<div class="col-md-3 offset-md-3 mb-4">
				<div class="zoom">
					<a href="<?php echo get_template_directory_uri(); ?>/img/lilya-opinion-1.jpg"><img src="<?php echo get_template_directory_uri(); ?>/img/lilya-opinion-1.jpg"></a>
				</div>
			</div>
			<div class="col-md-3 mb-4">
				<div class="zoom">
					<a href="<?php echo get_template_directory_uri(); ?>/img/lilya-opinion-2.jpg"><img src="<?php echo get_template_directory_uri(); ?>/img/lilya-opinion-2.jpg"></a>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="paerners" class="container-fluid bg-white pt-5 pb-5">
	<div class="container">
		<div class="row">
			<div class="col text-center mb-4">
				<h2>Партнеры и сотрудники</h2>
			</div>
		</div>
		<div class="row align-items-center">
			<div class="col-md-6 offset-md-3 mb-4">
				<div class="card mb-3 w-100">
					<div class="row no-gutters">
						<div class="col-md-4">
							<img src="http://xn----7sbahnwj7apgggn1dyg.xn--p1ai/wp-content/uploads/2022/03/cherkasova-urist.jpg" class="card-img" alt="...">
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<h5>Черкасова Лилия Сергеевна</h5>
								<p class="mb-1"><i class="fas fa-phone-alt"></i> <a href="tel:89109028564" class="text-dark">8 (910) 902-85-64</a></p>
								<p><i class="fas fa-envelope"></i> <a href="mailto:lilccherkasova@yandex.ru" class="text-dark">lilccherkasova@yandex.ru</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<!--
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
			-->
			
		</div>
	</div>
</div>

<?php include 'footer.php'; ?>