<?php
	
	/*
		Template Name: Выигранные дела
		Template Post Type: page
	*/
	
	// get_header();
	
	include 'header.php';
	
	$term_id = get_queried_object()->term_id;
	$post_title = get_queried_object()->post_title;
	
?>

<div id="main" class="container-fluid">
	<div class="overlay">
	</div>
	<div class="container pt-5 pb-5">
		<div class="row justify-content-end text-white">
			<div class="col">
				<h1 class="text-white text-center"><?php echo $post_title; ?></h1>
			</div>
		</div>
	</div>
</div>
		
<div id="people-sevices" class="container-fluid bg-white pt-5 pb-5">
	<div class="container">
		<div class="row justify-content-center align-items-center">
			<div class="serviceContent" class="col">
				<?php echo $record['serviceContent']; ?>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row justify-content-center align-items-center">
			
			<?php
			
				// WordPress standart loop
				// проверяем есть ли посты в глобальном запросе - переменная $wp_query
				if( have_posts() ){
					// перебираем все имеющиеся посты и выводим их
					while( have_posts() ){ the_post(); ?>

						<div class="col">
							<?php the_content(); ?>
						</div>
						
					<?php }
				}
			
			?>
			
		</div>
	</div>
</div>
		
<?php include 'footer.php'; ?>