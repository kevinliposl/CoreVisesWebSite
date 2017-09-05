<?php

class UserController {

    public function __construct() {
        $this->view = new View();
    }

    public function defaultAction() {
        require 'model/UserModel.php';
        $session = SSession::getInstance();
        $model = new UserModel();
        $result = $model->selectUser($session->email);
        $vars = array(
            "email" => DES::decrypt($result->Email),
            "name" => DES::decrypt($result->Name),
            "lastname" => DES::decrypt($result->LastName),
            "password" => DES::decrypt($result->Password),
            "address" => DES::decrypt($result->Address));
        $this->view->show("userView.php", $vars);
    }

    public function loginUser() {
        $this->view->show("loginView.php");
    }

    public function insertUser() {
        require 'model/UserModel.php';
        $model = new UserModel();

        $email = DES::encrypt($_POST["email"]);
        $name = DES::encrypt($_POST["name"]);
        $lastname = DES::encrypt($_POST["lastname"]);
        $address = DES::encrypt($_POST["address"]);
        $password = DES::encrypt($_POST["password"]);

        $result = $model->insertUser($email, $name, $lastname, $address, $password);
        echo json_encode(array("result" => DES::decrypt($result)));
    }

    public function deleteUser() {
        require 'model/UserModel.php';
        $model = new UserModel();

        $session = SSession::getInstance();
        $result = $model->deleteUser(DES::encrypt($session->email));

        if (DES::decrypt($result) == "true") {
            $session->destroy();
        }
        echo json_encode(array("result" => DES::decrypt($result)));
    }

    public function updateUser() {
        require 'model/UserModel.php';
        $model = new UserModel();

        $email = DES::encrypt($_POST["email"]);
        $name = DES::encrypt($_POST["name"]);
        $lastname = DES::encrypt($_POST["lastname"]);
        $address = DES::encrypt($_POST["address"]);
        $password = DES::encrypt($_POST["password"]);
        $result = $model->updateUser($email, $name, $lastname, $address, $password);
        
        echo json_encode(array("result" => DES::decrypt($result)));
    }

    public function logIn() {
        require 'model/UserModel.php';
        $model = new UserModel();

        $email = DES::encrypt($_POST['email']);
        $password = DES::encrypt($_POST['password']);

        $result = $model->logIn($email, $password);

        if (DES::decrypt($result) == "true") {
            $session = SSession::getInstance();
            $session->email = $_POST['email'];
        }
        echo json_encode(array("result" => DES::decrypt($result)));
    }

    public function signOff() {
        $session = SSession::getInstance();
        $session->destroy();
        $this->view->show("indexView.php");
    }

}
