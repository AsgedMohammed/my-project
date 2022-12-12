<?php include('header.php');
include 'showUsers.php';

$showUsers = new showUsers();

?>
<div class="container admin">
  <h2>المدير</h2>

  <div class="row">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="admin.php">المدير</a></li>
        <li class="breadcrumb-item active" aria-current="page">المستخدمين</li>
      </ol>
    </nav>
  </div>
  <?php
if ($showUsers->getUsers()) :

?>
  <div class="row">
    <table id="devices" class="table table-striped" style="width:100%">
      <thead>
        <tr>
          <th>المعرف</th>
          <th>الاسم</th>
          <th>الايميل</th>
          <th>الصلاحية</th>
        </tr>
      </thead>
      <tbody>
        <?php
      foreach ($showUsers->getUsers() as $users) {
        $user_id = $users['id'];
        $name = $users['username'];
        $email = ($users['email']);
        $role = ($users['role']);
      ?>
        <tr>
          <td><?php echo $user_id; ?></td>
          <td>
            <h5 class="card-title">
              <?php echo $name; ?>
            </h5>
          </td>
          <td><?php echo $email; ?></td>
          <td>
            <?php
          if( $role == 0){
            echo 'مستخدم';
          }else if($role == 1){
            echo 'مدير';
          }
          
          ?></td>
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