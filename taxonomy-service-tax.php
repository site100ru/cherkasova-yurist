<?php
	
	/*
		Template Name: Услуги
		Template Post Type: service, service-tax
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
	
<div id="people-sevices" class="container-fluid bg-white pt-5 pb-5">
	<div class="container">
		<div class="row">
			<div class="col text-center mb-4">
				<h2><?php echo $term_name; ?></h2>
			</div>
		</div>
		<div class="row justify-content-center align-items-center">
			<div class="col">
				<?php
					
					/*
					// Если есть подкатегории, то выводим спосок подкатегорий
					$categories = get_categories( [
						'taxonomy'     => 'service-tax',
						'type'         => 'service',
						'child_of'     => '',
						'parent'       => '',
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
							//echo '<p><a href="'.get_category_link( $cat->term_id ).'">'.$cat->name.'</a></p>'; // (Рубрика 1)
							echo '<p>'.$cat->category_description.'</p>'; // (Текст описания)
							// $cat->slug (rubrika-1)
							// $cat->term_group (0)
							// $cat->term_taxonomy_id (4)
							// $cat->taxonomy (category)
							
							// $cat->parent (0)
							// $cat->count (14)
							// $cat->object_id (2743)
							// $cat->cat_ID (4)
							// $cat->category_count (14)
							// $cat->category_description (Текст описания)
							// $cat->cat_name (Рубрика 1)
							// $cat->category_nicename (rubrika-1)
							// $cat->category_parent (0)

						}
					}
					*/
					
					$category = get_term( $term_id );
					echo '<p>'.$category->description.'</p>';
				?>
			</div>
		</div>
	</div>
</div>
		
<div id="company-sevices" class="container-fluid bg-light pt-5 pb-5">
	<div class="container">
		<div class="row">
			<div class="col text-center mb-4">
				<h2><?php echo $term_name; ?></h2>
			</div>
		</div>
		<div class="row justify-content-center align-items-center">
			<?php
				// Если подкатегорий нет, то выводим список записей
				// WordPress standart loop
				// проверяем есть ли посты в глобальном запросе - переменная $wp_query
				if( have_posts() ){
					// перебираем все имеющиеся посты и выводим их
					while( have_posts() ){ the_post(); ?>
						
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
			?>
		</div>
	</div>
</div>
		
<?php include 'footer.php'; ?>