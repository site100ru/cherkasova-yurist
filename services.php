<?php
	
	/*
		Template Name: Услуги
		Template Post Type: page
	*/
	
	// get_header();
	
	include 'header.php';
	
	$term_id = get_queried_object()->term_id;
	$term_name = get_queried_object()->name;
	
?>
		
<div id="main" class="container-fluid">
	<div class="overlay">
	</div>
	<div class="container pt-5 pb-5">
		<div class="row justify-content-end text-white">
			<div class="col">
				<h1 class="text-white text-center">Наши услуги</h1>
			</div>
		</div>
	</div>
</div>
		
<div id="people-sevices" class="container-fluid bg-light pt-5 pb-5">
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

<div id="company-sevices" class="container-fluid bg-white pt-5 pb-5">
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

<div id="complementary-sevices" class="container-fluid bg-light pt-5 pb-5">
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
		
<?php include 'footer.php'; ?>