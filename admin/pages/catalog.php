<!-- Blog -->
<a name="blog"></a>
<div class="container-fluid bg-light" style="background: url(img/bg.jpg); padding-top: 50px; padding-bottom: 25px;">
	<div class="container">
		<div class="row">
			<div class="col">
				<h2 style="text-align: center;">Добавить новый товар</h2>
			</div>
		</div>
		<div class="row justify-content-center" style="padding-top: 15px; padding-bottom: 25px;">
			<div class="col-md-6">
				<form method="post" action="" enctype="multipart/form-data">
					<!--<input type="hidden" name="page2" value="catalog">-->
					<!--
					<p><select class="form-control" name="category" required>
						<option value="Товары со скидкой">Товары со скидкой</option>
						<option value="Товары по акции">Товары по акции</option>
					</select></p>
					-->
					<p><input type="text" class="form-control" name="title" placeholder="Введите название товара" style="display: inline;" required></p>
					<p><textarea class="form-control" name="description" placeholder="Введите описание товара"></textarea></p>
					<p><input type="text" class="form-control" name="price" placeholder="Введите цену товара" style="display: inline;" required></p>
					<p><input type="text" class="form-control" name="discount_price" placeholder="Введите цену товара со скидкой" style="display: inline;" required></p>
					<p><input type="file" name="fileName"><button type="submit" name="add-goods" class="btn btn-sm btn-danger" style="float: right;">Добавить товар</button><p>
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
				<h2 style="text-align: center;">Добавленные товары</h2>
			</div>
		</div>
		<div class="row" style="margin-top: 15px; margin-bottom: 25px;">
			<?php
				$result = mysqli_query($connection, "SELECT * FROM `goods` WHERE `category` = 'Товары со скидкой' ORDER BY `title`");
				while (($record = mysqli_fetch_assoc($result))) { echo '
					<div class="col-md-3">
						<div class="card border-danger" style="width: 100%; margin: 15px auto;">
							<img class="card-img-top" src="../img/goods/'.$record['image'].'" alt="Лендинг пейдж">
							<div class="card-body">
								<form method="get" action="">
									<input type="hidden" name="id" value="'.$record['id'].'">
									<ul style="list-style: none; padding-left: 0;">
										<li style="margin-bottom: 5px;"><span style="font-weight: 500;">Название:</span> <span style="color: rgba(0,0,0,.65); font-weight: 300;"><input class="form-control form-control-sm" name="title" value="'.$record['title'].'"></h5>
										<li style="margin-bottom: 5px;"><span style="font-weight: 500;">Описание:</span> <span style="color: rgba(0,0,0,.65); font-weight: 300;"><textarea class="form-control form-control-sm" name="description">'.$record['description'].'</textarea></span></li>
										<li><span style="font-weight: 500;">Цена:</span> <span style="color: rgba(0,0,0,.5);"><strike><input class="form-control form-control-sm" name="price" value="'.$record['price'].'"></strike></span></li>
										<li><span style="font-weight: 500;">Цена со скидкой:</span> <span style="color: rgba(0,0,0,.5);"><input class="form-control form-control-sm" name="discount_price" value="'.$record['discount_price'].'"></span></li>
									</ul>
									<div style="text-align: center;">
										<button type="submit" name="edit-goods" class="btn btn-sm btn-success">Сохранить</button>
										<button type="submit" name="del-goods" class="btn btn-sm btn-danger">Удалить</button>
									</div>
								</form>
							</div>
						</div>
					</div>';
				}
			?>
		</div>
	</div>
</div>
<!-- /Catalog -->
