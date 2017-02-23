<?php
include_once ('safemysql.class.php');
$elements = array (
	"defaultprice"=>"Цена за стандартный выбор", 
	"sanUzel" => "Цена за санузел",
	"prihojaya" => "Цена за прихожаю",
	"room" => "Цена за комнату",
	"S" => "Цена за 1 кв. м.",
	"radioButton" => "Цена за вид уборки (Генеральная или После ремонта)",
	"inFridge" => "Цена за холодильник",
	"inOven" => "Цена за духовку",
	"inMicrowave" => "Цена за микроволновку",
	"washKitchenCabinet" => "Цена за кухонные шкафы",
	"washKettle" => "Цена за чайник",
	"washDishes" => "Цена за посуду",
	"cleanBalcony" => "Цена за балкон",
	"washRoomsCabinet" => "Цена за комнатные шкафы",
	"washWindows" => "Цена за окна",
	"washMirrors" => "Цена за зеркала"
);

if (isset($_POST['write']))
{

if (isset($_GET['a']) && ($_GET['a'] == "admin"))
	include_once("admin.php");
if (isset($_GET['a']) && ($_GET['a'] == "mail"))
	include_once("addmail.php");

}

?>
<html>
<head> 
  <style>
    .tooltip2 {
      position: fixed;
      padding: 10px 20px;
      /* красивости... */
	  z-index:9999;
      border: 1px solid #b3c9ce;
      border-radius: 4px;
      text-align: center;
      font: italic 14px/1.3 arial, sans-serif;
      color: #333;
      background: #FFFAD1;
      box-shadow: 3px 3px 3px rgba(0, 0, 0, .3);
    }
  </style>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css"> 
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="script/jquery.maskedinput1.4.1.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> 
</head>
<body>
<?php
if (isset($_GET['a']) && ($_GET['a'] == "admin"))
	include_once("admin.php");
if (isset($_GET['a']) && ($_GET['a'] == "mail"))
	include_once("addmail.php");
?>

  <div id="calcblock" style="margin:0 auto;width:1040px;">
  <div class="row" >
  <div class="col-md-4">
 
  <h4>Общая площадь м&sup2;</h4>
  <div class="input-group" >
    <span class="input-group-addon" style="cursor: pointer;" onclick="washer.setValue('-', 1);"><span class="glyphicon glyphicon-minus"></span></span>
    <input id="wa1" type="text" class="form-control"  style="padding-left:50%;" value="20">
    <span class="input-group-addon" style="cursor: pointer;background-color:ffeb3b;" onclick="washer.setValue('+', 1);"><span class="glyphicon glyphicon-plus"></span></span>
  </div></div>
  <div class="col-md-4">
  <h4>Количество прихожих</h4>
  <div class="input-group" >
    <span class="input-group-addon" style="cursor: pointer;" onclick="washer.setValue('-', 2);"><span class="glyphicon glyphicon-minus"></span></span>
    <input id="wa2" type="text" class="form-control"  style="padding-left:50%;" value="0">
    <span class="input-group-addon" style="cursor: pointer;background-color:ffeb3b;" onclick="washer.setValue('+', 2);"><span class="glyphicon glyphicon-plus"></span></span>
  </div></div>
  <div id="inner">
  <div id="ch1" class="col-md-4" style="margin:0 auto;width:218px;"> 
    <div style="margin-top:40px;" onclick="washer.setValue('-', 3);"><img id="wa3" alt="1" src="<?php echo "http://".$_SERVER['HTTP_HOST']."/whashing/"; ?>color.png" alt="..." class="img-thumbnail" style="cursor: pointer;width:34px;height:34px;float:left;"><h4 style="padding-top:6px; padding-left:45px;"> Генеральная</h4></div>
    </div>
	
  </div>
