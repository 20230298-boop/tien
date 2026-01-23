<?php
require '../app/Models/Category.php';

class CategoryController extends Controller {

    public function index() {
        $model = new Category();
        $categories = $model->getAll($_GET['q'] ?? '');
        $this->view('categories/index', compact('categories'));
    }
}
