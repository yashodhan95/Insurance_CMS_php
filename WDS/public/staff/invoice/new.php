<?php

require_once('../../../private/initialize.php');

$Invoice_id = '';
$Invoice_amt = '';
$Policy_no = '';
$Due_Date = '';

?>
<?php $page_title = 'Create Invoice'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/invoice/index.php'); ?>">&laquo; Back to List</a>

  <div class="customer new">
    <h1>Create Invoice</h1>

    <form action="<?php echo url_for('/staff/invoice/create.php'); ?>" method="post">
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
        <input type="submit" value="Create Invoice" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
