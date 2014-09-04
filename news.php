<?php 
$url = 'http://web/index.php?m=Api&a=index&key=ad854bf1672eb77045e1e32f08701bb8&page_no=1&page_size=5';

$resp = file_get_contents($url);
if ($resp) {
	$json=json_decode($resp,true);
	print_r($json);
	$news = array();
	$news[] = array('title' => '千年弦歌通知', 'description' => '千年弦歌通知', 'url' => 'http://web', 'picurl' => '');
	for($i = 0; $i < 5; $i++) {
		$row = $json[$i];
		$news[] = array(
			'title' => strval($row['title']),
			'description' => strval($row['comefrom']),
			'picurl' => '',
			'url' => "http://web/index.php?m=notice&a=show&id=".strval($row['id'])
		);
	}
	return $this->respNews($news);

}
return $this->respText('没有找到结果, 要不过一会再试试?');

