<?php
include "../datebase/config.php";
try {
	$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  	$db->exec("set names utf8");
}
catch(PDOException $e) {
	echo $e->getMessage();
}
$row = $db->query("SELECT * FROM `pay` WHERE `id`='".$_POST['payno']."'")->fetch();
$secret = '1ff788a023bc9c61875f1248efb1cccd';
$amount = $row['count'];
$user = $row['uid'];

if($_SERVER["REMOTE_ADDR"] !== '109.120.152.109')exit();

if($_POST["amount"] != $amount)exit();
                
$sign = $_POST['sign'];
unset($_POST['sign']);
ksort($_POST,SORT_STRING);
$signi = hash('sha256',implode(':',$_POST).':'.$secret);
if($signi !== $sign)exit();
$us = $db->query("SELECT * FROM users WHERE uid ='".$user."'")->fetch();
$summa = $us['moneyu'] + $amount;
echo $us['moneyu'];
$db->query("UPDATE `users` SET `moneyu`='".$summa."' WHERE `uid`='".$user."'");
$db->query("UPDATE `pay` SET `access`='1' WHERE `id`='".$_POST['payno']."'");
exit();
?>