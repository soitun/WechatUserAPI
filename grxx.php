<?php 
require 'inc.php';
require 'function.php';
function grxx($userName)   
	{	
		
		$row5=stuinfo($userName);
		if($row5['xy']=='金融与统计学院'||$row5['xy']=='经济与贸易学院'||$row5['zy']=='会计学'||$row5['zy']=='财务管理')
		{$baodao='北校区';}
		else
		{
		$baodao='南校区';
		}
		if (!$row5) $content = '没有相关信息！';		
		else 
		{
			$content = "欢迎来到湖南大学！\n姓名：".$row5['xm'].
			"\n性别：".$row5['xb'].
			"\n学院：".$row5['xy'].
			"\n专业：".$row5['zy'].
			"\n班级：".$row5['bj'].
			"\n学号：".$row5['xh'].
			"\n报到地点：".$baodao
			;
			}
		return $content;
	}
$message = $this->message;
$isenroll=userIsEnroll($message['from']);
if($isenroll==1)
{
$eee=grxx($message['from']);

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