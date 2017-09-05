<?php

class ProductController {

    public function __construct() {
        $this->view = new View();
    }

    public function search() {
        require 'model/ProductModel.php';
        $model = new ProductModel();
        $search = $_POST['search'];

        $result = $model->selectProductbyName($search);
        
        if (isset($result)) {
            $this->view->show("indexView.php", $result);
        } else {
            header('Location:?');
        }
    }

}
