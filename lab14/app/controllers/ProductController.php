<?php
require_once '../app/models/Product.php';
require_once '../app/helpers/flash.php';

class ProductController {
    private Product $model;

    public function __construct(PDO $pdo) {
        $this->model = new Product($pdo);
    }

    public function index() {
        $limit = 5;
        $page = max(1, (int)($_GET['page'] ?? 1));

        $total = $this->model->countAll();
        $totalPages = max(1, ceil($total / $limit));
        if ($page > $totalPages) $page = $totalPages;

        $offset = ($page - 1) * $limit;
        $products = $this->model->getPage($limit, $offset);

        require '../app/views/products/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name  = trim($_POST['name']);
            $price = (float)$_POST['price'];
            $imagePath = null;

            if ($name === '' || $price <= 0) {
                set_flash('msg','Dữ liệu không hợp lệ','danger');
                header('Location: index.php?action=create');
                exit;
            }

            if (!empty($_FILES['image']['name'])) {
                $allow = ['jpg','jpeg','png','webp'];
                $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

                if (!in_array($ext, $allow) || $_FILES['image']['size'] > 2*1024*1024) {
                    set_flash('msg','Ảnh không hợp lệ (≤2MB)','danger');
                    header('Location: index.php?action=create');
                    exit;
                }

                $imagePath = 'uploads/' . uniqid() . '.' . $ext;
                move_uploaded_file(
                    $_FILES['image']['tmp_name'],
                    '../public/' . $imagePath
                );
            }

            $this->model->create([$name, $price, $imagePath]);
            set_flash('msg','Thêm sản phẩm thành công 🎉');
            header('Location: index.php');
            exit;
        }

        require '../app/views/products/create.php';
    }
}
