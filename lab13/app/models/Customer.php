<?php

class Customer
{
    public function __construct($db) {}

    public function getAll()
    {
        return [
            ['id' => 1, 'name' => 'Nguyễn Văn A', 'email' => 'a@gmail.com'],
            ['id' => 2, 'name' => 'Trần Thị B', 'email' => 'b@gmail.com']
        ];
    }
}
