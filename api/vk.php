<?php
if (!$_GET['code']) {
	exit("Код неверный");
}
include "config.php";
include "../datebase/config.php";
$token = json_decode(file_get_contents('https://oauth.vk.com/access_token?client_id='.ID.'&redirect_uri='.URL.'&client_secret='.SECRET.'&code='.$_GET['code']),true);
if(!$token)
	exit("Токен не верный");

$data = json_decode(file_get_contents('https://api.vk.com/method/users.get?user_id='.$token['user_id'].'&access_token='.$token['access_token'].'&fields=uid,first_name,last_name,photo_big'),true);
if(!$data)
	exit("Токен не верный");
$data = $data['response'][0];
var_dump($data);
try {
  $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->exec("set names utf8");
}
catch(PDOException $e) {
    echo $e->getMessage();
}
$user_id = $data['uid'];
$row = $db->query("SELECT uid, first_name, last_name, photo_big FROM users WHERE uid =".$user_id)->fetch();
echo $row['uid'];
if($user_id == $row['uid'])
{
	session_start();
	ini_set('session.gc_maxlifetime', 7*24*60*60);
	$_SESSION['userid']=$row['uid'];
}
else
{
	session_start();
	ini_set('session.gc_maxlifetime', 7*24*60*60);
	$_SESSION['userid']=$user_id;
	$db->query("INSERT INTO users SET uid='".$data['uid']."',first_name='".$data['first_name']."',last_name='".$data['last_name']."',photo_big='".$data['photo_big']."',moneyu = 0");
	
}
$db = null;
header("Location:../index.php");
?>