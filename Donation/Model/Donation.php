<?php
include_once 'config.php';

class DonationModel {
    protected $db;

    public function __construct() {
        $this->db = dbConnect();
}
}
?>