</div>

  <div class="row" >
  <div class="col-md-4">
 
  <h4>Количество комнат</h4>
  <div class="input-group" >
    <span class="input-group-addon" style="cursor: pointer;" onclick="washer.setValue('-', 4);"><span class="glyphicon glyphicon-minus"></span></span>
    <input id="wa4" type="text" class="form-control"  style="padding-left:50%;" value="1">
    <span class="input-group-addon" style="cursor: pointer;background-color:ffeb3b;" onclick="washer.setValue('+', 4);"><span class="glyphicon glyphicon-plus"></span></span>
  </div></div>
  <div class="col-md-4">
  <h4>Количество санузлов</h4>
  <div class="input-group" >
   <span class="input-group-addon" style="cursor: pointer;" onclick="washer.setValue('-', 5);"><span class="glyphicon glyphicon-minus"></span></span>
    <input id="wa5" type="text" class="form-control"  style="padding-left:50%;" value="1">
    <span class="input-group-addon" style="cursor: pointer;background-color:ffeb3b;" onclick="washer.setValue('+', 5);"><span class="glyphicon glyphicon-plus"></span></span>
  </div></div>
  <div id="outer">
  <div id="ch2" class="col-md-4" style="margin:0 auto;width:220px;"> 
    <div style="margin-top:40px;" onclick="washer.setValue('-', 6);"><img id="wa6" src="<?php echo "http://".$_SERVER['HTTP_HOST']."/whashing/"; ?>color2.png" alt="0"  class="img-thumbnail" style="cursor: pointer;width:34px;height:34px;float:left;"><h4 style="padding-top:6px; padding-left:45px;"> После ремонта</h4></div>
  </div>
  </div>
</div>
<br>
<div id="dop">
 <h4>Дополнительно<img id="arrow" src="<?php echo "http://".$_SERVER['HTTP_HOST']."/whashing/"; ?>arrow.png"  class="img-thumbnail" style="margin-left:5px;cursor: pointer;width:23px;height:19px;" onclick="washer.minimize();"></h4>
 </div>
 <div id="adder">
 <div class="liner" style="margin-left:5;height:1px; width:100%; border:1px solid gray;margin-bottom:15px;"></div>
