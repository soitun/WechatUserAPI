<?php 
require 'inc.php';
require 'function.php';
$message = $this->message;
$isenroll=userIsEnroll($message['from']);
if($isenroll==1)
{
$eee="学校正在给大家排宿舍，不要着急哦！";

$response = $this->respText($eee);
}
else
{
nobind();
}
return $response;