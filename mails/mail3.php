<?php
session_start();
$win = "true";
/*
// Если существует переменная POST, то
if($_POST){
    // Отправляем данные в Google
	function getCaptcha($SecretKey){
        $Response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LdV1IcUAAAAABnQ0mXIp5Yh7tLEcAXzdqG6rx9Y&response={$SecretKey}");
        $Return = json_decode($Response);
        return $Return;
    }
    // Принимаем данные обратно
	$Return = getCaptcha($_POST['g-recaptcha-response']);
	// Если вероятность робота более 0.5, то считаем отправителя человеком и выполняем отправку почты
	if($Return->success == true && $Return->score > 0.5){ */
		$name = $_POST['name'];
		$mail = $_POST['mail'];
		$mes = $_POST['mes'];
		mail("lilccherkasova@yandex.ru", "Сообщение с сайта.", "Потенциальный клиент с именем ".$name." оставил адрес электронной почты: ".$mail." и оставил сообщение: ".$mes);
		//mail("vasilyev-r@mail.ru", "Сообщение с сайта.", "Потенциальный клиент с именем ".$name." оставил адрес электронной почты: ".$mail." и оставил сообщение: ".$mes);
		$_SESSION['win'] = 1;
		$_SESSION['recaptcha'] = '<p>Спасибо за Ваше обращение. Мы свяжемся с Вами в ближайшее время.</p>';
		header("Location: ".$_SERVER['HTTP_REFERER']);
	/*
	} else {
		// Иначе считаем отправителя роботом и выводим сообщение с просьбой повторить попытку
		$_SESSION['win'] = 1;
		$_SESSION['recaptcha'] = '<p><strong>Извините!</strong><br>Ваши действия похожи на робота. Пожалуйста повторите попытку!</p>';
		header("Location: ".$_SERVER['HTTP_REFERER']);
	}
} */
?>