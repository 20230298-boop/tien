<?php

class Product
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAll()
    {
        return [
            ['id' => 1, 'name' => 'Sách PHP MVC', 'price' => '120.000đ'],
            ['id' => 2, 'name' => 'Sách JavaScript', 'price' => '150.000đ'],
            ['id' => 3, 'name' => 'Sách MySQL', 'price' => '180.000đ']
        ];
    }
}
