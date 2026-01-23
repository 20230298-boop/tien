<?php
class Controller {

    protected function view($view, $data = []) {
        extract($data);
        ob_start();
        require "../app/Views/$view.php";
        $content = ob_get_clean();
        require "../app/Views/layout.php";
    }

    protected function redirect($url) {
        header("Location: $url");
        exit;
    }
}
