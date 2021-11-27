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
        $this->view("Admin/index");
    }

    // go to the food inventory
    #[\app\filters\Customer]
    public function food() {
        $this->view("Admin/food");
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
        $this->view("Admin/shopping");
    }

    // go to discarded list
    #[\app\filters\Customer]
    public function discarded() {
        $this->view("Admin/discarded");
    }

    // go to customers screen
    #[\app\filters\Customer]
    public function customers() {
        $this->view("Admin/customers");
    }

    // go to add Shopping activity
    #[\app\filters\Customer]
    public function index() {
        $this->view("Admin/addShoppingItem");
    }
}