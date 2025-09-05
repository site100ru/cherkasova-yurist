<?php
	
	/*
		Template Name: Страница выигранных дел
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
				<h1 class="text-white text-center">Примеры выигранных дел</h1>
			</div>
		</div>
	</div>
</div>

<!-- Won cases -->
<div id="won-cases" class="container-fluid bg-light pt-5 pb-5">
	<div class="container py-5">
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
		
<?php include 'footer.php'; ?>