<?php include('header.php');
include 'showDevices.php';
include 'deleteDevice.php';

$showDevices = new showDevices();
$deleteDevice = new deleteDevice();

if (isset($_GET['delete_device']) && $_GET['delete_device'] !== '') {
  $id = $_GET['delete_device'];
  if ($deleteDevice->delete('devices', 'id', $id)) {
    header("Location: index.php");
  }
}

?>

<div class="container admin">
  <h2>المدير</h2>
  <div class="row">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="admin.php">المدير</a></li>
        <li class="breadcrumb-item active" aria-current="page">الاجهزة</li>
      </ol>
    </nav>
  </div>
  <?php
if ($showDevices->getDevices()) :

?>
  <div class="row">
    <table id="devices" class="table table-striped" style="width:100%">
      <thead>
        <tr>
          <th>المعرف</th>
          <th>الاسم</th>
          <th>السعر</th>
          <th>اللون</th>
          <th>الاصدار</th>
          <th>الوصف</th>
          <th>الصورة</th>
          <th>العمليات</th>
        </tr>
      </thead>
      <tbody>
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
        <tr>
          <td><?php echo $device_id; ?></td>
          <td>
            <h5 class="card-title">
              <a href="showSingleDevice.php?id=<?php echo $device_id; ?>">
                <?php echo $name; ?>
              </a>
            </h5>
          </td>
          <td><?php echo $price; ?></td>
          <td><?php echo $color; ?></td>
          <td><?php echo $version; ?></td>
          <td><?php echo $des; ?></td>
          <td>
            <?php 
           if($image){?>
            <div height="100px">
              <img width="100px" height="100px" src='<?php echo $image ?>'
                alt='<?php echo $name?>' />
            </div>
            <?php
            }  ?>
          </td>
          <td>
            <div class="d-flex gap-4 align-items-center flex-row py-4">
              <p><?php echo "<a href='editDevice.php?to=edit_device&edit_device=$device_id' class='btn btn-info'> تعديل
                      </a>"; ?></p>
              <p>
                <a href=<?php echo $_SERVER['PHP_SELF'] . '?' ?>delete_device=<?php echo $device_id; ?>'
                  class='btn btn-danger'>
                  مسح
                </a>
              </p>
            </div>
          </td>
        </tr>
        <?php
      };
      
      ?>
      </tbody>

    </table>

  </div>

  <?php
else :
  echo "<div class='container'>
      <h4 class='no-device'>لا توجد اجهزة</h4>
    </div>";
endif;
?>
</div>


<?php include('footer.php'); ?>