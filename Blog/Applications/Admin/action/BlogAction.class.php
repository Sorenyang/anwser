<?php

	//博客控制器

	class BlogAction extends CommonAction{

		//博客列表显示方法
		function index(){
			
			$bl=D('BlogRelation');
			
			$blog=$bl->where(array('del'=>0))->relation(true)->select();
			
			//echo $bl->getLastSql();

			//p($blog);die;
			
			$this->assign('blog',$blog);
			$this->display();

		}

		

		//删除到回收站的方法
		function toTrach(){
			
			$trach=D('BlogRelation')->relation(true)->where(array('id'=>$_GET['id']))->save(array('del'=>1));
			
			if($trach){
				$this->success('移送成功',U(GROUP_NAME.'/Blog/index'));
			}else{
				$this->error('移送失败');
			}
		}

		

		//回收站显示页面方法
		function trach(){
		
				$bl=D('BlogRelation');
		
				$this->blog=$bl->where(array('del'=>1))->relation(true)->select();
		
				$this->display();
		}

		//回收站博文还原
		function reback(){

			$trach=D('BlogRelation')->relation(true)->where(array('id'=>$_GET['id']))->save(array('del'=>0));
			
			if($trach){
				$this->success('还原成功',U(GROUP_NAME.'/Blog/index'));
			}else{
				$this->error('还原失败');
			}
		}

		//回收站彻底删除博文
		function  delete(){

			$where=array(
				'del'=>1,
				'id'=>I('get.id')

				);
			$bl=D('BlogRelation');
		
			$blog=$bl->where($where)->relation(true)->delete();
			
			if($blog){
				$this->success('彻底删除成功',U(GROUP_NAME.'/Blog/trach'));
			}else{
				$this->error('删除失败');
			}

		}


			//添加博文
		function blog(){
			
			//分类
			$cate=M('cate')->order('sort')->select();
			$this->cate=encration($cate);
			//p($cate);
			//属性
			$this->attr=M('attr')->select();
			
			$this->display();	

		}


			//博文表单处理
		function addBlog(){
			$data=array(
				'title'		=>I('post.title'),
				'content'	=>I('post.content'),
				'time'		=>time(),
				'click'		=>I('post.click'),
				'cid'		=>I('post.cid'),
				'summary'	=>I('post.summary'),
				);

				if(isset($_POST['aid'])){	
					foreach ($_POST['aid'] as $v) {
							$data['attr'][]=$v;
						}		
				}

			$re=D('BlogRelation')->relation(true)->add($data);
			
			if($re){
					$this->success('发布成功',U(GROUP_NAME.'/Blog/index'));	
			}else{
					$this->error('发布失败');
			}
		}

		//博文修改
		function update(){
			//分类
			$cate=M('cate')->order('sort')->select();
			$this->cate=encration($cate);
			
			//属性
			$this->attr=M('attr')->select();
			
			//修改的页面信息
			$blog=D('BlogRelation')->relation(true)->where(array('id'=>I('get.id')))->find();
			

				foreach ($blog['attr'] as $v) {
					
					$ids[]=$v['id'];
				}

			$this->blog=$blog;
			$this->ids=$ids;
			//p($this->blog);

			$this->display();

		}

		//博文修改表单处理页
		function updateHandel(){
			//p($_POST);
			$data=array(
				'id'		=>I('post.id'),
				'attr'		=>I('post.name'),
				'title'		=>I('post.title'),
				'content'	=>I('post.content'),
				'click'		=>I('post.click'),
				'cid'		=>I('post.cid'),
				'summary'	=>I('post.summary'),
				
				);

					foreach ($_POST['aid'] as $v) {
						$data['attr'][]=$v;
					}


			//p($data);
			if(D('BlogRelation')->relation(true)->save($data)){

				$this->success('更新成功',U(GROUP_NAME.'/Blog/index'));
			}else{
				
				$this->error('更新失败');
			}
		}












			//---将百度编辑器上传图片路径修改为系统地址及方法	
			//编辑器
			//改变Ueditor 默认图片上传路径
		    public function upload(){
		        import('ORG.Net.UploadFile');
				$upoload = new UploadFile();
				//设置子目录保存文件
				$upoload->autoSub = true;
				//子目录创建方式
				$upoload->subType = 'date';
				$upoload->dateFormat = 'Ym';
				
				//上传文件的保存路径==upload方法后可跟文件路径可不设置
				//$upoload->savePath = './Upload/';
				
				if ($upoload->upload('./Upload/')) {
					$info = $upoload->getUploadFileInfo();
					
					//加水印--tp的
					/*import('ORG.Util.Image');
					image::water('./Upload/'.$info[0]['savename'],'./Data/logo.png');*/
					//自定义的
					import('Class.Image',APP_PATH);
					image::water('./Upload/'.$info[0]['savename']);

					echo json_encode(array(
						'url' => $info[0]['savename'],
						'title' => htmlspecialchars($_POST['pictitle'], ENT_QUOTES),
						'original' => $info[0]['name'],
						'state' => 'SUCCESS'
					));
				} else {
					echo json_encode(array(
						'state' => $upload->getErrorMsg()
					));
				}
			}











	}

?>