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
return $response;
}
function stuinfo($wxid)	
{
$con = mysql_connect("localhost","weixin","QNXGweixin@)!)");
		mysql_set_charset("UTF8", $con);
		if (!$con)
		{
			die('Could not connect: ' . mysql_error());
		}
		mysql_select_db('weixin', $con);
$result = mysql_query("SELECT * FROM student where wxId = '".$wxid."';");
$row = mysql_fetch_array($result);
$result2 = mysql_query("SELECT * FROM stuinfo where sfzh = '".$row['idnumber']."';");
$row2 = mysql_fetch_array($result2);
mysql_close($con);
return $row2;

}
?>