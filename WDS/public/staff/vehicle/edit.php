<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/vehicle/index.php'));
}

$id = $_GET['id'];


if(is_post_request()) {

  // Handle form values sent by new.php
  $result = [];
  $result['Vin'] = $_POST['Vin'] ?? '';
  $result['V_make'] = $_POST['V_make'] ?? '';
  $result['V_model'] = $_POST['V_model'] ?? '';
  $result['V_year'] = $_POST['V_year'] ?? '';
  $result['V_status'] = $_POST['V_status'] ?? '';
  $result['Policy_no'] = $_POST['Policy_no'] ?? '';

  $sql = "UPDATE vehicle SET ";
  $sql .= "Vin='" . db_escape($db,$result['Vin']) . "',";
  $sql .= "V_make='" . db_escape($db,$result['V_make']) . "',";
  $sql .= "V_model='" . db_escape($db,$result['V_model']) . "',";
  $sql .= "V_year='" . db_escape($db,$result['V_year']) . "',";
  $sql .= "V_status='" . db_escape($db,$result['V_status']) . "',";
  $sql .= "Policy_no='" . db_escape($db,$result['Policy_no']) . "' ";
  $sql .= "WHERE Vin='" . db_escape($db,$result['Vin']) . "' ";
  $sql .= "Limit 1;";


  $result = mysqli_query($db, $sql);
  //for insert statement the result is True or False

  if($result){
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for('/staff/vehicle/show.php?id=' . h(u($id))));

  } else {
    //insert failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }

}

else{
  $result = find_record("vehicle", "Vin" ,$id);
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
         value="<?php echo h($result['Vin']); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>Vehicle Make</dt>
        <dd><input type="text" name="V_make" value="<?php echo h($result['V_make']); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>Vehicle Model</dt>
        <dd><input type="text" name="V_model" value="<?php echo h($result['V_model']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Vehicle Year</dt>
        <dd><input type="text" name="V_year" value="<?php echo h($result['V_year']); ?>" /></dd>
      </dl>

      <dl>
        <dt>Vehicle Status</dt>
          <dd><input type="radio" id = "L" name="V_status" value="L" <?php if($result['V_status'] == "L") { echo "checked";} ?>
          />Leased</dd>
          <dd><input type="radio" id = "F" name="V_status" value="F" <?php if($result['V_status'] == "F") { echo "checked";} ?>
          />Financed</dd>
          <dd><input type="radio" id = "O" name="V_status" value="O" <?php if($result['V_status'] == "O") { echo "checked";} ?>
          />Owned</dd>      
      </dl>
      
      <dl>
        <dt>Policy Number</dt>
        <dd><input type="number" name="Policy_no" min="100000000000" max="999999999999"
        value="<?php echo h($result['Policy_no']); ?>" /></dd>
      </dl>

      <div id="operations">
        <input type="submit" value="Edit Vehicle" />
      </div>
    </form>
  </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>


