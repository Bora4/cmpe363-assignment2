<?php

    header('Access-Control-Allow-Origin: *');
    include_once 'EmployeeModel.php';
    include_once 'DBModel.php';

    $database = new Database();
    $db = $database->connect();

    $emp = new Employee($db);

    $result = $emp->search();

    if ($result == TRUE) {

        $emps_arr = array();

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            extract($row);
            
            $emp_item = array(
                'id' => $id,
                'name' => $name,
                'surname' => $surname,
                'adress' => $adress,
                'phonenumber' => $phonenumber
            );

            array_push($emps_arr, $emp_item);
             
        }
        echo json_encode($emps_arr, JSON_UNESCAPED_SLASHES);

    } else {
        echo "Connection could not be established. search.php<br />";
            die( print_r( sqlsrv_errors(), true));
            
        
    }
       
    sqlsrv_free_stmt($result);

?>