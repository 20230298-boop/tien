<?php
require_once '../app/models/BorrowerRepository.php';

class BorrowersController {
    private BorrowerRepository $repo;

    public function __construct(PDO $pdo) {
        $this->repo = new BorrowerRepository($pdo);
    }

    public function index() {
        $borrowers = $this->repo->getAll();
        require '../app/views/borrowers/index.php';
    }

    public function create() {
        require '../app/views/borrowers/create.php';
    }

    public function store() {
        $name  = trim($_POST['full_name']);
        $phone = trim($_POST['phone']);

        if ($name === '') {
            die("Tên người mượn không được để trống");
        }

        $this->repo->create($name, $phone);
        header("Location: index.php?c=borrowers");
        exit;
    }
}
