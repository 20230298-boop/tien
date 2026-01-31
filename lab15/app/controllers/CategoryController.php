<?php
require_once __DIR__ . '/../models/Category.php';
class CategoryController {
    public function index() {
        $categories = Category::all();
        require __DIR__ . '/../views/categories/index.php';
    }
}
