<?php

class DBParams { 
    public static $host = "";
    public static $username = "root";
    public static $password = "";
    public static $dbname = "dbproject";
    public static $stmt;
    public static $helper;
}

class DBHelper { 
    public function connection() {
        $conString = "mysql:host=" . DBParams::$host . ";dbname=" . DBParams::$dbname;
        DBParams::$helper = new PDO($conString, DBParams::$username, DBParams::$password);
        DBParams::$helper->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return DBParams::$helper;
    }
    //dynamic functions
    public function php_prepare($sql) {
        return DBParams::$stmt = $this->connection()->prepare($sql);
    }
    public function php_bind($val, $params, $type = null) { 
        if(is_null($type)) {
            switch(true) {
                case $type == 1:
                    $type == PDO::PARAM_INT;
                    break;
                case $type == 2:
                    $type == PDO::PARAM_BOOL;
                    break;
                default:
                    $type == PDO::PARAM_STR;
                    break;
            }
        }
        return DBParams::$stmt->bindParam($val, $params, $type);
    }
    public function php_execution() {
        return DBParams::$stmt->execute();
    }
}