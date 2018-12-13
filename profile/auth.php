<?
	$title = 'Авторизация на Сайте - PlayCoins.ru';
	require "../header.php";
	if(isset($_COOKIE['userid']))
		header('Location:/profile/');
?>
<div class="backregister backauth">
	<div class="block-register">
		<div class="text-register">Авторизация</div>
		<div class="font-register block-auth">
			<form action="form/auth_processing.php" method="post">
				<?
					if($_POST["captcha"]=="false")
						echo "<div class='capthacheck'>Не верно введена reCAPTCHA!</div>";
					else if($_POST["error"]=="true")
						echo "<div class='capthacheck'>Неверный логин или пароль!</div>";
				?>
				<div class="form-pos"><div class="icon-form"><img src="../../img/user.png"></div><input type="text" id="username" name="username" placeholder="Имя пользователя" maxlength="30"><div class="helptext">Заполните это поле!</div></div>
				<div class="form-pos2"><div class="icon-form"><img src="../../img/key.png"></div><input type="password" id="pass" name="pass" placeholder="Пароль" maxlength="30"><div class="helptext1">Заполните это поле!</div></div>
				<input type="hidden" name="email" id="email" value="aaa3aa2aa13aaa@mail.ru">
				<div class="mar-form"></div>
				<div class="g-recaptcha" data-sitekey="6LfzTU4UAAAAABjGIsE3CS5hhEBywQ8hD4a-LCnA"></div>
				<div class="mar-form"></div>
				<input class="form-sub" type="submit" value="Авторизация" name="enter">
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