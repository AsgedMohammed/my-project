<?php
include 'header.php';
include 'getSingleDevice.php';
include 'deleteDevice.php';

$getSingleDevice = new getSingleDevice();
$deleteDevice = new deleteDevice();

if (isset($_GET['delete_device']) && $_GET['delete_device'] !== '') {
  $id = $_GET['delete_device'];
  if ($deleteDevice->delete('devices', 'id', $id)) {
    header("Location: index.php");
  }
}
?>


<section class="single-device">
  <div class="container">
    <?php
    if (isset($_GET['id'])) {
      $device_id = $_GET['id'];
    } else {
      header("Location: index.php");
    }
    ?>
    <?php
    if ($getSingleDevice->singleDevice($device_id) === false) {
      echo "<p class=''> لاتوجد مقالات </p>";
    ?>
    <?php

    } else {

      foreach ($getSingleDevice->singleDevice($device_id) as $devices) {
        $device_id = $devices['id'];
        $name = $devices['name'];
        $price = $devices['price'];
        $color = $devices['color'];
        $version = $devices['version'];
        $des = $devices['des'];
        $image = $devices['device_img'];

      ?>
    <div class="bg-while w-100 fixed-top tool">
      <div class="container ">

        <?php
if ($_SESSION) {
    if ($_SESSION['name']&& $_SESSION['role'] == 1) {
        ?>
        <div class="d-flex gap-4 align-items-center flex-row py-4">
          <p><?php echo "<a href='editDevice-page.php?to=edit_device&edit_device=$device_id' class='btn btn-info'> تعديل
                      </a>"; ?></p>
          <p>
            <a href=<?php echo $_SERVER['PHP_SELF'] . '?' ?>delete_device=<?php echo $device_id; ?>'
              class='btn btn-danger'>
              مسح
            </a>
          </p>
        </div>
        <?php
    } else {?>


        <?php 
          };
    }?>
      </div>
    </div>
    <div class="card w-100">
      <?php 
           if($image){?>
      <div class="card-img detail-img">
        <img class="card-img-top" src='<?php echo $image ?>' alt='<?php echo $name?>' />
      </div>
      <?php
            }  ?>

      <div class="card-body">
        <h5 class="card-title">

          <?php echo $name; ?>

        </h5>
        <ul class="list-group list-group-flush pr-0">
          <li class="list-group-item">
            <span>اللون : </span>
            <span class="color"><?php echo $color; ?></span>
          </li>
          <li class="list-group-item">
            <span>السعر : </span>
            <span class="color"><?php echo $price; ?> جنيه </span>
          </li>
          <li class="list-group-item">
            <span>الاصدار : </span>
            <span class="color"><?php echo $version; ?></span>
          </li>
          <li class="list-group-item">
            <span class="des">المواصفات : </span>
            <span class="color"><?php echo $des; ?></span>
          </li>
        </ul>
      </div>
    </div>
    <?php
      }
    }
    ?>
  </div>
</section>

<?php include 'footer.php'; ?>