<?php
/**
 * 后台专用配置项
 */

	return array(
	//设置我后台的专用的模板替换规则
	'TMPL_PARSE_STRING'=>array(
		'__PUBLIC__'=>__ROOT__.'/'.APP_NAME.'/'.'Applications/'.GROUP_NAME.'/'.'Tpl/Public',
		),

	//session的前缀设置
	'SESSION_PREFIX'=>'admin',

	'URL_HTML_SUFFIX'=>'',
	


	);

?>