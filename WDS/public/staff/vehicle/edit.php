<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/vehicle/index.php'));
}

$id =$_GET['id'];
$Vin = '';
$V_make = '';
$V_model = '';
$V_year = '';
$V_status = '';
$Policy_no = '';

if(is_post_request()) {

  // Handle form values sent by new.php

  $Vin = $_POST['Cid'] ?? '';
  $V_make = $_POST['V_make'] ?? '';
  $V_model = $_POST['V_model'] ?? '';
  $V_year = $_POST['V_year'] ?? '';
  $V_status = $_POST['V_status'] ?? '';
  $Policy_no = $_POST['Policy_no'] ?? '';

  echo "Form parameters<br />";
  echo "Vin: " . $Cid . "<br />";
  echo "V_make: " . $V_make . "<br />";
  echo "V_model: " . $V_model . "<br />";
  echo "V_year: " . $V_year . "<br />";
  echo "V_status: " . $V_status . "<br />";
  echo "Policy_no: " . $Policy_no . "<br />";
}

?>
<?php $page_title = 'Edit Vehicle'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/vehicle/index.php'); ?>">&laquo; Back to List</a>

  <div class="vehicle edit">
    <h1>Edit Vehicle</h1>

    <form action="<?php echo url_for('/staff/vehicle/edit.php?id=' . h(u($id))); ?>" method="post">
      <dl>
        <dt>VIN</dt>
        <dd><input type="text" name="Vin" maxlength="10" style="text-transform:uppercase"
         value="<?php echo h($Vin); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>Vehicle Make</dt>
        <dd><input type="text" name="V_make" value="<?php echo $V_make; ?>" /></dd>
      </dl>
      
      <dl>
        <dt>Vehicle Model</dt>
        <dd><input type="text" name="V_model" value="<?php echo h($V_model); ?>" /></dd>
      </dl>
      <dl>
        <dt>Vehicle Year</dt>
        <dd><input type="text" name="V_year" value="<?php echo h($V_year); ?>" /></dd>
      </dl>

      <dl>
        <dt>Vehicle Status</dt>
          <dd><input type="radio" id = "L" name="V_status" value="L" <?php if($V_status == "L") { echo "checked";} ?>
          />Leased</dd>
          <dd><input type="radio" id = "F" name="V_status" value="F" <?php if($V_status == "F") { echo "checked";} ?>
          />Financed</dd>
          <dd><input type="radio" id = "O" name="V_status" value="O" <?php if($V_status == "O") { echo "checked";} ?>
          />Owned</dd>      
      </dl>
      
      <dl>
        <dt>Policy Number</dt>
        <dd><input type="number" name="Policy_no" min="100000000000" max="999999999999"
        value="<?php echo h($Policy_no); ?>" /></dd>
      </dl>

      <div id="operations">
        <input type="submit" value="Edit Vehicle" />
      </div>
    </form>
  </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>


