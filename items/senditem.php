<?
		if ($_SERVER['REQUEST_METHOD']=='POST') {
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
			$user = $_SESSION["userid"];
			$itemopen = $db->query("SELECT * FROM Items WHERE `id`= '".$_REQUEST['idthis']."'")->fetch();
			$userc = $db->query("SELECT * FROM users WHERE `uid`= '".$user."'")->fetch();
			$price = $itemopen['price'];
			if ($price > $userc['moneyu']) {
				echo "Пополните счет!";
			}
			else
			{
				$money = $userc['moneyu'] - $price;
				$db->query("UPDATE `users` SET `moneyu`='".$money."' WHERE `uid`='".$user."'");
				echo "".$money." руб";
				$items1 = $db->query("SELECT * FROM goods WHERE `id_items`= '".$_REQUEST['idthis']."' ORDER BY id LIMIT 1")->fetch();
				if ($items1['win']) {
					$db->query("INSERT INTO `usersbuy` (`item_id`,`game`,`cost`,`userid`) VALUES ('".$_REQUEST['idthis']."','".$items1['keygame']."','".$_REQUEST['idthis']."','".$user."')");
					 $db->query("DELETE FROM `goods` WHERE `id_items` = '".$_REQUEST['idthis']."' ORDER BY id LIMIT 1");
				}
				else
				{
					$db->query("INSERT INTO `usersbuy` (`item_id`,`game`,`cost`,`userid`) VALUES ('".$_REQUEST['idthis']."','".$items1['keygame']."','0','".$user."')");
					$db->query("DELETE FROM `goods` WHERE `id_items` = '".$_REQUEST['idthis']."' ORDER BY id LIMIT 1");
				}
				$db->query("INSERT INTO `live` (`item_id`,`userid`) Values ('".$_REQUEST['idthis']."','".$user."')");
					 $db->query("DELETE FROM live ORDER BY id ASC LIMIT 1");
					 $db->query("ALTER TABLE `live` ORDER BY `id` DESC");
					 $db->query("ALTER TABLE `usersbuy` ORDER BY `id`");
			}
		}
?>