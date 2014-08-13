<?php
require 'inc.php';
require 'function.php';
	$u=$this->message['from'];
	if(userIsEnroll($u))
		{
		if((0<date('G') && date('G')<4)||date('G')==0){
			$dat="学长学姐们都睡觉去啦~有什么问题明天再来问吧~学弟/学妹也早点睡哈！";
			$response = $this->respText($dat);
			
		}else{
			if(4<date('G') && date('G')<6){
				$dat="这么早学长学姐还没起床呢！学弟/学妹也再睡一会吧~";
				$response = $this->respText($dat);
				
			}
			else{
				if(6<date('G') && date('G')<9){
					$dat="让学长学姐再赖会床吧，一会就好~学弟/学妹先去吃个早餐哈~";
					$response = $this->respText($dat);
					
				}
				else{
					$response = array();
					$response['FromUserName'] = $this->message['to'];
					$response['ToUserName'] = $this->message['from'];
					$response['CreateTime'] = $this->message['time'];
					$response['MsgType'] = 'transfer_customer_service';
					
					}
				}
			}
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