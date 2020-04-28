<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/vehicle_driver/index.php'));
}

$id =$_GET['id'];
$Vin = '';
$License_no = '';
$Rating = '';


if(is_post_request()) {

   // Handle form values sent by new.php

  $Cid = $_POST['Cid'] ?? '';
  $License_no = $_POST['License_no'] ?? '';
  $Rating = $_POST['Rating'] ?? '';

  echo "Form parameters<br />";
  echo "Cid: " . $Cid . "<br />";
  echo "License_no: " . $License_no . "<br />";
  echo "Rating: " . $Rating . "<br />";
}

?>
<?php $page_title = 'Edit Customer'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/vehicle_driver/index.php'); ?>">&laquo; Back to List</a>

  <div class="customer edit">
    <h1>Edit Customer</h1>

    <form action="<?php echo url_for('/staff/vehicle_driver/edit.php?id=' . h(u($id))); ?>" method="post">
      <dl>
        <dt>VIN</dt>
        <dd><input type="text" name="Vin" maxlength="10" style="text-transform:uppercase"
         value="<?php echo h($Vin); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>License no</dt>
        <dd><input type="text" name="License_no" maxlength="10" style="text-transform:uppercase"
         value="<?php echo h($License_no); ?>" /></dd>
      </dl>
      
     <dl>
        <dt>Rating</dt>
        <dd><input type="number" min="0" max="10" name="Rating" value="<?php echo h($Rating); ?>" /></dd>
      </dl>
     
      <div id="operations">
        <input type="submit" value="Edit Vehicle-Driver" />
      </div>
    </form>
  </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>


