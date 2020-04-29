<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/customer/index.php'));
}

$id =$_GET['id'];



if(is_post_request()) {

  // Handle form values sent by new.php
  $customer= [];
  $customer['Cid'] = $_POST['Cid'] ?? '';
  $customer['Fname'] = $_POST['Fname'] ?? '';
  $customer['Lname'] = $_POST['Lname'] ?? '';
  $customer['St'] = $_POST['St'] ?? '';
  $customer['City'] = $_POST['City'] ?? '';
  $customer['State'] = $_POST['State'] ?? '';
  $customer['Zipcode'] = $_POST['Zipcode'] ?? '';
  $customer['Gender'] = $_POST['Gender'] ?? '';
  $customer['DOB'] = $_POST['DOB'] ?? '';
  $customer['M_Status'] = $_POST['M_Status'] ?? '';
  $customer['C_Type'] = $_POST['C_Type'] ?? '';

  $sql = "UPDATE customer SET ";
  $sql .= "Cid='" . $customer['Cid'] . "',";
  $sql .= "Fname='" . $customer['Fname'] . "',";
  $sql .= "Lname='" . $customer['Lname'] . "',";
  $sql .= "St='" . $customer['St'] . "',";
  $sql .= "City='" . $customer['City'] . "',";
  $sql .= "State='" . $customer['State'] . "',";
  $sql .= "Zipcode='" . $customer['Zipcode'] . "',";
  $sql .= "Gender='" . $customer['Gender'] . "',";
  $sql .= "DOB='" . $customer['DOB'] . "',";
  $sql .= "M_Status='" . $customer['M_Status'] . "',";
  $sql .= "C_Type='" . $customer['C_Type'] . "' ";
  $sql .= "WHERE Cid='" . $customer['Cid'] . "' ";
  $sql .= "Limit 1;";


  $result = mysqli_query($db, $sql);
  //for insert statement the result is True or False

  if($result){
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for('/staff/customer/show.php?id=' . $id));

  } else {
    //insert failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }

}

else{
  $customer = find_record("customer", "Cid" ,$id);
}

?>
<?php $page_title = 'Edit Customer'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/customer/index.php'); ?>">&laquo; Back to List</a>

  <div class="customer edit">
    <h1>Edit Customer</h1>

    <form action="<?php echo url_for('/staff/customer/edit.php?id=' . h(u($id))); ?>" method="post">
      <dl>
        <dt>Cid</dt>
        <dd><input type="number" name="Cid" min ="1" max = "999999" value="<?php echo h($customer['Cid']); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>First Name</dt>
        <dd><input type="text" name="Fname" value="<?php echo h($customer['Fname']); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>Last Name</dt>
        <dd><input type="text" name="Lname" value="<?php echo h($customer['Lname']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Street Address</dt>
        <dd><input type="text" name="St" value="<?php echo h($customer['St']); ?>" /></dd>
      </dl>

      <dl>
        <dt>City</dt>
        <dd><input type="text" name="City" value="<?php echo h($customer['City']); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>State </dt>
        <dd><input type="text" name="State" value="<?php echo h($customer['State']); ?>" /></dd>
      </dl>

      <dl>
        <dt>Zipcode</dt>
        <dd><input type="number" name="Zipcode" min="1" max="99999" value="<?php echo h($customer['Zipcode']); ?>" /></dd>
      </dl>

      <dl>
        <dt>Gender</dt>
        <dd><input type="radio" id = "Male" name="Gender" value="M" <?php if($customer['Gender'] == "M") { echo "checked";} ?>
        /><label for="Male">Male</label></dd>
        <dd><input type="radio" id = "Female" name="Gender" value="F" <?php if($customer['Gender'] == "F") { echo "checked";} ?>
        /><label for="Female">Female</label></dd>
      </dl>

      <dl>
      	<dt>Date of Birth</dt>
      	<dd><input type ="date" name="DOB" value="<?php echo h($customer['DOB']); ?>"></dd>
      </dl>

      <dl>
        <dt>Marital Status</dt>
        <dd><input type="radio" id = "Single" name="M_Status" value="S" <?php if($customer['M_Status'] == "S") { echo "checked";} ?>
        /><label for="Single">Single</label></dd>
        <dd><input type="radio" id = "Married" name="M_Status" value="M" <?php if($customer['M_Status'] == "M") { echo "checked";} ?>
        /><label for="Married">Married</label></dd>
        <dd><input type="radio" id = "Widowed" name="M_Status" value="W" <?php if($customer['M_Status'] == "W") { echo "checked";} ?>
        /><label for="Widowed">Widowed</label></dd>
      </dl>

      <dl>
        <dt>Customer Type</dt>
        <dd><input type="radio" id = "Automobile" name="C_Type" value="A" <?php if($customer['C_Type'] == "A") { echo "checked";} ?>
        /><label for="Automobile">Automobile</label></dd>
        <dd><input type="radio" id = "Home" name="C_Type" value="H" <?php if($customer['C_Type'] == "H") { echo "checked";} ?>
        /><label for="Home">Home</label></dd>
        <dd><input type="radio" id = "Both" name="C_Type" value="AH" <?php if($customer['C_Type'] == "AH") { echo "checked";} ?>
        /><label for="Both">Both</label></dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Edit Customer" />
      </div>
    </form>
  </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>


