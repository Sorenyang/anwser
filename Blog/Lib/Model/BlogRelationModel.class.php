<?php

	//发布博文所用到的关联模型
class BlogRelationModel extends RelationModel{


	//主表 
	protected $tableName='blog';
	//与主表相关联的表
	protected $_link=array(
		'attr'=>array(
			'mapping_type'=>MANY_TO_MANY,		//关联表的类型
			'mapping_name'=>'attr',				//关联表的名称
			'foreign_key'=>'bid',				//主表在中间表中的描述字段
			'relation_foreign_key'=>'aid',		//关联表在中间表中的描述字段
			'relation_table'=>'blog_attr',	//中间表的名称
			

			
			),
	//第二个关联表的信息
		'cate'=>array(

			'mapping_type'=>BELONGS_TO,			//关联表的类型

	 		'foreign_key'=>'cid',				//主表在中间表中的描述字段
	 		'mapping_fields'=>'name',
	 		'as_fields'=>'name:catename',			//		
			)

		);











}
?>