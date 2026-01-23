<?php
require_once '../core/Controller.php';
require_once '../app/Models/Appointment.php';

class AppointmentController extends Controller {

    public function index() {
        $appointments = (new Appointment())->all($_GET['q'] ?? '');
        $this->view('appointments/index', compact('appointments'));
    }

    public function create() {
        if ($_POST) {
            (new Appointment())->insert(
                $_POST['customer_name'],
                $_POST['phone'],
                $_POST['service'],
                $_POST['appointment_time'],
                $_POST['status']
            );
            $this->redirect('index.php?c=appointment');
        }

        $this->view('appointments/create');
    }

    public function edit() {
        $model = new Appointment();
        if ($_POST) {
            $model->update(
                $_GET['id'],
                $_POST['customer_name'],
                $_POST['phone'],
                $_POST['service'],
                $_POST['appointment_time'],
                $_POST['status']
            );
            $this->redirect('index.php?c=appointment');
        }

        $appointment = $model->find($_GET['id']);
        $this->view('appointments/edit', compact('appointment'));
    }

    public function delete() {
        (new Appointment())->delete($_GET['id']);
        $this->redirect('index.php?c=appointment');
    }
}
