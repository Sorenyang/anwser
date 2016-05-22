<?php
//前台公用控制器

class CommonAction extends Action{

	
	function _initialize(){

	
			//查出所有的顶级分类
			$this->cate = M('cate')->select();
			//p($this->cate);
			//查出点击数最多的博文
			
			$this->hots=M('blog')->where(array('click'=>array('gt',100)))->order('click desc')->select();
			//p($hots);
			

			//最新发布
			$tmprrow=strtotime('-1 day',time());
			//p($tmprrow);
			$this->new=M('blog')->where(array('time'=>array('gt',$tmprrow)))->order('time desc')->select();
			
		
	}


	

		
	

}
?>