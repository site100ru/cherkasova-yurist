<!-- News -->
<a name="news"></a>
<div class="container-fluid" style="background: url(img/bg.jpg); padding-top: 50px; padding-bottom: 25px;">
	<div class="container">
		<div class="row">
			<div class="col">
				<h2 style="text-align: center;">Добавление новостей</h2>
			</div>
		</div>
		<div class="row justify-content-center" style="padding-top: 15px; padding-bottom: 25px;">
			<div class="col-md-6">
				<form method="post" action="index.php" enctype="multipart/form-data">
					<p><input type="text" class="form-control" name="news-title" placeholder="Введите заголовок новости" required></p>
					<p><textarea class="form-control" name="news-text" placeholder="Введите текст новости" required></textarea></p>
					<p><input type="file" name="filename" style="max-width: 250px; margin: auto;" required><button name="add-news" type="submit" class="btn btn-sm btn-danger"  style="float: right;">Добавить</button></p>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Catalog -->
<a name="services" style="position: relative; top: -40px;"></a>
<div class="container-fluid bg-light" style="padding-top: 25px; padding-bottom: 50px;">
	<div class="container">
		<div class="row">
			<div class="col">
				<h2 style="text-align: center;">Добавленные новости</h2>
			</div>
		</div>
		<div class="row justify-content-center" style="margin: 15px auto; margin-bottom: 25px;">
			<div class="col-md-9">
				<div class="row" style="margin-bottom: 25px;">
					<?php
						$result = mysqli_query($connection, "SELECT * FROM `news` ORDER BY `id` DESC");	
						while (($record = mysqli_fetch_assoc($result))) {
							echo '
							<form method="post" action="">	
								<input type="hidden" name="id" value="'.$record['id'].'">
								<div class="col-12">
									<h5 style="border-bottom: 1px solid lightgrey; padding-bottom: 10px; font-size: 1.2rem;"><span style="font-size: 1.1rem; font-weight: 300; margin-bottom: 7px; color: rgba(0,0,0,0.5);">'.$record['date'].'</span> <input name="title" value="'.$record['title'].'"></h5>
								</div>
								<div class="row" style="margin: 15px auto; margin-bottom: 25px;">
									<div class="col-xl-4">
										<img src="../img/news/'.$record['image'].'" class="img-thumbnail" style="width: 95%;">
									</div>
									<div class="col-xl-8">
										<p style="font-weight: 300;"><textarea name="text" style="width: 100%;">'.$record['text'].'</textarea></p>
										<button type="submit" class="btn btn-sm btn-success" name="edit-news">Сохранить</button>
										<button type="submit" class="btn btn-sm btn-danger" name="del-news">Удалить</button>
									</div>
								</div>
							</form>';
						} 
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Catalog -->
