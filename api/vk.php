<?php
if (!$_GET['code']) {
	exit("Код неверный");
}
include "config.php";
include "../datebase/config.php";
$token = json_decode(file_get_contents('https://oauth.vk.com/access_token?client_id='.ID.'&redirect_uri='.URL.'&client_secret='.SECRET.'&code='.$_GET['code']),true);
if(!$token)
	exit("Токен не верный");
$data = json_decode(file_get_contents('https://api.vk.com/method/users.get?user_id='.$token['user_id'].'&access_token='.$token['access_token'].'&fields=uid,first_name,last_name,photo_big&v=5.73'),true);
if(!$data)
	exit("Токен не верный");
$data = $data['response'][0];
try {
  $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->exec("set names utf8");
}
catch(PDOException $e) {
    echo $e->getMessage();
}
$user_id = $data['id'];
$row = $db->query("SELECT uid FROM users WHERE uid =".$user_id."")->fetch();
$cook = $row['uid'];
if($user_id == $row['uid'])
{
	SetCookie("userid",md5($cook+1474),time()+604800,"/");
}
else
{
	$db->query("INSERT INTO users SET uid='".$data['id']."',hash='".md5($data['id']+1474)."', uname='".$data['first_name']." ".$data['last_name']."',photo_big='http://qqqqq.zzz.com.ua/img/flopuser.png',moneyu = 0");
	$db->query("INSERT INTO emailcofirm SET uid='".$data['id']."', status=0");
	$db->query("INSERT INTO userscommission SET userid ='".$data['id']."', commission=6");
	SetCookie("userid",md5($data['id']+1474),time()+604800,"/");
}
$db = null;
header("Location:../index.php");
?>