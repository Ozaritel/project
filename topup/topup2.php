<?php
	session_start();
	include "../datebase/config.php";
	try {
	  $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
	  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	  $db->exec("set names utf8");
	}
	catch(PDOException $e) {
	    echo $e->getMessage();
	}
	$amount = $_POST['amount'];
	$via = $_POST['via'];
	$secret = '1ff788a023bc9c61875f1248efb1cccd';
	$db->query("INSERT INTO `pay` (`count`, `uid`, `via`, `access`) VALUES ('".$amount."', '".$_SESSION['userid']."', '".$via."', '0')");
	$row = $db->query("SELECT * FROM `pay` ORDER BY id DESC LIMIT 1")->fetch();
	$data = array(
		'shopid' => 3318,
		'payno' => $row['id'],
		'amount' => $amount,
		'description' => 'Пополнение счета на сайте STEAMSELLS.COM',
		'via' => $via
	);
	ksort($data,SORT_STRING);
	$sign = hash('sha256',implode(':',$data).':'.$secret);
	echo '
		<form id="acquiring" method="POST" action=https://primearea.biz/merchant/pay/>
		<input type="hidden" name="shopid" value="'.$data['shopid'].'">
		<input type="hidden" name="payno" value="'.$data['payno'].'">
		<input type="hidden" name="amount" value="'.$data['amount'].'">
		<input type="hidden" name="description" value="'.$data['description'].'">
		<input type="hidden" name="sign" value="'.$sign.'">
		<input type="hidden" name="via" value="'.$data['via'].'"><br>
		<button style="display:none">Оплатить</button>
		</form>
	';
?>
<script>
	document.getElementById('acquiring').submit();
</script>