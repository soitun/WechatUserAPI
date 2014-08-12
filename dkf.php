<?php
function userIsEnroll($userName)   
	{
		$con = mysql_connect("localhost","weixin","password");
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
	$u=$this->message['from'];
	if(userIsEnroll($u))
		{
		if((0<date('G') && date('G')<4)||date('G')==0){
			$dat="学长学姐们都睡觉去啦~有什么问题明天再来问吧~学弟/学妹也早点睡哈！";
			$response = $this->respText($dat);
			return $response;
		}else{
			if(4<date('G') && date('G')<6){
				$dat="这么早学长学姐还没起床呢！学弟/学妹也再睡一会吧~";
				$response = $this->respText($dat);
				return $response;
			}
			else{
				if(6<date('G') && date('G')<9){
					$dat="让学长学姐再赖会床吧，一会就好~学弟/学妹先去吃个早餐哈~";
					$response = $this->respText($dat);
					return $response;
				}
				else{
					$response = array();
					$response['FromUserName'] = $this->message['to'];
					$response['ToUserName'] = $this->message['from'];
					$response['CreateTime'] = $this->message['time'];
					$response['MsgType'] = 'transfer_customer_service';
					return $response;
					}
				}
			}
		}
	else
	{
$bind[] = array(
				'title' => '点击绑定',
				'url' =>'http://web/weixin/xsbd/bind.php?uid=' .$u,
				'description' => '本功能只提供给2014级新生与学长学姐沟通使用，如果您是2014级新生请点击这里绑定'
			);
$response = $this->respNews($bind);
return $response;
}
