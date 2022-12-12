<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>

<?php include 'db.php';
$db = new database();
$conn = $db->getConnection();
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title> جود للاجهزة الذكية</title>
  <link rel="stylesheet" href="css/bootstrap.rtl.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/datatables.min.css" />

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">اجهزتي</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">الرئيسية</a>
          </li>
          <?php
          if ($_SESSION) {
              ?>

          <?php
          }else {?>
          <li class="nav-item">
            <a class="nav-link" href="register-page.php">تسجيل</a>
          </li>
          <?php  } ?>

        </ul>
        <div>

          <?php
if ($_SESSION) {
    if ($_SESSION['name']) {
        ?>
          <div>
            <div class="dropdown">
              <button class="btn btn-success dropdown-toggle" type="button" id="menu1"
                data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo $_SESSION['name']; ?>
              </button>
              <ul class="dropdown-menu" aria-labelledby="menu1">
                <?php
                if ($_SESSION['role'] == 1) {?>
                <li>
                  <a href="admin.php" class="dropdown-item">
                    لوحة التحكم</a>
                </li>
                <li>
                  <a href="addDevice-page.php" class="dropdown-item">اضافة
                    جهاز</a>
                </li>

                <?php
                }else {
                  echo "";
                }
                ?>
                <li>
                  <a href="logout.php" class="dropdown-item">تسجيل خروج
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <?php
    } else {?>


          <?php 
          };
    }
     else {?>
          <a href="login-page.php" class="btn btn-warning">دخول
          </a>
          <?php
          } ?>

        </div>
      </div>
    </div>
  </nav>