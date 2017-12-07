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
  move_uploaded_file($_FILES['img']['tmp_name'], 'load/'.$_FILES['img']['name']);
  $id = $db->query("SELECT * FROM `Items` ORDER BY id DESC LIMIT 1")->fetch();
  $number = $id['id']+1;
  $db->query("INSERT INTO `Items` (`name`,`price`,`image`,`url`) VALUES ('".$_POST['nameitem']."','".$_POST['price']."','".$_FILES['img']['name']."','".$number.".php')");
  $db->query("INSERT INTO `gamescost` (`item_id`,`cost`) VALUES ('".$number."','".$_POST['pricesell']."')");
  $db->query("ALTER TABLE `Items` ORDER BY `id`");
  $file = '../items/buy/1.php';
$newfile = '../items/buy/'.$number.'.php';

if (!copy($file, $newfile)) {
    echo "не удалось скопировать $file...\n";
}
  header("Location:stsl-admin.php");
?>