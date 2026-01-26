<?php

require_once ROOT_PATH . '/app/models/Customer.php';

class CustomerController
{
    private $customer;

    public function __construct($db)
    {
        $this->customer = new Customer($db);
    }

    public function index()
    {
        $customers = $this->customer->getAll();
        require_once ROOT_PATH . '/app/views/customers/index.php';
    }
}
