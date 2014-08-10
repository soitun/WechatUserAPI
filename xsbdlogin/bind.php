<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>绑定帐号</title>
<link href="css/mobile.base.css" rel="stylesheet" type="text/css" />
<link href="css/user.css" rel="stylesheet" type="text/css" />
</head>

<body>

	<div class="titlebar">
    	<div class="titlebar-wrap">
        	<span>绑定帐号</span>
        </div>
    </div>
    
    <div class="form-wrap">
    <form action="login.php" method="POST" class="form form-fullsize form-margin">
    
		<div >
              <input name="wxId" type="hidden" value="<?php echo $_GET['uid']?>"/>
        </div>
        <div class="control-input">
              <span class="input-icon nickname"></span>
              <input name="realname" type="TEXT" placeholder="请输入真实姓名"/>
        </div>
        <div class="control-input">
           	  <span class="input-icon passwd"></span>
              <input name="idnumber" type="TEXT"  placeholder="新生请输入身份证号码"/>
        </div>
		填写微信账号或者QQ号可以方便找到同学和室友：
		<div class="control-input">
              <span class="input-icon nickname"></span>
              <input name="wxqq" type="TEXT" placeholder="微信账号或者QQ号"/>
        </div>
        
        <div class="form-action">
        	<div class="control">
            	<button class="btn btn-green btn-long" type="submit">绑   定</button>
            </div>
            
            
            
            
        </div>
    </form>
    </div>
    
    <div class="footer">
       <div class="footer-wrap">
            <ul class="nav">
                <li>若无法绑定请直接回复微信消息：“无法绑定+个人姓名+身份证号”进行人工审核绑定。目前仅支持2014级本科新生绑定使用。</li>
            </ul>
       </div>
    </div>
    
</body>
</html>
