<?php
	 session_start();
	 $money = $_GET['amount'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>STEAMSELLS.COM - Подтверждение платы</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="../css/media.css">
  </head>
  <body style="background-color: white;">
  	<div class="container-fluid paybc nopad">
  		<div class="container nopad widthsize">
  			<div class="paypage">Выбор способа оплаты</div>
  			<div class="paypage1">STEAMSELLS.COM</div>
  		</div>
  	</div>
  	<div class="container-fluid nopad">
  		<div class="container widthsize nopad">
  			<div class="col-xs-6 moneypay nopad">Оплата: <span><?echo $money?></span> руб</div>
  			<div class="col-xs-6 savety nopad">
  				<div class="payimager">
  					<img src="../img/secure.png" alt="">
	  				Безопасное<br>соединение
	  			</div>
  			</div>
  			<div class="col-xs-12">
		  		<form action="../topup/topup2.php" method="post" accept-charset="utf-8">
		  			<select name="via" class="choosepay" onchange="select2()">
		  				<option value="wmr">Webmoney Rub</option>
		  				<option value="wmu">Webmoney Uah</option>
		  				<option value="wmz">Webmoney Usd</option>
		  				<option value="wme">Webmoney Eur</option>
		  				<option value="yandexmoney">Яндекс Деньги</option>
		  				<option value="qiwi">Qiwi</option>
		  				<option value="mts">МТС</option>
		  				<option value="megafon">Мегафон</option>
		  				<option value="beeline">Билайн</option>
		  				<option value="tele2">Tele2</option>
		  				<option value="cardpay">Visa/Master Card(СНГ)</option>
		  				<option value="OKPay">Okpay</option>
		  				<option value="advcash">AdvCash</option>
		  				<option value="Payeer">Payeer</option>
		  			</select>
		  		
  				<div class="col-xs-12" style="margin-top: 20px;"">
	  				<div class="col-sm-2 col-xs-6 checkmoney" >
	  					<img id="wmr"  src="../img/wmr.png" alt="" onclick="select(this)">
	  				</div>
	  				<div class="col-sm-2 col-xs-6 checkmoney">
	  					<img id="wmu" src="../img/wmu.png" alt="" onclick="select(this)">
	  				</div>
	  				<div class="col-sm-2 col-xs-6 checkmoney">
	  					<img id="wmz" src="../img/wmz.png" alt="" onclick="select(this)">
	  				</div>
	  				<div class="col-sm-2 col-xs-6 checkmoney">
	  					<img id="wme" src="../img/wme.png" alt="" onclick="select(this)">
	  				</div>
	  				<div class="col-sm-2 col-xs-6 checkmoney">
	  					<img id="yandexmoney" src="../img/yand_money.png" alt="" onclick="select(this)">
	  				</div>
	  				<div class="col-sm-2 col-xs-6 checkmoney">
	  					<img id="qiwi" src="../img/qiwi.png" alt="" onclick="select(this)">
	  				</div>
	  				<div class="col-sm-2 col-xs-6 checkmoney" >
	  					<img id="mts" src="../img/mts.png" alt="" onclick="select(this)">
	  				</div>
	  				<div class="col-sm-2 col-xs-6 checkmoney" >
	  					<img id="megafon" src="../img/megafon.png" alt="" onclick="select(this)">
	  				</div>
	  				<div class="col-sm-2 col-xs-6 checkmoney">
	  					<img id="beeline" src="../img/beeline.png" alt="" onclick="select(this)">
	  				</div>
	  				<div class="col-sm-2 col-xs-6 checkmoney">
	  					<img id="tele2" src="../img/tele2.png" alt="" onclick="select(this)">
	  				</div>
	  				<div class="col-sm-2 col-xs-6 checkmoney">
	  					<img id="cardpay" src="../img/visa.png" alt="" onclick="select(this)">
	  				</div>
	  				<div class="col-sm-2 col-xs-6 checkmoney">
	  					<img id="OKPay" src="../img/okpay.png" alt="" onclick="select(this)">
	  				</div>
	  				<div class="col-sm-2 col-xs-6 checkmoney">
	  					<img id="advcash" src="../img/advcash.png" alt="" onclick="select(this)">
	  				</div>
	  				<div class="col-sm-2 col-xs-6 checkmoney">
	  					<img id="Payeer" src="../img/payeer.png" alt="" onclick="select(this)">
	  				</div>
	  				</div>
  				</div>
  					<? echo '<input type="hidden" name="amount" value="'.$money.'">';
  					?>
            <div class="col-xs-12">
              <div class="col-sm-6 col-xs-12">
                  <button class="topups but">Пополнить</button>
              </div>
              <div class="col-sm-6 col-xs-12">
              <a href="../index.php" title="close" style="text-decoration: none"><div class="closepay">
                Вернуться в магазин
              </div></a>
              </div>
            </div>
  				</form>
  			</div>
	  	</div>
  	</div>
  </body>
  <script type="text/javascript">
  	function select(abs)
  	{	
  		var selecter = $(".choosepay").val();
  		var idselect = $(abs).attr('id');
  		if(idselect != selecter)
  		{
  			removes();
  			$(".choosepay").val(idselect);
  			$('#'+idselect).addClass('checked');
  		}
  		if(idselect == selecter)
  		{
  			removes();
  			$('#'+idselect).addClass('checked');
  		}
  	}
  	function select2()
  	{
  		var selecter = $(".choosepay").val();
  		var bool = $("#"+selecter).hasClass("checked");
  		if(!bool)
  		{
  			removes();
  			$('#'+selecter).addClass('checked');
  		}
  	}
  	function removes()
  	{
  		$('#wmr').removeClass('checked');
  		$('#wmu').removeClass('checked');
  		$('#wmz').removeClass('checked');
  		$('#wme').removeClass('checked');
  		$('#yandexmoney').removeClass('checked');
  		$('#qiwi').removeClass('checked');
  		$('#mts').removeClass('checked');
  		$('#megafon').removeClass('checked');
  		$('#beeline').removeClass('checked');
  		$('#tele2').removeClass('checked');
  		$('#cardpay').removeClass('checked');
  		$('#OKPay').removeClass('checked');
  		$('#advcash').removeClass('checked');
  		$('#Payeer').removeClass('checked');
  	}
  </script>
  <script src="../js/jquery-3.2.1.min.js"></script>
 </html>
