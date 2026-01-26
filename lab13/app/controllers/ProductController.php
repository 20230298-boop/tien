<?php
require_once ROOT_PATH . '/app/models/Product.php';
class ProductController
{
    private $product;

    public function __construct($db)
    {
        $this->product = new Product($db);
    }

    public function index()
    {
        $products = $this->product->getAll();
        require_once ROOT_PATH . '/app/views/products/index.php';
    }
}

