<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/invoice/index.php'));
}

$id =$_GET['id'];
$Invoice_id = '';
$Invoice_amt = '';
$Policy_no = '';
$Due_Date = '';

if(is_post_request()) {

  // Handle form values sent by new.php

  
  $Invoice_id = $_POST['Invoice_id'] ?? '';
  $Invoice_amt = $_POST['Invoice_amt'] ?? '';
  $Policy_no = $_POST['Policy_no'] ?? '';
  $Due_Date = $_POST['Due_Date'] ?? '';

  echo "Form parameters<br />";
  echo "Invoice_id: " . $Invoice_id . "<br />";
  echo "Invoice_amt: " . $Invoice_amt . "<br />";
  echo "Policy_no: " . $Policy_no . "<br />";
  echo "Due_Date: " . $Due_Date . "<br />";
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
        <dd><input type="number" name="Invoice_id" min ="1000000" max = "9999999" value="<?php echo h($Invoice_id); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>Invoice Amount</dt>
        <dd><input type="number" name="Invoice_amt" value="<?php echo $Invoice_amt; ?>" /></dd>
      </dl>
      
      <dl>
        <dt>Policy Number</dt>
        <dd><input type="number" name="Policy_no" min="100000000000" max="999999999999" value="<?php echo h($Policy_no); ?>" /></dd>
      </dl>
      <dl>
      	<dt>Due Date</dt>
      	<dd><input type ="date" name="Due_Date" value="<?php echo h($Due_Date); ?>"></dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Edit Invoice" />
      </div>
    </form>
  </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>


