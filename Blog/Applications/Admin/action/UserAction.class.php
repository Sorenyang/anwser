<?php
//用户控制器

class UserAction extends Action{

	//用户列表显示页面方法
	public function index(){
		$this->users=M('user')->select();
		//p($this->users);
		$this->display();
	}

	//用户信息修改
	public function update(){
		$id=I('get.id');

		$this->user=M('user')->where(array('id'=>$id))->find();
		//p($this->user);
		$this->display();

	}

	public function updateHandle(){
		
			if(M('user')->save(I('post.'))){
				$this->success('分类修改成功!',U('Admin/User/index'));
			}else{
				$this->error('分类修改失败',U('Admin/User/index'));
			}
	}

	//删除用户信息

	public function delete(){
		$id = I("get.id",'','intval');
			
				$where=array('id'=>$id);
				
				$db = M('user');

			if($db->where($where)->delete()){
				$this->success('删除成功!',U('Admin/User/index'));
			}else{
				$this->error('删除失败!',U('Admin/User/index'));
			}
	}
	//添加用户
	public function add(){
		$this->display();

	}
	//添加用户的表单处理方法
	public function addHandel(){

		if(M('user')->add(I('post.'))){
				$this->success('添加成功',U(GROUP_NAME.'/User/index'));
			}else{
				$this->error('添加失败');
			}
	}

}
?>