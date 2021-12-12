<?php

namespace app\controllers;

use PHPMailer\PHPMailer\PHPMailer;
require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/SMTP.php";
require_once "PHPMailer/Exception.php";

#[\app\filters\LoginCheck]
class User extends \app\core\Controller {

    // go to customer index.
    #[\app\filters\Admin]
    public function customerIndex() {
        $item = new \app\models\Item();
        $prospectives = $item->getItemByType("prospective");
        
        $this->view("Customer/index", $prospectives);
    }
    
    // go to admin index (prospective menu)
    #[\app\filters\Customer]
    public function adminIndex() {
	$item = new \app\models\Item();
        $results = $item->getProspectiveItems();
        $this->view("Admin/index", $results);
    }

    // go to the food inventory
    #[\app\filters\Customer]
    public function food() {
        $item = new \app\models\Item();
        $results = $item->getFoodItems();

        $this->view("Admin/Food/food", $results);
    }

    // go to the the cleaning supplies screen
    #[\app\filters\Customer]
    public function cleaning() {
        $items = new \app\models\Item();
        $items = $items->getItemByType("cleaning");

        $this->view("Admin/cleaning", $items);
    }

    // go to the ingredients screen.
    #[\app\filters\Customer]
    public function ingredients() {
        $items = new \app\models\Item();
        $items = $items->getItemByType("ingredients");

        $this->view("Admin/ingredients", $items);
    }

    // go to shopping list screen
    #[\app\filters\Customer]
    public function shopping() {
        $item = new \app\models\Item();
        $results = $item->getShoppingItems();
		$this->view('Admin/shopping',$results);
    }

    // go to discarded list
    #[\app\filters\Customer]
    public function discarded() {
        $item = new \app\models\Item();
        $results = $item->getDiscardedItems();
		$this->view('Admin/discarded',$results);
    }

    // go to customers screen
    #[\app\filters\Customer]
    public function customers() {
        $user = new \app\models\User();
        $allCustomers = $user->getAllCustomers();

        $this->view("Admin/customers", $allCustomers);
    }

    // method to make sure that the admin wants to delete the customer.
    #[\app\filters\Customer]
    public function deleteCustomer($user_id) {
        $user = new \app\models\User();
        $customer = $user->getUser($user_id);

        if (isset($_POST["cancel"])) {
            header("location:".BASE."User/customers");
        }

        if (isset($_POST["delete"])) {
            $customer->deleteCustomer();
            header("location:".BASE."User/customers");
        }

        $this->view("Admin/deleteCustomer", $customer);
    }
    
    // method to be able to search for customers
    #[\app\filters\Customer]
    public function searchCustomers() {
        $user = new \app\models\User();
        $results = $user->searchCustomer($_POST["search"]);

        $this->view("Admin/customers", $results);
    }

    // the admin settings
    #[\app\filters\Customer]
    public function adminSettings() {

        $user = new \app\models\User();
        $user = $user->getUser($_SESSION["user_id"]);

        // code to change password.
        if (isset($_POST["action"])) {
            $oldPass = trim($_POST["oldPassword"]);
            $newPass = trim($_POST["newPassword"]);
            $confirmNewPass = trim($_POST["confirmNewPassword"]);

            // check if any textbox is empty
            if (empty($oldPass) || empty($newPass) || empty($confirmNewPass)) {
                $this->view("Admin/adminSettings", "One or more fields are empty");
                return;
            }

            if ($oldPass == $newPass) {
                $this->view("Admin/adminSettings", "New password is the same as old password");
                return;
            }

            if (password_verify($_POST["oldPassword"], $user->password_hash)) {
                if ($newPass == $confirmNewPass) {
                    $user->password = $newPass;
                    $user->updatePassword($_SESSION["user_id"]);
                    $_SESSION["passwordUpdate"] = "successful";
                    $this->view("Admin/adminSettings");
                } else {
                    $this->view("Admin/adminSettings", "The new password and old password do not match");
                }
            } else {
                $this->view("Admin/adminSettings", "Your old password is incorrect");
            }
        } else {
            $this->view("Admin/adminSettings");
        }

    }

    // the customer settings
    #[\app\filters\Admin]
    public function customerSettings() {
        $user = new \app\models\User();
        $user = $user->getUser($_SESSION["user_id"]);

        // code to change password.
        if (isset($_POST["changePassword"])) {
            $oldPass = trim($_POST["oldPassword"]);
            $newPass = trim($_POST["newPassword"]);
            $confirmNewPass = trim($_POST["confirmNewPassword"]);

            if (empty($oldPass) || empty($newPass) || empty($confirmNewPass)) {
                $this->view("Customer/customerSettings", ["error" => "One or more fields are empty", "feedback" => ""]);
                return;
            }

            if ($oldPass == $newPass) {
                $this->view("Customer/customerSettings", ["error" => "New password is the same as old password", "feedback" => ""]);
                return;
            }

            // verify that old pass is equal to the hash in db.
            if (password_verify($_POST["oldPassword"], $user->password_hash)) {
                if ($newPass == $confirmNewPass) {
                    $user->password = $newPass;
                    $user->updatePassword($_SESSION["user_id"]);
                    $_SESSION["passwordUpdate"] = "successful";
                    $this->view("Customer/customerSettings", ["error" => "", "feedback" => ""]);
                } else {
                    $this->view("Customer/customerSettings", ["error" => "The new password and old password do not match...", "feedback" => ""]);
                }
            } else {
                $this->view("Customer/customerSettings", ["error" => "Your old password is incorrect...", "feedback" => ""]);
            }

            return;
        }

        $mail = new PHPMailer(true);

        // when the feedback send button is pressed, checks if empty or more than 300 characters.
        // if those are satisfied, the email is sent, and the user gets a popup.
        if (isset($_POST["feedback"])) {
            if (empty(trim($_POST["message"]))) {
                $this->view("Customer/customerSettings", ["error" => "", "feedback" => "Nothing was entered"]);
                return;
            }
            if (strlen($_POST["message"]) > 300) {
                $this->view("Customer/customerSettings", ["error" => "", "feedback" => "The feedback is more than 300 characters long"]);
                return;
            }
            $user = new \app\models\User();
            $user = $user->getUser($_SESSION["user_id"]);
            $feedback = $_POST["message"];

            $mail = new PHPMailer();

            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = "testingsysdev@gmail.com";
            $mail->Password = "Ilovesysdev123";
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom("testingsysdev@gmail.com");
            $mail->addAddress("testingsysdev@gmail.com");
 
            $mail->isHTML(true);
            $mail->Subject = ("Feedback");
            $mail->Body = "<h3>Email: $user->email <h3>Username: $user->username <br>Feedback: $feedback</h3>";

            $mail->send();

            $_SESSION["feedbackSent"] = "sent";
        } 

        $this->view("Customer/customerSettings", ["error" => "", "feedback" => ""]);
    }

    // method to search for prospective menu items in the customer screen.
    #[\app\filters\Admin]
    public function searchProspective() {
        $item = new \app\models\Item();
        $results = $item->searchProspective($_POST["search"]);

        $this->view("Customer/index", $results);
    }

    
}
