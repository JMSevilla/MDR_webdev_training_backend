<?php
include_once __DIR__ . "/db.php";
include_once __DIR__ . "/queries.php";

interface IUser { 
    public function entry($data);
}

class userinfoController extends DBHelper implements IUser {
    public function entry($data){
        $serverHelper = new ServerHelper();
        $queries = new QueryHelper();
        if($serverHelper->POSTCHECKER()) {
            if($this->php_prepare($queries->DataEntry("insert"))) {
                DBParams::$stmt->bindParam(":fname", $data['fname'], PDO::PARAM_STR);
                DBParams::$stmt->bindParam(":lname", $data['lname'], PDO::PARAM_STR);
                if(DBParams::$stmt->execute()) {
                    echo json_encode(array(
                        "success" => 200
                    ));
                }
            }
        }
    }
}
