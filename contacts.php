<?php
	
	/*
		Template Name: Контакты
		Template Post Type: page
	*/
	
	include 'header.php';
	
?>
		
<div id="main" class="container-fluid">
	<div class="overlay">
	</div>
	<div class="container pt-5 pb-5">
		<div class="row justify-content-end text-white">
			<div class="col">
				<h1 class="text-white text-center">Контакты</h1>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid bg-light pt-5 pb-4">
	<div class="container">
		<div class="row justify-content-center align-items-center">
			<div class="col-md-6 mb-4">
				<p class="classp">Мы ждем Вас по адресу: <strong>г. Рязань, ул. Чапаева, дом 57, офис 3</strong></p>
				<p class="classp">Вы можете связаться с нами (в том числе предварительно записаться на прием) удобным для Вас способом - по телефону, с помощью обратной связи на сайте либо по электронной почте.</p>
			</div>
			<div class="col-md-6 mb-4">
				<div class="card mb-3 w-100">
					<div class="row no-gutters">
						<div class="col-md-4">
							<img src="http://xn----7sbahnwj7apgggn1dyg.xn--p1ai/wp-content/uploads/2020/11/lawyer.jpg" class="card-img" alt="...">
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<h5>Черкасова Лилия Сергеевна</h5>
								<p class="mb-1"><i class="fas fa-phone-alt"></i> <a href="tel:89109028564" class="text-dark">8 (910) 902-85-64</a></p>
								<p><i class="fas fa-envelope"></i> <a href="mailto:lilccherkasova@yandex.ru" class="text-dark">lilccherkasova@yandex.ru</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>					
		</div>
	</div>
</div>

<div id="map" class="container-fluid">
	<div class="row">
		<div class="col p-0">					
			<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A5c359fe65824cd01a24826d4e1253003a9767fca8db30be3e855cc84ecfe9983&amp;width=100%25&amp;height=400&amp;lang=ru_RU&amp;scroll=false"></script>
		</div>
	</div>
</div>

<div class="container-fluid bg-light pt-5 pb-4">
	<div class="container">
		<div class="row justify-content-end text-white">
			<div class="col">
				<h4 class="text-center" style="color: #1f497d;">Наши реквизиты</h4>
			</div>
		</div>
		<div class="row justify-content-center align-items-center">
			<div class="col-md-6 mb-4">
				<ul class="classp" style="text-align: center; list-style: none;">
					<li>ООО ЮК</li>
					<li>"Черкасова и партнеры"</li>
					<li>ОГРН 1196234010972</li>
				</ul>
			</div>
			<div class="col-md-6 mb-4">
				<ul class="classp" style="text-align: center; list-style: none;">
					<li>ИНН 6215032780</li>
					<li>КПП 621501001</li>
					<li>Юр. адрес: г. Рязань, ул. Чапаева, дом 57, офис 3</li>
				</ul>
			</div>
		</div>
	</div>
</div>
		
<?php include 'footer.php'; ?>