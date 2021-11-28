<?php

namespace app\controllers;

class Item extends \app\core\Controller {

    public function addShoppingItem() {
        if(isset($_POST['action'])){
            $item = new \app\models\Item();
            $item->item_name = $_POST['item_name'];
            $item->item_description = $_POST['item_description'];
            $item->item_price = $_POST['item_price'];
            $item->item_quantity = $_POST['item_quantity'];
            $item->insertShoppingItem();

            header('location:/Admin/index');

        }else //1 present a form to the user
            $this->view('Admin/addShoppingItem');
    }

}