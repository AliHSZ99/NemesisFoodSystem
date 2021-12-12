<?php

namespace app\filters;

//definition of an attribute
//it needs to be applied to be functional
#[\Attribute]
class LoginCheck {
	function execute(){
		if(!isset($_SESSION['user_id'])){
			header('location:/Main/index');
			return true;
		}
		return false;
	}
}
