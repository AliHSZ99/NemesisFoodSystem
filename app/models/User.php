<?php

namespace app\models;

class User extends \app\core\Model {

    // data members
    public $user_id;
    public $username;
    public $password;
    public $password_hash;
    public $role;
    public $fullname;
    public $email;

    // constructor
    public function __construct() {
        parent::__construct();
    }

    // get one user by their username.
    public function getUserByUsername($username) {
        $SQL = 'SELECT * FROM user WHERE username LIKE :username';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['username' => $username]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\User');
		return $STMT->fetch();
    }

    // get a user by getting the user id.
    public function getUser($user_id) {
        $SQL = 'SELECT * FROM user WHERE user_id = :user_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['user_id' => $user_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\User');
		return $STMT->fetch();
    }
    
    // get all of the users in the database.
    public function getAllUsers() {
        $SQL = "SELECT * FROM user";
		$STMT = self::$_connection->query($SQL);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\\models\\User");
		return $STMT->fetchAll();
    }

    // insert a user to the database.
    public function insertUser(){
		$this->password_hash = password_hash($this->password, PASSWORD_DEFAULT);
		$SQL = 'INSERT INTO user(username, password_hash, role, email) VALUES (:username,:password_hash, :role, :email)';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['username'=>$this->username,'password_hash'=>$this->password_hash, "role" => $this->role, "email" => $this->email]);
	}

}