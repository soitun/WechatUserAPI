<?php 
require 'inc.php';
require 'function.php';
function realname($userName)   
	{
		$result = mysql_query("SELECT * FROM student where wxId = '".$userName."';");
		$row = mysql_fetch_array($result);
		$result2 = mysql_query("SELECT * FROM stuinfo where sfzh = '".$row['idnumber']."';");
		$row2 = mysql_fetch_array($result2);
		if($row2['xy']=='金融与统计学院'||$row2['xy']=='经济与贸易学院'||$row2['zy']=='会计学'||$row2['zy']=='财务管理')
		{$baodao='北校区';}
		else
		{
		$baodao='南校区';
		}
		if (!$row) $content = '没有相关信息！';
		
		else 
		{
			$content = "欢迎来到湖南大学！\n姓名：".$row2['xm'].
			"\n性别：".$row2['xb'].
			"\n学院：".$row2['xy'].
			"\n专业：".$row2['zy'].
			"\n班级：".$row2['bj'].
			"\n学号：".$row2['xh'].
			"\n报到地点：".$baodao
			;
			}
		
		
		mysql_close($con);
		return $content;
	}
$message = $this->message;
$isenroll=userIsEnroll($message['from']);
if($isenroll==1)
{
$eee=realname($message['from']);

$response = $this->respText($eee);
}
else
{
nobind();
}
return $response;