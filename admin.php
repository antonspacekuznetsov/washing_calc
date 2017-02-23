<div style="height:30px;">
</div>
<?php

if (isset($_POST['write']))
{
	$elements;
	$elems;
	foreach ($elements as $key => $value)
	{
		if (isset($_POST[$key]))
			$elems[$key] = $_POST[$key];
	}
	$db = new SafeMySQL();
	$sql  = "INSERT INTO sw_cprices SET ?u ON DUPLICATE KEY UPDATE ?u";
	$db->query("delete from sw_cprices");
	$db->query($sql, $elems, $elems); 
	echo "OK";
	exit();
}

$count=1;
$db = new SafeMySQL();
$data = mysqli_fetch_assoc($db->query("SELECT * FROM sw_cprices"));

foreach ($elements as $key => $value)
{
	echo '<div style="padding-left:20px;width:60%;" class="input-group input-group-sm">';
	echo '<span class="input-group-addon">'.$value.'</span>';
	echo ' <input id="'.$key.'" type="text" class="form-control" value="'.$data[$key].'" placeholder="'.$value.'">';
	$count++;
	echo '</div><br>';
}
echo '<div style="padding-left:20px;"><button onClick="send();";  type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-ok"></span> Сохранить</button>';
echo '<span style="padding-left:10px;"><button onClick="fieldsClear();"  type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-minus"></span> Очистить</button></span></div>';

echo "<script>";
echo "function send(){ var fields=''; ";
$data="";
foreach ($elements as $key => $value)
{
	echo "if (document.getElementById('".$key."').value === \"\") { fields+='".$value."\\n'; }";
	
	$data .= "".$key."='+encodeURIComponent(document.getElementById('".$key."').value)+'&" ;
}
echo "if (fields !== '') {if (!confirm('ВНИМАНИЕ!\\nСледующие поля не заполнены:\\n'+fields+'Вы желаете оставить их пустыми и продолжить?')) { return false; }}";
echo "
var dta = '".$data."write=1"."';
$.ajax({ type: \"POST\",
  url: \"".$_SERVER['PHP_SELF']."?a=".$tab."&b=".$subtab."\",
  data: dta,
    success: function(msg){
		if (msg == \"OK\")
			alert( \"Данные сохранены \" );
  }
});
  ";
echo "}";

echo "function fieldsClear(){";
foreach ($elements as $key => $value)
{
	echo "document.getElementById('".$key."').value = \"\"; ";
}
echo "}";

echo "</script>";
exit();
?>
