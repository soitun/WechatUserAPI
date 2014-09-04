<?php 
require 'inc.php';
require 'function.php';
function realname($userName)   
	{
		$result = mysql_query("SELECT * FROM student where wxId = '".$userName."';");
		$row = mysql_fetch_array($result);
		$result2 = mysql_query("SELECT * FROM jfxx where xh = '".$row['xh']."';");
		$row2 = mysql_fetch_array($result2);
		$result3 = mysql_query("SELECT * FROM card where xh = '".$row['xh']."';");
		$row3 = mysql_fetch_array($result3);
		$result4 = mysql_query("SELECT je FROM woju where xh = '".$row['xh']."';");
		$row4 = mysql_fetch_array($result4);
		$result5 = mysql_query("select * from yijiaofeiyong where xh = '".$row['xh']."';");
		if ($row4) {$woju = '已缴:卧具费495元';}
		else{$woju='暂未扣费';}
		
		if (!$row) $content = '没有相关信息！';
		
		else 
		{
			$content = "缴费信息\n姓名：".$row2['xm'].
			"\n学费：".$row2['xf'].
			"\n代收费：".$row2['dsf'].
			"\n住宿费：".$row2['zsf']."(此为待定，以最终宿舍安排为准)".
			"\n卧具费：495元/套（需在迎新系统选择是否购买）\n\n扣费信息:\n".$woju
			;
			while($row5 = mysql_fetch_array($result5))
		{
			$content1="已缴:".$row5['xiangmu'].":".$row5['je'];
			$content=$content."\n".$content1;
			}
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