<div id="extrablock" class="row" style="margin-left:2px;">
  <div class="col-md-2 myblock" style="display:inline-block;height:163px;width:176px;border-radius:6px;border:1px solid #ccc;margin-right:5px;margin-top:5px;padding-left:0px;padding-right:0px;"><p class="text-center">Внутри<br>холодильника</p>
  <p style="text-align:center;"><img src="<?php echo "http://".$_SERVER['HTTP_HOST']."/whashing/"; ?>img/1.png"></p>
  <span data-tooltip="Очистка внутренних поверхностей<br>холодильников и морозильных камер" class="glyphicon glyphicon-question-sign" style="position:absolute;right:0px;"></span>
  <div class="input-group" style="position:absolute;bottom:0px;">
    <span class="input-group-addon" style="cursor: pointer;" onclick="washer.setValue('-', 7);"><b>&mdash;</b></span>
    <input id="wa7" type="text" class="form-control"  style="padding-left:50%;" value="0">
    <span class="input-group-addon" style="cursor: pointer;background-color:ffeb3b;" onclick="washer.setValue('+', 7);"><b>+</b></span>
  </div></div>
  <div class="col-md-2 myblock" style="display:inline-block;height:163px;width:176px;border-radius:6px;border:1px solid #ccc;margin-right:5px;margin-top:5px;padding-left:0px;padding-right:0px;"><p class="text-center">Внутри<br>духовки</p>
  <p style="text-align:center;"><img src="<?php echo "http://".$_SERVER['HTTP_HOST']."/whashing/"; ?>img/2.png"></p>
  <span data-tooltip="Очистка и удаление жира с внутренней<br>поверхности духового шкафа" class="glyphicon glyphicon-question-sign" style="position:absolute;right:0px;"></span>
  <div class="input-group" style="position:absolute;bottom:0px;">
    <span class="input-group-addon" style="cursor: pointer;" onclick="washer.setValue('-', 8);"><b>&mdash;</b></span>
    <input id="wa8" type="text" class="form-control"  style="padding-left:50%;" value="0">
    <span class="input-group-addon" style="cursor: pointer;background-color:ffeb3b;" onclick="washer.setValue('+', 8);"><b>+</b></span>
  </div></div>
  <div class="col-md-2 myblock" style="display:inline-block;height:163px;width:176px;border-radius:6px;border:1px solid #ccc;margin-right:5px;margin-top:5px;padding-left:0px;padding-right:0px;"><p class="text-center">Внутри<br>микроволновки</p>
  <p style="text-align:center;"><img style="margin-top:10px;" src="<?php echo "http://".$_SERVER['HTTP_HOST']."/whashing/"; ?>img/3.png"></p>
  <span data-tooltip="Очистка и удаление жира из<br>микроволновой печи" class="glyphicon glyphicon-question-sign" style="position:absolute;right:0px;"></span>
  <div class="input-group" style="position:absolute;bottom:0px;">
    <span class="input-group-addon" style="cursor: pointer;" onclick="washer.setValue('-', 9);"><b>&mdash;</b></span>
    <input id="wa9" type="text" class="form-control"  style="padding-left:50%;" value="0">
    <span class="input-group-addon" style="cursor: pointer;background-color:ffeb3b;" onclick="washer.setValue('+', 9);"><b>+</b></span>
  </div></div>
  <div class="col-md-2 myblock" style="display:inline-block;height:163px;width:176px;border-radius:6px;border:1px solid #ccc;margin-right:5px;margin-top:5px;padding-left:0px;padding-right:0px;"><p class="text-center">Помыть<br>кухонные шкафы</p>
  <p style="text-align:center;"><img src="<?php echo "http://".$_SERVER['HTTP_HOST']."/whashing/"; ?>img/4.png"></p>
  <span data-tooltip="Протирка и уборка в кухонных шкафах" class="glyphicon glyphicon-question-sign" style="position:absolute;right:0px;"></span>
  <div class="input-group" style="position:absolute;bottom:0px;">
    <span class="input-group-addon" style="cursor: pointer;" onclick="washer.setValue('-', 10);"><b>&mdash;</b></span>
    <input id="wa10" type="text" class="form-control"  style="padding-left:50%;" value="0">
    <span class="input-group-addon" style="cursor: pointer;background-color:ffeb3b;" onclick="washer.setValue('+', 10);"><b>+</b></span>
  </div></div>
  <div class="col-md-2 myblock" style="display:inline-block;height:163px;width:176px;border-radius:6px;border:1px solid #ccc;margin-right:5px;margin-top:5px;padding-left:0px;padding-right:0px;"><p class="text-center">Помыть<br>чайник от накипи</p>
  <p style="text-align:center;"><img src="<?php echo "http://".$_SERVER['HTTP_HOST']."/whashing/"; ?>img/5.png"></p>
  <span class="glyphicon glyphicon-question-sign" style="position:absolute;right:0px;"></span>
  <div class="input-group" style="position:absolute;bottom:0px;">
    <span class="input-group-addon" style="cursor: pointer;" onclick="washer.setValue('-', 11);"><b>&mdash;</b></span>
    <input id="wa11" type="text" class="form-control"  style="padding-left:50%;" value="0">
    <span class="input-group-addon" style="cursor: pointer;background-color:ffeb3b;" onclick="washer.setValue('+', 11);"><b>+</b></span>
  </div></div>
  <div class="col-md-2 myblock" style="display:inline-block;height:163px;width:176px;border-radius:6px;border:1px solid #ccc;margin-right:5px;margin-top:5px;padding-left:0px;padding-right:0px;"><p class="text-center">Помыть<br>посуду</p>
  <p style="text-align:center;"><img src="<?php echo "http://".$_SERVER['HTTP_HOST']."/whashing/"; ?>img/6.png"></p>
  <span class="glyphicon glyphicon-question-sign" style="position:absolute;right:0px;"></span>
  <div class="input-group" style="position:absolute;bottom:0px;">
    <span class="input-group-addon" style="cursor: pointer;" onclick="washer.setValue('-', 12);"><b>&mdash;</b></span>
    <input id="wa12" type="text" class="form-control"  style="padding-left:50%;" value="0">
    <span class="input-group-addon" style="cursor: pointer;background-color:ffeb3b;" onclick="washer.setValue('+', 12);"><b>+</b></span>
  </div></div>
  <div class="col-md-2 myblock" style="display:inline-block;height:163px;width:176px;border-radius:6px;border:1px solid #ccc;margin-right:5px;margin-top:5px;padding-left:0px;padding-right:0px;"><p class="text-center">Убраться<br>на балконе</p>
  <p style="text-align:center;"><img src="<?php echo "http://".$_SERVER['HTTP_HOST']."/whashing/"; ?>img/7.png"></p>
  <span data-tooltip="Протирка всех доступных поверхностей<br>на балконе, кроме окон" class="glyphicon glyphicon-question-sign" style="position:absolute;right:0px;"></span>
  <div class="input-group" style="position:absolute;bottom:0px;">
    <span class="input-group-addon" style="cursor: pointer;" onclick="washer.setValue('-', 13);"><b>&mdash;</b></span>
    <input id="wa13" type="text" class="form-control"  style="padding-left:50%;" value="0">
    <span class="input-group-addon" style="cursor: pointer;background-color:ffeb3b;" onclick="washer.setValue('+', 13);"><b>+</b></span>
  </div></div>
  <div class="col-md-2 myblock" style="display:inline-block;height:163px;width:176px;border-radius:6px;border:1px solid #ccc;margin-right:5px;margin-top:5px;padding-left:0px;padding-right:0px;"><p class="text-center">Помыть<br>комнатные шкафы</p>
  <p style="text-align:center;"><img src="<?php echo "http://".$_SERVER['HTTP_HOST']."/whashing/"; ?>img/8.png"></p>
  <span class="glyphicon glyphicon-question-sign" style="position:absolute;right:0px;"></span>
  <div class="input-group" style="position:absolute;bottom:0px;">
    <span class="input-group-addon" style="cursor: pointer;" onclick="washer.setValue('-', 14);"><b>&mdash;</b></span>
    <input id="wa14" type="text" class="form-control"  style="padding-left:50%;" value="0">
    <span class="input-group-addon" style="cursor: pointer;background-color:ffeb3b;" onclick="washer.setValue('+', 14);"><b>+</b></span>
  </div></div>
  <div class="col-md-2 myblock" style="display:inline-block;height:163px;width:176px;border-radius:6px;border:1px solid #ccc;margin-right:5px;margin-top:5px;padding-left:0px;padding-right:0px;"><p class="text-center">Помыть<br>окна</p>
  <p style="text-align:center;"><img src="<?php echo "http://".$_SERVER['HTTP_HOST']."/whashing/"; ?>img/9.png"></p>
  <span data-tooltip="Мытье окон 3м&sup2; (в зимнее время с 1 ноября<br>по 31 марта только с внутренней стороны)" class="glyphicon glyphicon-question-sign" style="position:absolute;right:0px;"></span>
  <div class="input-group" style="position:absolute;bottom:0px;">
    <span class="input-group-addon" style="cursor: pointer;" onclick="washer.setValue('-', 15);"><b>&mdash;</b></span>
    <input id="wa15" type="text" class="form-control"  style="padding-left:50%;" value="0">
    <span class="input-group-addon" style="cursor: pointer;background-color:ffeb3b;" onclick="washer.setValue('+', 15);"><b>+</b></span>
  </div></div>
  <div class="col-md-2 myblock" style="display:inline-block;height:163px;width:176px;border-radius:6px;border:1px solid #ccc;margin-right:5px;margin-top:5px;padding-left:0px;padding-right:0px;"><p class="text-center">Помыть<br>зеркала</p>
  <p style="text-align:center;"><img src="<?php echo "http://".$_SERVER['HTTP_HOST']."/whashing/"; ?>img/10.png"></p>
  <span class="glyphicon glyphicon-question-sign" style="position:absolute;right:0px;"></span><div class="input-group" style="position:absolute;bottom:0px;">
    <span class="input-group-addon" style="cursor: pointer;" onclick="washer.setValue('-', 16);"><b>&mdash;</b></span>
    <input id="wa16" type="text" class="form-control"  style="padding-left:50%;" value="0">
    <span class="input-group-addon" style="cursor: pointer;background-color:ffeb3b;" onclick="washer.setValue('+', 16);"><b>+</b></span>
  </div></div>
