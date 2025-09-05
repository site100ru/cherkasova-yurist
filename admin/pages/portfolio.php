<!-- Blog -->
<a name="blog"></a>
<div class="container-fluid bg-light" style="padding-top: 50px; padding-bottom: 25px;">
	<div class="container">
		<div class="row">
			<div class="col">
				<h2 style="text-align: center;">Добавить новое портфолио</h2>
			</div>
		</div>
		<div class="row justify-content-center" style="padding-top: 50px; padding-bottom: 25px;">
			<div class="col-md-5">
				<form method="post" action="" enctype="multipart/form-data">
					<input type="hidden" name="page2" value="portfolio">
					<input type="file" name="fileName">
					<button type="submit" name="add-portfolio" class="btn btn-danger">Добавить</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Blog -->

<!-- Catalog -->
<a name="services" style="position: relative; top: -40px;"></a>
<div class="container-fluid bg-light" style="padding-top: 25px; padding-bottom: 50px;">
	<div class="container">
		<div class="row">
			<div class="col">
				<h2 style="text-align: center;">Добавленное портфолио</h2>
			</div>
		</div>
		<div class="row">
			<?php
				$result = mysqli_query($connection, "SELECT * FROM `portfolio` ORDER BY `id`");
				while ($record = mysqli_fetch_assoc($result)) { echo '
					<div class="col-md-3" style="padding: 25px 15px; text-align: center;">
						<form method="get" action="">
							<input type="hidden" name="page2" value="portfolio">
							<input type="hidden" name="id" value="'.$record['id'].'">
							<img src="../img/portfolio/'.$record['image'].'" class="img-thumbnail" style="width: 100%;">
							<button type="submit" name="del-portfolio" class="btn btn-sm btn-danger" style="margin-top: 15px;">Удалить</button>
						</form>
					</div>';
				}
			?>	
		</div>
	</div>
</div>
<!-- /Catalog -->
