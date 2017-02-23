<?php
$elements = array (
	"mail" => "Почтовый ящик"

);
                  
include_once ('/safemysql.class.php');
if (isset($_POST['write']))
{
	$elements;
	$elems;
	$db = new SafeMySQL();
	switch($_POST['write'])
	{
		case 1:
			foreach ($elements as $key => $value)
			{
				if (isset($_POST[$key]))
					$elems[$key] = $_POST[$key];
			}
			$sql  = "INSERT INTO sw_cmails SET ?u";
			$db->query($sql, $elems); 
			echo "ok";
		break;
		
		case 2:
			$result =$db->query("SELECT * FROM sw_cmails where id=?s", $_POST['id']);
			if ($result)
			{
				$row = mysqli_fetch_assoc($result);
				echo json_encode($row);
			}
			
		break;
			
		case 3:
			foreach ($elements as $key => $value)
			{
				if (isset($_POST[$key]))
					$elems[$key] = $_POST[$key];
			}
			$sql  = "UPDATE sw_cmails SET ?u WHERE id=?i";
			$db->query($sql, $elems, $_POST['id']); 
			echo "ok";
		break;
		
		case 4:
			$sql  = "DELETE FROM sw_cmails WHERE id=?i";
			$db->query($sql, $_POST['id']); 
			echo "ok";
		break;

	}
	exit();
}

$count=1;
$db = new SafeMySQL();
$result =$db->query("SELECT * FROM sw_cmails");

echo '<div id="start"><label style="padding-left:20px;">Добавить/редактировать почтовый ящик</label>';
echo '<div  style="padding-left:20px;width:60%;"><select onchange="loadList(this.value);" id="list" class="selectpicker" data-live-search="true">';
echo '<option value="-1" data-tokens="ketchup mustard">Новый почтовый ящик</option>';
if($result)
while ($data = mysqli_fetch_assoc($result))
{
	echo '<option value="'.$data['id'].'" data-tokens="ketchup mustard">'.$data['mail'].'</option>';
}
echo '</select></div></div><br>';

foreach ($elements as $key => $value)
{
	echo '<div style="padding-left:20px;width:60%;" class="input-group input-group-sm">';
	echo '<span class="input-group-addon">'.$count.'</span>';
	echo ' <input id="'.$key.'" type="text" class="form-control" placeholder="'.$value.'">';
	$count++;
	echo '</div><br>';
}
echo '<div style="padding-left:20px;"><button onClick="send();";  type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-ok"></span> Сохранить</button>';
echo '<span style="padding-left:10px;"><button onClick="fieldsClear();" id="cleaner" type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-minus"></span> Очистить</button></span></div>';

echo "<script>";
echo "function send(){ 
var e = document.getElementById(\"list\");
var strUser = e.options[e.selectedIndex].value; var fields='';
if (strUser == -1)
		var w=1;
else
		var w=3;
";
$data="";
foreach ($elements as $key => $value)
{
	echo "if (document.getElementById('".$key."').value === \"\") { fields+='".$value."\\n'; }";
	
	$data .= "".$key."='+encodeURIComponent(document.getElementById('".$key."').value)+'&" ;
}
echo "if (fields !== '') {if (!confirm('ВНИМАНИЕ!\\nСледующие поля не заполнены:\\n'+fields+'Вы желаете оставить их пустыми и продолжить?')) { return false; }}";
echo "
var dta = '".$data."write=' + w + '&id=' + strUser;
$.ajax({ type: \"POST\",
  url: \"".$_SERVER['PHP_SELF']."?a=mail\",
  data: dta,
    success: function(msg){
		if (msg == \"ok\")
			if (w == 1) {
			alert(\"Данные успешно сохранены\"); fieldsClear(); location.reload();}
			if (w == 3)
    alert(\"Данные изменены\");
  }
});
  ";
echo "}";

echo "function fieldsClear(t){
var e = document.getElementById(\"list\");
var strUser = e.options[e.selectedIndex].value;
if (strUser != -1 && t == undefined)
{
	$.ajax({ type: \"POST\",
  url: \"".$_SERVER['PHP_SELF']."?a=mail\",
  data: 'id=' + strUser + '&write=4' ,
    success: function(msg){

			if (msg == \"ok\")
			{
			alert(\"Исполнитель удален\"); 
			location.reload();
			}

  }
}); return; }
";
foreach ($elements as $key => $value)
{
	echo "document.getElementById('".$key."').value = \"\"; ";
}
echo "} ";
echo "function loadList(id){
var e = document.getElementById(\"list\");
var strUser = e.options[e.selectedIndex].value;
if (strUser == -1)
{
	document.getElementById('cleaner').innerHTML = '<span class=\"glyphicon glyphicon-minus\"></span> Очистить';
	fieldsClear();
	return;
}
else
	document.getElementById('cleaner').innerHTML = '<span class=\"glyphicon glyphicon-minus\"></span> Удалить';
	var dta = 'write=2&id=' + id;
$.ajax({ type: \"POST\",
  url: \"".$_SERVER['PHP_SELF']."?a=mail\",
  dataType: \"json\",
  data: dta,
    success: function(msg){ ";
		foreach ($elements as $key => $value)
			{
				echo "document.getElementById('".$key."').value = msg.".$key.";";
			}

	echo "}})}";
echo "fieldsClear(1);
</script><div style=\"height:30px;\"></div>";
exit();
?>