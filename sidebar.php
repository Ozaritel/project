<div class="lastvisited">
	<div class="last-visited">Вы интересовались</div>
	<div class="block-visited somenewclass">
		<?
			include $_SERVER['DOCUMENT_ROOT']."/datebase/dbconnect.php";
			$countcook=0;
			for ($i=1; $i <= 5; $i++) { 
			if(isset($_COOKIE['item'.$i.'']))
			{
				$countcook++;
				$row = $db->query("SELECT * FROM goods WHERE id=".$_COOKIE['item'.$i.''])->fetch();
		?>
				<a href="<?echo $row['url']?>"><div class="item-visited">
					<div class="img-visited"><img src="<?echo $row['img']?>"></div>
					<div class="info-visited">
						<div class="name-visited"><?echo $row['name']?></div>
						<div class="price-visited">Цена: <?
						if(isset($_COOKIE['userid'])){
						$commision = $db->query("SELECT * FROM userscommission WHERE userid =".$userids['uid'])->fetch();
						$realprice = $row['price'] + ($row['price']/100)*$commision['commission'];
						}else
						{
						$realprice = $row['price'] + ($row['price']/100)*6;	
						}
						echo sprintf('%0.2f', $realprice)?> руб.</div>
					</div>
				</div>
				</a>
		<?	
			}
		}
		if (!$countcook) {?>
			<div class="nocookies">Вы еще ничем не интересовались.</div>
		<?}?>
	</div>
</div>