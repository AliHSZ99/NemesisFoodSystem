<?php

namespace app\controllers;

class Item extends \app\core\Controller {

    private $folder='uploads/';

    public function addShoppingItem() {
        if(isset($_POST['action'])){
            $item = new \app\models\Item();
            $item->item_name = $_POST['item_name'];
            $item->type = "shopping";
            $item->item_description = $_POST['item_description'];
            $item->item_price = $_POST['item_price'];
            $item->item_quantity = $_POST['item_quantity'];
            $item->insertShoppingItem();

            header('location:/Admin/index');

        }else //1 present a form to the user
            $this->view('Admin/addShoppingItem');
    }

    // Food Inventory Functions //
    public function addFoodItem() {

        if(isset($_POST['action'])){
            if (isset($_FILE['newPicture'])) {
                $check = getimagesize($_FILES['newPicture']['tmp_name']);
                $mime_type_to_extension = ['image/jpeg'=>'.jpg',
                                            'image/gif'=>'.gif',
                                            'image/bmp'=>'.bmp',
                                            'image/png'=>'.png'
                                            ];
                if($check !== false && isset($mime_type_to_extension[$check['mime']])){
                    $extension = $mime_type_to_extension[$check['mime']];
                }else{
                    $this->view('Admin/Food/food', ['error'=>"Bad file type",'pictures'=>[]]);
                    return;
                }
                
                $filename = uniqid().$extension;
                $filepath = $this->folder.$filename;

                if($_FILES['newPicture']['size'] > 4000000){
                     $this->view('Admin/Food/food', ['error'=>"File too large",'pictures'=>[]]);
                     return;
                }
                if(move_uploaded_file($_FILES['newPicture']['tmp_name'], $filepath)){
                    $item = new \app\models\Item();
                    $item->item_name = $_POST['item_name'];
                    $item->type = "food";
                    $item->item_description = $_POST['item_description'];
                    $item->item_price = $_POST['item_price'];
                    $item->item_quantity = $_POST['item_quantity'];
                    $item->goal = $_POST['goal'];
                    //$item->filename = "/".$this->$folder.$filename;
                    $item->insertFoodItem();

                    header('location:/User/food');
                } else{
                    echo "There was an error";
                } 
            }
        } else {
            $picture = new \app\models\Item();
            $pictures = $picture->getFoodItems();
            $this->view('Admin/Food/addFoodItem', ['error'=>null, 'picture'=>$pictures]);
        }
    }

    public function editFoodItem() {
        if(isset($_POST['action'])){
            $item = new \app\models\Item();
            $item->item_name = $_POST['item_name'];
            $item->type = "food";
            $item->item_description = $_POST['item_description'];
            $item->item_price = $_POST['item_price'];
            $item->item_quantity = $_POST['item_quantity'];
            $item->goal = $_POST['goal'];
            $item->filename = $_POST['filename'];
            $item->editFoodItem();

            header('location:/User/food');

        }else //1 present a form to the user
            $this->view('Admin/Food/editFoodItem');
    }

    public function editShoppingItem($item_id) {
        $item = new \app\models\Item();
		$item = $item->get($item_id);

		if(isset($_POST['action'])){
			$item->item_name = $_POST['item_name'];
			$item->item_quantity = $_POST['item_quantity'];
            $item->item_description = $_POST['item_description'];
            $item->item_price = $_POST['item_price'];
			$item->update();
			header('location:/Admin/shopping');
		}else
			$this->view('Admin/editShoppingItem',$item);
    }

    public function deleteShoppingItem($item_id) {
        $Item = new \app\models\Item();
		$Item->delete($item_id);
		header('location:/Admin/shopping');
    }
}