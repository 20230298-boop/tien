<?php
require_once '../core/Controller.php';
require_once '../app/Models/Employee.php';

class EmployeeController extends Controller {

    public function index() {
        $employees = (new Employee())->all($_GET['q'] ?? '');
        $this->view('employees/index', compact('employees'));
    }

    public function create() {
        if ($_POST) {
            (new Employee())->insert(
                $_POST['full_name'],
                $_POST['phone'],
                $_POST['position'],
                $_POST['salary']
            );
            $this->redirect('index.php?c=employee');
        }

        $this->view('employees/create');
    }

    public function edit() {
        $model = new Employee();

        if ($_POST) {
            $model->update(
                $_GET['id'],
                $_POST['full_name'],
                $_POST['phone'],
                $_POST['position'],
                $_POST['salary']
            );
            $this->redirect('index.php?c=employee');
        }

        $employee = $model->find($_GET['id']);
        $this->view('employees/edit', compact('employee'));
    }

    public function delete() {
        (new Employee())->delete($_GET['id']);
        $this->redirect('index.php?c=employee');
    }
}
