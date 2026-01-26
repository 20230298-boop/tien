<?php

class Order
{
    public function __construct($db) {}

    public function getAll()
    {
        return [
            ['id' => 1, 'customer' => 'Nguyễn Văn A', 'total' => '270.000đ'],
            ['id' => 2, 'customer' => 'Trần Thị B', 'total' => '150.000đ']
        ];
    }
}
