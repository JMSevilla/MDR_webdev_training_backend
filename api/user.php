<?php
include("./Headers/header.php");
include_once "./Controllers/userController.php";

if(isset($_POST['userTrigger']) == true) {
    $data = [
        'fname' => $_POST['firstname'],
        'lname' => $_POST['lastname']
    ];
    $callback = new userinfoController();
    $callback->entry($data);
}