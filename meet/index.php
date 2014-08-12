
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css">
<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
</head>
<body style="font-family:微软雅黑;">
<center>
<div data-role="page">
  <div data-role="header">
  <h1>遇见</h1>
  </div>

<form id="login" action="see.php" method="POST">
 <fieldset data-role="controlgroup" data-type="horizontal">
      <legend>请选择：</legend>
        <label for="1">我吃甜豆腐脑</label>
        <input type="radio" name="q1" id="1" value="1">
        <label for="0">我吃咸豆腐脑</label>
        <input type="radio" name="q1" id="0" value="0">	
      </fieldset>
  <div style="padding-top:5px;"><input type="text" name="xm" id="xm" placeholder="你的联系方式(QQ或微信)"></div>
  <div >
              <input name="wxId" type="hidden" value="<?php echo $_GET['uid']?>"/>
        </div>
<p>
<span>验证码：</span>
<input type="text" name="code" value="" size=10> 
<img  title="点击刷新" src="./vcode.php" align="absbottom" onclick="this.src='vcode.php?'+Math.random();"></img>
</p>
<p>
<input type="submit" value="提交">
</p>
</form>
</div>
</center>
</body>
</html>