<?
  session_start();
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
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>STEAMSELLS.COM - Админ Панель</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="../css/media.css">

    <link rel="shortcut icon" href="../../img/fav.png" type="image/png">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  </head>
  <body>
  <?
    if($_SESSION['userid']=='37915630')
    {
  ?>
  	<div class="container-fluid paybc nopad">
  		<div class="container nopad widthsize">
  			<div class="paypage">Админ панель</div>
  			<div class="paypage1">STEAMSELLS.COM</div>
  		</div>
  	</div>
    <div class="container">
      <div class="addall">
      <div class="additem">
        Добавить товар
      </div>
      
      </div>
      <div class="addnal">
        Добавить наличие товара
      
      <form action="addnal.php" method="post" accept-charset="utf-8">
          <select class="eeee" name='chooseitem'>
            <?
              $addnal = $db->query("SELECT * FROM `Items`")->fetchAll();
              $amount = count($addnal);
             for ($i=0; $i < $amount; $i++) { 
                echo "<option value=".$addnal[$i]['id'].">".$addnal[$i]['name']."</option>";
              }
            ?>
          </select>
          <div class='formnal'><input type="text"  class="add1" name="add1">
            <div>
                <select class='win' name="win1">
                  <option value="no" selected>НЕТ</option>
                  <option value="yes">да</option>
                </select>
            </div>
          </div>
          <div class="addstring" onclick="addstring()">
            Добавить строку
          </div>
          <input class='naladd' type="submit" name="send" value="SEND">
      </form>
      </div> 
    </div>
  <?
    }
  ?>  
  <script type="text/javascript">
    var id = 2;
function addstring()
{
  $(".formnal").append("<input type='text'  class='add1' name='add"+id+"'><div><select class='win' name='win"+id+"'><option value='no' selected>НЕТ</option><option value='yes'>да</option></select></div>");
  id++;
}
  </script>
  </body>
</html>
