<?php 
require 'inc.php';
require 'function.php';
function realname($userName)   
	{
		$result = mysql_query("SELECT * FROM student where wxId = '".$userName."';");
		$row = mysql_fetch_array($result);
		$result2 = mysql_query("SELECT bj FROM stuinfo where sfzh = '".$row['idnumber']."';");
		$row2 = mysql_fetch_array($result2);
		$result3 = mysql_query("select * from stuinfo left join student on stuinfo.xh= student.xh where bj = '".$row2['bj']."';");
		 
		if (!$row) $content = '没有相关信息！';
		else 
		{$content1="同班同学\n姓名/性别/QQ或微信";
		while($row3 = mysql_fetch_array($result3))
		{
			$content= $row3['xm']."/".$row3['xb']."/".$row3['wxqq'];
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
$bind[] = array(
				'title' => '点击绑定',
				'url' =>'http://1000.hnu.cn/weixin/xsbd/bind.php?uid=' .$message['from'],
				'description' => '欢迎使用湖南大学新生宝典，在您使用个人功能之前请先点击此信息进行绑定。'
			);
$response = $this->respNews($bind);
}
return $response;