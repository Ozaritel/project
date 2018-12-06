<?
	$path = __FILE__;
	$file = basename($path, ".php");
	require($_SERVER['DOCUMENT_ROOT']."/profile/classes/itemshow.php");
	$itemabout = new Item($file);
  $title = 'PLAYCOINS - '.$itemabout->getname();
  require $_SERVER['DOCUMENT_ROOT']."/header.php";
  if($_COOKIE['userid']==$itemabout->getuserid())
  {
  	?>
  	<div style="background-color: whitesmoke;">
	  	<div class="container">
	  		<form action="../profile/products/edit" method="POST">
	  		<div class="redact">
	  			<input type="submit" name="send" class="buttom edit" value="Редактировать">
	  		</form>
	  		<form action="../profile/products/delete" method="POST">
	  			<input type="hidden" name="iditem" value="<?echo $file;?>">
	  			<input type="hidden" name="userid" value="<?echo $itemabout->getuserid();?>">
	  			<input type="submit" name="send" class="buttom deleteitem" value="Удалить товар">
	  		</div>
	  		</form>
	  	</div>
  	</div>
  	<?
  }
  $itemabout->pageitem();
?>
<?
    require $_SERVER['DOCUMENT_ROOT']."/footer.php";
?>