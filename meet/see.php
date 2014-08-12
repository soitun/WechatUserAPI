<?php
ob_start();
session_start();

$validate="";

echo "<div data-role='page'>";
echo "<div data-role='header'>
  <h1>遇见</h1>
  </div>";
if(isset($_POST["code"])){
$validate=$_POST["code"];

if($validate!=$_SESSION["code"]){
echo "请刷新验证码"; 

}else{


$con = mysql_connect("localhost","weixin","password");
mysql_set_charset("UTF8", $con);
if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
mysql_select_db("weixin", $con);
$q1=$_POST['q1'];
$q2=1;
$q3=1;
$q4=1;
$q5=0;
$q6=1;
$info1=$_POST['xm'];
$info2=$_POST['wxId'];
$info3="s";
$info4="r";
$sum=$q1+$q2*2+$q3*4+$q4*8+$q5*16+$q6*32;
$result32=mysql_query("SELECT * FROM meet WHERE info2='".$_POST['wxId']."';");
$row32 = mysql_fetch_array($result32);
		if($row32)
		{echo "<br/><br/><br/><br/><br/>不要太贪心啦，你的信息已经记录在数据库了，敬请期待其他人加你吧。";}
		else
		{
$result1=mysql_query("INSERT INTO meet (sum,info1,info2,info3,info4,time) VALUES ('$sum','$info1','$info2','$info3','$info4',now())");
$sql="SELECT * FROM meet WHERE sum='".$sum."' order by rand() limit 1";
$result=mysql_query($sql);

while($row = mysql_fetch_array($result))
		{	$c1=file_get_contents("http://web/weixin/xsbd/3.php?uid=".$row['info2']);
			$content= "TA的联系方式(QQ或微信)：".$row['info1']."<br/>快去遇见TA吧";
			echo $c1."<br/>".$content;
			
			}
mysql_close($con);
}
echo "</div>"; 

session_destroy();
}
}
	else{$url = "http://web/weixin/meet/index.php";  
	echo "<script language='javascript'type='text/javascript'>";  
	echo "window.location.href='$url'";  
echo "</script>";  }
?>