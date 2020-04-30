<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/driver/index.php'));
}

$id =$_GET['id'];
$driver = find_record("drivers", "License_no" ,$id);

if(is_post_request()) {

  // Handle form values sent by new.php
  $driver= [];
  $driver['License_no'] = $_POST['License_no'] ?? '';
  $driver['D_Fname'] = $_POST['D_Fname'] ?? '';
  $driver['D_Lname'] = $_POST['D_Lname'] ?? '';
  $driver['D_DOB'] = $_POST['D_DOB'] ?? '';

  $sql = "UPDATE drivers SET ";
  $sql .= "License_no='" . db_escape($db,$driver['License_no']) . "',";
  $sql .= "D_Fname='" . db_escape($db,$driver['D_Fname']) . "',";
  $sql .= "D_Lname='" . db_escape($db,$driver['D_Lname']) . "',";
  $sql .= "D_DOB='" . db_escape($db,$driver['D_DOB']) . "'";
  $sql .= "WHERE License_no='" . db_escape($db,$driver['License_no']) . "' ";
  $sql .= "Limit 1;";


  $result = mysqli_query($db, $sql);
  //for insert statement the result is True or False

  if($result){
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for('/staff/driver/show.php?id=' . $id));

  } else {
    //insert failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }

}
else{
  $driver = find_record("drivers", "License_no" ,$id);
}

?>
<?php $page_title = 'Edit Driver'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/driver/index.php'); ?>">&laquo; Back to List</a>

  <div class="driver edit">
    <h1>Edit Driver</h1>

    <form action="<?php echo url_for('/staff/driver/edit.php?id=' . h(u($id))); ?>" method="post">
      <dl>
        <dt>License no</dt>
        <dd><input type="text" name="License_no" maxlength="10" style="text-transform:uppercase"
         value="<?php echo h($driver['License_no']); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>First Name</dt>
        <dd><input type="text" name="D_Fname" value="<?php echo h($driver['D_Fname']); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>Last Name</dt>
        <dd><input type="text" name="D_Lname" value="<?php echo h($driver['D_Lname']); ?>" /></dd>
      </dl>
      
      <dl>
      	<dt>Driver's Date of Birth</dt>
      	<dd><input type ="date" name="D_DOB" value="<?php echo h($driver['D_DOB']); ?>"></dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Edit Driver" />
      </div>
    </form>
  </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>


