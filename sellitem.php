<?
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		include "datebase/config.php";
		try {
	  		$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
	  		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	  		$db->exec("set names utf8");
		}
		catch(PDOException $e) {
	    	echo $e->getMessage();
		}
		$iditems = $_REQUEST['id'];
		$items = $db->query("SELECT * FROM usersbuy WHERE id ='".$iditems."'")->fetch();
		$costgame = $db->query("SELECT * FROM gamescost WHERE item_id ='".$items['cost']."'")->fetch();
		$userin = $db->query("SELECT * FROM users WHERE uid ='".$items['userid']."'")->fetch();
		$summa = $userin['moneyu']+$costgame['cost'];
		$db->query("UPDATE `users` SET `moneyu` = '".$summa."' WHERE `uid`='".$items['userid']."'");
		if($costgame['cost'] == 30)
			$win =0;
		else{
			$win = 1;
		}
		$db->query("INSERT INTO `goods` (`id_items`,`keygame`,`win`) VALUES ('".$items['item_id']."','".$items['game']."','".$win."')");
		$db->query("UPDATE `usersbuy` SET `sell` = '2' WHERE `id`='".$iditems."'");
		$db->query("UPDATE `usersbuy` SET `game` = 'sell' WHERE `id`='".$iditems."'");
		echo "".$summa." руб";
		$db->query("ALTER TABLE `goods` ORDER BY `id`");
		$db = NULL;
	}
?>