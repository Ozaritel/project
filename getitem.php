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
		$game = $items['game'];
		echo $game;
		$db->query("UPDATE `usersbuy` SET `sell` = '1' WHERE `id`='".$iditems."'");
	}
?>