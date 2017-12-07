
	<div class="popup">
		<div class="popupw">
			<div class="poptext">
				Пополнить баланс на сайте <span>STEAMSELLS.COM</span>
			</div>
			<div class="popdiraction">
				Баланс начисляется моментально, но иногда процесс может занять 1-2 минуты<br>
				для того чтобы пополнить, введите сумму пополнения и нажмите "пополнить"
			</div>
			<form action="../../topup/topup.php" method="GET">
                <input class="topupcount" type="number" name="amount" value="10">
                <button class="topups">Пополнить</button>
            </form>
			<div class="closepopup" onclick="closepopup()">
				<img src="../../img/exit.png" alt="">
			</div>
		</div>
	</div>
	<div class="popupbuy">
		<div class="windowpop">
			<div class="thanks">
				Спасибо за покупку!<br>
				Чтобы получить товар перейдите в Личный кабинет.
			</div>
			<div class="tryagain" onclick="reloadpage()">Открыть еще</div>
			<a href="../../userlk/lk.php"><div class="lkbutton">Личный кабинет</div></a>
			<div class="closebuypop" onclick="closepopupbuy()">
				<img src="../../img/exit.png" alt="">
			</div>
		</div>
	</div>
	<div class="container-fluide footer">
		<div class="container">
			<div class="copy">&copy STEAMSELLS.COM 2017</div>
		</div>
	</div>
    <script src="../../js/jquery-3.2.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/menu.js"></script>
    <script src="../../js/ajax.js"></script>
    <?$db = null;?>
  </body>
</html>