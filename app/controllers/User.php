<?php

namespace app\controllers;

#[\app\filters\LoginCheck]
class User extends \app\core\Controller {

    // go to customer index.
    #[\app\filters\Admin]
    public function customerIndex() {
        $this->view("Customer/index");
    }
    
    // go to admin index (prospective menu)
    #[\app\filters\Customer]
    public function adminIndex() {
	$item = new \app\models\Item();
        $results = $item->getProspectiveItems();
        $this->view("Admin/index", $results);
    }

    // go to the food inventory
    #[\app\filters\Customer]
    public function food() {
        $item = new \app\models\Item();
        $results = $item->getFoodItems();
        $this->view("Admin/Food/food", $results);
    }

    // go to the the cleaning supplies screen
    #[\app\filters\Customer]
    public function cleaning() {
        $this->view("Admin/cleaning");
    }

    // go to the ingredients screen.
    #[\app\filters\Customer]
    public function ingredients() {
        $this->view("Admin/ingredients");
    }

    // go to shopping list screen
    #[\app\filters\Customer]
    public function shopping() {
        $item = new \app\models\Item();
        $results = $item->getShoppingItems();
		$this->view('Admin/shopping',$results);
    }

    // go to discarded list
    #[\app\filters\Customer]
    public function discarded() {
        $item = new \app\models\Item();
        $results = $item->getDiscardedItems();
		$this->view('Admin/discarded',$results);
    }

    // go to customers screen
    #[\app\filters\Customer]
    public function customers() {
        $this->view("Admin/customers");
    }
    
}
