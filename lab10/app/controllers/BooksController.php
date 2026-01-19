<?php
require_once '../app/models/BookRepository.php';

class BooksController {
    private BookRepository $repo;

    public function __construct(PDO $pdo) {
        $this->repo = new BookRepository($pdo);
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Danh sách sách + tìm kiếm + sắp xếp (whitelist)
    public function index() {
        $keyword = trim($_GET['kw'] ?? '');

        $allowedSort = ['title', 'price', 'qty', 'created_at'];
        $sort = $_GET['sort'] ?? 'created_at';
        if (!in_array($sort, $allowedSort)) {
            $sort = 'created_at';
        }

        $dir = strtolower($_GET['dir'] ?? 'desc');
        $dir = ($dir === 'asc') ? 'asc' : 'desc';

        $books = $this->repo->getAll($keyword, $sort, $dir);

        require '../app/views/books/index.php';
    }

    // Form thêm sách
    public function create() {
        require '../app/views/books/create.php';
    }

    // Lưu sách mới
    public function store() {
        $title  = trim($_POST['title'] ?? '');
        $author = trim($_POST['author'] ?? '');
        $price  = floatval($_POST['price'] ?? 0);
        $qty    = intval($_POST['qty'] ?? 0);

        // Validate
        if ($title === '' || $author === '') {
            $_SESSION['error'] = 'Vui lòng nhập đầy đủ tiêu đề và tác giả';
            header('Location: index.php?c=books&a=create');
            exit;
        }

        if ($price < 0 || $qty < 0) {
            $_SESSION['error'] = 'Giá và số lượng phải >= 0';
            header('Location: index.php?c=books&a=create');
            exit;
        }

        try {
            $this->repo->create($title, $author, $price, $qty);
            $_SESSION['success'] = 'Thêm sách thành công';
        } catch (Exception $e) {
            $_SESSION['error'] = 'Không thể thêm sách';
        }

        header('Location: index.php?c=books');
        exit;
    }

    // Form sửa
    public function edit() {
        $id = intval($_GET['id'] ?? 0);
        if ($id <= 0) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?c=books');
            exit;
        }

        $book = $this->repo->find($id);
        if (!$book) {
            $_SESSION['error'] = 'Không tìm thấy sách';
            header('Location: index.php?c=books');
            exit;
        }

        require '../app/views/books/edit.php';
    }

    // Cập nhật
    public function update() {
        $id = intval($_POST['id'] ?? 0);
        $price = floatval($_POST['price'] ?? 0);
        $qty   = intval($_POST['qty'] ?? 0);

        if ($id <= 0 || $price < 0 || $qty < 0) {
            $_SESSION['error'] = 'Dữ liệu không hợp lệ';
            header('Location: index.php?c=books');
            exit;
        }

        try {
            $this->repo->update(
                $id,
                trim($_POST['title']),
                trim($_POST['author']),
                $price,
                $qty
            );
            $_SESSION['success'] = 'Cập nhật sách thành công';
        } catch (Exception $e) {
            $_SESSION['error'] = 'Không thể cập nhật sách';
        }

        header('Location: index.php?c=books');
        exit;
    }

    // Xóa sách
    public function delete() {
        $id = intval($_POST['id'] ?? 0);
        if ($id <= 0) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?c=books');
            exit;
        }

        try {
            $this->repo->delete($id);
            $_SESSION['success'] = 'Xóa sách thành công';
        } catch (Exception $e) {
            $_SESSION['error'] = 'Không thể xóa sách';
        }

        header('Location: index.php?c=books');
        exit;
    }
}
