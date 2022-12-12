<?php
include 'db.php';
$db = new database();
$conn = $db->getConnection();
//  function validate input failed coming
function clean($data){
 global $conn;
 $data = htmlspecialchars($data);
//  $data = mysqli_real_escape_string($conn,$data);
 $data = stripslashes($data);
 $data = strip_tags($data);
 return $data;
}

if (isset($_POST['register'])) {
    $user = clean($_POST['username']);
    $email = clean($_POST['email']);
    $pass = $_POST['password'];
    if (empty($user)) {
       header("Location:register.php?error_reg=اسم المستخدم ضروري");
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        header("Location:register.php?error_reg=الايميل غير صحيح");
    }elseif (empty($email)){
       header("Location:register.php?error_reg=الايميل  ضروري");
    
    }elseif (empty($pass)){
       header("Location:register.php?error_reg=كلمة السر  ضرورية");
    
    }
    
    elseif (strlen($pass) <= 5){
       header("Location:register.php?error_reg=كلمة السر  قصيرة");
    } else {
        if (empty($error)) {
            // global $conn;
            $hash_pass = md5($pass);
            $sql = "INSERT INTO users(username, email, password) VALUES('$user','$email','$hash_pass')";
            if($conn->query($sql)=== TRUE) {
                header("Location: login-page.php");
            }else {
                die("some error". $conn->error);
            }
        }
    }
}