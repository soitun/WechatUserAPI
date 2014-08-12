<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>明信片后台</title></head>
<?php
 $server="localhost";
 $user="weixin";
 $password="password";
 $connect=mysql_connect($server,$user,$password) or die('不能与数据库连接！');
  $choose=mysql_select_db("weixin",$connect)or die('数据库school不存在！');
 $cha=mysql_query("select * from mingxinpian")or die('查询失败！');
 $nums=mysql_num_rows($cha);   //获取记录总数
 //分页显示
 $start=0;           //开始显示的记录数
 $nums_per=20;        //定义每页显示的记录数
 if(empty($_GET['start']))
 {
  $start=0;
 }
 else
  {
   $start=$_GET['start'];
  }
 $cha2=mysql_query("select * from mingxinpian limit $start,$nums_per");
 $nums2=mysql_num_rows($cha2);  //每次最多输出记录数
 echo'共有记录数:'.$nums.'<br>';
 echo"<table border=1><tr><td>学生编号</td><td>微信账号</td><td>记录</td><td></td></tr>";
 for ($i=0; $i<$nums2; $i++)                              //逐条输出插入的记录
 {
  $result=mysql_fetch_array($cha2);
  echo"<tr><td>$result[0]</td><td>$result[1]</td>";
  echo "<td>$result[2]</td><td>$result[3]</td></tr>";
 }
 echo"</table>";
 if($nums_per>=$nums)//如果每页显示的记录数大于总记录数则只有一页
 {
  echo"<br>当前只有一页";
 }
/*如果每页显示的记录数小于总记录数则只有一页，上一页开始显示的记录数等于当前记录数加于每页显示的记录数，下一页开始显示的记录数等于当前记录数减于每页显示的记录数*/
 else
 {                      
  $prev=$start-$nums_per;
  if($prev<0)
    {
     $prev=0;
    }
    $last=$start+$nums_per;
  if($last>$nums)
    {
  $last=$nums;
 }
//不是第一页就显示上一页，不是最后一页就显示下一页
 if($start==0)
 {
  echo"这是第一页&nbsp&nbsp&nbsp&nbsp&nbsp";
 }
 else
 {
  echo"<a href=".$_SERVER['PHP_SELF']."?start=$prev>上一页</a>&nbsp&nbsp&nbsp&nbsp&nbsp";
 }
 if($last==$nums)
 {
  echo"这是最后一页&nbsp&nbsp&nbsp&nbsp&nbsp";
 }
 else
 {
  echo"<a href=".$_SERVER['PHP_SELF']."?start=$last>下一页</a>";
 }
  }
?>
</html>