<?php
//后台首页控制器

class IndexAction extends CommonAction{

	//后台首页显示方法
	function index(){

		$this->display();
	}
Public function copy(){
			$time = date('Y:m:d H:i',time());
			$ip = get_client_ip();
			$info = <<<str
			{$_SESSION['Admin']['username']},您好<br/>
			您上次登陆的时间为: {$_SESSION['admin']['logintime']}<br>
			您本次登陆的时间为: {$time}<br/>
			您上次登陆的ip为: {$_SESSION['admin']['loginip']}<br/>
			您本次登陆的ip为: {$ip}<br/>
str;
echo $info;			
		}



	//退出登录

	function logout(){

		session_unset();
		session_destroy();

		$this->redirect('Admin/Login/index');
	}

}
?>	