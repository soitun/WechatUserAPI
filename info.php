<?php
$message = $this->message;
$c[] = array(
				'title' => '点击测试',
				'url' =>'http://web/weixin/xsbd/test.php?uid=' .$message['from'],
				'description' => '获取用户信息接口'
			);
$response = $this->respNews($c);
return $response;