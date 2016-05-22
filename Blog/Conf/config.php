<?php
return array(
	//'配置项'=>'配置值'

	//设置独立分组
	'APP_GROUP_MODE' => 1,
	
	'APP_GROUP_PATH' => 'Applications',
	
	'APP_GROUP_LIST' => 'Admin,Index',
	
	'DEFAULT_GROUP'  => 'Index',

	//降低模版深度
	'TMPL_FILE_DEPR'=>'_',

	//'SHOW_PAGE_TRACE'=>true,


	//连接数据库的配置
	'DB_TYPE'   => 'mysql', 	// 数据库类型
	//服务器地址
	'DB_HOST'=>'127.0.0.1',
	//数据库用户名
	'DB_USER'=>'root',
	//数据库密码
	'DB_PWD'=>'',
	//数据库名
	'DB_NAME'=>'gblog',
	//表前缀
	'DB_PREFIX'=>'pp_',

	'LOAD_EXT_CONFIG'=>'verify,water',//加载扩展配置文件

	//修改文件的路由的配置
	'URL_MODEL'=>1,
	'URL_ROUTER_ON'=>true,//开启文件路由
	//配置路由规则
	'URL_ROUTER_RULES'=>array(
		// 'c/:id'=>'Index/List/index',
		// 不允许后面跟字符串
		 // ':id\d'=>'Index/List/index',
		// 正则路由
		// '/^c_(\d+)$/'=>'Index/List/index?id=:1' ,
		 ':id\d'=>'Index/Show/index',
		)
);
?>