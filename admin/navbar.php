<?php

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

?>

<!-- Navbar -->
<div class="container-fluid bg-dark">
	<nav class="container navbar navbar-expand-lg navbar-dark">
		<a class="navbar-brand" href="#" style="position: relative; top: -2px;">SITE<span style="color: #dc3545;">100</span>.RU<span id="navbar-title"> - Система управления сайтом</span></a>
		
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item"><a class="nav-link" href="main-adm">Общие настройки</a></li>
				<!--
				<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#">Страницы</a>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="#">Главная</a></li>
						<li><a class="dropdown-item" href="#">Услуги</a></li>
						<li><a class="dropdown-item" href="#">Партнеры и сотрудники</a></li>
						<li><a class="dropdown-item" href="#">Наши клиенты</a></li>
						<li><a class="dropdown-item" href="#">Новости</a></li>
						<li><a class="dropdown-item" href="info">Полезная информация</a></li>
						<li><a class="dropdown-item" href="#">Контакты</a></li>
					</ul>
				</li>
				-->
				<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="services">Услуги</a>
					<ul class="dropdown-menu">
						
						<?php

							$result = mysqli_query($connection, "SELECT * FROM `services`");
							while ($record = mysqli_fetch_assoc($result)) {
								// Находим пункт меню у которого нет родителя
								if ($record['serviceParentID'] == 0) {
									// Сохраняем его ID
									$serviceID = $record['serviceID'];
									$serviceName = $record['serviceName'];
									menu($serviceID, $serviceName);
									
								}
							}

						?>
					
					</ul>
						
						<?php		
							
							function menu($serviceID, $serviceName) {
								$db_host = 'localhost';
                                $db_name = 'u0782724_default';
                                $db_user = 'u0782724_default';
                                $db_password = 'gZtpFq3_';
								$connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);
								// Делаем правильную кодировку
                            	mysqli_query($connection, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
                            	mysqli_query($connection, "SET CHARACTER SET 'utf8'"); 
								// Проверяем есть ли у него дети
								$result = mysqli_query($connection, "SELECT * FROM `services` WHERE `serviceParentID` = '$serviceID'");
								$record = mysqli_fetch_assoc($result);
								if ($record) {
									// Если дети есть, то...
									echo '<li class="dropdown"><a class="dropdown-item dropdown-toggle" href="index.php?page=service-content&serviceID='.$serviceID.'">' . $serviceName . '</a>';
									echo '<ul class="dropdown-menu">';
									$result = mysqli_query($connection, "SELECT * FROM `services` WHERE `serviceParentID` = '$serviceID'");
									while ($record = mysqli_fetch_assoc($result)) {
										$serviceID = $record['serviceID'];
										$serviceName = $record['serviceName'];
										menu($serviceID, $serviceName);
									}
									echo '</ul></li>';
								} else {
									// Если детей нет, то...
									echo '<li><a class="dropdown-item" href="index.php?page=service-content&serviceID='.$serviceID.'">' . $serviceName . '</a></li>';
									
								}
					
							}
					
							
							/*
							$result = mysqli_query($connection, "SELECT * FROM `services`");
							while ($record = mysqli_fetch_assoc($result)) {

								if (!isset($serviceParenCategory)) {
									echo '
										<li class="dropdown"><a class="dropdown-item dropdown-toggle" 	href="index.php?page=service-content&serviceID='.$record['serviceID'].'">'.$record['serviceCategory'].'</a>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="index.php?page=service-content&serviceID='.$record['serviceID'].'">'.$record['serviceTitle'].'</a></li>
									';
									$serviceParenCategory = $record['serviceParenCategory'];
								} else if ($serviceParenCategory != $record['serviceParenCategory']) {
									echo '
										</ul></li>
										<li class="dropdown"><a class="dropdown-item dropdown-toggle" 	href="index.php?page=service-content&serviceID='.$record['serviceID'].'">'.$record['serviceCategory'].'</a>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="index.php?page=service-content&serviceID='.$record['serviceID'].'">'.$record['serviceTitle'].'</a></li>
									';
									$serviceParenCategory = $record['serviceParenCategory'];
								} else {
									echo '
										<li><a class="dropdown-item" href="index.php?page=service-content&serviceID='.$record['serviceID'].'">'.$record['serviceTitle'].'</a></li>
									';
									$serviceParenCategory = $record['serviceParenCategory'];
								}
							}
							echo '
								</ul></li>
							';
							*/
						?>
						<!--
						<li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#">Услуги для граждан</a>
							<ul class="dropdown-menu">
								<li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#">Дела об административных правонарушениях</a>
									<ul class="dropdown-menu">
										<li><a class="dropdown-item" href="#">Возврат прав на управление авто</a></li>
										<li><a class="dropdown-item" href="#">Оспорить штраф</a></li>
										<li><a class="dropdown-item" href="#">Оспаривание действий (бездействий) гос. органов и должностных лиц</a></li>
										<li><a class="dropdown-item" href="#">Иные дела об административных правонарушениях</a></li>
									</ul>
								</li>
								<li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#">Семейные споры</a>
									<ul class="dropdown-menu">
										<li><a class="dropdown-item" href="#">Возврат прав на управление авто</a></li>
										<li><a class="dropdown-item" href="#">Оспорить штраф</a></li>
										<li><a class="dropdown-item" href="#">Оспаривание действий (бездействий) гос. органов и должностных лиц</a></li>
										<li><a class="dropdown-item" href="#">Иные дела об административных правонарушениях</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#">Услуги для организаций</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="#">Арбитражные споры</a></li>
								<li><a class="dropdown-item" href="#">Юридическое сопровождеине</a></li>
								<li><a class="dropdown-item" href="#">Защита интересов в государственных органах</a></li>
								<li><a class="dropdown-item" href="#">Защита интересов в Федеральной службы</a></li>
								<li><a class="dropdown-item" href="#">Коорпоративное право</a></li>
								<li><a class="dropdown-item" href="#">Юридическое сопровождение</a></li>
							</ul>
						</li>
						-->
					</ul>
				</li>
			</ul>
			<form class="form-inline my-2 my-lg-0">
				<button type="submit" class="btn btn-danger" name="exit">Выйти</button>
			</form>
		</div>
	</nav>
</div>
<!-- Navbar -->