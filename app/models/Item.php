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
        self::$item_id += 1;
    }
    
    public function insertItem() {
        $SQL = 'INSERT INTO ITEM VALUES (DEFAULT,:type,:item_name,:item_description,:item_price,:item_quantity,DEFAULT,DEFAULT,DEFAULT)';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['type'=>$this->type,'item_name'=>$this->item_name,'item_description'=>$this->item_description,'item_price'=>$this->item_price,'item_quantity'=>$this->item_quantity]);

    }

    public function getItemByName($item_name) {
        $SQL = 'SELECT * FROM Item where item_name = :item_name';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['item_name'=>$item_name]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Item');
        return $STMT->fetchAll();
    }

    public function getDiscardedItems() {
        $SQL = 'SELECT * FROM Item where type = :type';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['type'=>'Discard']);
        $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Item');
        return $STMT->fetchAll();
    }

    public function getShoppingItems($item_name) {
        $SQL = 'SELECT * FROM Item where type = :type';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['type'=>'Shopping']);
        $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Item');
        return $STMT->fetchAll();
    }

}