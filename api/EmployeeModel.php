<?php
    class Employee {
        private $conn;
        private $table = 'tblEmployee';

        public $id;
        public $EmpName;
        public $EmpSurname;
        public $EmpAdress;
        public $EmpPhone;

        public function __construct($db) {
            $this->conn=$db;
        }

        public function search() {

            $query = "SELECT * FROM tblEmployee";

            $stmt = sqlsrv_query($this->conn, $query);

            return $stmt;
        }

        public function add() {
            $query = "INSERT INTO tblEmployee (EmpName, EmpSurname, EmpAddress, EmpPhone) VALUES (?, ?, ?, ?)";

            $params = array();
            $params[0] = $_POST['name'];
            $params[1] = $_POST['surname'];
            $params[2] = $_POST['adress'];
            $params[3] = $_POST['phonenumber'];

            $stmt = sqlsrv_prepare($this->conn, $query, $params);

            sqlsrv_execute($stmt);

        }

        public function filter() {

            $query = "SELECT * FROM tblEmployee WHERE EmpName = ?";

            $params = array();

            $params[0] = $_GET['searchbyname'];
            $stmt = sqlsrv_query($this->conn, $query, $params);

            return $stmt;


        }

        public function delete() {

            $query = "DELETE * FROM tblEmployee WHERE id = ?";

            $params = array();

            $params[0] = $_GET['delete'];

            $stmt = sqlsrv_query($this->conn, $query, $params);

            sqlsrv_execute($stmt);

        }

    }


?>