<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Location:  ../index.html');

    include_once 'EmployeeModel.php';
    include_once 'DBModel.php';

    $database = new Database();
    $db = $database->connect();
    $emp = new Employee($db);

    $result = $emp->add();

?>