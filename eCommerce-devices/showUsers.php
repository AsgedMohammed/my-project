<?php 
class showUsers {
public function getUsers() {
    global $conn;
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
   if($result) {
     if($result->num_rows > 0) {
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return $data;
    }else{
        return false;
    }
   }
}
}