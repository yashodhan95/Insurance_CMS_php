<?php require_once('../../../private/initialize.php'); ?>


<?php $Customer_set = find_all("customer"); ?>

<?php $page_name='Customer'; ?>
<?php $page_title='Customer'; ?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>

	<div id="content">
		<div class="Customer Listing"> 
		<h1>Customers</h1>

	<div id="actions">
		<a class="action" href="<?php echo url_for('staff/customer/new.php'); ?>">Create Customer</a>
	</div>

	<table class="list">
  	  <tr>
        <th>Cid</th>
        <th>Fname</th>
        <th>Lname</th>
  	    <th>St</th>
  	    <th>City</th>
  	    <th>State</th>
  	    <th>Zipcode</th>
  	    <th>Gender</th>
  	    <th>DOB</th>
  	    <th>M_Status</th>
  	    <th>C_Type</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>        
  	  </tr>

  	  <?php while($Customer = mysqli_fetch_assoc($Customer_set)) { ?>
        <tr>
          <td><?php echo $Customer['Cid']; ?></td>
          <td><?php echo $Customer['Fname']; ?></td>
          <td><?php echo $Customer['Lname']; ?></td>
          <td><?php echo $Customer['St']; ?></td>
          <td><?php echo $Customer['City']; ?></td>
          <td><?php echo $Customer['State']; ?></td>
          <td><?php echo $Customer['Zipcode']; ?></td>
          <td><?php echo $Customer['Gender']; ?></td>
          <td><?php echo $Customer['DOB']; ?></td>
          <td><?php echo $Customer['M_Status']; ?></td>
          <td><?php echo $Customer['C_Type']; ?></td>    	    
          <td><a class="action" href="<?php echo url_for('/staff/customer/show.php?id=' . h(u($Customer['Cid']))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/customer/edit.php?id=' . h(u($Customer['Cid']))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/customer/delete.php?id=' . h(u($Customer['Cid']))); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

<?php

    mysqli_free_result($Customer_set);

?>

		</div>
	</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>