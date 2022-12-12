<?php

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

include 'db.php';
$db = new database();
$conn = $db->getConnection();
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];
     if (empty($email)) {
       header("Location:login-page.php?error_login= الايميل ضروري");
    } elseif(empty($pass)){
       header("Location:login-page.php?error_login= كلمة السر ضروري");
    }else {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $db_user = $row['username'];
            $db_user_id = $row['id'];
            $db_email = $row['email'];
            $db_pass = $row['password'];
            $role = $row['role'];
            $rehashpass = md5($pass);
            if ($email === $db_email && $db_pass === $rehashpass) {
                $_SESSION['name']= $db_user;
                $_SESSION['user_id']= $db_user_id;
                $_SESSION['email']= $email;
                $_SESSION['role']= $role;
                if($role==0){
                    header("Location: index.php");

                }elseif($role==1) {
                header("Location: admin.php");
                }
            }else{
                header("Location: login-page.php?error_login=كلمة السر  او الايميل غير صحيحين");
            }
        }
    }else{
         header("Location:login-page.php?error_login=دخول غير مصرح");
    }
      
    }
}