<?php require_once('../../../private/initialize.php'); ?>

<?php
  $Customers = [
    ['Cid' => '1', 'Fname' => 'Yash', 'Lname' => 'Joshi','St' => '556 83', 'City' => 'NYC', 'State' => 'NY','Zipcode' => '11209', 'Gender' => 'M',  'DOB' => '09/30/1995', 'M_Status' => 'Definitely not Single', 'C_Type' => 'A'],
    ['Cid' => '2', 'Fname' => 'Rachana', 'Lname' => 'Swamy','St' => 'MAKABO', 'City' => 'BOM', 'State' => 'Liquid', 'Zipcode' => 'lol', 'Gender' => 'F',  'DOB' => '08/15/1995', 'M_Status' => 'Super Single', 'C_Type' => 'H'],
  ];
?>

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

  	  <?php foreach($Customers as $Customer) { ?>
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
          <td><a class="action" href="">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

		</div>
	</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>