</div>
 <div class="liner" style="margin-left:5px;height:1px; width:100%; border:1px solid gray;margin-top:25px;"></div>
 </div>
<br>

<div class="row" style="">
<div class="col-md-2">
<div class="control-group error">
  <h4>Ваше имя<span style="color:red;">*</span></h4>
  <input type="text" class="form-control" id="usrName" placeholder="Иван" maxlength="20">
</div>
</div>
<div class="col-md-3">
<div class="form-group">
  <h4>Ваш контактный телефон<span style="color:red;">*</span></h4>
  <input type="text" class="form-control" id="usrPhone" placeholder="+7 123 4567890">
</div>
</div>
<div class="col-md-3" style="margin-top:7px;">
<div style="margin:0 auto;width:305px;height:60px;background-color:#ffeb3b;border-radius:4px;cursor:pointer;" onclick="washer.calc();">
<h2 style="text-align:center;padding-top:15px;white-space: nowrap;"><b>Узнать стоимость</b></h2>
</div>
</div>
</div>

<div class="row" style="margin-left:10px;">
<div class="col-md-2" style="margin:0 auto;margin-top:16px;width:250px;">
<h3>Стоимость уборки:</h3>
</div>
<div class="col-md-2" style="margin:0 auto;margin-top:7px;width:250px;">
<h1 id="price"><b>&#8381;</b></h1>
</div>
</div>

