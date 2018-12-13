<?php
if (!$_GET['code']) {
	exit("Код неверный");
}
include "config.php";
include "../datebase/config.php";
$token = json_decode(file_get_contents('https://oauth.vk.com/access_token?client_id='.ID.'&redirect_uri='.URL.'&client_secret='.SECRET.'&code='.$_GET['code']),true);
if(!$token)
	exit("Токен не верный");
1
$user_id = $data['id'];
$row = $db->query("SELECT uid FROM users WHERE uid =".$user_id."")->fetch();
$cook = $row['uid'];
if($user_id == $row['uid'])
{
	SetCookie("userid",$cook,time()+604800,"/");
}
else
{
	$db->query("INSERT INTO users SET uid='".$data['id']."',uname='".$data['first_name']." ".$data['last_name']."',photo_big='http://qqqqq.zzz.com.ua/img/flopuser.png',moneyu = 0");
	SetCookie("userid",$data['id'],time()+604800,"/");
}
$db = null;
header("Location:../index.php");
?>