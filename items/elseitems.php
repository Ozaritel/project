<?
	$item = $db->query("SELECT * FROM Items")->fetchAll();
	$counts = count($item);
	$randoms = rand(1, $counts);
	$b=1;
	$c=0;
?>
<div class="container">
	<div class="game">
		<?
			do { 
				if ($b == $file) {
					$b++;
				}
				else{

				$imge = $item[$b]['image'];
				$c++;
		?>
		<div class="image">
			<? echo "<img src='../../admin/load/".$imge."' alt=''>";?>
			<div class="gamename">
				<?echo $item[$b]['name'];?>
			</div>
			<div class="gamecost">
				<?echo $item[$b]['price'];?> руб
			</div>
			<div class="backhover">
				<? echo "<a href='../../items/buy/".$item[$b]['url']."'><div class='buttona'>ОТКРЫТЬ</div></a>";?>
			</div>
		</div>
		<?
				$b++;
				}
			}while($c<12);
		?>
	</div>
</div>