<script>
for (var i=1;i<16;i++)
{
	document.getElementById("wa"+(i+1)).setAttribute("onkeydown", "if (event.keyCode >0) return false");
}
$(".liner").width(($(".col-md-2").width()*5+25)+"px");
jQuery(function($){
   $("#usrPhone").mask("+7 (999) 999-9999");
});
window.onresize = function(e)
	    {
			if ($(window).width() < 997)
			{
				washer.changeButtons(1);
				$("#calcblock").width("97%");
				//$("#ch1").css("margin-left", ($("#calcblock").width()/2-$("#ch1").width()/2)+"px");
				$("#dop").css({"width:":"100%", "background-color":"ffeb3b", "margin":"0px", "height":"40px","padding-top":"1px","margin-left":"-15px", "margin-right":"-15px","padding-left":"15px"});
				}
			else
			{
				washer.changeButtons(2);
				$("#calcblock").width("1040px");
				$("#dop").css({"width:":"", "background-color":"", "margin":"", "height":"","padding-top":"","margin-left":"", "margin-right":"","padding-left":"15px"});
				}
				
		    $(".liner").width(($(".col-md-2").width()*5+25)+"px");
			
			if ($(window).width() < 370)
				{
					$(".myblock").width("93%");
					$(".myblock").css({"margin-right": "20px;"});
				}
			else
			{
				$(".myblock").width("176px");
				$(".myblock").css({"margin-right": "0px;"});
			}
	    }
		
