<?php

require_once('../../../private/initialize.php');

if(is_post_request()){

  $Vin = $_POST['Vin'] ?? '';
  $V_make = $_POST['V_make'] ?? '';
  $V_model = $_POST['V_model'] ?? '';
  $V_year = $_POST['V_year'] ?? '';
  $V_status = $_POST['V_status'] ?? '';
  $Policy_no = $_POST['Policy_no'] ?? '';
  
  $sql = "Insert into vehicle ";
  $sql .= "(Vin, V_make, V_model, V_year, V_status, Policy_no) ";
  $sql .= "values (";
  $sql .= "'" . db_escape($db,$Vin) . "',";
  $sql .= "'" . db_escape($db,$V_make) . "',";
  $sql .= "'" . db_escape($db,$V_model) . "',";
  $sql .= "'" . db_escape($db,$V_year) . "',";
  $sql .= "'" . db_escape($db,$V_status) . "',";
  $sql .= "'" . db_escape($db,$Policy_no) . "'";
    $sql .= ")";

  $result = mysqli_query($db, $sql);
  //for insert statement the result is True or False

  if($result){
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for('/staff/vehicle/show.php?id=' . h(u($Vin))));

  } else {
    //insert failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}
else{
  }

$Vin = '';
$V_make = '';
$V_model = '';
$V_year = '';
$V_status = '';
$Policy_no = '';

?>
<?php $page_title = 'Create Vehicle'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/vehicle/index.php'); ?>">&laquo; Back to List</a>

  <div class="vehicle new">
    <h1>Create Vehicle</h1>

    <form action="<?php echo url_for('/staff/vehicle/new.php'); ?>" method="post">
      <dl>
        <dt>VIN</dt>
        <dd><input type="text" name="Vin" maxlength="10" style="text-transform:uppercase"
         value="<?php echo h($Vin); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>Vehicle Make</dt>
        <dd><input type="text" name="V_make" value="<?php echo h($V_make); ?>" /></dd>
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
        <input type="submit" value="Create Vehicle" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
