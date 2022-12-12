<?php
class deleteDevice
{
  function delete($table, $col, $id)
  {
    global $conn;

    //check if this item id in database or no
    function check($table, $col, $id)
    {
      global $conn;
      $stmt = $conn->prepare("SELECT $col FROM $table WHERE $col=?");
      $stmt->bind_param('i', $id);
      $stmt->execute();
      if ($stmt->num_rows > 0) {
        return true;
      }
      return false;
    }
    if (check($table, $col, $id)) {
      return false;
    } else {
      $stmt = $conn->prepare("DELETE FROM $table WHERE $col=?");
      $stmt->bind_param('i', $id);
      if ($stmt->execute()) {
        return true;
      }
      return false;
    }
  }
}