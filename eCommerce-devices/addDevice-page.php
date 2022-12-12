<?php
include 'header.php';
include 'addDevice.php';

$device = new addDevice();

if (isset($_POST['publish'])) {
  $name = $_POST['name'];
  $price = $_POST['price'];
  $color = $_POST['color'];
  $version = $_POST['version'];
  $des = $_POST['des'];
  if(isset($_FILES['device_img'])){
      $dir = "upload/";
      $target_file = $dir.basename($_FILES['device_img']['name']);
      if (move_uploaded_file($_FILES['device_img']['tmp_name'],$target_file)) {
      
          echo "image uploaded";
      }else {
        header("Location: .");
          echo "not uploaded";
      }
    }
  if ($device->add_device($name, $price, $color, $version, $des,$target_file)) {
    header("Location: index.php");
  }
}

?>

<div class="update-form mx-auto">
  <div class="container">
    <h2>اضافة جهاز</h2>
    <form class="device-form"
      action="<?php echo $_SERVER['PHP_SELF'] . '?to=add_device'; ?>" method="post"
      enctype="multipart/form-data">
      <div class="form-group mb-3">
        <label>اسم الجهاز</label>
        <input type="text" name="name" class="form-control" placeholder="اسم الجهاز">
      </div>

      <div class="form-group mb-3">
        <label>السعر</label>
        <input type="number" name="price" class="form-control" placeholder="السعر">
      </div>

      <div class="form-group mb-3">
        <label>اللون</label>
        <input type="text" name="color" class="form-control" placeholder="اللون">
      </div>

      <div class="form-group mb-3">
        <label>الاصدار</label>
        <input type="number" name="version" class="form-control" placeholder="الاصدار">
      </div>

      <div class="form-group mb-3">
        <label for="">مواصفات الجهاز</label>
        <textarea name="des" id="editor" cols="5" rows="5"
          class="form-control"></textarea>
      </div>

      <div class="form-group mb-3">
        <label class="input-group-text" for="inputGroupFile01">الصورة</label>
        <input type="file" name="device_img" class="form-control" id="inputGroupFile01" />
      </div>

      <div class="form-group mb-3">
        <input type="submit" name="publish" value="حفظ" class="btn btn-primary">
      </div>
    </form>
  </div>
</div>

<?php include 'footer.php'; ?>