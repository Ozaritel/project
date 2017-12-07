setInterval(function() {
	gethistory();
},1500);
var stop = 0;
function roulet(){
	if ($(window).width() <= '1345'){		
		var shirina = 6535;
	}
	else{		
		var shirina = 7950;
	}
	var rand = Math.random() * (165 - 0) + 0;
	for (i = -175; i>=-shirina-rand; i--) {
		setTimeout(move, 1000);
	}
	$("#opening").css("display","block");
	$("#open").css("display","none");
	setTimeout(popupbuy, 10700);
}
function buyitem()
{
	var iditem = $("#idthis").val(); 
	$.ajax({
		url: "../senditem.php",
		type:"POST",
		data:"idthis="+iditem ,
		datatype: "html",
		success: function(data){
			if(data == "Пополните счет!")
			{
				$(".popup").fadeIn(500);
			}
			else
			{
				$(".moneyhave").html(data);
				roulet();
			}
		}
	});
	
}
function buyitemM(){
	var iditem = $("#idthis").val(); 
	$.ajax({
		url: "../senditem.php",
		type:"POST",
		data:"idthis="+iditem ,
		datatype: "html",
		success: function(data){
			if(data == "Пополните счет!")
			{
				alert("Пополните счет!")
			}
			else
			{
				$(".moneyhavem").html(data);
				rouletmob();
			}
		}
	});
}
function popupbuy()
{
	$(".popupbuy").fadeIn(500);
}
function closepopupbuy()
{
	$(".popupbuy").fadeOut(500);
}
function rouletmob(){
	
	if ($(window).width() <= '374'){		
		var shirina = 6740;
	}
	else if($(window).width() <= '413'){
		var shirina = 6710;
	}
	else if($(window).width() <= '567'){
		var shirina = 6690;
	}
	else if($(window).width() <= '666'){
		var shirina = 6615;
	}
	else if($(window).width() <= '735'){
		var shirina = 6570;
	}
	else if($(window).width() <= '1023'){
		var shirina = 6530;
	}
	else if($(window).width() <= '1024'){
		var shirina = 6530;
	}
	var rand = Math.random() * (130 - 0) + 0;
	for (i = -175; i>=-shirina-rand; i--) {
		setTimeout(move, 1000);
	}
	$("#openingm").css("display","block");
	$("#openm").css("display","none");
	setTimeout(popupbuy, 10700);
}
function move(){

	$('.rouletbox').css("left",i+"px");
}
function sellitem()
{

}
function getitem()
{

}
function gethistory()
{
		$.ajax({  
		url: "../../gethistory.php",  
		cache: false,  
		success: function(html)
		{
			ArHistory = html.split('|');
			echohistory();
		}  
	});
}
function echohistory()
{
	$(".livem").empty();
		for (var i = 0; i < 8; i++) 
		{
			ArHistory2 = ArHistory[i].split(',');
			
			var lastname = ArHistory2[3];
			var firstname = ArHistory2[2];
			var img = ArHistory2[0];
			var url = ArHistory2[1];
			if(i<3)
				$('.livem').append('<div class="liveitem"><div class="online"><img src="../../admin/load/'+img+'" alt=""><div class="hoveronline"><a href="../../items/buy/'+url+'"><div class="bayitem">Открыть</div></a></div></div><div class="livename">'+firstname+' '+lastname+'</div></div>');		
			if(i>=3 && i<=5)
				$('.livem').append('<div class="liveitem hidden-xs"><div class="online"><img src="../../admin/load/'+img+'" alt=""><div class="hoveronline"><a href="../../items/buy/'+url+'"><div class="bayitem">Открыть</div></a></div></div><div class="livename">'+firstname+' '+lastname+'</div></div>');		
			if(i>5)
				$('.livem').append('<div class="liveitem hidden-xs hidden-sm"><div class="online"><img src="../../admin/load/'+img+'" alt=""><div class="hoveronline"><a href="../../items/buy/'+url+'"><div class="bayitem">Открыть</div></a></div></div><div class="livename">'+firstname+' '+lastname+'</div></div>');		
		$(function() {
      		$('.livem .liveitem').each(function(i) {
    		$(this).delay((i++) * 80).fadeTo(100, 1); })
			}); 
		}
}
function getitem(id)
{
	var idit=id;
	$.ajax({  
		url: "../../getitem.php",  
		type:"POST",
		data:"id="+idit,
		datatype: "html",
		success: function(data)
		{
			var key=data;
			$("#"+id+"get").remove();
			$("#"+id+"got").append('<div class="imgopen"><img src="../img/open.png" alt=""></div><div class="keygame">'+data+'</div>');
		}  
	});
}
function sellitem(id)
{
	var idit=id;
	$.ajax({  
		url: "../../sellitem.php",
		type:"POST",
		data:"id="+idit,
		datatype: "html",
		success: function(data)
		{
			$(".moneyhave").html(data);
			$("#"+id+"get").remove();
			$("#"+id+"got").append('<div class="imgsell"><img src="../img/sell.png" alt=""></div>');
		}  
	});
}
function buyitem1()
{
	var iditem = $("#idthis").val(); 
	$.ajax({
		url: "../senditem.php",
		type:"POST",
		data:"idthis="+iditem ,
		datatype: "html",
		success: function(data){
			if(data == "Пополните счет!")
			{
				$(".popup").fadeIn(500);
			}
			else
			{
				$(".moneyhave").html(data);
				roulet1();
			}
		}
	});
	
}
function roulet1()
{
	if ($(window).width() <= '1345'){		
		var shirina = 6345;
	}
	else{		
		var shirina = 7725;
	}
	var rand = Math.random() * (165 - 0) + 0;
	for (i = -175; i>=-shirina-rand; i--) {
		setTimeout(move, 1000);
	}
	$("#opening").css("display","block");
	$("#open").css("display","none");
	setTimeout(popupbuy, 10700);
};
function buyitemM1(){
	var iditem = $("#idthis").val(); 
	$.ajax({
		url: "../senditem.php",
		type:"POST",
		data:"idthis="+iditem ,
		datatype: "html",
		success: function(data){
			if(data == "Пополните счет!")
			{
				alert("Пополните счет!")
			}
			else
			{
				$(".moneyhavem").html(data);
				rouletmob1();
			}
		}
	});
}
function rouletmob1(){
	
	if ($(window).width() <= '374'){		
		var shirina = 6553;
	}
	else if($(window).width() <= '413'){
		var shirina = 6525;
	}
	else if($(window).width() <= '567'){
		var shirina = 6505;
	}
	else if($(window).width() <= '666'){
		var shirina = 6430;
	}
	else if($(window).width() <= '735'){
		var shirina = 6383;
	}
	else if($(window).width() <= '1023'){
		var shirina = 6347;
	}
	else if($(window).width() <= '1024'){
		var shirina = 6347;
	}
	var rand = Math.random() * (130 - 0) + 0;
	for (i = -175; i>=-shirina-rand; i--) {
		setTimeout(move, 1000);
	}
	$("#openingm").css("display","block");
	$("#openm").css("display","none");
	setTimeout(popupbuy, 10700);
}
