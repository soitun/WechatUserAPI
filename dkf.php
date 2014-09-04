<?php
require 'inc.php';
require 'function.php';
	$u=$this->message['from'];
	if(userIsEnroll($u))
		{
		/*if((0<date('G') && date('G')<19)||date('G')==0){
			$dat="学长学姐白天比较忙，只有晚上19点到23点在哦，欢迎晚上来提问。";
			$response = $this->respText($dat);
			
		}else{
			if(23<date('G') && date('G')<24){
				$dat="学长学姐白天比较忙，只有晚上19点到23点在哦，欢迎晚上来提问。";
				$response = $this->respText($dat);
				
			}
			else{
				if(6<date('G') && date('G')<9){
					$dat="让学长学姐再赖会床吧，一会就好~学弟/学妹先去吃个早餐哈~";
					$response = $this->respText($dat);
					
				}
				else{*/
					$response = array();
					$response['FromUserName'] = $this->message['to'];
					$response['ToUserName'] = $this->message['from'];
					$response['CreateTime'] = $this->message['time'];
					$response['MsgType'] = 'transfer_customer_service';
					
		/*			}
				}
			}*/
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