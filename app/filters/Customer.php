<?php

namespace app\filters;

// filter to kick out customer from trying to access admin screens.
#[\Attribute]
class Customer {
	function execute() {
		if ($_SESSION['role'] == 'customer') {
			header("location:".BASE."User/customerIndex");
			return true;
		} else {
			return false;
		}
	}
}