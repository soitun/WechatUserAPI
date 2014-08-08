<?php 

$message = $this->message;
//声明你的用户名和密码
$db_host='localhost';
$db_username='root';
$db_password='QNXGpassword@)!)0415';
$db_name='newqnxg';
//连接到服务器并且选择数据库
$db_server = mysql_connect($db_host,$db_username,$db_password) or die("无法连接到数据库");
mysql_select_db($db_name);

//运行mysql指令
$query = "SELECT title FROM tp_notice LIMIT 690 , 30";
$db_result = mysql_query($query);
$res=mysql_result($db_result,1,'title');

$ret = preg_match('/(.+)通知/i', $this->message['content'], $matchs);
if(!$ret) {
	return $this->respText('请输入合适的格式, 千年弦歌通知');
}
$ttt = $matchs[1];


$response = array();
	$dat = $res. PHP_EOL ."by ".$ttt;
	$response = $this->respText($dat);

return $response;