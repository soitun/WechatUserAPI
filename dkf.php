<?php
/*
多客服转发
*/
function userIsEnroll($userName)   
	{
		$con = mysql_connect("localhost","root","");
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
	if(userIsEnroll($u)){
		$response = array();
		$response['FromUserName'] = $this->message['to'];
		$response['ToUserName'] = $this->message['from'];
		$response['CreateTime'] = $this->message['time'];
		$response['MsgType'] = 'transfer_customer_service';
		return $response;
	}
	else
	{
$bind[] = array(
				'title' => '点击绑定',
				'url' =>'http://???/bind.php?uid=' .$u,
				'description' => '本功能只提供给2014级新生与学长学姐沟通使用，如果您是2014级新生请点击这里绑定'
			);
$response = $this->respNews($bind);
return $response;
}
