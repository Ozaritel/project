<?
include "api/config.php";
include "datebase/dbconnect.php";
require("profile/classes/user.php");
$id = ID; $url = URL;
$userids = $db->query("SELECT uid FROM users WHERE hash='".$_COOKIE['userid']."'")->fetch();
?>
<!DOCTYPE html>
<html lang="ru" style="overflow-x:hidden;">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#342727">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?echo $title?></title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/media.css">
    <link rel="shortcut icon" href="/img/fav.png" type="image/png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script type="text/javascript" src="/js/jquery.cookie.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="/js/javascript.js"></script>
    <script src="/js/ajax.js"></script>
  </head>
  <body>
    <div class="wrapper">
      <div class="content">
  	<div class="menu">
  		<input type="hidden" name="mes" id="mes" value='-1'>
	  	<div class="container">
	  		<div class="menulogo"><img src="/img/logo.png" alt=""></div>
	  		<ul class="nav">
	  			<a href="/"><li class="navbar active"><span>Главная</span></li></a>
	  			<a href="/game-values/"><li class="navbar"><span>Игровые средства</span></li></a>
	  			<a href="/accounts/"><li class="navbar"><span>Аккаунты</span></li></a>
	  			<a href="/items/"><li class="navbar"><span>Предметы</span></li></a>
          <a href="/services/"><li class="navbar"><span>Услуги</span></li></a>
	  			<?php
  							if(!isset($_COOKIE["userid"]))
  							{
                  ?>
                  <li class="navbar entervk"><span>Войти / Зарегистрироваться</span></li>
  							  <?
                }
  							else{
  								$user = new User();
                  $dontread = $db->query("SELECT id FROM chat WHERE idseller='".$userids['uid']."' AND readtext=0");
                  $countread = $dontread->rowCount();
								  echo "<div class='flleft'><div class='username'>"; 
                  if($countread>0)echo "<a href='/profile/messages/'><div class='dontreadmessage' style='display:block;'><span>".$countread."</span><img src='/img/dontreadmsg.png' alt=''></div></a>";
                  else echo "<a href='/profile/messages/'><div class='dontreadmessage' style='display:none;'><span>".$countread."</span><img src='/img/dontreadmsg.png' alt=''></div></a>"; 
                  echo "".$user->Name()."";
                  echo "<div class='ppclass'><a href='/profile/'>Личный кабинет</a></div></div></div>";
								  echo "<div class='photo-place'><a href='/profile/'><div class='userphoto'><img src=".$user->Photo()." class='profile-img'></div></a>";
								  echo "<a href='/api/exit.php'><div class='exit'><img src='/img/exit.png'></div></a></div>";
  							}
  							?>
	  		</ul>
        <?
          if(!isset($_COOKIE["userid"]))
          {
            echo '<div class="choose-m"><div class="triangle"></div><a href="/profile/auth"><div class="enter-m">Авторизация</div></a><a href="/profile/registration"><div class="registration-m">Регистрация</div></a></div>';
          }
        ?>
  		</div>
  	</div>
  	<div class="menum">
	  	<div class="container">
	  		<div class="menulogo"><img src="../../img/logo.png" alt=""></div>
	  		<div class="sidemob">
		  		<ul class="nav">
		  			<a href="/"><li class="navbar active"><span>Главная</span></li></a>
		  			<a href="index.php"><li class="navbar"><span>Игровые ценности</span></li></a>
		  			<a href="#"><li class="navbar"><span>Аккаунты</span></li></a>
		  			<a href="#"><li class="navbar"><span>Услуги</span></li></a>
            <a href="#"><li class="navbar"><span>Предметы</span></li><a>
		  			<a href="#"><li class="navbar"><span>О нас</span></li></a>
		  			<?php
  							if(!isset($_COOKIE["userid"]))
  							{
                  ?>
                  <a href="/profile/auth"><li class="navbar entervk"><span>Авторизоваться</span></li></a>
                  <a href="/profile/registration"><li class="navbar entervk"><span>Зарегистрироваться</span></li></a>
                  <?
  							}
  							else{
  								$row = $db->query("SELECT uid, uname, photo_big, moneyu FROM users WHERE uid =".$userids['uid'])->fetch();
                  echo "<div class='topup-m' onclick='popupw()'>Пополнить Баланс</div>";
								  echo "<div class='username-m'>".$row['uname']."";
								  echo "<div class='money-m'>Баланс: <span class='moneyhave-m'>".$row['moneyu']." руб </span></div></div>";
								  echo "<a href='/profile/'><div class='userphoto-m'><img src=".$row['photo_big']." class='profile-img-m'></div></a>";
								  echo "<a href='/api/exit.php'><div class='exit-m'><img src='/img/exit.png'></div></a>";
  							}
  							?>
		  		</ul>
	  		</div>
	  		<div class="buttonmenu" onclick="menu()"></div>
  		</div>
  	</div>
    <div class="contant">

