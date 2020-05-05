<?php require_once('../../private/initialize.php'); 

#customer_require_login();
?>

<?php 
  $id = $_GET['id'] ?? '1';
  $id2 = $_GET['id2'] ?? '1';
  $customer = find_record("customer", "Cid" ,$id);
  $policy = find_record("policy", "Policy_no", $id2 )
?>

<?php $page_title = 'Your Insurance'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="content">
    <a class="back-link" href="<?php echo url_for('/customer/show.php');
    ?>">&laquo; Back to List</a>
    
    <div class="customer show">
    
        <h2> Customer Number: <?php echo h($customer['Cid']); ?></h2>

        <div class = "attributes"> 
        	<dl>
        		<dt>First Name:</dt>
        		<dd> <?php echo h($customer['Fname']); ?> </dd>
        	</dl>
        	<dl>
        		<dt>Last Name:</dt>
        		<dd> <?php echo h($customer['Lname']); ?> </dd>
        	</dl>
        	<dl>
        		<dt>Policy Number:</dt>
        		<dd> <?php echo h($policy['Policy_no']); ?> </dd>
        	</dl>
        	<dl>
        		<dt>Start Date:</dt>
        		<dd> <?php echo h($policy['Start_Date']); ?> </dd>
        	</dl>
        	<dl>
        		<dt>End Date:</dt>
        		<dd> <?php echo h($policy['End_Date']); ?> </dd>
        	</dl>
        	<dl>
        		<dt>Premium:</dt>
        		<dd> <?php echo h($policy['Premium']); ?> </dd>
        	</dl>
        	<dl>
        		<dt>Policy Status:</dt>
        		<dd> <?php echo h($policy['Status']); ?> </dd>
        	</dl>

        </div>

          <div>
                    
                <h3><a href="<?php echo url_for('/customer/logout.php'); ?>">Logout</a></li><h3>
            
          </div>
        
    </div>
</div>


<?php include(SHARED_PATH . '/public_footer.php'); ?>

