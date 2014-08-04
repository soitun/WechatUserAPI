<?php 
/*明信片信息收集*/
$message = $this->message;

$ret = preg_match('/(.+)/i', $this->message['content'], $matchs);
if(!$ret) {
	return $this->respText('请输入合适的格式, 明信片+地址+姓名+邮编, 例如: 明信片大学张三100006');
}
else{
$adr = $message['content'];
$from = $message['from'];
$con = mysql_connect("localhost","root","");
		mysql_set_charset("UTF8", $con);
		if (!$con)
		{
			die('Could not connect: ' . mysql_error());
		}
		mysql_select_db('weixin', $con);
$result=mysql_query("INSERT INTO mingxinpian (wxID,content) VALUES ('$from','$adr')");
$dat="您的信息已经提交，请耐心明信片寄送到手。";
	$response = $this->respText($dat);

return $response;
}