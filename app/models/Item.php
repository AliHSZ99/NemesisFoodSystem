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

    public function getDiscardedItems() {
        $SQL = 'SELECT * FROM Item where type = \"discard\";';
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

}