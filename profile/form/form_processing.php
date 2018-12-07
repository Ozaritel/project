<?
	include $_SERVER['DOCUMENT_ROOT']."/datebase/dbconnect.php"; 
	$name = htmlspecialchars($_POST["username"]);
	$pass = htmlspecialchars($_POST["pass"]);
	$email = htmlspecialchars($_POST["email"]);
	$url = "https://www.google.com/recaptcha/api/siteverify";
	$key = '6LfzTU4UAAAAAMureyGYNLCt-G4NXgChzWWh4MnJ';
	$query = $url."?secret=".$key."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER["REMOTE_ADDR"];
	$data = json_decode(file_get_contents($query));
	if($_POST["enter"]){
		if($data->success == true){
			if(!$name || strlen($name)<3)exit("Введите имя");
			else if (!$pass || strlen($pass)<3)exit("Введите Пароль");
			else if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL))exit("Введите Email");
			else if(!$_POST['g-recaptcha-response'])exit("Captcha");
			else{
			}	
			$data2 = $db->query("SELECT * FROM users")->fetchAll();
			$query=$db->query("SELECT id FROM users");
			$members=$query->rowCount();
			for($i = 0;$i<=$members;$i++)
			{	
				if($data2[$i]["uname"] == $name){
					?>
					<form action="../registration" name="myformname" method="POST">
							<input type="hidden" name="login" value="false">
						</form>
						<script>
						  				document.forms["myformname"].submit();
						</script>
					<?
				}
				else if($data2[$i]["email"] == $email)
				{
						?>
					<form action="../registration" name="myformname" method="POST">
							<input type="hidden" name="emailf" value="false">
						</form>
						<script>
						  				document.forms["myformname"].submit();
						</script>
					<?
				}
			}
			do
			{
				$uids = rand(1000000000,4000000000);
			}while ($uids==$data2[$i]['uid']);
			$hecpass = md5($pass);
			$db->query("INSERT INTO users SET uid ='".$uids."',uname ='".$name."',pass ='".$hecpass."',email ='".$email."',photo_big='http://qqqqq.zzz.com.ua/img/flopuser.png', moneyu=0");
			SetCookie("userid",$uids,time()+604800,"/");
			header("Location: http://qqqqq.zzz.com.ua");
		}
		else
		{
			?>
			<form action="../registration" name="myform" method="POST">
					<input type="hidden" name="captcha" value="false">
				</form>
				<script>
				  				document.forms["myform"].submit();
				</script>
			<?
		}
	}
	$db = null;
?>
