<?php

$APPID="wx19f0e51b5c09d404";
$APPSECRET="0a75d5d8a02d4015f5143031036b3b26";
$TOKEN_URL="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$APPID."&secret=".$APPSECRET;
$ch = curl_init(); 

curl_setopt($ch, CURLOPT_URL, $TOKEN_URL); 
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
curl_setopt($ch, CURLOPT_AUTOREFERER, 1); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 

$info = curl_exec($ch);
$result=json_decode($info,true);
$ACC_TOKEN=$result['access_token'];

$infourl="https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$ACC_TOKEN."&openid=".$_GET['uid']."&lang=zh_CN";
$ch = curl_init(); 

curl_setopt($ch, CURLOPT_URL, $infourl); 
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
curl_setopt($ch, CURLOPT_AUTOREFERER, 1); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 

$info1 = curl_exec($ch);
$result1=json_decode($info1,true);


?>

<html lang="zh-cn" dir="ltr">
<head>

<meta charset="UTF-8" />
<meta name=”viewport” content=”width=device-width, initial-scale=1, maximum-scale=1″>

</head>

<body>
<?php if($result1['headimgurl']){
echo "<img src='".$result1['headimgurl']."' height='220' width='220'><br/>";} ?>
姓名：<?php print_r($result1['nickname']) ?></br>
性别：<?php if($result1['sex']==1){echo "男";}else{echo "女";} ?></br>
城市：<?php print_r($result1['city']) ?></br>
国家：<?php print_r($result1['country']) ?></br>
省份：<?php print_r($result1['province']) ?></br>


</body>
</html>