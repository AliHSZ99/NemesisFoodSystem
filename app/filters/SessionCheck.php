<?php

namespace app\filters;

//definition of an attribute
//it needs to be applied to be functional
#[\Attribute]
class SessionCheck {
	function execute() {
		if(isset($_SESSION['user_id'])){
			$user = new \app\models\User();
			$user = $user->getUser($_SESSION["user_id"]);
			if ($user->role == "admin") {
				header("location:".BASE."User/adminIndex");
			} else if ($user->role == "customer") {
				header("location:".BASE."User/customerIndex");
			}
			return true;
		}
		return false;
	}
}