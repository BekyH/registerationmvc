<?php

class DatabaseConnection {
     
    private static $instance = NULL;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
      if (!isset(self::$instance)) {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        self::$instance = new PDO('mysql:host=localhost;dbname=kurtu', 'root', '', $pdo_options);
      }
      return self::$instance;
    }
}

class UserData {

    public function register($firstName, $lastName, $companyName, $userName, $password) {
        try {
            $conn = DatabaseConnection::getInstance();
            $sql = "INSERT INTO employee (FirstName, LastName, CompanyName, userName, Password)
            VALUES ('$firstName', '$lastName', '$companyName', '$userName', '$password')";
            $conn->exec($sql);
            echo "Registered suceesfully!";
            
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function verifyEmployeeAccount($userName, $password) {
        try {
            $conn = DatabaseConnection::getInstance();
            $sql = "SELECT * FROM employee WHERE userName ='".$userName."'AND Password='".$password."'limit 1";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $conn->prepare("SELECT FOUND_ROWS()"); 
            $result->execute();
            $row_count =$result->fetchColumn();
            if($row_count == 1) {
                header('Location: Home.php');
            }
            
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function verifyManagerAccount($userName, $password) {
        try {
            $conn = DatabaseConnection::getInstance();
            $sql = "SELECT * FROM admin WHERE userName ='".$userName."'AND Password='".$password."'limit 1";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $conn->prepare("SELECT FOUND_ROWS()"); 
            $result->execute();
            $row_count =$result->fetchColumn();
            if($row_count == 1) {
                header('Location: Homem.php');
            }
            
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

}
?>