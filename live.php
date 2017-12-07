<?
	include "../datebase/config.php";
	try {
  		$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
  		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  		$db->exec("set names utf8");
	}
	catch(PDOException $e) {
    	echo $e->getMessage();
	}
?>
<div class="container">
	<h1 class="livename" style="font-size: 25px">Live лента последних покупок</h1>
	<div class="livem">
		
	</div>
</div>

<hr>
