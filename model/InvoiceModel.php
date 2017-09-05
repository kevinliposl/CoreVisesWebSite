<?php

class InvoiceModel {

    protected $client;

    public function __construct() {
        $this->client = new SoapClient("http://localhost:56390/Service1.svc?wsdl");
    }

    public function insertInvoice($id_product, $email_client, $quantity) {

        $obj = new stdClass();
        $obj->email_client = $email_client;
        $obj->quantity = "$quantity";
        $obj->id_product = $id_product;

        $retval = $this->client->insertInvoice($obj);
        $result = $retval->insertInvoiceResult;

        return $result;
    }

}
