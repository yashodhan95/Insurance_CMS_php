<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/invoice/index.php'));
}

$id =$_GET['id'];


if(is_post_request()) {

  // Handle form values sent by new.php
  $result=[]; 
  $result['Invoice_id'] = $_POST['Invoice_id'] ?? '';
  $result['Invoice_amt'] = $_POST['Invoice_amt'] ?? '';
  $result['Policy_no'] = $_POST['Policy_no'] ?? '';
  $result['Due_Date'] = $_POST['Due_Date'] ?? '';

  $sql = "UPDATE invoice SET ";
  $sql .= "Invoice_id='" . db_escape($db,$result['Invoice_id']) . "',";
  $sql .= "Invoice_amt='" . db_escape($db,$result['Invoice_amt']) . "',";
  $sql .= "Policy_no='" . db_escape($db,$result['Policy_no']) . "',";
  $sql .= "Due_Date='" . db_escape($db,$result['Due_Date']) . "' ";
  $sql .= "WHERE Invoice_id='" . db_escape($db,$result['Invoice_id']) . "' ";
  $sql .= "Limit 1;";


  $result = mysqli_query($db, $sql);
  //for insert statement the result is True or False

  if($result){
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for('/staff/invoice/show.php?id=' . h(u( $id))));

  } else {
    //insert failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }

}

else{
  $result = find_record("invoice", "Invoice_id" ,$id);
}

?>
<?php $page_title = 'Edit Invoice'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/invoice/index.php'); ?>">&laquo; Back to List</a>

  <div class="invoice edit">
    <h1>Edit Invoice</h1>

    <form action="<?php echo url_for('/staff/invoice/edit.php?id=' . h(u($id))); ?>" method="post">
      <dl>
        <dt>Invoice Id</dt>
        <dd><input type="number" name="Invoice_id" min ="1000000" max = "9999999" value="<?php echo h($result['Invoice_id']); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>Invoice Amount</dt>
        <dd><input type="number" name="Invoice_amt" value="<?php echo h($result['Invoice_amt']); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>Policy Number</dt>
        <dd><input type="number" name="Policy_no" min="100000000000" max="999999999999" value="<?php echo h($result['Policy_no']); ?>" /></dd>
      </dl>
      <dl>
      	<dt>Due Date</dt>
      	<dd><input type ="date" name="Due_Date" value="<?php echo h($result['Due_Date']); ?>"></dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Edit Invoice" />
      </div>
    </form>
  </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>


