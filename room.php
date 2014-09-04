<?php 
require 'inc.php';
require 'function.php';
function realname($userName)   
	{
		$result = mysql_query("SELECT * FROM student where wxId = '".$userName."';");
		$row = mysql_fetch_array($result);
		$result2 = mysql_query("SELECT * FROM stuinfo where sfzh = '".$row['idnumber']."';");
		$row2 = mysql_fetch_array($result2);
		$result3 = mysql_query("select * from room where xh = '".$row2['xh']."';");
		$row3 = mysql_fetch_array($result3); 
		if (!$row3) $content1 = '目前只有电气院的数据，你的宿舍还没分好，请耐心等待！';
		else 
		{
		
			$content1 = "您的寝室信息：".
			"\n楼栋：".$row3['ld'].
			"\n房间号：".$row3['room']
			;
			
			
		
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
				'url' =>'http://web/weixin/xsbd/bind.php?uid=' .$message['from'],
				'description' => '欢迎使用湖南大学新生宝典，在您使用个人功能之前请先点击此信息进行绑定。'
			);
$response = $this->respNews($bind);
}
return $response;