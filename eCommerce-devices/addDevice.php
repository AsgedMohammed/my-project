<?php 
class addDevice {

public function add_device($name, $price, $color, $version, $des,$target_file)
    {
    global $conn;
    $sql ="INSERT INTO devices (name, price, color, version, des, device_img)
    VALUES ('$name', '$price', '$color', '$version', '$des','$target_file')";
    if($conn->query($sql) === TRUE){
    return true;
    }else {
      die('ok good');
    header('Location: index.php');
    }
}
}