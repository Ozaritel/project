<?
	$name = htmlspecialchars($_POST["username"]);
	$pass = htmlspecialchars($_POST["pass"]);
	$hecpass = md5($pass);
	$url = "https://www.google.com/recaptcha/api/siteverify";
	$key = '6LfzTU4UAAAAAMureyGYNLCt-G4NXgChzWWh4MnJ';
	$query = $url."?secret=".$key."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER["REMOTE_ADDR"];
	$data = json_decode(file_get_contents($query));
	if($_POST['enter'])
	{
		if($data->success == true){
			if(!$name || strlen($name)<3)exit("Введите имя");
			else if (!$pass || strlen($pass)<3)exit("Введите Пароль");
			else if(!$_POST['g-recaptcha-response'])exit("Captcha");
			else{
				require $_SERVER['DOCUMENT_ROOT']."/datebase/dbconnect.php"; 
				$data2 = $db->query("SELECT * FROM users")->fetchAll();
				$query=$db->query("SELECT id FROM users");
				$members=$query->rowCount();
				$enterpass = 0;
				$uids;
				for($i = 0;$i<=$members;$i++)
				{	
					if($data2[$i]["uname"] == $name && $data2[$i]["pass"] == $hecpass)
					{
						$enterpass++;
						$uids = $data2[$i]['uid'];
					}
				}
				if($enterpass==1)
				{

					SetCookie("userid",$uids,time()+604800,"/");
					header("Location: http://qqqqq.zzz.com.ua");
				}
				else
				{
					?>
					<form action="../auth" name="myformname" method="POST">
							<input type="hidden" name="error" value="true">
						</form>
						<script>
						  				document.forms["myformname"].submit();
						</script>
					<?
				}
			}
		}
		else{
			echo "sss";
				?>
			<form action="../auth" name="myform" method="POST">
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