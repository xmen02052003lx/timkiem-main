<?php
require_once 'models/TuModel.php';

class TimKiemController {
    public function handleRequest() {
        $action = isset($_GET['action']) ? $_GET['action'] : 'index';

        switch ($action) {
            case 'index':
                $this->index();
                break;
            case 'search':
                $this->search();
                break;
            case 'add':
                $this->add();
                break;
            default:
                $this->index();
                break;
        }
    }

    private function index() {
        include 'views/timkiem.php';
    }

    private function search() {
        $tuModel = new TuModel();
        $keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';
        $result = $tuModel->searchWords($keyword);
        echo json_encode($result);
    }

    private function add() {
        $tuModel = new TuModel();
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $tuModel->addWord($name);
        $this->index();
    }
}
?>
