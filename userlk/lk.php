<?
$title = 'STEAMSELLS.COM - Личный кабинет пользователя';
require "../header.php";
require "../live.php";
if(!$_SESSION['userid'])
{
	echo "<div class='notauth'>Для того чтобы зайти в Личный Кабинет, вам нужно авторизоваться!</div>";
}
else{
	$row = $db->query("SELECT uid, first_name, last_name, photo_big, moneyu FROM users WHERE uid =".$_SESSION['userid'])->fetch();
?>
<div class="container-fluid">
	<div class="container nopadm">
		<div class="col-sm-3 hidden-xs">
			<div class="aboutuser">
				<div class="imgperson">
					<?
						echo "<img src=".$row['photo_big'].">";
					?>
				</div>
				<div class="nameperson"><?echo "".$row['first_name']." ".$row['last_name']."";?></div>
				<div class="balansperson">Баланс: <span><?echo "".$row['moneyu']." руб";?></span></div>
				<div class='buyes' onclick='popupw()'>Пополнить</div>
			</div>
		</div>
		<div class="col-sm-9 col-xs-12 nopad">
			<div class="buysandtopup">
				<div class="mybuys selectb" onclick="buys()">Покупки</div>
				<div class="mytopup" onclick="topup()">Пополнения</div>
				<div class="mybuys1"> 
					<div class="mybuys2">В данном разделе вы сможете отследить ваши покупки, а также решить продать товар который вы купили, или получить.</div>
					<div class="centerbuys">
					<?
						$userbuy = $db->query("SELECT * FROM usersbuy WHERE userid =".$_SESSION['userid'])->fetchAll();
						$countgood = count($userbuy)-1;
						if($countgood+1>0)
						{
							for ($i=$countgood; $i >= 0; $i--) 
							{ 
								$good = $db->query("SELECT * FROM Items WHERE id ='".$userbuy[$i]['item_id']."'")->fetch();
								$idbuy = $userbuy[$i]['id'];
								$imagegood = $good['image'];
								$costgame = $db->query("SELECT * FROM gamescost WHERE item_id ='".$userbuy[$i]['cost']."'")->fetch();
								?>
								<div class="gotitem" id="<?echo $idbuy?>got">
								<div class="goodimg">
									<img src="<?echo '../admin/load/'.$imagegood?>" alt="">
								</div>
									<?
									if($userbuy[$i]['sell']==0)
									{
									?>
										<div class="getitem" id="<?echo $idbuy?>get">
										<?
											if($userbuy[$i]['cost']==0)
											{
										?>		
												<div class="gamedrop">
													Случайная игра
												</div>
												<div class="cost">
													<?echo $costgame['cost']." руб";?>
												</div>
										<?
											}
											else
											{
										?>
												<div class="gamedrop"><?echo $good['name']?></div>
												<div class="cost">
													<?echo $costgame['cost']." руб";?>
												</div>
										<?
											}
										?>
											<div class="getsitem" id="<?echo $idbuy?>" onclick="getitem(this.id)">
												Получить
											</div>
											<div class="sellitem" id="<?echo $idbuy?>" onclick="sellitem(this.id)">
												Продать
											</div>
										</div>
									<?
									}
									else if($userbuy[$i]['sell']==1)
									{
									?>
										<div class="imgopen">
											<img src="../img/open.png" alt="">
										</div>
										<div class="keygame">
											<?
												echo $userbuy[$i]['game'];
											?>
										</div>
									<?
									}
									else if($userbuy[$i]['sell']==2)
									{
									?>
										<div class="imgsell">
											<img src="../img/sell.png" alt="">
										</div>
									<?
									}
									?>
								</div>
						<?
							}
						}
						else{
						?>
							<div class="notbuy">
								Вы ещё не совершали покупок!
							</div>
						<?
							}
						?>
					</div>
				</div>
				<div class="mytopup1" style="display: none;">
					<div class="mytopup2">В данном разделе вы сможете отследить вашу исторю пополнений.</div>
					<?
						$money = $db->query("SELECT count, via, access FROM pay WHERE uid =".$_SESSION['userid'])->fetchAll();
						$counts = count($money);
						$cer = $counts+1;
						$ready = '';
						if($counts>0)
						{
							for ($i=0; $i<$counts ; $i++) { 

								$cer--;
								if($money[$i]['access'])
								{
									$ready="<div class='status popol'>
											Оплачено
										</div>";
								}
								else
								{
									$ready="<div class='status notpopol'>
											Не оплачено
										</div>";
								}
								echo "<div class='col-xs-12'>
										<div class='paymants'>
										<div class='number'>
											".$cer."
										</div>
										<div class='countpays'>
											".$money[$i]['count']." руб
										</div>
										<div class='viapay'>
											".$money[$i]['via']."
										</div>
											".$ready."
										</div>
								</div>";
							}
						}
						else
						{
						?>
							<div class="notbuy">
								Вы ещё не совершали никаких пополнений!
							</div>
						<?
						}
						?>
				</div>
			</div>
		</div>
	</div>
</div>
<?
	}
?>
<?
require "../footer.php";
?>