<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/policy/index.php'));
}

$id =$_GET['id'];


if(is_post_request()) {

  // Handle form values sent by new.php
  $policy=[];
  $policy['Policy_no'] = $_POST['Policy_no'] ?? '';
  $policy['P_Type'] = $_POST['P_Type'] ?? '';
  $policy['Cid'] = $_POST['Cid'] ?? '';
  $policy['Start_Date'] = $_POST['Start_Date'] ?? '';
  $policy['End_Date'] = $_POST['End_Date'] ?? '';
  $policy['Premium'] = $_POST['Premium'] ?? '';
  $policy['Status'] = $_POST['Status'] ?? '';

  $sql = "UPDATE policy SET ";
  $sql .= "Policy_no='" . db_escape($db,$policy['Policy_no']) . "', ";
  $sql .= "P_Type='" . db_escape($db,$policy['P_Type']) . "', ";
  $sql .= "Cid='" . db_escape($db,$policy['Cid']) . "', ";
  $sql .= "Start_Date='" . db_escape($db,$policy['Start_Date']) . "', ";
  $sql .= "End_Date='" . db_escape($db,$policy['End_Date']) . "', ";
  $sql .= "Premium='" . db_escape($db,$policy['Premium']) . "', ";
  $sql .= "Status = '" . db_escape($db,$policy['Status']) . "' ";
  $sql .= "WHERE Policy_no='" . db_escape($db,$policy['Policy_no']) . "' ";
  $sql .= "Limit 1";

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

}else{
  $policy = find_record("policy", "Policy_no" ,$id);
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
        value="<?php echo h($policy['Policy_no']); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>Policy Type</dt>
        <dd><input type="radio" id = "Auto" name="P_Type" value="A" <?php if($policy['P_Type'] == "A") { echo "checked";} ?>
        /><label for="Auto">Auto</label></dd>
        <dd><input type="radio" id = "Home" name="P_Type" value="H" <?php if($policy['P_Type'] == "H") { echo "checked";} ?>
        /><label for="Home">Home</label></dd>
      </dl>
      
      <dl>
        <dt>Customer ID</dt>
        <dd><input type="number" name="Cid" min="100000" max="999999" value="<?php echo h($policy['Cid']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Start Date</dt>
        <dd><input type="date" name="Start_Date" value="<?php echo h($policy['Start_Date']); ?>" /></dd>
      </dl>

      <dl>
        <dt>End Date</dt>
        <dd><input type="date" name="End_Date" value="<?php echo h($policy['End_Date']); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>Premium</dt>
        <dd><input type="number" name="Premium" value="<?php echo h($policy['Premium']); ?>" /></dd>
      </dl>

      <dl>
        <dt>Status</dt>
        <dd><input type="radio" id = "Current" name="Status" value="C" <?php if($policy['Status'] == "C") { echo "checked";} ?>
        /><label for="Auto">Current</label></dd>
        <dd><input type="radio" id = "Expired" name="Status" value="P" <?php if($policy['Status'] == "P") { echo "checked";} ?>
        /><label for="Home">Expired</label></dd>        
      </dl>
      <div id="operations">
        <input type="submit" value="Edit Policy" />
      </div>
    </form>
  </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>


