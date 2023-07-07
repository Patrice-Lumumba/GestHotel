<?php
//require_once ('database.php');
Class Users extends database{
    private $settings;
    public function __construct(){
        global $_settings;
        $this->settings = $_settings;
        parent::__construct();
    }

    public function __destruct(){
        parent::__destruct();
    }

    public function save_users(){
        extract($_POST);

    }
}