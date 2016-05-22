<?php
//登录控制器
Class LoginAction extends Action{

	//登录页显示
	function index(){

		$this->display();
	}

	//验证码生成方法

	Public function verify(){
		/*import('Class.Image',APP_PATH);
		Image::verify();*/

		import('ORG.Util.Image');
		ob_end_clean();
		Image::buildImageVerify(1,1);
	}



	 //异步验证用户登录
	
	Public function checkAccount(){
		//非异步传输数据则报错
		if(!IS_AJAX) halt('页面不存在');
		//定义条件数组
		$where = array(
			'account' => I('post.username')
			);
		if(M('user')->where($where)->select()){
			//ajaxReturn--Tp中的异步返回
			$this->ajaxReturn(array('status'=>1),'json');
		}else{
			$this->ajaxReturn(array('status'=>0),'json');
		}
		
	}

	
	  //异步验证密码
	
	Public function checkpassword(){
		if(!IS_AJAX) halt('页面不存在');
		//组装$where数组
		$where = array(
			'account' => I('post.username'),
			);
		$password = M('user')->where($where)->getField('password');
		if($password && $password == I('post.password','','md5')){
			$this->ajaxReturn(array('status'=>1),'json');
		}else{
			$this->ajaxReturn(array('status'=>0),'json');
		}
	}
	 //异步验证验证码
	 
	Public function checkcode(){
		if(!IS_AJAX) halt('页面不存在');
		if($_SESSION['admin']['verify'] == I('post.code','','md5')){
			$this->ajaxReturn(array('status'=>1),'json');
		}else{
			$this->ajaxReturn(array('status'=>0),'json');
		}
	}





	//php登录表单处理方法
	//登录表单处理
	function login(){
		
		if(!IS_POST)halt('页面不存在');

		if(I('post.code','','md5')!=session('verify')) 	$this->error('验证码出错','index');

		$db=M('user');
		$user=$db->where(array('username'=>I('post.username')))->find();
		if(!$user||$user['password'] != I('post.password','','md5')){

			$this->error('帐号或密码错误','index');
		}

		session('uid',$user['id']);
		session('username',$user['username']);
		session('logintime',date('Y-m-d H:i:s',$user['logintime']));
		session('loginip',$user['loginip']);

		$data=array(
			'id'=>$user['id'],
			'logintime'=>time(),
			'loginip'=>get_client_ip()

			);
		
		if($db->save($data)){
			$this->success('登录成功',U('Admin/Index/index'));
		}else{
			$this->error('登录失败，请重试',U('Admin/Login/index'));
		}
	}












}
?>