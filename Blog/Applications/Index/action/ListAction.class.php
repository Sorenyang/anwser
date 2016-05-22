<?php

class ListAction extends CommonAction{

	
		Public function index(){
 		
 		import('ORG.Util.Page');
		//总条数
		$count=D('BlogRelation')->relation(true)->count();

		//p($count);

		$Page=new Page($count,6);

		$show=$Page->show();

		$re=D('BlogRelation');
		
		$list = $re->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->relation(true)->select();	
		//P($list);
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出

		$this->display();
	
	}

	

		//博文展示页面方法
		function show(){
			$where=I('get.id');
			
			//p($where);
			$this->re=M('blog')->where(array('id'=>$where))->find();
			//p($this->re);

			


			$this->display();
	}
	
	

}
?>