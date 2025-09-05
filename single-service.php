<?php
	
	/*
		Template Name: Выигранные дела
		Template Post Type: sevice
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
				<h1 class="text-white text-center">Наши услуги</h1>
			</div>
		</div>
	</div>
</div>

<div id="people-sevices" class="container-fluid bg-white pt-5 pb-5">
	<div class="container">
		<div class="row">
			<div class="col text-center mb-4">
				<h2><?php echo $post_title; ?></h2>
			</div>
		</div>
		<div class="row justify-content-center align-items-center">
			<div class="serviceContent" class="col">
				<?php echo $record['serviceContent']; ?>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row justify-content-center align-items-center">
			<div class="col">
				<?php
					if( have_posts() ){
						while( have_posts() ){ the_post();
							the_content();
						}
					}
				?>
			</div>
		</div>
	</div>
</div>
		
<?php include 'footer.php'; ?>