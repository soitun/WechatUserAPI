<?php 
require 'inc.php';
require 'function.php';
function realname($userName)   
	{
		
		$result = mysql_query("SELECT * FROM student where wxId = '".$userName."';");
		$row = mysql_fetch_array($result);
		$result2 = mysql_query("SELECT * FROM stuinfo where sfzh = '".$row['idnumber']."';");
		$row2 = mysql_fetch_array($result2);
		$result3 = mysql_query("select * from fdy where xy = '".$row2['xy']."';");
		 
		if (!$row) $content = '没有相关信息！';
		else 
		{$content1="你的辅导员";
		while($row3 = mysql_fetch_array($result3))
		{
			$content= "\n姓名:".$row3['xm']."\n范围:".$row3['fw']."\n电话:".$row3['dh'];
			$content1=$content1."\n".$content;
			}
			
		
		}
		mysql_close($con);
		return $content1;
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