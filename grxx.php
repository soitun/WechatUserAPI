<?php 
function userIsEnroll($userName)   
	{
		$con = mysql_connect("localhost","weixin","password");
		mysql_set_charset("UTF8", $con);
		if (!$con)
		{
		die('Could not connect: ' . mysql_error());
		}
		mysql_select_db("weixin", $con);
		$result = mysql_query("SELECT * FROM student where wxId = '".$userName."';");
		
		$row = mysql_fetch_array($result);
		if (!$row)   //未绑定
		{
			$result = 0;            
		}
		else 
		{
			$result = 1;
		}
		mysql_close($con);
		return $result;
	}
function realname($userName)   
	{
		$con = mysql_connect("localhost","weixin","password");
		mysql_set_charset("UTF8", $con);
		if (!$con)
		{
		die('Could not connect: ' . mysql_error());
		}
		mysql_select_db("weixin", $con);
		$result = mysql_query("SELECT * FROM student where wxId = '".$userName."';");
		$row = mysql_fetch_array($result);
		$result2 = mysql_query("SELECT * FROM stuinfo where sfzh = '".$row['idnumber']."';");
		$row2 = mysql_fetch_array($result2);
		if($row2['xy']=='金融与统计学院'||$row2['xy']=='经济与贸易学院'){$baodao='北校区';}else{if($row2['xy']=='工商管理学院'){$baodao='待定';}else{$baodao='南校区';}}
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
$bind[] = array(
				'title' => '点击绑定',
				'url' =>'http://web/weixin/xsbd/bind.php?uid=' .$message['from'],
				'description' => '欢迎使用湖南大学新生宝典，在您使用个人功能之前请先点击此信息进行绑定。'
			);
$response = $this->respNews($bind);
}
return $response;