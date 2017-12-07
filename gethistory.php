<?
	include "datebase/config.php";
	try {
  		$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
  		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  		$db->exec("set names utf8");
	}
	catch(PDOException $e) {
    	echo $e->getMessage();
	}
	$liveitems = $db->query("SELECT * FROM live")->fetchAll();
	for($i = 0;$i<8;$i++)
	{
		$iteminfo = $db->query("SELECT * FROM Items WHERE id='".$liveitems[$i]['item_id']."'")->fetch();
		$userinfo = $db->query("SELECT * FROM users WHERE uid='".$liveitems[$i]['userid']."'")->fetch();
		$string = $string."".$iteminfo['image'].",".$iteminfo['url'].",".$userinfo['first_name'].",".$userinfo['last_name']."|";
	}
	echo $string;
?>