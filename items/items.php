<?
	$item = $db->query("SELECT * FROM Items")->fetchAll();
	$counts = count($item);
?>
<div class="container">
	<div class="game">
		<?
			for ($i=0; $i < $counts; $i++) { 
			$imge = $item[$i]['image'];
		?>
		<div class="image">
			<? echo "<img src='../admin/load/".$imge."' alt=''>";?>
			<div class="gamename">
				<?echo $item[$i]['name'];?>
			</div>
			<div class="gamecost">
				<?echo $item[$i]['price'];?> руб
			</div>
			<div class="backhover">
				<? echo "<a href='../items/buy/".$item[$i]['url']."'><div class='buttona'>ОТКРЫТЬ</div></a>";?>
			</div>
		</div>
		<?
			}
		?>
	</div>
</div>