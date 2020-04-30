<?php

require_once('../../../private/initialize.php');

$id =$_GET['id'];

if(is_post_request()) {

  // Handle form values sent by new.php
  $result=[];
  $result['Instal_ID'] = $_POST['Instal_ID'] ?? '';
  $result['Instal_amt'] = $_POST['Instal_amt'] ?? '';
  $result['Pay_date'] = $_POST['Pay_date'] ?? '';
  $result['Pay_method'] = $_POST['Pay_method'] ?? '';
  $result['Invoice_id'] = $_POST['Invoice_id'] ?? '';

  $sql = "UPDATE payment SET ";
  $sql .= "Instal_ID='" . $result['Instal_ID'] . "',";
  $sql .= "Instal_amt='" . $result['Instal_amt'] . "',";
  $sql .= "Pay_date='" . $result['Pay_date'] . "',";
  $sql .= "Pay_method='" . $result['Pay_method'] . "' ";
  $sql .= "WHERE Instal_ID='" . $result['Instal_ID'] . "' ";
  $sql .= "Limit 1;";


  $result = mysqli_query($db, $sql);
  //for insert statement the result is True or False

  if($result){
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for('/staff/payment/show.php?id=' . $id));

  } else {
    //insert failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }

}

else{
  $result = find_record("payment", "Instal_ID" ,$id);
}

?>
<?php $page_title = 'Create Payment'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/payment/index.php'); ?>">&laquo; Back to List</a>

  <div class="payment new">
    <h1>Edit Payment</h1>

    <form action="<?php echo url_for('/staff/payment/edit.php?id=' . h(u($id))); ?>" method="post">
      <dl>
        <dt>Instal_ID</dt>
        <dd><input type="number" name="Instal_ID" min ="10000000" max = "99999999" value="<?php echo h($result['Instal_ID']); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>Installment Amount</dt>
        <dd><input type="text" name="Instal_amt" value="<?php echo $result['Instal_amt']; ?>" /></dd>
      </dl>
      
      <dl>
        <dt>Payment Date</dt>
        <dd><input type="date" name="Pay_date" value="<?php echo h($result['Pay_date']); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>Pay_method</dt>
        <dd><input type="radio" id = "Credit" name="Pay_method" value="CREDIT" <?php if($result['Pay_method'] == "CREDIT") { echo "checked";} ?>
        /><label for="Male">Credit</label></dd>
        <dd><input type="radio" id = "Debit" name="Pay_method" value="DEBIT" <?php if($result['Pay_method'] == "DEBIT") { echo "checked";} ?>
        /><label for="Female">Debit</label></dd>
        <dd><input type="radio" id = "Cheque" name="Pay_method" value="CHEQUE" <?php if($result['Pay_method'] == "CHEQUE") { echo "checked";} ?>
        /><label for="Male">Cheque</label></dd>
        <dd><input type="radio" id = "Paypal" name="Pay_method" value="PAYPAL" <?php if($result['Pay_method'] == "PAYPAL") { echo "checked";} ?>
        /><label for="Female">PayPal</label></dd>
      </dl>
      
      <dl>
        <dt>Invoice_id</dt>
        <dd><input type="number" name="Invoice_id" min ="1000000" max = "9999999" value="<?php echo h($result['Invoice_id']); ?>" /></dd>
      </dl>

      <div id="operations">
        <input type="submit" value="Edit Payment" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>



