<?php
class getSingleDevice
{
  function singleDevice($id)
  {
    global $conn;
    $sql = "SELECT * FROM devices WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $data = $result;
      return $data;
    } else {
      return false;
    }
  }
}