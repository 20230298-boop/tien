
<?php
require_once __DIR__ . '/../core/BaseController.php';
require_once __DIR__ . '/../models/StudentModel.php';

class StudentController extends BaseController {
    private $model;
    public function __construct() {
        $this->model = new StudentModel();
    }

    public function index() {
        $this->view('students/index');
    }

    public function api() {
        $action = $_GET['action'] ?? '';
        try {
            if ($action === 'list') {
                $this->json(['success'=>true,'data'=>$this->model->all()]);
            }

            if (in_array($action, ['create','update'])) {
                $errors = [];
                if (empty($_POST['code'])) $errors['code'] = 'Mã SV bắt buộc';
                if (empty($_POST['full_name'])) $errors['full_name'] = 'Họ tên bắt buộc';
                if (empty($_POST['email'])) $errors['email'] = 'Email bắt buộc';
                elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
                    $errors['email'] = 'Email không hợp lệ';

                $id = $_POST['id'] ?? null;
                if (!$errors && $this->model->existsCodeEmail($_POST['code'], $_POST['email'], $id)) {
                    $errors['unique'] = 'Mã SV hoặc Email đã tồn tại';
                }
                if ($errors) $this->json(['success'=>false,'errors'=>$errors]);
            }

            if ($action === 'create') {
                $this->model->create($_POST);
                $this->json(['success'=>true,'message'=>'Thêm thành công']);
            }

            if ($action === 'update') {
                $this->model->update($_POST['id'], $_POST);
                $this->json(['success'=>true,'message'=>'Cập nhật thành công']);
            }

            if ($action === 'delete') {
                $this->model->delete($_POST['id']);
                $this->json(['success'=>true,'message'=>'Xóa thành công']);
            }
        } catch (Exception $e) {
            $this->json(['success'=>false,'message'=>$e->getMessage()]);
        }
    }
}
