<?
	include "../../datebase/config.php";
	try {
	  $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
	  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	  $db->exec("set names utf8");
	}
	catch(PDOException $e) {
	    echo $e->getMessage();
	}
	$path = __FILE__;
	$file = basename($path, ".php");
	$itemopen = $db->query("SELECT * FROM Items WHERE `id`= '".$file."'")->fetch();
	$title = "STEAMSELLS.COM - Купить ".$itemopen['name']." Дешего";
	include "../../header.php";
	include "../../live.php";
?>
<div class="container-fluid visible-sm visible-xs">
	<div class="rouletback">
		<div class="container">
			<div class="random"><?echo $itemopen['name']?></div>
			<div class="initem">
				<div class="roulet">
					<div class="leftside"></div>
					<div class="linecenter"></div>
					<div class="rightside"></div>
					<div class="rouletbox">
					<? 
						for ($i=0; $i < 40; $i++) {
							$a = rand(1, 2);
							if($i==2)
							{
								echo "<div class='rouletitem' style='background-image: url(../../admin/load/".$itemopen['image'].");'></div>";
								continue;
							}
							if($i==37)
							{
								echo "<div class='rouletitem' style='background-image: url(../../admin/load/rand.png);'></div>";
								continue;
							}
							if($i==36)
							{
								echo "<div class='rouletitem' style='background-image: url(../../admin/load/".$itemopen['image'].");'></div>";
								continue;
							}
							
							if($a==1)
								echo "<div class='rouletitem' style='background-image: url(../../admin/load/".$itemopen['image'].");'></div>";
							else
								echo "<div class='rouletitem' style='background-image: url(../../admin/load/rand.png);'></div>";

						}
					?>
					</div>
					<div class="hideleft"></div>
					<div class="hideright"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid visible-md visible-lg">
	<div class="rouletback">
		<div class="container">
			<div class="random"><?echo $itemopen['name']?></div>
			<div class="initem">
				<div class="roulet">
					<div class="leftside"></div>
					<div class="linecenter"></div>
					<div class="rightside"></div>
					<div class="rouletbox">
					<? 
						for ($i=0; $i < 40; $i++) {
							$a = rand(1, 2);
							if($i==2)
							{
								echo "<div class='rouletitem' style='background-image: url(../../admin/load/".$itemopen['image'].");'></div>";
								continue;
							}
							if($i==37)
							{
								echo "<div class='rouletitem' style='background-image: url(../../admin/load/rand.png);'></div>";
								continue;
							}
							if($i==36)
							{
								echo "<div class='rouletitem' style='background-image: url(../../admin/load/".$itemopen['image'].");'></div>";
								continue;
							}
							
							if($a==1)
								echo "<div class='rouletitem' style='background-image: url(../../admin/load/".$itemopen['image'].");'></div>";
							else
								echo "<div class='rouletitem' style='background-image: url(../../admin/load/rand.png);'></div>";

						}
					?>
					</div>
					<div class="hideleft"></div>
					<div class="hideright"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<input type="text" name="count" id="counttov" value="<?echo $itemopen['price']?>" style="display: none;">
<input type="text" id="idthis" value="<?echo $file?>"  style="display: none;">
<?
	if($_SESSION['userid'])
  	{
  		$countget = $db->query("SELECT * FROM goods WHERE id_items = '".$file."'")->fetchAll();
  		$number = count($countget);
  		$items1 = $db->query("SELECT * FROM goods WHERE id_items = '".$file."' ORDER BY id LIMIT 1")->fetch();
  		echo $items1['win'];
  		if($number>0)
  		{
  			if($items1['win']==0)
  			{


?>
			<div class="container visible-lg visible-md" style="margin-top: 15px;">
				<div class="openroulet" id="open" onclick="buyitem()">
					Открыть за <?echo $itemopen['price']?> руб
				</div>
				<div class="openroulet" id="opening" style="display: none;" >
					Открываем...
				</div>
			</div>
			<div class="container visible-sm visible-xs" style="margin-top: 15px;">
				<div class="openroulet" id="openm" onclick="buyitemM()">
					Открыть за <?echo $itemopen['price']?> руб
				</div>
				<div class="openroulet" id="openingm" style="display: none;" >
					Открываем...
				</div>
			</div>
<?
			}
			else
			{
?>
			<div class="container visible-lg visible-md" style="margin-top: 15px;">
				<div class="openroulet" id="open" onclick="buyitem1()">
					Открыть за <?echo $itemopen['price']?> руб
				</div>
				<div class="openroulet" id="opening" style="display: none;" >
					Открываем...
				</div>
			</div>
			<div class="container visible-sm visible-xs" style="margin-top: 15px;">
				<div class="openroulet" id="openm" onclick="buyitemM1()">
					Открыть за <?echo $itemopen['price']?> руб
				</div>
				<div class="openroulet" id="openingm" style="display: none;" >
					Открываем...
				</div>
			</div>
<?
			}
		}
		else{
			?>
			<div class="endgoods">
				Простите,товар закончился!
			</div>
			<?
		}
	}
	else{

	echo "<div class='container' style='margin-top: 15px;'>
			<a href='https://oauth.vk.com/authorize?client_id=$id&display=page&redirect_uri=$url&response_type=code'><div class='openroulet'>
				авторизуйтесь
			</div></a>
		</div>";
?>
<?
	}
?>
<div class="container">
	<div class="buyand">
		Хотите купите еще?
	</div>
</div>
<?
	require "../elseitems.php";
	require "../../footer.php";
?>