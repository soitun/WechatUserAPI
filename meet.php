<?php
$u=$this->message['from'];
$bind[] = array(
				'title' => '点击遇见那个TA',
				'url' =>'http://1000.hnu.cn/weixin/meet/index.php?uid=' .$u,
				'description' => ''
			);
$response = $this->respNews($bind);
return $response;

