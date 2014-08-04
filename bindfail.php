<?php 
$message = $this->message;

$ret = preg_match('/无法绑定(.+)/i', $this->message['content'], $matchs);
if(!$ret) {
	return $this->respText('请输入合适的格式, 无法绑定+姓名+身份证号, 例如: 无法绑定+张三+410023199608010215');
}
else{
$fail = $message['content'];
$from = $message['from'];
$con = mysql_connect("localhost","root","");
		mysql_set_charset("UTF8", $con);
		if (!$con)
		{
			die('Could not connect: ' . mysql_error());
		}
		mysql_select_db('weixin', $con);
$result=mysql_query("INSERT INTO bindfail (wxID,content) VALUES ('$from','$fail')");
$dat="您的信息已经提交，请耐心等待人工审核绑定";
	$response = $this->respText($dat);

return $response;
}