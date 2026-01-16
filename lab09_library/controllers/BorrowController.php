<?php
require_once __DIR__ . '/../models/BorrowModel.php';
require_once __DIR__ . '/../models/BookModel.php';

class BorrowController {
    private $model;
    private $bookModel;

    public function __construct($db){
        $this->model = new BorrowModel($db);
        $this->bookModel = new BookModel($db);
    }

    public function index(){
        require __DIR__ . '/../views/borrows/index.php';
    }

    public function api(){
        header('Content-Type: application/json');
        $action = $_GET['action'] ?? 'list';

        if($action=='list'){
            echo json_encode(['success'=>true,'data'=>$this->model->all()]);
            return;
        }

        if($action=='create'){
            $this->bookModel->decreaseQty($_POST['book_id']);
            $this->model->create($_POST);
            echo json_encode(['success'=>true,'message'=>'Borrow created']);
            return;
        }

        if($action=='return'){
            $borrow = $this->model->find($_POST['id']);
            $this->model->markReturn($_POST['id']);
            $this->bookModel->increaseQty($borrow['book_id']);
            echo json_encode(['success'=>true,'message'=>'Returned']);
            return;
        }
    }
}
?>
