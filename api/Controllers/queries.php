<?php

interface Queryable { 
    public function DataEntry($payload);
}

interface ServiceProvider {
    public function POSTCHECKER();
}

class QueryHelper implements Queryable { 
    public function DataEntry($payload){
        if($payload == "insert") {
            $sql = "insert into users values(default, :fname, :lname, current_timestamp)";
            return $sql;
        }
    }
}

class ServerHelper implements ServiceProvider { 
    public function POSTCHECKER(){
        return $_SERVER["REQUEST_METHOD"] == "POST";
    }
}
