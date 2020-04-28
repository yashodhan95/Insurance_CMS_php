<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/driver/index.php'));
}

$id =$_GET['id'];
$License_no = '';
$D_Fname = '';
$D_Lname = '';
$D_DOB = '';

if(is_post_request()) {

  // Handle form values sent by new.php
  
  $License_no = $_POST['License_no'] ?? '';
  $D_Fname = $_POST['D_Fname'] ?? '';
  $D_Lname = $_POST['D_Lname'] ?? '';
  $D_DOB = $_POST['D_DOB'] ?? '';

  echo "Form parameters<br />";
  echo "License_no: " . $License_no . "<br />";
  echo "D_Fname: " . $D_Fname . "<br />";
  echo "D_Lname: " . $D_Lname . "<br />";
  echo "D_DOB: " . $D_DOB . "<br />";

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
         value="<?php echo h($License_no); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>First Name</dt>
        <dd><input type="text" name="D_Fname" value="<?php echo $D_Fname; ?>" /></dd>
      </dl>
      
      <dl>
        <dt>Last Name</dt>
        <dd><input type="text" name="D_Lname" value="<?php echo h($D_Lname); ?>" /></dd>
      </dl>
      
      <dl>
      	<dt>Driver's Date of Birth</dt>
      	<dd><input type ="date" name="D_DOB" value="<?php echo h($D_DOB); ?>"></dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Edit Driver" />
      </div>
    </form>
  </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>


