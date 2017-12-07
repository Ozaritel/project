<?
session_start();
include "api/config.php";
include "datebase/config.php";
try {
  $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->exec("set names utf8");
}
catch(PDOException $e) {
    echo $e->getMessage();
}
$id = ID; $url = URL;
?>
<!DOCTYPE html>
<html lang="en" style="overflow-x:hidden;">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="shortcut icon" href="../../img/fav.png" type="image/png">
    <title><?echo $title?></title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <link rel="stylesheet" type="text/css" href="../../css/media.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
     <script src="../../js/jquery-3.2.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/menu.js"></script>
    <script src="../../js/ajax.js"></script>
  </head>
  <body onscroll="scrl()" style="overflow-x:hidden;">
  <div class="container-fluid nopad">
  	<div>
  		
  	</div>
  	<div class="container-fluid bc-ground hidden-xs">
  		<div class="blackbg">
  				<div class="enter">
  					<div class="container">
              <?
                if($_SESSION['userid']=='37915630')
                {
                ?>
                  <a href="../../admin/stsl-admin.php"><div class="adminpanel">Админ панель</div></a>
                <?
                }
               ?>
  						<div class="vk">
  							<?php
  							if(!$_SESSION['userid'])
  							{
  								echo "<a class='chang' href='https://oauth.vk.com/authorize?client_id=$id&display=page&redirect_uri=$url&response_type=code'><div class='vkenter'>Войти через Вконтакте</div></a>";
  							}
  							else{
  								$row = $db->query("SELECT uid, first_name, last_name, photo_big, moneyu FROM users WHERE uid =".$_SESSION['userid'])->fetch();
                  echo "<div class='topup' onclick='popupw()'>Пополнить Баланс</div>";
								  echo "<div class='username'>".$row['first_name']." ".$row['last_name']."";
								  echo "<div class='money'>Баланс: <span class='moneyhave'>".$row['moneyu']." руб </span></div></div>";
								  echo "<a href='../../userlk/lk.php'><div class='userphoto'><img src=".$row['photo_big']."></div></a>";
								  echo "<a href='../../api/exit.php'><div class='exit'><img src='../../img/exit.png'></div></a>";
  							}
  							?>
  						</div>
  					</div>
  				</div>
  				<div class="imglogo">
  					<a href="../../index.php"><img src="../../img/LOGO.png" alt=""></a>
  				</div>
  		</div>
  		
		<div class="row">
		  	
		</div>  		
  	</div>
  	<div class="container-fluid nopad ">
  		<div class="menu">
  			<div class="container nopad">
  				
  			
  			<div class="row no-marg">
  				<div class="logomenu col-md-3 col-sm-3 col-xs-10 visible-xs ">
  					<a href="../../index.php"><img src="../../img/logo2.png" alt="" class="log"></a>
	  			</div>
	  			<ul class="hidden-xs marin">
	  				<a href="../../userlk/lk.php"><li>Личный кабинет</li></a>
	  				<a href="../../faq.php"><li>Вопрос/Ответ</li></a>  			
	  			</ul>
	  			<div class="visible-xs">
	  				<div class="button" onclick="menu()">
	  					
	  				</div>
	  			</div>
	  			<div class="mobmenu visible-xs">
	  				<?php
  						if(!$_SESSION['userid'])
  						{
  							echo "<a href='https://oauth.vk.com/authorize?client_id=$id&display=page&redirect_uri=$url&response_type=code'><div class='enterm'>Войти через Вконтакте</div></a>";
  						}
  					else{
  							$row = $db->query("SELECT uid, first_name, last_name, photo_big, moneyu FROM users WHERE uid =".$_SESSION['userid'])->fetch();
							echo "<div class='usernamem'>".$row['first_name']." ".$row['last_name']."</div>";
							echo "<div class='moneym'>Баланс: <span class='moneyhavem'>".$row['moneyu']." руб </span></div>";
							echo "<div class='userphotom'><img src=".$row['photo_big']."></div>";
							echo "<a href='api/exit.php'><div class='exitm'><img src='../../img/exit.png'></div></a>";
              echo '<form action="../../topup/topup.php" method="GET">
                      <input class="topupcountm" type="number" name="amount" value="10">
                      <button class="topupsm">Пополнить</button>
                    </form>';
  						}
              $db = null;
  					?>
	  				<ul>
	  				<a href="../../userlk/lk.php"><li>Личный кабинет</li></a>
	  				<a href="../../faq.php"><li>Вопрос/Ответ</li></a>  			
	  			</ul>
	  			</div>
	  			<div class="closemob">
	  				
	  			</div>
  			</div>
  			</div>
  		</div>
    </div>
  </div>
