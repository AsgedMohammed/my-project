<?php
class database{
    private $host ='localhost';
    private $username ='root';
    private $password ='';
    private $db_name ='shop';
    public $conn;
    // Create connection
    public function __construct(){
    $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
    // Check connection status
    if($this->conn->connect_error){
    die('Connection failed:'.$this->conn->connect_error);
    };  
    }
    // if data coming like (???) use $mysqli -> set_charset("utf8");
    

    //  this function return connection
     public function getConnection(){
         return $this->conn;
     }

    }
    ?>