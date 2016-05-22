<?php
//前台首页控制器

class IndexAction extends CommonAction{

	//首页显示
	function index(){
		
			$this->re=D('BlogRelation')->relation(true)->limit(4)->select();
			//p($this->re);

		
			$this->display();
	}

}
?>