<?php require_once('../../private/initialize.php'); 

customer_require_login();

if (is_post_request()) {

$report = [];
$report['Cid'] = $_POST['Cid'] ?? '';
$report['Policy'] = $_POST['Policy'] ?? '';

redirect_to(url_for('/customer/display.php?id=' . h(u($report['Cid'])) . '&id2=' . h(u($report['Policy'])) ));
 }
 ?>


<?php $page_title = 'Auto Insurance'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="Main">
	<div id="Page">

	<h1>Welcome Back</h1>
    

    
    <div id="content">

    	<!--<a class="back-link" href="<?php echo url_for('/customer/index.php'); ?>">&laquo; Back</a> -->

    	<class id = "customer login">

    		<form action="<?php echo url_for('/customer/show.php'); ?>" method="post">
    		 <dl>
        		<dt>Enter Customer Number</dt>
        		<dd><input type="number" name="Cid" required min ="1" max = "999999" value="<?php //echo h($customer['Cid']); ?>" /></dd>
      	</dl>
        <dl>
            <dt>Enter Policy Number</dt>
            <dd><input type="number" name="Policy" required min ="100000000000" max = "999999999999" value="<?php //echo h($customer['Cid']); ?>" /></dd>
        </dl>
      		<!--
      		  <dl>
        		<dt>Enter Password</dt>
        		<dd><input type="text" name="Pass" required value="<?php //echo h($customer['Cid']); ?>" /></dd>
      		</dl>
      	-->
      		<div id="operations">
        		<input type="submit" value="submit" />
      		</div>

          <div>
              
                <h3><a href="<?php echo url_for('/customer/logout.php'); ?>">Logout</a></li><h3>
           
          </div>



      	</form>
    	</class>

    </div>


	

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
