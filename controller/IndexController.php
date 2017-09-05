<?php

class IndexController {

    public function __construct() {
        $this->view = new View();
    }

    public function defaultAction() {
        require 'model/ProductModel.php';
        $model = new ProductModel();
        $result = $model->selectProducts();
        $this->view->show("indexView.php", $result);
    }

    public function notFound() {
        $this->view->show("404View.php");
    }

    public function login() {
        $this->view->show("loginView.php");
    }

    public function contact() {
        $this->view->show("contactView.php");
    }

}

// fin clase
