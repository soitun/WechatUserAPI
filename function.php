<?php
require 'inc.php';
function userIsEnroll($userName)   
	{
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
function nobind()
{
$bind[] = array(
				'title' => '点击绑定',
				'url' =>'http://1000.hnu.cn/weixin/xsbd/bind.php?uid=' .$message['from'],
				'description' => '欢迎使用湖南大学新生宝典，在您使用个人功能之前请先点击此信息进行绑定。'
			);
$response = $this->respNews($bind);
}
	
	?>