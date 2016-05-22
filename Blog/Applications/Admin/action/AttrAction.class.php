<?php

//属性控制器
class AttrAction extends Action{

		//属性显示方法
		function index(){
			
			$this->attr=M('attr')->select();
		
			$this->display();
		}

		//添加属性的方法
		function addAttr(){

			$this->display();
		}

		//添加属性的表单处理方法
		function runAddAttr(){

			if(M('attr')->add(I('post.'))){
				$this->success('添加成功',U(GROUP_NAME.'/Attr/index'));
			}else{
				$this->error('添加失败');
			}
		} 

		//属性删除的方法
	
		 function delete(){
		 		
		 		$id = I("get.id",'','intval');
			
				$where=array('id'=>$id);
				
				$db = M('attr');

			if($db->where($where)->delete()){
				$this->success('删除成功!',U('Admin/Attr/index'));
			}else{
				$this->error('删除失败!',U('Admin/Attr/index'));
			}
		}	


		//修改属性的方法
	  
	 
	Public function update(){

			$id=I('get.id');
			//p($id);die;
			$this->attr = M('attr')->where(array('id'=>$id))->find();
			//p($attr);

			$this->display();
		}
	//修改属性的表单处理页面
	
	Public function updateHandle(){
			
			if(M('attr')->save(I('post.'))){
				$this->success('分类修改成功!',U('Admin/Attr/index'));
			}else{
				$this->error('分类修改失败',U('Admin/Attr/index'));
			}
		}



}
?>