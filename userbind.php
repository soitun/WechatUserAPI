<?php 
function userIsEnroll($userName)   
	{
		$con = mysql_connect("localhost","root","123");
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
		$con = mysql_connect("localhost","weixin","QNXGweixin@)!)");
		mysql_set_charset("UTF8", $con);
		if (!$con)
		{
		die('Could not connect: ' . mysql_error());
		}
		mysql_select_db("weixin", $con);
		$result = mysql_query("SELECT * FROM student where wxId = '".$userName."';");
		$row = mysql_fetch_array($result);
		
		if (!$row) $content = '没有相关信息！';
		else 
		{
			$content = "欢迎来到XX大学！\n".$row['realname'];
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
				'url' =>'http://???/bind.php?uid=' .$message['from'],
				'description' => '欢迎使用XX大学，在您使用个人功能之前请先点击此信息进行绑定。'
			);
$response = $this->respNews($bind);
}
return $response;