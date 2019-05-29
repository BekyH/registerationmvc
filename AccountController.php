<?php
require_once 'UserData.php';
class AccountController {

    public function registerMember($firstName, $lastName, $companyName, $userName, $password) {
        $user = new UserData();
        $user->register($firstName, $lastName, $companyName, $userName, $password);
    }

    public function signEmployeeIn($userName, $password) {
        $user = new UserData();
        $user->verifyEmployeeAccount($userName, $password);
    }

    public function signAdminIn($userName, $password) {
        $user = new UserData();
        $user->verifyManagerAccount($userName, $password);
    }

   
}

?>