var check=false;
var i;
function menu()
{
	if(!check)
	{
		$(".button").css("background-image","url(../../img/menu2.png)");
		for (i = -250; i<=-1; i++) {
			  setTimeout(sloww, 100);
		}
		check++;
	}
	else
	{
		$(".button").css("background-image","url(../../img/menu.png)");
		for (i = 0; i>=-250; i--) {
			  setTimeout(sloww, 100);
		}
		check--;
	}
}
function sloww()
{
	$('.mobmenu').css("left",i+"px");
}
function scrl()
{
	var src = $('html,body').scrollTop();
	if (src > 0) {
		$('.topup').css("border","1px solid black");
		$('.topup').css("background-color","rgb(226, 23, 19)");
		$('.enter').css("background-color","white");
		$('.enter').css("border-bottom","1px solid black");
		$('.vk').css("color","black");
		$('.chang').css("color","black");
		$('.moneyhave').css("color","#e21712");
	}
	else if(src==0){
		$('.enter').css("background-color","rgba(0, 0, 0, 0)");
		$('.enter').css("border-bottom","1px solid white");
		$('.vk').css("color","white");
		$('.chang').css("color","white");
		$('.moneyhave').css("color","white");
		$('.topup').css("border","1px solid white");
		$('.topup').css("background-color","rgba(226, 23, 19, 0.35)");
	}
}
function popupw()
{
  	$(".popup").fadeIn(500);
}
function closepopup()
{
	$(".popup").fadeOut(500);
	$(".popupbuy").fadeOut(500);
}
function buys()
{
	$('.mybuys1').css('display','block');
	$('.mytopup1').css('display','none');
	$('.mybuys').addClass('selectb');
	$('.mytopup').removeClass('selectb');
}
function topup()
{
	$('.mybuys1').css('display','none');
	$('.mytopup1').css('display','block');
	$('.mytopup').addClass('selectb');
	$('.mybuys').removeClass('selectb');
}
function reloadpage()
{
	location.reload();
}