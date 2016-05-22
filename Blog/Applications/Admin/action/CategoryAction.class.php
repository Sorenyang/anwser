<?php
class CategoryAction extends Action{

	//分类列表显示
	function index(){


			$cate=M('cate')->order('sort ASC')->select();
			$this->cate = encration($cate,'&nbsp;&nbsp;--');
			//p($this->cate);
			
			$this->display();
	}

	//添加分类的显示方法
	function addCate(){

			$this->pid=I('pid',0,'intval');

			$this->display();
	}

	//添加分类表单处理
		function runAddCate(){
			if(M('cate')->add(I('post.'))){
				$this->success('添加成功',U('Admin/Category/index'));
			}else{
				$this->error('添加失败');
			}

		}

		//排序
		function sortCate(){
			$data=I('post.');
			$db=M('cate');
			foreach($data as $id=>$sort){
				$db->where(array('id'=>$id))->setField('sort',$sort);
			}
			$this->redirect(GROUP_NAME.'/Category/index');
		}


	//分类删除的方法
	
		 function delete(){

		$id = I("get.id",'','intval');

		//得到了所有的分类
		$cates = M('cate')->Field(array('id','pid'))->select();
		//p($cates);
		$iDs = get_all_child($cates,$id);
		//将自己也加入到這个数组
		$iDs[] = $id;
		
		$where = array('id'=>array('IN',$iDs));
		$db = M('cate');
		if($db->where($where)->delete()){
			$this->success('删除成功!',U('Admin/Category/index'));
		}else{
			$this->error('删除失败!',U('Admin/Category/index'));
		}
	}	


		//修改分类的页面显示方法
	  
	 
	Public function update(){
		
		$this->cate = M('cate')->where(array('id'=>I('get.id')))->find();
		$this->display();
	}
	//修改分类的表单处理页面
	
	Public function updateHandle(){
			
		if(M('cate')->save(I('post.'))){
			$this->success('分类修改成功!',U('Admin/Category/index'));
		}else{
			$this->error('分类修改失败',U('Admin/Category/index'));
		}
	}



}
?>