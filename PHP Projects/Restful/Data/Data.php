<?php


class Data {

//variables to hold database credentials to connect
private $host = 'localhost';
private $user = 'lhaufle';
private $password = 'batman123';
private $db = 'fileserver';

//connect to the database
public function connect(){

    try{
        //attempt to connect
        $dbc = mysqli_connect($this->host, $this->user,$this->password, $this->db);
        return $dbc;
    } catch(mysqli_sql_exception $e){
        //display message if failed
        echo $e->getMessage();
        exit;
    }

}

}