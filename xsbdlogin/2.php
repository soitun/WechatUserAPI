<?php
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
		if($row2['xy']=='金融与统计学院'||$row2['xy']=='经济与贸易学院'||$row2['zy']=='会计学'||$row2['zy']=='会计学（空军财会审计干部）'||$row2['zy']=='财务管理'||$row2['zy']=='财务管理（金融工程）')
		{$baodao='北校区';}
		else
		{
		$baodao='南校区';
		}if (!$row) $content = '没有相关信息！';
		
		else 
		{
			$content = "姓名：".$row2['xm'].
			"<br/>性别：".$row2['xb'].
			"<br/>学院：".$row2['xy'].
			"<br/>专业：".$row2['zy'].
			"<br/>班级：".$row2['bj'].
			"<br/>学号：".$row2['xh'].
			"<br/>报到地点：".$baodao."<br/><img src='http://web/weixin/xsbd/ph/".$row2['xh'].".jpg'>"
			;
			}
		
		
		mysql_close($con);
		return $content;
	}
	$eee=realname($_GET['uid']);
	print_r($eee);
?>

