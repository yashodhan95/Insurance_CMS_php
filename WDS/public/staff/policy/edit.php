<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/policy/index.php'));
}

$id = $_GET['id'];

#$sql = "Insert into policy ";
#$sql .= "(Policy_no, P_Type, Cid, Start_Date, End_Date, Premium, Status) ";

if(is_post_request()) {

  // Handle form values sent by new.php
  $POLICY_ARRAY = [];
  $POLICY_ARRAY['Policy_no'] = $_POST['Policy_no'] ?? '';
  $POLICY_ARRAY['P_Type'] = $_POST['P_Type'] ?? '';
  $POLICY_ARRAY['Cid'] = $_POST['Cid'] ?? '';
  $POLICY_ARRAY['Start_Date'] = $_POST['Start_Date'] ?? '';
  $POLICY_ARRAY['End_Date'] = $_POST['End_Date'] ?? '';
  $POLICY_ARRAY['Premium'] = $_POST['Premium'] ?? '';
  $POLICY_ARRAY['Status'] = $_POST['Status'] ?? '';

  $sql = "UPDATE policy SET ";
  $sql .= "Policy_no='" . $POLICY_ARRAY['Policy_no'] . "',";
  $sql .= "P_Type='" . $POLICY_ARRAY['P_Type'] . "',";
  $sql .= "Cid='" . $POLICY_ARRAY['Cid'] . "',";
  $sql .= "Start_Date='" . $POLICY_ARRAY['Start_Date'] . "',";
  $sql .= "End_Date='" . $POLICY_ARRAY['End_Date'] . "',";
  $sql .= "Premium='" . $POLICY_ARRAY['Premium'] . "',";
  $sql .= "Status = '" . $POLICY_ARRAY['Status'] . "' ";
  $sql .= "WHERE Policy_no='" . $POLICY_ARRAY['Policy_no'] . "' ";
  $sql .= "Limit 1;";

  $result = mysqli_query($db, $sql);
  //for insert Statusment the result is True or False

  if($result){
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for('/staff/policy/show.php?id=' . $id));
  } else {
    //insert failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

else{
  $POLICY_ARRAY = find_record("policy", "Policy_no" ,$id);
}

?>
<?php $page_title = 'Edit Policy'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/policy/index.php'); ?>">&laquo; Back to List</a>

  <div class="policy edit">
    <h1>Edit Policy</h1>

    <form action="<?php echo url_for('/staff/policy/edit.php?id=' . h(u($id))); ?>" method="post">
      <dl>
        <dt>Policy Number</dt>
        <dd><input type="number" name="Policy_no" min="100000000000" max="999999999999"
        value="<?php echo h($POLICY_ARRAY['Policy_no']); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>Policy Type</dt>
        <dd><input type="radio" id = "Auto" name="P_Type" value="A" <?php if($POLICY_ARRAY['P_Type'] == "A") { echo "checked";} ?>
        /><label for="Auto">Auto</label></dd>
        <dd><input type="radio" id = "Home" name="P_Type" value="H" <?php if($POLICY_ARRAY['P_Type'] == "H") { echo "checked";} ?>
        /><label for="Home">Home</label></dd>
      </dl>
      
      <dl>
        <dt>Customer ID</dt>
        <dd><input type="number" name="Policy_no" min="100000" max="999999" value="<?php echo h($POLICY_ARRAY['Cid']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Start Date</dt>
        <dd><input type="date" name="Start_Date" value="<?php echo h($POLICY_ARRAY['Start_Date']); ?>" /></dd>
      </dl>

      <dl>
        <dt>End Date</dt>
        <dd><input type="date" name="End_Date" value="<?php echo h($POLICY_ARRAY['End_Date']); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>Premium</dt>
        <dd><input type="number" name="Premium" value="<?php echo h($POLICY_ARRAY['Premium']); ?>" /></dd>
      </dl>

      <dl>
        <dt>Status</dt>
        <dd><input type="radio" id = "Current" name="Status" value="C" <?php if($POLICY_ARRAY['Status'] == "C") { echo "checked";} ?>
        /><label for="Auto">Current</label></dd>
        <dd><input type="radio" id = "Expired" name="Status" value="P" <?php if($POLICY_ARRAY['Status'] == "P") { echo "checked";} ?>
        /><label for="Home">Expired</label></dd>        
      </dl>
      <div id="operations">
        <input type="submit" value="Edit Policy" />
      </div>
    </form>
  </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>


