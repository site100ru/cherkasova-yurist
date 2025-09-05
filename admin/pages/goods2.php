<?php
	// Что то связано с ошибкой и удалением всех товаров
	if (isset($_SESSION['error'])) {
		echo '<p style="color: red; text-align: center;">'.$_SESSION['error'].'</p>';
		unset($_SESSION['error']);
	}
?>

<!-- Goods 2 -->
<div class="container-fluid bg-light">
	<h1 style="text-align: center;">Настройки товаров 2</h1>
	<!-- Add new goods 2 -->
	<div class="container">
		<hr>
		<div class="row justify-content-center">
			<div class="col-md-8">
				<h2 style="text-align: center;">Добавить новый товар 2</h2>
				<form method="post" action="" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-6">
							<input type="hidden" name="thisPage" value="goods2<?php if (isset($_GET['category'])) echo '&category='.$_GET['category']; ?>">
							<p><input type="text" class="form-control" name="category" placeholder="Введите категорию товара" required pattern="[^\f\n\r\t\v]+$"></p>
							<p><input type="text" class="form-control" name="title" placeholder="Введите название товара" required pattern="[^\f\n\r\t\v]+$"></p>
							<p><textarea class="form-control" id="description" name="description" placeholder="Введите описание товара"></textarea></p>
							<script>						
								/*
								$('#description').summernote({
									placeholder: 'Введите описание товара',
									tabsize: 2,
									height: 150,
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
								*/
							</script>		
						</div>
						<div class="col-md-6">
							<div class="row">
								<div class="col">
									<p><input type="text" class="form-control" name="price1" placeholder="Стоимость 1" required></p>
								</div>
								<div class="col">
									<p><input type="text" class="form-control" name="price2" placeholder="Стоимость 2"></p>
								</div>
							</div>
							
							<p><input type="file" name="files[]" multiple/></p>
							
							<p><div class="form-check"><input type="checkbox" class="form-check-input" name="display" value="1" id="display" checked>Отображать товар на сайте</div></p>
							<p><div class="form-check"><input type="checkbox" class="form-check-input" name="discount" value="0" id="discount">Отображать на странице "Товары со скидкой"</div></p>
						</div>

					</div>
					<button type="submit" name="add-goods2" class="btn btn btn-success" style="display: block; margin: auto;">Добавить</button>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<hr>
			</div>
		</div>
	</div>
	<!-- /Add new goods -->

	<!-- Output of goods -->
	<div class="container" style="padding-bottom: 25px;">
		<h2 style="text-align: center;">Добавленные товары 2</h2>
		<div class="row">
			
			<!-- Left menu -->
			<div class="col-md-3">
				<div class="row">
					<div class="col">
						<h3>Меню</h3>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col">
						<ul class="nav flex-column">
							<li class="nav-item">
								<a class="nav-link active" href="index.php?page=goods2">Все товары</a>
							</li>
							<?php
								// Выбераем все категории из БД
								$result = mysqli_query($connection, "SELECT * FROM `goods2` ORDER BY `category` DESC");
								while ($record = mysqli_fetch_assoc($result)) {
									if ($record['category'] != $category) {
										echo '
										<li class="nav-item">
											<a class="nav-link" href="index.php?page=goods2&category='.$record['category'].'">'.$record['category'].'</a>
										</li>';
										$category = $record['category'];
									}
								}
							?>
						</ul>
					</div>
				</div>
			</div>
			<!-- /Left menu -->
			
			<!-- Output of goods -->
			<div class="col-md-9">
				<div class="row">
					<div class="col">
						<?php
							if (isset($_GET['category'])) {
								echo '<h3 style="text-align: center;">'.$_GET['category'].'</h3>';
							} else {
								echo '<h3 style="text-align: center;">Все товары</h3>';
							}
						?>
					</div>
				</div>
				<hr>
				<div class="row">
					<!-- Category cards-->
					<?php
						
						// ЕСЛИ ЕСТЬ КОНКРЕТНАЯ КАТЕГОРИЯ
						if (isset($_GET['category'])) {
							$category = $_GET['category'];
							
							// Делаем пагинацию
							if (isset($_GET['str'])) {
								$str = $_GET['str']; // $str - номер страницы
							} else { $str = 1; }
							
							$notes = 15; // Количество записей на странице
							$from = ($str - 1) * $notes; // С какой записи начинать
							
							// Output card of goods
							$result = mysqli_query($connection, "SELECT * FROM `goods2` WHERE `category` = '$category' ORDER BY `id` DESC LIMIT $from, $notes");
							$countCard = 0;
							while ($record = mysqli_fetch_assoc($result)) {
								// Выбираем первую картинку для показа в карточке товара
								if (file_exists ('../img/goods2/'.translit($record['category']).'/'.translit($record['title']))) {
									$files = scandir('../img/goods2/'.translit($record['category']).'/'.translit($record['title']));
									foreach ($files as $file) {
										if ($file != '.' and $file != '..') {
											$fileName = $file;
											break;
										}
									}
								}
								
								echo '
									<div class="col-md-4">
										<div class="card" style="width: 100%; margin: 15px auto;">
											<div class="img-div">
												<img src="../img/goods2/'.translit($record['category']).'/'.translit($record['title']).'/'.$fileName.'" class="card-img-top" alt="'.$record['title'].'">
											</div>
											<div class="card-body" style="text-align: center; background: white;">
												<h5 class="card-title" style="min-height: 50px;"><a href="index.php?page=goods2-description&category='.urlencode($record['category']).'&title='.urlencode($record['title']).'" style="color: rgb(50,50,50);">'.$record['title'].'</a></h5>';
												$title = $record['title'];
												$result2 = mysqli_query($connection, "SELECT * FROM `goods` WHERE `title` = '$title'");
												$record2 = mysqli_fetch_assoc($result2);
												echo '
											</div>
										</div>
									</div>
								';
							}
							
							?>
							
							<!-- Pagination -->
							<div class="col-12">
								<?php
									$result3 = mysqli_query($connection, "SELECT * FROM `goods2` WHERE `category` = '$category'");
									while ($record3 = mysqli_fetch_assoc($result3)) {
										$count = $count + 1;
									}
									$strCount = ceil($count / $notes);
								?>

								<nav aria-label="Page navigation example" style="margin-top: 25px; margin-bottom: 0; padding: 0;">
									<ul class="pagination justify-content-center" style="margin: 0;">
										<?php
											$prev = $str - 1;
											$next = $str + 1;
											
											if ($str != 1) {
												echo '<li class="page-item"><a class="page-link" href="index.php?page=goods2&category='.$category.'&str='.$prev.'">Назад</a></li>';
											} else {
												echo '<li class="page-item disabled"><a class="page-link" href="index.php?page=goods2&category='.$category.'&str='.$prev.'">Назад</a></li>';
											}
											
											for ($i = 1; $i <= $strCount; $i++) {
												if ($str == $i) {
													echo '<li class="page-item active"><a class="page-link" href="index.php?page=goods2&category='.$category.'&str='.$i.'">'.$i.'</a></li>';
												} else { 
													for ($j = 1; $j <= 5; $j++) {
														if (($str + $j == $i) or ($str - $j == $i)) {
															echo '<li class="page-item"><a class="page-link" href="index.php?page=goods2&category='.$category.'&str='.$i.'">'.$i.'</a></li>';
														}
													}
												}
											}
											
											if ($str < $strCount) {
												echo '<li class="page-item"><a class="page-link" href="index.php?page=goods2&category='.$category.'&str='.$next.'">Вперед</a></li>';
											} else {
												echo '<li class="page-item disabled"><a class="page-link" href="index.php?page=goods2&category='.$category.'&str='.$next.'">Вперед</a></li>';
											}
										?>
									</ul>
								</nav>
							</div>
							<!-- /Pagination -->
							<?php

							
						// Output card without category
						// ***************************************************************************
						} else {
							
							// Делаем пагинацию
							if (isset($_GET['str'])) {
								$str = $_GET['str']; // $str - номер страницы
							} else { $str = 1; }
							
							$notes = 15; // Количество записей на странице
							$from = ($str - 1) * $notes; // С какой записи начинать
							
							// Output card of goods
							$result = mysqli_query($connection, "SELECT * FROM `goods2` ORDER BY `id` DESC LIMIT $from, $notes");
							$countCard = 0;
							while ($record = mysqli_fetch_assoc($result)) {
								// Выбираем первую картинку для показа в карточке товара
								if (file_exists ('../img/goods2/'.translit($record['category']).'/'.translit($record['title']))) {
									$files = scandir('../img/goods2/'.translit($record['category']).'/'.translit($record['title']));
									foreach ($files as $file) {
										if ($file != '.' and $file != '..') {
											$fileName = $file;
											break;
										}
									}
								}
								
								echo '
									<div class="col-md-4">
										<div class="card" style="width: 100%; margin: 15px auto;">
											<div class="img-div">
												<img src="../img/goods2/'.translit($record['category']).'/'.translit($record['title']).'/'.$fileName.'" class="card-img-top" alt="'.$record['title'].'">
											</div>
											<div class="card-body" style="text-align: center; background: white;">
												<h5 class="card-title" style="min-height: 50px;"><a href="index.php?page=goods2-description&category='.urlencode($record['category']).'&title='.urlencode($record['title']).'" style="color: rgb(50,50,50);">'.$record['title'].'</a></h5>';
												$title = $record['title'];
												$result2 = mysqli_query($connection, "SELECT * FROM `goods` WHERE `title` = '$title'");
												$record2 = mysqli_fetch_assoc($result2);
												echo '
											</div>
										</div>
									</div>
								';
							}
							
							?>
							
							<!-- Pagination -->
							<div class="col-12">
								<?php
									$result3 = mysqli_query($connection, "SELECT * FROM `goods2`");
									while ($record3 = mysqli_fetch_assoc($result3)) {
										$count = $count + 1;
									}
									$strCount = ceil($count / $notes);
								?>

								<nav aria-label="Page navigation example" style="margin-top: 25px; margin-bottom: 0; padding: 0;">
									<ul class="pagination justify-content-center" style="margin: 0;">
										<?php
											$prev = $str - 1;
											$next = $str + 1;
											
											if ($str != 1) {
												echo '<li class="page-item"><a class="page-link" href="index.php?page=goods2&str='.$prev.'">Назад</a></li>';
											} else {
												echo '<li class="page-item disabled"><a class="page-link" href="index.php?page=goods2&str='.$prev.'">Назад</a></li>';
											}
											
											for ($i = 1; $i <= $strCount; $i++) {
												if ($str == $i) {
													echo '<li class="page-item active"><a class="page-link" href="index.php?page=goods2&str='.$i.'">'.$i.'</a></li>';
												} else { 
													for ($j = 1; $j <= 5; $j++) {
														if (($str + $j == $i) or ($str - $j == $i)) {
															echo '<li class="page-item"><a class="page-link" href="index.php?page=goods2&str='.$i.'">'.$i.'</a></li>';
														}
													}
												}
											}
											
											if ($str < $strCount) {
												echo '<li class="page-item"><a class="page-link" href="index.php?page=goods2&str='.$next.'">Вперед</a></li>';
											} else {
												echo '<li class="page-item disabled"><a class="page-link" href="index.php?page=goods2&str='.$next.'">Вперед</a></li>';
											}
										?>
									</ul>
								</nav>
							</div>
							<!-- /Pagination -->
							<?php
						}
						// Output card without category
					?>
					
				</div>
			</div>
		</div>
	</div>
	<!-- Output of goods -->
</div>
<!-- Goods 2 -->