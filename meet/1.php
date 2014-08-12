
<?php
  
   session_start();
?>
<!doctype html>
<html>
<head>
<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
<script>
$(function(){ 
   $("#getcode_num").click(function(){ 
        $(this).attr("src",'vcode.php?' + Math.random()); 
    }); 
    $("#chk_num").click(function(){ 
        var code_num = $("#code_num").val(); 
        $.post("v.php?act=num",{code:code_num},function(msg){ 
            if(msg==1){ 
                alert("验证码正确！"); 
            }else{ 
                alert("验证码错误！"); 
            } 
        }); 
    }); 
}); 
</script>
</head>
<body style="text-align:center;">
<p>验证码：<input type="text" class="input" id="code_num" name="code_num" maxlength="4" />  
<img src="vcode.php" id="getcode_num" title="看不清，点击换一张" align="absmiddle"></p> 
<p><input type="button" class="btn" id="chk_num" value="提交" /></p> 
</body>
</html>
