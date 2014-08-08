<?php 
function get_by_curl($remote_server)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $remote_server);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}
$r=get_by_curl("http://web/index.php?m=notice&a=index");
/*preg_match_all("/<[img|IMG].*?[\/]?>/", $r, $e);
print_r($e[0][9]);*/
preg_match_all("/class\=\"u-list-li\"\>\<li\>.*?\<\/li\>/", $r, $e);
for($c=0;$c<10;$c++){
preg_match_all("/index.*?(?=\"\>)/", $e[0][$c], $f);

//print_r($e[0][0]);
$x[$c]="http://web/".$f[0][0];
preg_match_all("/\<a(.*?)\<\/a\>/", $e[0][$c], $g);
  $g[0][0] = preg_replace("/<a[^>]*>/i",'', $g[0][0]);   
  $g[0][0] = preg_replace("/<\/a>/i", '', $g[0][0]);    
$y[$c]=$g[0][0];
}


	$news = array();
	$news[] = array('title' => '千年弦歌通知', 'description' => '千年弦歌通知', 'url' => 'http://web', 'picurl' => 'http://cimg.163.com/news/0408/20/netease-logo.gif');
	$cnt = 10;
	for($i = 0; $i < $cnt; $i++) {
		$news[] = array(
			'title' => $y[$i],
			'description' => $y[$i],
			'picurl' => '',
			'url' => $x[$i]
		);
	}

	return $this->respNews($news);