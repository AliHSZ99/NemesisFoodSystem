<?php

namespace app\models;

class Item extends \app\core\Model {

    public $item_id;
    public $type;
    public $item_name;
    public $item_description;
    public $item_price;
    public $item_quantity;
    public $goal;
    public $vote_count;
    public $timestamp;
    public $filename;

    public function __construct(){
        parent::__construct();
    }
    
    public function insertShoppingItem() {
        $SQL = 'INSERT INTO item (item_name, type, item_description, item_price, item_quantity) VALUES (:item_name, :type, :item_description, :item_price, :item_quantity)';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['item_name'=>$this->item_name, 'type'=>$this->type, 'item_description'=>$this->item_description,'item_price'=>$this->item_price,'item_quantity'=>$this->item_quantity]);

    }

    public function getItemByName($item_name) {
        $SQL = 'SELECT * FROM item where item_name = :item_name';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['item_name'=>$item_name]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Item');
        return $STMT->fetchAll();
    }

    public function getItemByType($type) {
        $SQL = 'SELECT * FROM item where type = :type';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['type'=>$type]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Item');
        return $STMT->fetchAll();
    }
	
    public function get($item_id){
	    $SQL = 'SELECT * FROM Item WHERE item_id = :item_id';
	    $STMT = self::$_connection->prepare($SQL);
	    $STMT->execute(['item_id'=>$item_id]);
	    $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Item');
	    return $STMT->fetch();
    }

    public function getDiscardedItems() {
        $SQL = "SELECT * FROM item where `type` = 'discard'";
        $STMT = self::$_connection->query($SQL);
        $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Item');
        return $STMT->fetchAll();
    }

    public function getShoppingItems() {
        $SQL = "SELECT * FROM item where `type` = 'shopping'";
        $STMT = self::$_connection->query($SQL);
        $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Item');
        return $STMT->fetchAll();
    }

   // Food Item
    public function insertFoodItem() {
        $SQL = 'INSERT INTO item (item_name, type, item_description, item_price, item_quantity, filename) VALUES (:item_name, :type, :item_description, :item_price, :item_quantity, :filename)';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['item_name'=>$this->item_name, 'type'=>$this->type, 'item_description'=>$this->item_description,'item_price'=>$this->item_price,'item_quantity'=>$this->item_quantity, 'filename'=>$this->filename]);
    }

    public function getFoodItems() {
        $SQL = "SELECT * FROM item WHERE `type` = 'food'";
        $STMT = self::$_connection->query($SQL);
        $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Item');
        return $STMT->fetchAll();
    }

   public function editFoodItem() {
        $SQL = 'UPDATE `item` SET `item_name`=:item_name, `item_description`=:item_description, `item_price`=:item_price, `item_quantity`=:item_quantity, `filename`=:filename WHERE item_id = :item_id';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['item_name'=>$this->item_name, 'item_description'=>$this->item_description,'item_price'=>$this->item_price,'item_quantity'=>$this->item_quantity, 'filename'=>$this->filename, 'item_id'=>$this->item_id]);
    }
	
    // Prospective Item
    public function insertProspectiveItem() {
        $SQL = 'INSERT INTO item (item_name, type, item_description, goal, item_price, item_quantity, filename) VALUES (:item_name, :type, :item_description, :goal, :item_price, :item_quantity, :filename)';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['item_name'=>$this->item_name, 'type'=>$this->type, 'item_description'=>$this->item_description, 'goal'=>$this->goal, 'item_price'=>$this->item_price,'item_quantity'=>$this->item_quantity, 'filename'=>$this->filename]);
    }

    public function getProspectiveItems() {
        $SQL = "SELECT * FROM item WHERE `type` = 'prospective'";
        $STMT = self::$_connection->query($SQL);
        $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Item');
        return $STMT->fetchAll();
    }

   public function editProspectiveItem() {
        $SQL = 'UPDATE `item` SET `item_name`=:item_name, `item_description`=:item_description, `item_price`=:item_price, `item_quantity`=:item_quantity, `filename`=:filename WHERE item_id = :item_id';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['item_name'=>$this->item_name, 'item_description'=>$this->item_description, 'goal'=>$this->goal,'item_price'=>$this->item_price,'item_quantity'=>$this->item_quantity, 'filename'=>$this->filename, 'item_id'=>$this->item_id]);
    }
	

    public function delete($item_id){
		$SQL = 'DELETE FROM `Item` WHERE item_id = :item_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['item_id'=>$item_id]);
	}

    
   public function editShoppingItem() {
    $SQL = 'UPDATE `item` SET `item_name`=:item_name, `item_description`=:item_description, `item_price`=:item_price, `item_quantity`=:item_quantity WHERE item_id = :item_id';
    $STMT = self::$_connection->prepare($SQL);
    $STMT->execute(['item_name'=>$this->item_name, 'item_description'=>$this->item_description,'item_price'=>$this->item_price,'item_quantity'=>$this->item_quantity, 'item_id'=>$this->item_id]);
}

    public function searchShoppingItem($search_term) {
        $SQL = "SELECT * FROM Item WHERE item_name LIKE :search_term and `type` = 'shopping'";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(array(':search_term' => '%' . $search_term . '%'));
        $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Item');
        return $STMT->fetchAll();
    }

    public function searchDiscardItem($search_term) {
        $SQL = "SELECT * FROM Item WHERE item_name LIKE :search_term and `type` = 'discard'";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(array(':search_term' => '%' . $search_term . '%'));
        $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Item');
        return $STMT->fetchAll();
    }

}

