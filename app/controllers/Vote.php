<?php

namespace app\controllers;

class Vote extends \app\core\Controller {
    
    // method to vote.
    #[\app\filters\Admin]
    public function vote($item_id) {
        $vote = new \app\models\Vote();
        $vote->user_id = $_SESSION["user_id"];
        $vote->item_id = $item_id;
        $vote->addVote();

        $item = new \app\models\Item();
        $item = $item->get($item_id);
        $item->vote_count = $item->vote_count + 1;
        $item->updateVote();

        header("location:".BASE."Customer/index");
    }

    // method to vote.
    #[\app\filters\Admin]
    public function unvote($item_id) {
        $vote = new \app\models\Vote();
        $vote = $vote->getSpecificVote($_SESSION["user_id"], $item_id);
        $vote->deleteVote();
        
        $item = new \app\models\Item();
        $item = $item->get($item_id);
        $item->vote_count = $item->vote_count - 1;
        $item->updateVote();

        header("location:".BASE."Customer/index");
    }
}