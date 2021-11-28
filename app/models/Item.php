<?php

namespace app\models;

class Item extends \app\core\Model {

    public static $item_id;
    public String $item_type;
    public String $item_name;
    public String $item_description;
    public int $item_price;
    public int $item_quantity;
    public int $goal;
    public int $vote_count;
    public date $timestamp;

    public function __construct(){
        parent::__construct();
        self::$item_id += 1;
    }
    
    public function insertShoppingItem() {
        $SQL = 'INSERT INTO ITEM VALUES (DEFAULT,:item_type,:item_name,:item_description,:item_price,:item_quantity,DEFAULT,DEFAULT,DEFAULT)';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['item_type'=>$this->item_type,'item_name'=>$this->item_name,'item_description'=>$this->item_description,'item_price'=>$this->item_price,'item_quantity'=>$this->item_quantity]);

    }

    public function getItemByName($item_name) {
        $SQL = 'SELECT * FROM Item where item_name = :item_name';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['item_name'=>$item_name]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Item');
        return $STMT->fetchAll();
    }

    public function getDiscardedItems() {
        $SQL = 'SELECT * FROM Item where item_type = \"discard\";';
        $STMT = self::$_connection->query($SQL);
        $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Item');
        return $STMT->fetchAll();
    }

    public function getShoppingItems() {
        $SQL = 'SELECT * FROM Item where item_type = shopping';
        $STMT = self::$_connection->query($SQL);
        $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Item');
        return $STMT->fetchAll();
    }

}