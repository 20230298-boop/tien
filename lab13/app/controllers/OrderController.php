<?php

require_once ROOT_PATH . '/app/models/Order.php';

class OrderController
{
    private $order;

    public function __construct($db)
    {
        $this->order = new Order($db);
    }

    public function index()
    {
        $orders = $this->order->getAll();
        require_once ROOT_PATH . '/app/views/orders/index.php';
    }
}
