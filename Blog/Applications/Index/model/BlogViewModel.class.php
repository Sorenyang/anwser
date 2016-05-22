<?php
class BlogViewModel extends ViewModel{

	

	Protected $viewFields = array(
		'Blog'=>array(
			'id','content','time','click','cid','title','summary',
			//表连接类型
			'_type'=>'LEFT'
			),
		'cate'=>array(
			'name',
			//表连接条件
			'_on'=> 'Blog.cid=cate.id'
		),
	);
}
?>