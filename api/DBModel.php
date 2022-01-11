<?php

    class Database {
       private $serverName = "groupaa.database.windows.net"; 
       private $connectionOptions = array(
            "Database" => "groupaDB", 
            "Uid" => "GroupA", 
            "PWD" => "Password1." 
        );
       private $conn;

    public function connect() {
        $this->conn = null;
        sqlsrv_configure("WarningsReturnAsErrors", 0);  
        $this->conn = sqlsrv_connect($this->serverName, $this->connectionOptions);
        
        if( $this->conn ) {
            return $this->conn;
          }else{
            echo "Connection could not be established. DBmodel<br />";
            die( print_r( sqlsrv_errors(), true));
          }

        
    }

    }
