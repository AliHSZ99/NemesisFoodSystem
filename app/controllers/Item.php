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
            if ($_FILES['newPicture']['size']>0) {
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
                    $item->filename = "/".$this->folder.$filename;
                    $item->insertFoodItem();
                    $item->insertDiscardItem();

                    header('location:/Admin/Food/food');
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

    public function editFoodItem($item_id) {

        $item = new \app\models\Item();
        $item = $item->get($item_id);

        if(isset($_POST['action'])){
            if ($_FILES['newPicture']['size']>0) {
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
                    $item->item_name = $_POST['item_name'];
                    $item->item_description = $_POST['item_description'];
                    $item->item_price = $_POST['item_price'];
                    $item->item_quantity = $_POST['item_quantity'];
                    $item->filename = "/".$this->folder.$filename;
                    $item->item_id = $item_id;
                    $item->editFoodItem();

                     header('location:/User/food');
                } else{
                    echo "There was an error";
                } 
            } else {
                    $item = $item->get($item_id);
                    $item2 = $item->get($item_id + 1);
                    $item->item_name = $_POST['item_name'];
                    $item->item_description = $_POST['item_description'];
                    $item->item_price = $_POST['item_price'];
                    $item->item_quantity = $_POST['item_quantity'];
                    $item->item_id = $item_id;
                    $item2->item_name = $_POST['item_name'];
                    $item2->item_description = $_POST['item_description'];
                    $item2->item_price = $_POST['item_price'];
                    $item->editFoodItem();
                    $item2->editFoodItem();

                    header('location:/User/food');
            }

        }else //1 present a form to the user
            $this->view('Admin/Food/editFoodItem', ['item'=>$item]);
    }
	
	public function deleteFoodItem($item_id) {
        $Item = new \app\models\Item();
        $Item->delete($item_id);
        $Item->delete($item_id + 1);
        header('location:/User/food');
    }
	
	
	
    // Prospective Menu Functions //
    public function addProspectiveItem() {

        if(isset($_POST['action'])){
            if ($_FILES['newPicture']['size']>0) {
                $check = getimagesize($_FILES['newPicture']['tmp_name']);
                $mime_type_to_extension = ['image/jpeg'=>'.jpg',
                                            'image/gif'=>'.gif',
                                            'image/bmp'=>'.bmp',
                                            'image/png'=>'.png'
                                            ];
                if($check !== false && isset($mime_type_to_extension[$check['mime']])){
                    $extension = $mime_type_to_extension[$check['mime']];
                }else{
                    $this->view('Admin/index', ['error'=>"Bad file type",'pictures'=>[]]);
                    return;
                }
                
                $filename = uniqid().$extension;
                $filepath = $this->folder.$filename;

                if($_FILES['newPicture']['size'] > 4000000){
                     $this->view('Admin/index', ['error'=>"File too large",'pictures'=>[]]);
                     return;
                }
                if(move_uploaded_file($_FILES['newPicture']['tmp_name'], $filepath)){
		    $item = new \app\models\Item();
                    $item->item_name = $_POST['item_name'];
                    $item->type = "prospective";
                    $item->item_description = $_POST['item_description'];
		    $item->goal = $_POST['goal'];
                    $item->item_price = $_POST['item_price'];
                    $item->item_quantity = $_POST['item_quantity'];
                    $item->filename = "/".$this->folder.$filename;
                    $item->insertProspectiveItem();

                    header('location:/User/adminIndex');
                } else{
                    echo "There was an error";
                } 
            }
        } else {
            $picture = new \app\models\Item();
            $pictures = $picture->getFoodItems();
            $this->view('Admin/Prospective/addProspectiveItem', ['error'=>null, 'picture'=>$pictures]);
        }
    }

    public function editProspectiveItem($item_id) {

        $item = new \app\models\Item();
        $item = $item->get($item_id);

        if(isset($_POST['action'])){
            if ($_FILES['newPicture']['size']>0) {
                $check = getimagesize($_FILES['newPicture']['tmp_name']);
                $mime_type_to_extension = ['image/jpeg'=>'.jpg',
                                            'image/gif'=>'.gif',
                                            'image/bmp'=>'.bmp',
                                            'image/png'=>'.png'
                                            ];
                if($check !== false && isset($mime_type_to_extension[$check['mime']])){
                    $extension = $mime_type_to_extension[$check['mime']];
                }else{
                    $this->view('Admin/index', ['error'=>"Bad file type",'pictures'=>[]]);
                    return;
                }
                
                $filename = uniqid().$extension;
                $filepath = $this->folder.$filename;

                if($_FILES['newPicture']['size'] > 4000000){
                     $this->view('Admin/index', ['error'=>"File too large",'pictures'=>[]]);
                     return;
                }
                if(move_uploaded_file($_FILES['newPicture']['tmp_name'], $filepath)){
                    $item->item_name = $_POST['item_name'];
                    $item->item_description = $_POST['item_description'];
		    $item->goal = $_POST['goal'];
                    $item->item_price = $_POST['item_price'];
                    $item->item_quantity = $_POST['item_quantity'];
                    $item->filename = "/".$this->folder.$filename;
                    $item->item_id = $item_id;
                    $item->editProspectiveItem();

                     header('location:/User/adminIndex');
                } else{
                    echo "There was an error";
                } 
            } else {
                    $item = $item->get($item_id);
                    $item->item_name = $_POST['item_name'];
                    $item->item_description = $_POST['item_description'];
		    $item->goal = $_POST['goal']; 
                    $item->item_price = $_POST['item_price'];
                    $item->item_quantity = $_POST['item_quantity'];
                    $item->item_id = $item_id;
                    $item->editFoodItem();

                    header('location:/User/adminIndex');
            }

        }else //1 present a form to the user
            $this->view('Admin/Prospective/editProspectiveItem', ['item'=>$item]);
    }
	
	public function deleteProspectiveItem($item_id) {
        $Item = new \app\models\Item();
        $Item->delete($item_id);
        header('location:/User/adminIndex');
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

    //Conrad's Methods
    public function addItem($type) {
        if(isset($_POST['action'])){
            $item = new \app\models\Item();            
            $item->item_name = $_POST['item_name'];
            $item->type = $type;
            $type = strtolower($item->type);            
            $item->item_description = $_POST['item_description'];
            $item->item_price = $_POST['item_price'];
            $item->item_quantity = $_POST['item_quantity'];
            $item->insertItem();
            header('location:/User/'.$type);        
        } else $this->view('Admin/addShoppingItem');
    }

    public function editItem($item_id) {
        $item = new \app\models\Item();
        $item = $item->get($item_id);
        $type = strtolower($item->type);

        if(isset($_POST['action'])){
            $item->item_name = $_POST['item_name'];
            $item->item_quantity = $_POST['item_quantity'];
            $item->item_description = $_POST['item_description'];
            $item->item_price = $_POST['item_price'];
            $item->updateItem();
            header('location:/User/'.$type);        
        } else $this->view("Admin/editItem",$item);                    
    }

    public function deleteItem($item_id) {
        $item = new \app\models\Item();
        $item = $item->get($item_id);
        $type = strtolower($item->type);
        $item->delete($item_id);
        header('location:/User/'.$type);        

    }

    public function redirect($location) {
        $this->view("Admin/$location");        
    }

    //Other
    public function searchDiscardItem() {
        $item = new \app\models\Item();
        $results = $item->searchDiscardItem($_POST['search']);
        $this->view('Admin/discarded', $results);
    }

    
    public function searchShoppingItem() {
        $item = new \app\models\Item();
        $results = $item->searchShoppingItem($_POST['search']);
        $this->view('Admin/shopping', $results);
    }

    public function deleteFromMenu($item_id) {
        $item = new \app\models\Item();
        $item->deleteFromMenu($item_id);
        header('location:/Admin/Food/food');
    }

    public function decrement($item_id) {
        $item = new \app\models\Item();
        $item = $item->get($item_id);
        $item2 = $item->get($item_id + 1);
        $item->item_quantity = $item->item_quantity - 1;
        $item2->item_quantity = $item2->item_quantity + 1;
        $item->editFoodItem();
        $item2->editFoodItem();
        header('location:/Admin/Food/food');
    }

    public function increment($item_id) {
        $item = new \app\models\Item();
        $item = $item->get($item_id);
        $item2 = $item->get($item_id - 1);
        $item->item_quantity = $item->item_quantity - 1;
        $item2->item_quantity = $item2->item_quantity + 1;
        $item->editFoodItem();
        $item2->editFoodItem();
        header('location:/Admin/Food/food');
    }

    public function discardAll($item_id) {
        $item = new \app\models\Item();
        $item = $item->get($item_id);
        $item2 = $item->get($item_id + 1);
        $item2->item_quantity = $item2->item_quantity + $item->item_quantity;
        $item->item_quantity = 0;
        $item->editFoodItem();
        $item2->editFoodItem();
        header('location:/Admin/Food/food');
    }

}
