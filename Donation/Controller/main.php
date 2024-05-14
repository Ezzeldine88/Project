<?php
include_once 'model/DonationModel.php';

class MainController {
    private $model;

    public function __construct() {
        $this->model = new DonationModel();
    }

    public function index() {
        include 'view/mainView.php';
}
}
?>
