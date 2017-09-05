<?php

class InvoiceController {

    public function __construct() {
        $this->view = new View();
    }

    public function defaultAction() {
        $vars = array(
            "id_product" => $_POST["id_product"],
            "name" => $_POST["name"],
            "price" => $_POST["price"]);
        $this->view->show("invoiceView.php",$vars);
    }

    public function insertInvoice() {
        require 'model/InvoiceModel.php';
        $session = SSession::getInstance();
        $model = new InvoiceModel();
        //$result = $model->insertInvoice($_POST["id_product"], $session->email, $_POST["quantity"]);

        //$this->view->show("indexView.php");
    }

}
