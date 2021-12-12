<?php

namespace app\controllers;

class Main extends \app\core\Controller {

    // The log in code. creates session variables.
    #[\app\filters\SessionCheck]
    public function index() {
        if (isset($_POST["action"])) {
            if (empty($_POST["username"]) || empty($_POST["password"])) {
                $this->view("Main/index", "One or both fields are empty...");
                return;
            }

            $user = new \app\models\User();
            $user = $user->getUserByUsername($_POST['username']);

            if ($user != false && password_verify($_POST['password'], $user->password_hash)){
				$_SESSION['user_id'] = $user->user_id;
				$_SESSION['username'] = $user->username;
                $_SESSION["role"] = $user->role;

                if ($user->role == "admin") {
                    $_SESSION["fullname"] = $user->fullname;
                    header("location:".BASE."User/adminIndex");
                } else if ($user->role == "customer") {
                    header("location:".BASE."User/customerIndex");
                }
			}else{
				$this->view('Main/index', 'Wrong username and password combination...');
			}
        } else {
            $this->view("Main/index");
        }

    }

    // method to register a new user. 
    #[\app\filters\SessionCheck]
    public function register() {

        if (isset($_POST["action"])) {
            if (empty($_POST["email"]) || empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["confirmPassword"])) {
                $this->view("Main/register", "One or more of your fields are empty...");
                return;
            }
            if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                $this->view("Main/register", "Wrong email format was inserted...");
                return;
            }
            
            $user = new \app\models\User();
            $user->username = $_POST["username"];
            $user->email = $_POST["email"];
            // to make an admin, just change this customer role to admin and register a user.
            $user->role = "customer";
            
            $allUsers = $user->getAllUsers();
            foreach ($allUsers as $currentUser) {
                if ($currentUser->email == $user->email) {
                    $this->view("Main/register", "This email was already used...");
                    return;
                }
                if ($currentUser->username == $user->username) {
                    $this->view("Main/register", "This username is already taken...");
                    return;
                }
            }

            if ($_POST["password"] == $_POST["confirmPassword"]) {
                if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $_POST["password"])) {
                    $this->view("Main/register", "The password requirements were not followed...");
                    return;
                }
                $user->password = $_POST["password"];
                $user->insertUser();
                $_SESSION["register_status"] = "Registered Successfully";

                header("location:".BASE."Main/index");
            } else  {
                $this->view("Main/register", "The passwords do not match...");
            }
        } else {
            $this->view("Main/register");
        }
    }

    // method to logout a user. destroys the session.
    public function logout(){
		//destroy session variables
		session_destroy();
		header("location:".BASE."Main/index");
	}
    
    public function printView() {
        $user = new \app\models\User();
        $user = $user->getAllUsers();

        $item = new \app\models\Item();
        $item = $item->getAllItems();

        $vote = new \app\models\Vote();
        $vote = $vote->getAllVotes();

        $this->view("Main/printAllData", ["user" => $user, "item" => $item, "vote" => $vote]);
    }
}