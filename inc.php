<?
    $con = mysql_connect("localhost","weixin","QNXGweixin@)!)");
		mysql_set_charset("UTF8", $con);
		if (!$con)
		{
			die('Could not connect: ' . mysql_error());
		}
		mysql_select_db('weixin', $con);
?>
