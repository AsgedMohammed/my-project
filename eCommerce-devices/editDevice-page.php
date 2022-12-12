<?php
include 'header.php';
include 'editDevice.php';
include 'getSingleDevice.php';

$getSingleDevice = new getSingleDevice();
$editDevice = new editDevice();


if (isset($_POST['save_edit_device'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $color = $_POST['color'];
    $version = $_POST['version'];
    $des = $_POST['des'];
    $img =  $_POST['img'];
    $device_img = $_FILES['device_img']['name'];
    if(isset($_FILES['device_img']) && $device_img !== ''){
        $dir = "upload/";
        $target_file = $dir.basename($_FILES['device_img']['name']);
        if (move_uploaded_file($_FILES['device_img']['tmp_name'],$target_file)) {
        
            echo "image uploaded";
        }else {
            echo "not uploaded";
        }
    }else {
        $target_file = $img;
    }
  if($editDevice->update_device($id, $name, $price, $color,$version,$des,$target_file)) {
        header('Location: index.php');
    }
}

?>

<div class="update-form mx-auto">
  <div class="container">
    <h2 class="title">تعديل الجهاز</h2>
    <?php
    if (isset($_GET['edit_device']) && $_GET['edit_device'] !== '') {
        $edit_id = $_GET['edit_device'];
        // start foreach to load post data
        foreach ($getSingleDevice->singleDevice($edit_id) as $device) {
            $device_id = $device['id'];
            $name = $device['name'];
            $price = $device['price'];
            $color = $device['color'];
            $version = $device['version'];
            $des = $device['des'];
            $image = $device['device_img'];
    ?>
    <form class="device-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
      enctype="multipart/form-data">

      <input type="hidden" name="id" class="form-control"
        value='<?php echo $device_id; ?>'>

      <div class="form-group mb-3">
        <label>اسم الجهاز</label>
        <input type="text" name="name" class="form-control" value='<?php echo $name; ?>'>
      </div>
      <div class="form-group mb-3">
        <label>السعر</label>
        <input type="number" name="price" class="form-control"
          value='<?php echo $price; ?>'>
      </div>
      <div class="form-group mb-3">
        <label>اللون</label>
        <input type="text" name="color" class="form-control"
          value='<?php echo $color; ?>'>
      </div>
      <div class="form-group mb-3">
        <label>الاصدار</label>
        <input type="text" name="version" class="form-control"
          value='<?php echo $version; ?>'>
      </div>

      <div class="form-group mb-3">
        <label for="">المواصفات </label>
        <textarea name="des" id="editor" cols="5" rows="10" class="form-control" value="">
                <?php echo $des; ?>
            </textarea>
      </div>
      <div class="form-group mb-3">
        <label for="">الصورة</label>
        <input type="file" name="device_img" class="form-control" />
        <br>
        <input type="hidden" name="img" value="<?php echo $image; ?>">
        <?php if($image){?>
        <img src="<?php echo $image; ?>" class="img-responsive img-rounded"
          height="100px" width="100px" />
        <?php } ?>
      </div>
      <div class="form-group mb-3">
        <input type="submit" name="save_edit_device" value="تعديل"
          class="btn btn-primary">
      </div>
    </form>
    <?php
        }
        //end foreach
    }
    ?>


  </div>
</div>

<?php include 'footer.php'; ?>