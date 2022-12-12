<?php
class editDevice
{
  function update_device($id, $name, $price, $color,$version,$des,$target_file)
  {
    global $conn;
    $sql = "UPDATE devices SET name='$name', price='$price', color='$color',version='$version',des='$des', device_img='$target_file' WHERE id=$id";
    if ($conn->query($sql)) {
      return true;
    } else {
      return false;
    }
  }
}