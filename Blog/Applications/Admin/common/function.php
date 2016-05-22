<?php
/**
 * 后台公用函数库
 */

/**
 * [让父级的分类的子级分类团聚的方法]
 * @param  [type]  $array [所有分类]
 * @param  integer $pid   [从那个级别的父级开始查]
 * @return [type]         [新数组]
 */
function encration($array,$html='-----', $pid=0,$level=0){
	//header('content-type:text/html;charset=utf-8');
	//定义一个空数组
	$arr = array();
	foreach($array as $v){
		if($v['pid'] == $pid){
			
			$v['level'] = $level+1;
			$v['html']=str_repeat($html, $level);
			$arr[] = $v;
			$arr = array_merge($arr, encration($array,$html, $v['id'],$level+1));
		}
	}
	return $arr;
}




/**
 * [根据父级的id查找他所有的儿子的id]
 * @param  [type] $array [所有分类]
 * @param  [type] $id    [要找儿子的父级的id]
 * @return [type]        [description]
 */
function get_all_child($array , $id){
	$arr = array();
	foreach($array as $v){
		if($v['pid'] == $id){
			//找到了儿子
			$arr[]= $v['id'];
			//找孙子
			$arr = array_merge($arr,get_all_child($array , $v['id']));
		}
	}
	return $arr;
}

//根据子集id找到父级-----可以用来做路由父》子》孙
		function getParents($cate,$id){
			$arr=array();
			foreach($cate as $v){
				if($v['id']==$id){
					$arr[]=$v;
					$arr=array_merge(getParents($cate,$v[pid],$arr));
				}
			}

			return $arr;
		}

/**
 * 系统专用的时间处理方法
 */
function wenda_time_format($theTime){
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

//组合一个多维数组的方法
	function get_many_array($array,$name='child',$pid=0){
		$arr=array();
		foreach($array as $v){
			if($v['id']==$pid){
				$v[$name]=get_many_array($array,$name,$v['id']);
				$arr[]=$v;
			}
		}
			return $arr;
	}




?>