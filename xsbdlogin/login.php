<?php
	function inject_check($str)
{
 $tmp=preg_match('/select|insert|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile/i', $str); 
 if($tmp){
  echo "同学你很有想法，跟我学做菜吧。请发送email到tms@live.cn，或许我们可以聊聊。by 无聊的程序员";
  exit();
 }else{
  return $str;
 }
 }

	if(isset($_POST['realname'])&&isset($_POST['idnumber']))
	{
	
		$user=inject_check($_POST['realname']);			//真实姓名
		$pwd=inject_check($_POST['idnumber']);			//身份证
		$uid=inject_check($_POST['wxId']);				//微信号
		$wxqq=inject_check($_POST['wxqq']);				//微信orQQ
		$con = mysql_connect("localhost","weixin","password");
		mysql_set_charset("UTF8", $con);
		if (!$con)
		{
			die('Could not connect: ' . mysql_error());
		}
		mysql_select_db('weixin', $con);
		$sql="SELECT * FROM student WHERE idnumber='".$pwd."' and realname='".$user."'";
		$result=mysql_query($sql);
		
		if(mysql_num_rows($result)==0)
		{
			mysql_close($con);
			echo "<script type='text/javascript'>alert('资料有误！请输入真实姓名及身份证号码。');location.href='http://web/weixin/xsbd/bind.php?uid=".$uid."'</script>";
		}
		else
		{
			$result=mysql_query("UPDATE student SET wxID='".$uid."' WHERE idnumber='".$pwd."'");
			$result=mysql_query("UPDATE student SET wxqq='".$wxqq."' WHERE idnumber='".$pwd."'");
			mysql_close($con);
			echo "<script type='text/javascript'>alert('绑定成功');location.href='http://web/'</script>";
		
		}
		
	}
?>