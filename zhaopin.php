<?php 
$message = $this->message;

$ret = preg_match('/(.+)/i', $this->message['content'], $matchs);
if(!$ret) {
	return $this->respText('请输入合适的格式, 例如:我要当程序员/设计师+张三+13324929384+12345678 ');
}
else{
$adr = $message['content'];
$from = $message['from'];
$con = mysql_connect("localhost","weixin","password");
		mysql_set_charset("UTF8", $con);
		if (!$con)
		{
			die('Could not connect: ' . mysql_error());
		}
		mysql_select_db('weixin', $con);
$result=mysql_query("INSERT INTO zhaoxin (wxID,content) VALUES ('$from','$adr')");
$dat="组织已经收到你的信息啦！我们会以最快的速度联系你的！";
	$response = $this->respText($dat);

return $response;
}