<?php

require_once('../../../private/initialize.php');

if(is_post_request()){

  
  $Policy_no = $_POST['Policy_no'] ?? '';
  $P_Type = $_POST['P_Type'] ?? '';
  $Cid = $_POST['Cid'] ?? '';
  $Start_Date = $_POST['Start_Date'] ?? '';
  $End_Date = $_POST['End_Date'] ?? '';
  $Premium = $_POST['Premium'] ?? '';
  $Status = $_POST['Status'] ?? '';


  $sql = "Insert into policy ";
  $sql .= "(Policy_no, P_Type, Cid, Start_Date, End_Date, Premium, Status) ";
  $sql .= "values (";
  $sql .= "'" . db_escape($db,$Policy_no) . "',";
  $sql .= "'" . db_escape($db,$P_Type) . "',";
  $sql .= "'" . db_escape($db,$Cid) . "',";
  $sql .= "'" . db_escape($db,$Start_Date) . "',";
  $sql .= "'" . db_escape($db,$End_Date) . "',";
  $sql .= "'" . db_escape($db,$Premium) . "',";
  $sql .= "'" . db_escape($db,$Status) . "'";
    $sql .= ")";

  $result = mysqli_query($db, $sql);
  //for insert statement the result is True or False

  if($result){
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for('/staff/policy/show.php?id=' . h(u($Policy_no))));

  } else {
    //insert failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}
else{
 
  }

$Policy_no = '';
$P_Type = '';
$Cid = '';
$Start_Date = '';
$End_Date = '';
$Premium = '';
$Status = '';


?>
<?php $page_title = 'Create Policy'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/policy/index.php'); ?>">&laquo; Back to List</a>

  <div class="policy new">
    <h1>Create Policy</h1>

    <form action="<?php echo url_for('/staff/policy/new.php'); ?>" method="post">
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
        <input type="submit" value="Create Policy" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
