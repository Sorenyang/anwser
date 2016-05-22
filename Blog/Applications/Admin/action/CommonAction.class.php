<?php

class CommonAction extends Action{

	function _initialize(){

		if( !session('?uid') && !session('?username')){
			
			redirect(U('Admin/Login/Index'));
		}
	}



}




?>