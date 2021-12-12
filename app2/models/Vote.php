<?php

namespace app\models;

class Vote extends \app\core\Model {

    // data members
    public $vote_id;
    public $user_id;
    public $item_id;

    // constructor
    public function __construct() {
        parent::__construct();
    }

    // getting the count of vote.
    public function getVote($user_id, $item_id) {
        $SQL = "SELECT COUNT(*) FROM vote WHERE user_id = :user_id AND item_id = :item_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(["user_id" => $user_id, "item_id" => $item_id]);
		$count = $STMT->fetch();

        if ($count["COUNT(*)"] == 0) {
            return true;
        }

        return false;
    }

    // adding a vote
    public function addVote() {
        $SQL = "INSERT INTO vote (user_id, item_id) VALUES (:user_id, :item_id)";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(["user_id" => $this->user_id, "item_id" => $this->item_id]);
    }

    // delete a vote
    public function deleteVote() {
        $SQL = "DELETE FROM vote WHERE vote_id = :vote_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(["vote_id" => $this->vote_id]);
    }

    // get a specific vote, not the count
    // getting the count of vote.
    public function getSpecificVote($user_id, $item_id) {
        $SQL = "SELECT * FROM vote WHERE user_id = :user_id AND item_id = :item_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(["user_id" => $user_id, "item_id" => $item_id]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Vote');
        return $STMT->fetch();
    }
}