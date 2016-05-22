<?php
class ImageAction extends CommonAction{

		//精彩图集展示方法

	public function index(){

		$this->img=M('image')->select();
		//p($this->img);
		$this->display();
	}


	public function img(){

		$id=I('get.id');
		//p($id);
		$this->img=M('image')->where(array('id'=>I('get.id')))->find();
		p($this->img);
		$this->display();
	}
}


?>