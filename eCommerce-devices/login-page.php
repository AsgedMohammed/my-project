<?php include('header.php');
?>

<div class="container update-form mx-auto">
  <?php 
                    if (isset($_GET['error_reg'])) {
                        $error = $_GET['error_reg'];
                      echo " <div class='alert alert-danger mx-3 alert-dismissible fade show' role='alert' id='msg'>  $error
                      <button class='btn-close' data-bs-dismiss='alert' aria-label='Close' ></button>
                      </div>";
                    }else {
                        echo "";                    }
                ?>
  <div class="row my-5">
    <div class="col-lg-8 mx-auto">
      <h3 class="text-center">دخول</h3>
      <div class="">
        <div class="">
          <form action="login.php" method="post" autocomplete="off">

            <div class="form-group mb-3">
              <input type="email" name="email" id="email" placeholder="الايميل"
                class="form-control">
            </div>
            <div class="form-group mb-3">
              <input type="password" name="password" id="password" placeholder="كلمة السر"
                class="form-control">
            </div>
            <div class="form-group mb-3">
              <input type="submit" value="تسجيل دخول" name="login"
                class="btn btn-primary btn-block w-100">
            </div>
            <div>
              <a href="register-page.php" class="text-muted">
                ليس لديك حساب ؟؟ سجل
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<?php include('footer.php'); ?>