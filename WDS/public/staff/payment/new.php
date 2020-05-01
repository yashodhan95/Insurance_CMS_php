<?php

require_once('../../../private/initialize.php');

if(is_post_request()){

  $Instal_ID = $_POST['Instal_ID'] ?? '';
  $Instal_amt = $_POST['Instal_amt'] ?? '';
  $Pay_date = $_POST['Pay_date'] ?? '';
  $Pay_method = $_POST['Pay_method'] ?? '';
  $Invoice_id = $_POST['Invoice_id'] ?? '';
  
  $sql = "Insert into payment ";
  $sql .= "(Instal_ID, Instal_amt, Pay_date, Pay_method, Invoice_id) ";
  $sql .= "values (";
  $sql .= "'" . db_escape($db,$Instal_ID) . "',";
  $sql .= "'" . db_escape($db,$Instal_amt) . "',";
  $sql .= "'" . db_escape($db,$Pay_date) . "',";
  $sql .= "'" . db_escape($db,$Pay_method) . "',";
  $sql .= "'" . db_escape($db,$Invoice_id) . "'";
    $sql .= ")";

  $result = mysqli_query($db, $sql);
  //for insert statement the result is True or False

  if($result){
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for('/staff/payment/show.php?id=' . h(u($Instal_ID))));

  } else {
    //insert failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}
else{

  }

$Instal_ID = '';
$Instal_amt = '';
$Pay_date = '';
$Pay_method = '';
$Invoice_id = '';

if(is_post_request()) {

  // Handle form values sent by new.php

  $Instal_ID = $_POST['Instal_ID'] ?? '';
  $Instal_amt = $_POST['Instal_amt'] ?? '';
  $Pay_date = $_POST['Pay_date'] ?? '';
  $Pay_method = $_POST['Pay_method'] ?? '';
  $Invoice_id = $_POST['Invoice_id'] ?? '';

  echo "Form parameters<br />";
  echo "Instal_ID: " . $Instal_ID . "<br />";
  echo "Instal_amt: " . $Instal_amt . "<br />";
  echo "Pay_date: " . $Pay_date . "<br />";
  echo "Pay_method: " . $Pay_method . "<br />";
  echo "Invoice_id: " . $Invoice_id . "<br />";
}

?>
<?php $page_title = 'Create Payment'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/payment/index.php'); ?>">&laquo; Back to List</a>

  <div class="payment new">
    <h1>Create Payment</h1>

    <form action="<?php echo url_for('/staff/payment/new.php'); ?>" method="post">
      <dl>
        <dt>Instal_ID</dt>
        <dd><input type="number" name="Instal_ID" min ="10000000" max = "99999999" value="<?php echo h($Instal_ID); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>Installment Amount</dt>
        <dd><input type="text" name="Instal_amt" value="<?php echo h($Instal_amt); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>Payment Date</dt>
        <dd><input type="date" name="Pay_date" value="<?php echo h($Pay_date); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>Pay_method</dt>
        <dd><input type="radio" id = "Credit" name="Pay_method" value="CREDIT" <?php if($Pay_method == "CREDIT") { echo "checked";} ?>
        /><label for="Male">Credit</label></dd>
        <dd><input type="radio" id = "Debit" name="Pay_method" value="DEBIT" <?php if($Pay_method == "DEBIT") { echo "checked";} ?>
        /><label for="Female">Debit</label></dd>
        <dd><input type="radio" id = "Cheque" name="Pay_method" value="CHEQUE" <?php if($Pay_method == "CHEQUE") { echo "checked";} ?>
        /><label for="Male">Cheque</label></dd>
        <dd><input type="radio" id = "Paypal" name="Pay_method" value="PAYPAL" <?php if($Pay_method == "PAYPAL") { echo "checked";} ?>
        /><label for="Female">PayPal</label></dd>
      </dl>
      
      <dl>
        <dt>Invoice_id</dt>
        <dd><input type="number" name="Invoice_id" min ="1000000" max = "9999999" value="<?php echo h($Invoice_id); ?>" /></dd>
      </dl>

      <div id="operations">
        <input type="submit" value="Create Payment" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
