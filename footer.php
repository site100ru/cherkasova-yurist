<!-- Contacts -->
<div id="contacts" class="container-fluid">
	<div class="overlay-dark">
	</div>
	<div class="container pt-5 pb-5">
		<div class="row justify-content-center">
			<div class="col-md-6 text-center mb-4">
				<h4 class="text-white font-weight-normal">Если Вам нужна консультация юриста, напишите нам!</h4>
				<form method="post" action="<?php site_url(); ?>/wp-content/themes/lawyers/mails/mail3.php">
					<input type="text" class="form-control" name="name" placeholder="Введите Ваше имя" style="margin-bottom: 15px; display: inline;" required>
					<input type="text" class="form-control" name="mail" placeholder="Введите Ваш e-mail" style="margin-bottom: 15px; display: inline;" required>
					<textarea class="form-control" name="mes" placeholder="Введите Ваше сообщение" style="margin-bottom: 10px; display: inline;" required></textarea>
					<!-- reCAPTCHA v3 --
					<input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
					-->
					<button type="submit" class="btn btn-primary d-block w-100">Отправить</button>
				</form>
			</div>
			<!--
			<div class="col-md-4 mb-4 justify-content-center">
				<h4 class="text-white font-weight-normal">Наша группа в Вконтакте</h4>					
				<script type="text/javascript" src="https://vk.com/js/api/openapi.js?167"></script>

				<!-- VK Widget --
				<div id="vk_groups"></div>
				<script type="text/javascript">
				VK.Widgets.Group("vk_groups", {mode: 4, width: "320", height: "200"}, 191326027);
				</script>
			</div>
			-->
		</div>
	</div>
</div>
<!-- Contacts -->

<!-- Footer -->
<footer class="container-fluid" style="background: #1f497d; text-align: center; color: rgba(255,255,255,.75);">
	<div class="row">
		<div class="col pt-3 pb-3">
			<p class="text-center" style="margin: 0;">  ООО ЮК "Черкасова и партнеры" &#169; 2022 г.</p>
			<p class="text-center" style="font-size: .75rem; margin: 0;">Создание и продвижение сайтов - <a href="http://site100.ru" style=" color: rgba(255,255,255,.75);">SITE<span style="color: #dc3545;">100</span>.RU</a></p>
		</div>
	</div>
</footer>
<!-- /Footer -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel" style="font-weight: 400;">Введите Ваше имя и телефон:</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="<?php site_url(); ?>/wp-content/themes/lawyers/mails/mail1.php" style="text-align: center;">
					<input type="text" class="form-control" name="name" placeholder="Введите Ваше имя" style="margin: auto; margin-bottom: 15px; max-width: 400px;" required>
					<input type="text" class="form-control" name="phone" placeholder="Введите Ваш телефон" style="margin: auto; margin-bottom: 15px; max-width: 400px;" required>
					<!-- reCaptcha v3
					<input type="hidden" id="g-recaptcha-response1" name="g-recaptcha-response"> -->
					<button type="submit" class="consultation w-100 d-block" style="margin-top: 15px;" onclick="yaCounter49524886.reachGoal('callback'); return true;">Отправить</button>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal 2 -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModal2Label" style="font-weight: 400;">Введите Ваше имя и телефон:</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="<?php site_url(); ?>/wp-content/themes/lawyers/mails/mail2.php" style="text-align: center;">
					<input type="text" class="form-control" name="name" placeholder="Введите Ваше имя" style="margin: auto; margin-bottom: 15px; max-width: 400px;" required>
					<input type="text" class="form-control" name="phone" placeholder="Введите Ваш телефон" style="margin: auto; margin-bottom: 15px; max-width: 400px;" required>
					<!-- reCaptcha v3
					<input type="hidden" id="g-recaptcha-response1" name="g-recaptcha-response"> -->
					<button type="submit" class="consultation w-100 d-block" style="margin-top: 15px;" onclick="yaCounter49524886.reachGoal('application'); return true;">Отправить</button>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Показываем пустой блок содержащий другие блоки -->
<div style="display: <?php echo $display; ?>;" onclick="f1();"> <!-- Присваиваем свойству display значение переменной $display -->
	<div id="background-msg" style="display: <?php echo $display; ?>;"></div> <!-- Показываем background -->
	<!-- Показываем сообщение об успешной отправке данных -->
	<div id="message">
	    <?php echo $_SESSION['recaptcha']; unset($_SESSION['recaptcha']); ?>
	</div> 
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!-- Библиотека jQuery для плавной прокрутки к якорю и параллакса -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


<!-- Parallax 
<script src="scripts/parallax.min.js"></script>
-->

<!-- Wow animated -->
<script src="js/wow.js"></script>

<!-- My scripts -->
<script src="js/scripts.js"></script>
<!--
<script> // reCAPTCHA v3 from Google 
	grecaptcha.ready(function() {
		grecaptcha.execute('6LdV1IcUAAAAADRQAhpGL8dVj5_t0nZDPh9m_0tn', {action: 'action_name'})
			.then(function(token) {
			document.getElementById('g-recaptcha-response1').value=token;
			document.getElementById('g-recaptcha-response2').value=token;
			document.getElementById('g-recaptcha-response3').value=token;
		});
	});
</script>
-->
		<script>
			function f1 () {
				document.getElementById('background-msg').style.display = 'none';
				document.getElementById('message').style.display = 'none';
			}
		</script>
	</body>
</html>