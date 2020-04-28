<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/customer/index.php'));
}

$id =$_GET['id'];
$Cid = '';
$Fname = '';
$Lname = '';
$St = '';
$City = '';
$State = '';
$Zipcode = '';
$Gender = '';
$DOB = '';
$M_Status = '';
$C_Type = '';

if(is_post_request()) {

  // Handle form values sent by new.php

  $Cid = $_POST['Cid'] ?? '';
  $Fname = $_POST['Fname'] ?? '';
  $Lname = $_POST['Lname'] ?? '';
  $St = $_POST['St'] ?? '';
  $City = $_POST['City'] ?? '';
  $State = $_POST['State'] ?? '';
  $Zipcode = $_POST['Zipcode'] ?? '';
  $Gender = $_POST['Gender'] ?? '';
  $DOB = $_POST['DOB'] ?? '';
  $M_Status = $_POST['M_Status'] ?? '';
  $C_Type = $_POST['C_Type'] ?? '';

  echo "Form parameters<br />";
  echo "Cid: " . $Cid . "<br />";
  echo "Fname: " . $Fname . "<br />";
  echo "Lname: " . $Lname . "<br />";
  echo "St: " . $St . "<br />";
  echo "City: " . $City . "<br />";
  echo "State: " . $State . "<br />";
  echo "Zipcode: " . $Zipcode . "<br />";
  echo "Gender: " . $Gender . "<br />";
  echo "DOB: " . $DOB . "<br />";
  echo "M_Status: " . $M_Status . "<br />";
  echo "C_Type: " . $C_Type . "<br />";
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
        <dd><input type="number" name="Cid" min ="1" max = "999999" value="<?php echo h($Cid); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>First Name</dt>
        <dd><input type="text" name="Fname" value="<?php echo $Fname; ?>" /></dd>
      </dl>
      
      <dl>
        <dt>Last Name</dt>
        <dd><input type="text" name="Lname" value="<?php echo h($Lname); ?>" /></dd>
      </dl>
      <dl>
        <dt>Street Address</dt>
        <dd><input type="text" name="St" value="<?php echo h($St); ?>" /></dd>
      </dl>

      <dl>
        <dt>City</dt>
        <dd><input type="text" name="City" value="<?php echo h($City); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>State </dt>
        <dd><input type="text" name="State" value="<?php echo h($State); ?>" /></dd>
      </dl>

      <dl>
        <dt>Zipcode</dt>
        <dd><input type="number" name="Zipcode" min="1" max="99999" value="<?php echo h($Zipcode); ?>" /></dd>
      </dl>

      <dl>
        <dt>Gender</dt>
        <dd><input type="radio" id = "Male" name="Gender" value="M" <?php if($Gender == "M") { echo "checked";} ?>
        /><label for="Male">Male</label></dd>
        <dd><input type="radio" id = "Female" name="Gender" value="F" <?php if($Gender == "F") { echo "checked";} ?>
        /><label for="Female">Female</label></dd>
      </dl>

      <dl>
      	<dt>Date of Birth</dt>
      	<dd><input type ="date" name="DOB" value="<?php echo h($DOB); ?>"></dd>
      </dl>

      <dl>
        <dt>Marital Status</dt>
        <dd><input type="radio" id = "Single" name="M_Status" value="S" <?php if($M_Status == "S") { echo "checked";} ?>
        /><label for="Single">Single</label></dd>
        <dd><input type="radio" id = "Married" name="M_Status" value="M" <?php if($M_Status == "M") { echo "checked";} ?>
        /><label for="Married">Married</label></dd>
        <dd><input type="radio" id = "Widowed" name="M_Status" value="W" <?php if($M_Status == "W") { echo "checked";} ?>
        /><label for="Widowed">Widowed</label></dd>
      </dl>

      <dl>
        <dt>Customer Type</dt>
        <dd><input type="radio" id = "Automobile" name="C_Type" value="A" <?php if($C_Type == "A") { echo "checked";} ?>
        /><label for="Automobile">Automobile</label></dd>
        <dd><input type="radio" id = "Home" name="C_Type" value="H" <?php if($C_Type == "H") { echo "checked";} ?>
        /><label for="Home">Home</label></dd>
        <dd><input type="radio" id = "Both" name="C_Type" value="AH" <?php if($C_Type == "AH") { echo "checked";} ?>
        /><label for="Both">Both</label></dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Edit Customer" />
      </div>
    </form>
  </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>


