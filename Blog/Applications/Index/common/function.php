<?php

/**
 * 将数组某一项拼成一维数组
 * @param  [type] $array [description]
 * @param  [type] $field [description]
 * @return [type]        [description]
 */
function only_array($array,$field){
	$arr = array();
	foreach($array as $v){
		$arr[] = $v[$field];
	}
	return $arr;

	/**
 * 系统专用的时间处理方法
 */
function time_format($theTime){
	/**
	 * 刚刚-------1分钟之内
	 * 几分钟前---8分钟之内
	 * 1小时前----1小时内
	 * 几小时前---8小时之内
	 * 今天****--->8<24之内
	 * 昨天****--->24<48小时
	 * 某年某月某日
	 */
	//当前时间戳
	$now = time();
	//时间差
	$diff =$now - $theTime; 

	$str = '';
	switch(true){
		case $diff < 60:
			$str = '刚刚';
			break;
		case $diff < 8*60:
			$str = '几分钟前';
			break;
		case $diff < 3600:
			$str = '一小时之内';
			break;
		case $diff < 8*3600:
			$str = '几小时之内';
			break;
		case $diff < 24*3600:
			$str = '今天'.date('H:i',$theTime);	
			break;
		case $diff < 48*3600:
			$str = '昨天'.date('H:i',$theTime);	
			break;
		default:
			$str = date('Y-m-d H:i',$theTime);
			break;					
	}
	return $str;
}


}
?>