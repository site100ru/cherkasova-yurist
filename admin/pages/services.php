<!-- Services -->
<div class="container-fluid pt-5 pb-5" style="background: url(img/bg.jpg); min-height: 100vh;">
	<div class="container">
		<div class="row">
			<div class="col">
				<h2 class="text-center">Добавить услугу</h2>
			</div>
		</div>
		<div class="row justify-content-center" style="padding-top: 15px; padding-bottom: 25px;">
			<div class="col-md-10">
				<form method="post" action=""><!--enctype="multipart/form-data"-->
					<label for="serviceParentName">Выберите родительскую услугу:</label>
					<p><select class="form-control" id="serviceParentName" name="serviceParentName">
						<option value="0">Нет родительской услуги</option>
						<?php
						
							$result3 = mysqli_query($connection, "SELECT * FROM `services`");
							while ($record3 = mysqli_fetch_assoc($result3)) {
								echo '
									<option value="'.$record3['serviceID'].'">'.$record3['serviceName'].'</option>
								';
							}
						
						?>
					</select></p>
					<label for="serviceName">Название услуги:</label>
					<p><input type="text" class="form-control" name="serviceName" required></p>
					<label for="serviceContent">Описание услуги:</label>
					<p><textarea id="summernote" class="form-control" name="serviceContent"></textarea></p>
					<script>
						$('#summernote').summernote({
							tabsize: 2,
							height: 100,
							toolbar: [
								['bold'],
								['italic'],
								['underline'],
								['clear'],
								['ul'],
								['ol'],
								['paragraph'],
								['codeview']
							]
						});
					</script>
					<!--
					<p><input type="file" name="filename" style="max-width: 250px; margin: auto;" required>
					-->
					<p class="text-center"><button name="addService" type="submit" class="btn btn-danger">Добавить</button></p>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Services -->

<!-- Catalog --
<a name="services" style="position: relative; top: -40px;"></a>
<div class="container-fluid bg-light" style="padding-top: 25px; padding-bottom: 50px;">
	<div class="container">
		<div class="row">
			<div class="col">
				<h2 style="text-align: center;">Добавленные акции</h2>
			</div>
		</div>
		<div class="row justify-content-center" style="margin: 15px auto; margin-bottom: 25px;">
			<div class="col-md-9">
				<div class="row" style="margin-bottom: 25px;">
					<?php /*
						$result = mysqli_query($connection, "SELECT * FROM `actions` ORDER BY `id` DESC");	
						while (($record = mysqli_fetch_assoc($result))) {
							echo '
							<form method="post" action="">	
								<input type="hidden" name="id" value="'.$record['id'].'">
								<div class="col-12">
									<h5 style="border-bottom: 1px solid lightgrey; padding-bottom: 10px; font-size: 1.2rem;"><span style="font-size: 1.1rem; font-weight: 300; margin-bottom: 7px; color: rgba(0,0,0,0.5);">'.$record['date'].'</span> <input name="title" value="'.$record['title'].'"></h5>
								</div>
								<div class="row" style="margin: 15px auto; margin-bottom: 25px;">
									<div class="col-xl-4">
										<img src="../img/actions/'.$record['image'].'" class="img-thumbnail" style="width: 95%;">
									</div>
									<div class="col-xl-8">
										<p style="font-weight: 300;"><textarea name="text" style="width: 100%;">'.$record['text'].'</textarea></p>
										<button type="submit" class="btn btn-sm btn-success" name="edit-action">Сохранить</button>
										<button type="submit" class="btn btn-sm btn-danger" name="del-action">Удалить</button>
									</div>
								</div>
							</form>';
						} */
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Catalog -->