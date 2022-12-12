<?php include 'header.php';
include 'addDevice.php';
include 'deleteDevice.php';
include 'showDevices.php';

$addDevice = new addDevice();
$deleteDevice = new deleteDevice();
$showDevices = new showDevices();

if (isset($_GET['delete_device']) && $_GET['delete_device'] !== '') {
  $id = $_GET['delete_device'];
  if ($deleteDevice->delete('devices', 'id', $id)) {
    header("Location: index.php");
  }
}
?>
<section class="intro">
  <img src="img/3.jpg" alt="intro" />
</section>

<?php
if ($showDevices->getDevices()) :

?>

<article class="devices">
  <div class="container">
    <div class="row">
      <h2 class="title">اكثر الاجهزة مبيعا</h2>
    </div>
    <div class="row">
      <?php
      foreach ($showDevices->getDevices() as $devices) {
        $device_id = $devices['id'];
        $name = $devices['name'];
        $price = ($devices['price']);
        $color = ($devices['color']);
        $version = ($devices['version']);
        $des = substr($devices['des'], 0, 200);
        $image = ($devices['device_img']);
      ?>
      <div class="col-lg-4 col-md-12">
        <div class="card w-100">
          <?php 
           if($image){?>
          <div class="card-img">
            <img class="card-img-top" src='<?php echo $image ?>'
              alt='<?php echo $name?>' />
          </div>
          <?php
            }  ?>

          <div class="card-body">
            <h5 class="card-title">
              <a href="showSingleDevice.php?id=<?php echo $device_id; ?>">
                <?php echo $name; ?>
              </a>
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
            <a href="showSingleDevice.php?id=<?php echo $device_id; ?>"
              class="btn btn-primary">قراءة المزيد</a>
          </div>
        </div>
      </div>
      <?php
      };
      
      ?>
    </div>
  </div>
</article>

<?php
else :
  echo "<div class='container'>
      <h4 class='no-device'>لا توجد اجهزة</h4>
    </div>";
endif;
?>

<?php include 'footer.php'; ?>