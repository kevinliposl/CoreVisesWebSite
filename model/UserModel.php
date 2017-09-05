<?php

class UserModel {

    protected $client;

    public function __construct() {
        $this->client = new SoapClient("http://localhost:56390/Service1.svc?wsdl");
    }

    public function logIn($email, $password) {

        $obj = new stdClass();
        $obj->email = $email;
        $obj->password = $password;

        $retval = $this->client->logIn($obj);
        $result = $retval->logInResult;

        return $result;
    }

    public function insertUser($email, $name, $lastname, $address, $password) {
        $obj = new stdClass();
        $obj->email = $email;
        $obj->name = $name;
        $obj->lastname = $lastname;
        $obj->address = $address;
        $obj->password = $password;

        $retval = $this->client->insertUser($obj);
        $result = $retval->insertUserResult;

        return $result;
    }

    public function updateUser($email, $name, $lastname, $address, $password) {
        $obj = new stdClass();
        $obj->email = $email;
        $obj->name = $name;
        $obj->lastname = $lastname;
        $obj->address = $address;
        $obj->password = $password;

        $retval = $this->client->updateUser($obj);
        $result = $retval->updateUserResult;

        return $result;
    }

    public function deleteUser($email) {
        //$obj = new stdClass();
        //$obj->cedula = $email;
        //$obj->password = $password;
        //$retval = $this->client->METHOD($obj);
        //$resultado = $retval->actualizarPasswordResult;
        return "true";
    }

    public function selectUser($email) {
        $obj = new stdClass();
        $obj->email = $email;

        $retval = $this->client->selectUser($obj);
        $result = $retval->selectUserResult;

        return $result;
    }

}
