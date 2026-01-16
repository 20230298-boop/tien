<?php
require_once __DIR__ . '/../models/BookModel.php';

class BookController {
    private $model;
    public function __construct($db){
        $this->model = new BookModel($db);
    }

    public function index(){
        require __DIR__ . '/../views/books/index.php';
    }

    public function api(){
        header('Content-Type: application/json');
        $action = $_GET['action'] ?? 'list';

        if($action=='list'){
            echo json_encode(['success'=>true,'data'=>$this->model->all()]);
            return;
        }

        if($action=='create'){
            if($_POST['quantity'] < 0){
                echo json_encode(['success'=>false,'message'=>'Quantity >= 0']);
                return;
            }
            $this->model->create($_POST);
            echo json_encode(['success'=>true,'message'=>'Created']);
            return;
        }

        if($action=='update'){
            $this->model->update($_POST['id'],$_POST);
            echo json_encode(['success'=>true,'message'=>'Updated']);
            return;
        }

        if($action=='delete'){
            $this->model->delete($_POST['id']);
            echo json_encode(['success'=>true,'message'=>'Deleted']);
            return;
        }
    }
}
?>
