<?

  session_start();
  if($_SESSION['userid']=='37915630')
  {
	  include "../datebase/config.php";
	  try {
	    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
	    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    $db->exec("set names utf8");
	  }
	  catch(PDOException $e) {
	    echo $e->getMessage();
	  }
	  $i = 1;
	  $tiem = $_POST['chooseitem'];
	  do
	  {
	  	$textfor = $_POST['add'.$i];
	      echo $textfor;
	    if($_POST['win'.$i]=='no')
	    	$win = 0;
	    else
	    	$win = 1;
	    $db->query("INSERT INTO `goods` (`id_items`,`keygame`,`win`) VALUES ('$tiem','$textfor','$win')");
	    $i++;
	  }while ($_POST['add'.$i]);
	}
?>