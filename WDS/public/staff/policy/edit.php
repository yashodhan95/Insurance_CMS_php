<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/policy/index.php'));
}

$id =$_GET['id'];
$Policy_no = '';
$P_Type = '';
$Cid = '';
$Start_Date = '';
$End_Date = '';
$Premium = '';
$Status = '';

if(is_post_request()) {

  // Handle form values sent by new.php

  $Policy_no = $_POST['Policy_no'] ?? '';
  $P_Type = $_POST['P_Type'] ?? '';
  $Cid = $_POST['Cid'] ?? '';
  $Start_Date = $_POST['Start_Date'] ?? '';
  $End_Date = $_POST['End_Date'] ?? '';
  $Premium = $_POST['Premium'] ?? '';
  $Status = $_POST['Status'] ?? '';

  echo "Form parameters<br />";
  echo "Policy_no: " . $Policy_no . "<br />";
  echo "P_Type: " . $P_Type . "<br />";
  echo "Cid: " . $Cid . "<br />";
  echo "Start_Date: " . $Start_Date . "<br />";
  echo "End_Date: " . $End_Date . "<br />";
  echo "Premium: " . $Premium . "<br />";
  echo "Status: " . $Status . "<br />";
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
        value="<?php echo h($Policy_no); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>Policy Type</dt>
        <dd><input type="radio" id = "Auto" name="P_Type" value="A" <?php if($P_Type == "A") { echo "checked";} ?>
        /><label for="Auto">Auto</label></dd>
        <dd><input type="radio" id = "Home" name="P_Type" value="H" <?php if($P_Type == "H") { echo "checked";} ?>
        /><label for="Home">Home</label></dd>
      </dl>
      
      <dl>
        <dt>Customer ID</dt>
        <dd><input type="number" name="Cid" min="100000" max="999999" value="<?php echo h($Cid); ?>" /></dd>
      </dl>
      <dl>
        <dt>Start Date</dt>
        <dd><input type="date" name="Start_Date" value="<?php echo h($Start_Date); ?>" /></dd>
      </dl>

      <dl>
        <dt>End Date</dt>
        <dd><input type="date" name="End_Date" value="<?php echo h($End_Date); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>Premium</dt>
        <dd><input type="number" name="Premium" value="<?php echo h($Premium); ?>" /></dd>
      </dl>

      <dl>
        <dt>Status</dt>
        <dd><input type="radio" id = "Current" name="Status" value="C" <?php if($Status == "C") { echo "checked";} ?>
        /><label for="Auto">Current</label></dd>
        <dd><input type="radio" id = "Expired" name="Status" value="P" <?php if($Status == "P") { echo "checked";} ?>
        /><label for="Home">Expired</label></dd>        
      </dl>
      <div id="operations">
        <input type="submit" value="Edit Policy" />
      </div>
    </form>
  </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>