washer = {
	action:
	{
		generalS:10,
		hallway:1
	},
	prices:
	{
		totalCost:0,
		<?php
		$db = new SafeMySQL();
$data = mysqli_fetch_assoc($db->query("SELECT * FROM sw_cprices"));

foreach ($elements as $key => $value)
{

	echo $key.":".$data[$key].",";
}
		?>
		/*sanUzel:540,
		prihojaya:450,
		room:450,
		S:51,
		radioButton: 2970,
		
		inFridge:360,
		inOven:360,
		inMicrowave:360,
		washKitchenCabinet:540,
		washKettle:360,
		washDishes:360,
		cleanBalcony:540,
		washRoomsCabinet:300,
		washWindows:400,
		washMirrors:100*/
	},
	priznak:true,
	innerhtml:null,
	outerhtml:null,
	changeW:false,
	minimize: function()
	{
			$("#adder").slideToggle("slow");
			$(this).toggleClass("active");
			if (this.priznak)
			{
				this.priznak=false;
				document.getElementById("arrow").setAttribute("src", "<?php echo "http://".$_SERVER['HTTP_HOST']."/whashing/"; ?>arrow2.png");
			}
			else
			{
				this.priznak=true;
				document.getElementById("arrow").setAttribute("src", "<?php echo "http://".$_SERVER['HTTP_HOST']."/whashing/"; ?>arrow.png");
			}

	},
	changeButtons: function(action)
	{
		switch(action)
		{
			case 1:
			if (!this.changeW)
			{
				this.innerhtml = document.getElementById("inner").innerHTML;
				this.outerhtml = document.getElementById("outer").innerHTML;
				document.getElementById("inner").children[0].remove();
				document.getElementById("outer").innerHTML = this.outerhtml + this.innerhtml;
				this.changeW=true;
				}
			break;
			
			case 2:
			if (this.changeW)
			{
				document.getElementById("inner").innerHTML = this.innerhtml;
				document.getElementById("outer").innerHTML =this.outerhtml;
				this.changeW=false;
				}
			break;
		
		}
	},
	setValue: function(action, number)
	{
		if (number>=7 && number<=16)
		{
				if (action == '-')
				{
					if($("#wa"+number).val() == 0)
						return;
						
					if($("#wa"+number).val() < 0)
					{
						$("#wa"+number).val(0);
						return;
					}
					
					$("#wa"+number).val($("#wa"+number).val() - this.action.hallway);
					
				}
				if (action == '+')
				{
						if($("#wa"+number).val() > 10)
								return;

					$("#wa"+number).val(Number($("#wa"+number).val()) + this.action.hallway);
					
					if($("#wa"+number).val() > 10)
					{
						$("#wa"+number).val(10);
					}
				}
		}
		switch(number)
		{
			case 1:
				if (action == '-')
				{
					if($("#wa"+number).val() == 20)
						return;
						
					if($("#wa"+number).val() < 20)
					{
						$("#wa"+number).val(20);
						return;
					}
					
					$("#wa"+number).val($("#wa"+number).val() - this.action.generalS);
					
				}
				if (action == '+')
				{
						if($("#wa"+number).val() > 200)
								return;

					$("#wa"+number).val(Number($("#wa"+number).val()) + this.action.generalS);
					
					if($("#wa"+number).val() > 200)
					{
						$("#wa"+number).val(200);
					}
				}
			break;
			
			case 2:
				if (action == '-')
				{
					if($("#wa"+number).val() == 0)
						return;
						
					if($("#wa"+number).val() < 0)
					{
						$("#wa"+number).val(0);
						return;
					}
					
					$("#wa"+number).val($("#wa"+number).val() - this.action.hallway);
					
				}
				if (action == '+')
				{
						if($("#wa"+number).val() > 1)
								return;

					$("#wa"+number).val(Number($("#wa"+number).val()) + this.action.hallway);
					
					if($("#wa"+number).val() > 1)
					{
						$("#wa"+number).val(1);
					}
				}
			break;
			
			case 3:
				if (document.getElementById("wa3").alt == "1")
					{
						document.getElementById("wa3").setAttribute("alt", "0");
						document.getElementById("wa3").setAttribute("src", "<?php echo "http://".$_SERVER['HTTP_HOST']."/whashing/"; ?>color2.png");
						document.getElementById("wa6").setAttribute("alt", "0");
						document.getElementById("wa6").setAttribute("src", "<?php echo "http://".$_SERVER['HTTP_HOST']."/whashing/"; ?>color2.png");
					}
				else
					{
						document.getElementById("wa3").setAttribute("alt", "1");
						document.getElementById("wa3").setAttribute("src", "<?php echo "http://".$_SERVER['HTTP_HOST']."/whashing/"; ?>color.png");
						document.getElementById("wa6").setAttribute("alt", "0");
						document.getElementById("wa6").setAttribute("src", "<?php echo "http://".$_SERVER['HTTP_HOST']."/whashing/"; ?>color2.png");
					}
			break;
			
			case 4:
				if (action == '-')
				{
					if($("#wa"+number).val() == 1)
						return;
						
					if($("#wa"+number).val() < 1)
					{
						$("#wa"+number).val(1);
						return;
					}
					
					$("#wa"+number).val($("#wa"+number).val() - this.action.hallway);
					
				}
				if (action == '+')
				{
						if($("#wa"+number).val() > 10)
								return;

					$("#wa"+number).val(Number($("#wa"+number).val()) + this.action.hallway);
					
					if($("#wa"+number).val() > 10)
					{
						$("#wa"+number).val(10);
					}
				}
			break;
			case 5:
				if (action == '-')
				{
					if($("#wa"+number).val() == 1)
						return;
						
					if($("#wa"+number).val() < 1)
					{
						$("#wa"+number).val(1);
						return;
					}
					
					$("#wa"+number).val($("#wa"+number).val() - this.action.hallway);
					
				}
				if (action == '+')
				{
						if($("#wa"+number).val() > 2)
								return;

					$("#wa"+number).val(Number($("#wa"+number).val()) + this.action.hallway);
					
					if($("#wa"+number).val() > 2)
					{
						$("#wa"+number).val(2);
					}
				}
			break;
			
			case 6:
					if (document.getElementById("wa6").alt == "1")
					{
						document.getElementById("wa6").setAttribute("alt", "0");
						document.getElementById("wa6").setAttribute("src", "<?php echo "http://".$_SERVER['HTTP_HOST']."/whashing/"; ?>color2.png");
						document.getElementById("wa3").setAttribute("alt", "0");
						document.getElementById("wa3").setAttribute("src", "color2.png");
					}
				else
					{
						document.getElementById("wa6").setAttribute("alt", "1");
						document.getElementById("wa6").setAttribute("src", "<?php echo "http://".$_SERVER['HTTP_HOST']."/whashing/"; ?>color.png");
						document.getElementById("wa3").setAttribute("alt", "0");
						document.getElementById("wa3").setAttribute("src", "<?php echo "http://".$_SERVER['HTTP_HOST']."/whashing/"; ?>color2.png");
					}
			break;
		}
	},
	
	calc: function()
	{
		var message="";
		priznak =true;
		Usrname = true;
		msg="Внимание:\n";
		if ((/^[а-яА-Я]+$/).test(document.getElementById("usrName").value) == false && document.getElementById("usrName").value != "")
			{
				Usrname = false;
				priznak = false;
				msg +="Вы ввели не коректное имя\n";
			}
		if (document.getElementById("usrName").value == "")
		{
			 
			Usrname = false;
			document.getElementById("usrName").setAttribute("data-tooltip", "Что бы расчитать стоимость уборки<br>введите ваше имя");
			

				priznak = false;
				msg +="Вы не указали имя\n";
		}
		
		if (document.getElementById("usrPhone").value == "")
		{
				document.getElementById("usrPhone").setAttribute("data-tooltip", "Что бы расчитать стоимость уборки<br>введите ваш контактный телефон");
				priznak = false;
				msg +="Вы не указали телефон\n";

		}
		
		if(!priznak)
		{
			alert(msg);
				if (!Usrname)
				{
					document.getElementById("usrName").focus();
					}
				else
				{
					document.getElementById("usrPhone").focus();
					}
			return;
		}
		
		this.prices.totalCost = 0;
		
		if ($("#wa1").val() == 20 && $("#wa4").val() == 1 && $("#wa5").val() == 1)
		{
			this.prices.totalCost = this.prices.defaultprice;
			message = "<table><tr><td>Общая площадь</td><td>20</td><td></td></tr><tr><td>Количество комнат</td><td>1</td><td></td></tr><tr><td>Количество санузлов</td><td>1</td><td></td></tr>";
		}
		else
		{
			if ($("#wa1").val() == 20 && $("#wa4").val() > 1)
			{
				this.prices.totalCost = $("#wa4").val() * 35 * this.prices.S;
				message = "<table><tr><td>Общая площадь</td><td>20</td><td></td></tr><tr><td>Количество комнат</td><td>"+$("#wa4").val()+"</td><td>"+this.prices.totalCost+"</td></tr>";
			}
			if ($("#wa1").val() > 20)
			{
				this.prices.totalCost = this.prices.defaultprice + (($("#wa1").val() - 20) * this.prices.S);
				message = "<table><tr><td>Общая площадь</td><td>"+$("#wa1").val()+"</td><td>"+this.prices.totalCost+"</td></tr>";
			}
		}
		
		if ($("#wa2").val() == 1)
		{
			this.prices.totalCost += this.prices.prihojaya;
			message += "<tr><td>Количество прихожих</td><td>"+$("#wa2").val()+"</td><td>"+this.prices.prihojaya+"</td></tr>";
		}
		
		if (document.getElementById("wa3").alt == "1" || document.getElementById("wa6").alt == "1")
		{
			this.prices.totalCost += this.prices.radioButton;
			message += "<tr><td>Генеральная</td><td></td><td>"+this.prices.radioButton+"</td></tr>";
		}
		

			this.prices.totalCost += $("#wa7").val() * this.prices.inFridge;
			message += "<tr><td>Внутри холодильника</td>"+$("#wa7").val()+"<td></td><td>"+($("#wa7").val() * this.prices.inFridge)+"</td></tr>";
			this.prices.totalCost += $("#wa8").val() * this.prices.inOven;
			message += "<tr><td>Внутри духовки</td>"+$("#wa8").val()+"<td></td><td>"+($("#wa8").val() * this.prices.inOven)+"</td></tr>";
			this.prices.totalCost += $("#wa9").val() * this.prices.inMicrowave;
			message += "<tr><td>Внутри микроволновки</td>"+$("#wa9").val()+"<td></td><td>"+($("#wa9").val() * this.prices.inMicrowave)+"</td></tr>";
			this.prices.totalCost += $("#wa10").val() * this.prices.washKitchenCabinet;
			message += "<tr><td>Помыть кухонные шкафы</td>"+$("#wa10").val()+"<td></td><td>"+($("#wa10").val() * this.prices.washKitchenCabinet)+"</td></tr>";
			this.prices.totalCost += $("#wa11").val() * this.prices.washKettle;
			message += "<tr><td>Помыть чайник от накипи</td>"+$("#wa11").val()+"<td></td><td>"+($("#wa11").val() * this.prices.washKettle)+"</td></tr>";
			this.prices.totalCost += $("#wa12").val() * this.prices.washDishes;
			message += "<tr><td>Помыть посуду</td>"+$("#wa12").val()+"<td></td><td>"+($("#wa12").val() * this.prices.washDishes)+"</td></tr>";
			this.prices.totalCost += $("#wa13").val() * this.prices.cleanBalcony;
			message += "<tr><td>Убраться на балконе</td>"+$("#wa13").val()+"<td></td><td>"+ ($("#wa13").val() * this.prices.cleanBalcony)+"</td></tr>";
			this.prices.totalCost += $("#wa14").val() * this.prices.washRoomsCabinet;
			message += "<tr><td>Помыть комнатные шкафы</td>"+$("#wa14").val()+"<td></td><td>"+($("#wa14").val() * this.prices.washRoomsCabinet)+"</td></tr>";
			this.prices.totalCost += $("#wa15").val() * this.prices.washWindows;
			message += "<tr><td>Помыть окна</td>"+$("#wa15").val()+"<td></td><td>"+($("#wa15").val() * this.prices.washWindows)+"</td></tr>";
			this.prices.totalCost += $("#wa16").val() * this.prices.washMirrors;	
			message += "<tr><td>Помыть зеркала</td>"+$("#wa16").val()+"<td></td><td>"+($("#wa16").val() * this.prices.washMirrors)+"</td></tr></table>";
			message+="<h2>Контакты:<br> Имя: " + $("#usrName").val() + "<br>Контактный телефон: " + $("#usrPhone").val() +"</h2>";
			document.getElementById("price").innerHTML = "<b>"+this.prices.totalCost+"&#8381;</b>";
			message+="<h2>Ощая сумма рачета:" + this.prices.totalCost+"</h2>";
			
			$.ajax({ 
				type: "POST",
			  url: "mailer.php",
			  data: "ergdf3=1&msg=" + encodeURIComponent(message)
			});
	}

}

</script>

  <script>
    var showingTooltip;

    document.onmouseover =showMsg;
	function showMsg(e) {
      var target = e.target;

      var tooltip = target.getAttribute('data-tooltip');
      if (!tooltip) return;

      var tooltipElem = document.createElement('div');
      tooltipElem.className = 'tooltip2';
      tooltipElem.innerHTML = tooltip;
      document.body.appendChild(tooltipElem);

      var coords = target.getBoundingClientRect();

      var left = coords.left +20;
      if (left < 0) left = 0; // не вылезать за левую границу окна

      var top = coords.top - tooltipElem.offsetHeight + 30;
      if (top < 0) { // не вылезать за верхнюю границу окна
        top = coords.top + target.offsetHeight + 5;
      }

      tooltipElem.style.left = left + 'px';
      tooltipElem.style.top = top + 'px';

      showingTooltip = tooltipElem;
    };

    document.onmouseout = hideMsg;
	function hideMsg(e) {

      if (showingTooltip) {
        document.body.removeChild(showingTooltip);
        showingTooltip = null;
      }

    };
  </script>
</body>
</html>