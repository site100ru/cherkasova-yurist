<?php
session_start();  // Открываем сессию для приема/отправки переменной $_SESSION содержащей переменную $win
if (isset($_SESSION['win'])) { // Если в переменной $_SESSION содержащая переменную $win существует что-то...
	unset($_SESSION['win']); // Обнуляем переменную $_SESSION содержащая переменную $win
	$display = "block"; // Переменной $display присваиваем значение "block"
} else { $display = "none"; } // Иначе переменной $display присваиваем значение "none"
/*
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
$result = mysqli_query($connection, "SELECT * FROM `pages` WHERE `page` = '$page'");
$record = mysqli_fetch_assoc($result);
*/
?>
<!doctype html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta property="og:locale" content="ru_RU" />
	<meta property="og:type" content="website" />
	<meta property="og:site_name" content="Юридические услуги в Рязани" />
	<meta property="og:title" content="<?php echo esc_attr($page_title); ?>" />
	<meta property="og:image" content="http://черкасова-юрист.рф/img/review.jpg" />
	<meta property="og:url" content="http://черкасова-юрист.рф/index.php" />
	<!--<link rel="canonical" href="http://юристы62.рф" />-->
	<meta name="description" content="Оказываем юридическую помощь в Рязани. Чтобы получить юридическую консультацию позвоните по телефону юриста 8 (910) 902-85-64" />
	<meta name="keywords" content="консультация юриста, телефон юриста, юридическая консультация рязань, адреса юридических консультаций, юридическая консультация рязань адреса, получить юридическую консультацию, консультация +по юридическим вопросам, где получить юридическую консультацию, юридическая помощь рязань, центр юридической помощи, помощь юридических вопросах, юридическая помощь" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<!-- Animate.css -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css">
	<!-- My CSS -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
	<!-- Font Awesome-->
	<script src="https://kit.fontawesome.com/064ae6a0a2.js"></script>
	
	<title><?php echo esc_html($page_title); ?></title>
	<!-- Yandex.Metrika counter >
		<script type="text/javascript" >
		   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
		   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
		   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

		   ym(55386946, "init", {
				clickmap:true,
				trackLinks:true,
				accurateTrackBounce:true,
				webvisor:true
		   });
		</script>
		<noscript><div><img src="https://mc.yandex.ru/watch/55386946" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
		< Yandex.Metrika counter -->
		<!-- Yandex.Metrika counter -->
		<script type="text/javascript" >
		   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
		   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
		   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

		   ym(70333189, "init", {
				clickmap:true,
				trackLinks:true,
				accurateTrackBounce:true,
				webvisor:true
		   });
		</script>
		<noscript><div><img src="https://mc.yandex.ru/watch/70333189" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
		<!-- /Yandex.Metrika counter -->
</head>
<body>

<header class="container-fluid text-white" style="background: linear-gradient(131.81deg, #000000 25.37%, #1A0F03 72.38%);">
	<!--div class="container">
		<div class="row align-items-center justify-content-center pt-3 pb-3">
			<div id="logo" class="col-md-3 text-center">
				<span class="font-italic">ООО ЮК</span><br>
				<span class="font-italic text-uppercase">"Черкасова и партнеры"</span><br>
			</div>
		</div>
	</div-->


	<nav class="navbar navbar-expand-lg navbar-dark">
		<div class="container">
			<!-- <a class="navbar-brand" href="#">Navbar</a> -->
			<button class="navbar-toggler m-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto justify-content-between w-100 text-uppercase">
					<li class="nav-item">
						<a class="pl-0 nav-link" href="http://черкасова-юрист.рф">Главная <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/выигранные-дела">Выигранные дела</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="http://xn----7sbahnwj7apgggn1dyg.xn--p1ai/услуги/">Услуги</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="http://xn----7sbahnwj7apgggn1dyg.xn--p1ai/%d0%bf%d1%80%d0%b0%d0%b9%d1%81/">Прайс</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/партнеры-и-сотрудники">Партнеры и сотрудники</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/наши-клиенты">Наши клиенты</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/новости">Новости</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/полезная-информация">Полезная информация</a>
					</li>
					<li class="nav-item">
						<a class="nav-link pr-0 " href="/контакты">Контакты</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container top-contacts" >
		<div class="row">
			<div class="col-md-4">
				<p><img src="<?php site_url(); ?>/wp-content/themes/lawyers/img/ico/ico-map.png" />г. Рязань, ул. Чапаева, дом 57, офис 3</p>
			</div>
			<div class="col-md-3">
				<a href="tel:89109028564" class="top-phone"><img src="<?php site_url(); ?>/wp-content/themes/lawyers/img/ico/ico-phone.png" /> 8 (910) 902-85-64</a>
			</div>
			<div class="col-md-3">
				<a href="mailto:lilccherkasova@yandex.ru"><img src="<?php site_url(); ?>/wp-content/themes/lawyers/img/ico/ico-mail.png" />lilccherkasova@yandex.ru</a>
			</div>
			<div class="col-md-2">
				<a class="call-back" data-toggle="modal" data-target="#exampleModal">обратный звонок</a>
			</div>
		</div>
	</div>
</header>