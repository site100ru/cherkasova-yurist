<?php
	
	/*
		Template Name: Полезная информация
		Template Post Type: page
	*/
	
	// get_header();
	
	include 'header.php';
	
?>
		
<div id="main" class="container-fluid">
	<div class="overlay">
	</div>
	<div class="container pt-5 pb-5">
		<div class="row justify-content-end text-white">
			<div class="col">
				<h1 class="text-white text-center">Полезная информация</h1>
			</div>
		</div>
	</div>
</div>

<?php
	
	// Настройки БД
	$db_host = 'localhost';
	$db_name = 'u0525620_cherkasova';
	$db_user = 'u0525620_cherkas';
	$db_password = 'newPassw2020';

	// Подключение к БД
	$connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);

	// Делаем правильную кодировку
	mysqli_query($connection, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
	mysqli_query($connection, "SET CHARACTER SET 'utf8'");

	// Выбераем страницу
	if (!empty($_GET['page'])) $page = $_GET['page'];
		else $page = 'main';

	// Выбераем страницу в БД
	$result = mysqli_query($connection, "SELECT * FROM `pages` WHERE `page` = 'info'");
	$record = mysqli_fetch_assoc($result);
	
?>

<!-- Info -->
<div id="info" class="container-fluid bg-wjite pt-5 pb-5">
	<div class="container">
		<div class="row justify-content-center align-items-center">
			<div class="col-md-10">
				
				<?php echo $record['content']; ?>
				
			</div>
		</div>
	</div>
</div>
		
<?php include 'footer.php'; ?>