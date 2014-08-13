<?php
$message = $this->message;
$c[] = array(
				'title' => '点击测试',
				'url' =>'http://1000.hnu.cn/weixin/xsbd/test.php?uid=' .$message['from'],
				'description' => '获取用户信息接口'
			);
$response = $this->respNews($c);
return $response;