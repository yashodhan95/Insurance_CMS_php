<?php

require_once('../../../private/initialize.php');

if(is_post_request()){

  $Invoice_id = $_POST['Invoice_id'] ?? '';
  $Invoice_amt = $_POST['Invoice_amt'] ?? '';
  $Policy_no = $_POST['Policy_no'] ?? '';
  $Due_Date = $_POST['Due_Date'] ?? '';
  
  
  $sql = "Insert into invoice ";
  $sql .= "(Invoice_id, Invoice_amt, Policy_no, Due_Date) ";
  $sql .= "values (";
  $sql .= "'" . db_escape($db,$Invoice_id) . "',";
  $sql .= "'" . db_escape($db,$Invoice_amt) . "',";
  $sql .= "'" . db_escape($db,$Policy_no) . "',";
  $sql .= "'" . db_escape($db,$Due_Date) . "'";
  
  $sql .= ")";

  $result = mysqli_query($db, $sql);
  //for insert statement the result is True or False

  if($result){
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for('/staff/invoice/show.php?id=' . $Invoice_id));

  } else {
    //insert failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}
else{

  }

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

    <form action="<?php echo url_for('/staff/invoice/new.php'); ?>" method="post">
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
