<?
	$title = 'Регистрация на Сайте - PlayCoins.ru';
	require "../header.php";
	if(isset($_COOKIE['userid']))
		header('Location:/profile/');
?>
<div class="backregister">
	<div class="block-register">
		<div class="text-register">Регистрация</div>
		<div class="font-register">
			<form action="form/form_processing.php" method="post" id="reg">
				<?
					if($_POST["captcha"]=="false")
						echo "<div class='capthacheck'>Не верно введена reCAPTCHA!</div>";
					else if($_POST["login"]=="false")
						echo "<div class='capthacheck'>Данное имя занято!</div>";
					else if($_POST["emailf"]=="false")
						echo "<div class='capthacheck'>Данный e-mail занят!</div>";
				?>
				<div class="form-pos"><div class="icon-form"><img src="../../img/user.png"></div><input type="text" id="username" name="username" placeholder="Имя пользователя" maxlength="30"><div class="helptext">Заполните это поле!</div></div>
				<div class="form-pos2"><div class="icon-form"><img src="../../img/key.png"></div><input type="password" id="pass" name="pass" placeholder="Пароль" maxlength="30"><div class="helptext1">Заполните это поле!</div></div>
				<div class="form-pos2"><div class="icon-form"><img src="../../img/atsymbol.png"></div><input type="text" id="email" name="email" placeholder="E-mail" maxlength="40"><div class="helptext2">Заполните это поле!</div></div>
				<div class="mar-form"></div>
				<div class="form-agree">Нажимая кнопку “Регистрация” вы автоматически соглашаетесь с условиями <a href="">правилами сайта</a></div>
				<div class="mar-form"></div>
				<div class="g-recaptcha" data-sitekey="6LfzTU4UAAAAABjGIsE3CS5hhEBywQ8hD4a-LCnA"></div>
				<div class="mar-form"></div>
				<input class="form-sub register" type="submit"	class='checkajax' name="enter" value="Регистрация">
			</form>
			<div class="else-reg">
				<div>Либо войдите через:</div>
				<div class="enter-social">
					<?php echo '<a href="https://oauth.vk.com/authorize?client_id='.$id.'&display=page&redirect_uri='.$url.'&response_type=code"><div class="vkauth"></div></a>';?>
				</div>
			</div>
		</div>
	</div>
</div>
<?
	  require "../footer.php";
?>