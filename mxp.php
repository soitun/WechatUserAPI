<?php 
$message = $this->message;

$ret = preg_match('/(.+)/i', $this->message['content'], $matchs);
if(!$ret) {
	return $this->respText('请输入合适的格式, 明信片+地址+姓名+邮编, 例如: 明信片湖南长沙湖南大学张三410082');
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
$result=mysql_query("INSERT INTO mingxinpian (wxID,content) VALUES ('$from','$adr')");
$dat="您的信息已经提交，请耐心明信片寄送到手。";
	$response = $this->respText($dat);

return $response;
}