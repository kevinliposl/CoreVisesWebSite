<?php

class ProductModel {

    public function __construct() {
        $this->client = new SoapClient("http://localhost:56390/Service1.svc?wsdl");
    }

    public function selectProducts() {
        $retval = $this->client->selectProducts();
        $result = $retval->selectProductsResult;

        return $result;
    }

    public function selectProductbyName($search) {

        $obj = new stdClass();
        $obj->name = $search;
        
        $retval = $this->client->selectProductbyName($obj);
        $result = $retval->selectProductbyNameResult;

        return $result;
    }

}
