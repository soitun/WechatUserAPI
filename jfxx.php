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
		$result2 = mysql_query("SELECT * FROM jfxx where xh = '".$row['xh']."';");
		$row2 = mysql_fetch_array($result2);
		$result3 = mysql_query("SELECT * FROM card where xh = '".$row['xh']."';");
		$row3 = mysql_fetch_array($result3);
		if (!$row) $content = '没有相关信息！';
		else 
		{
			$content = "缴费信息\n姓名：".$row2['xm'].
			"\n学费：".$row2['xf'].
			"\n代收费：".$row2['dsf'].
			"\n住宿费：".$row2['zsf']."(此为待定，以最终宿舍安排为准)".
			"\n卧具费：495元/套（需在迎新系统选择是否购买）\n扣费信息：暂未扣费 "
			;
			}
		if($row3['yhkh']==''){$content=$content."\n无银行卡信息，需来校报到时在中国银行湖南大学支行自行办理。";}else{$content=$content."\n银行卡号：\n".$row3['yhkh'];}
		
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