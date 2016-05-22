<?php

class SystemAction extends CommonAction{

	function verify(){
		$this->display();
	}

	public function upverify(){
		if(F('verify',$_POST,CONF_PATH)){
			$this->success('修改成功',U(GROUP_NAME.'/System/verify'));
		}else{
			$this->error('修改失败'.CONF_PATH.'verify.php权限');
		}
	}
}


?>