<?php

require_once('../../../private/initialize.php');

if(is_post_request()){

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
  //$Visible = $_POST['visible'] ?? '';


  $sql = "Insert into customer ";
  $sql .= "(Cid, Fname, Lname, St, City, State, Zipcode, Gender, DOB, M_Status, C_Type) ";
  $sql .= "values (";
  $sql .= "'" . db_escape($db,$Cid) . "',";
  $sql .= "'" . db_escape($db,$Fname) . "',";
  $sql .= "'" . db_escape($db,$Lname) . "',";
  $sql .= "'" . db_escape($db,$St) . "',";
  $sql .= "'" . db_escape($db,$City) . "',";
  $sql .= "'" . db_escape($db,$State) . "',";
  $sql .= "'" . db_escape($db,$Zipcode) . "',";
  $sql .= "'" . db_escape($db,$Gender) . "',";
  $sql .= "'" . db_escape($db,$DOB) . "',";
  $sql .= "'" . db_escape($db,$M_Status) . "',";
  $sql .= "'" . db_escape($db,$C_Type) . "'";
  $sql .= ")";

  $result = mysqli_query($db, $sql);
  //for insert statement the result is True or False

  if($result){
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for('/staff/customer/show.php?id=' . $Cid));

  } else {
    //insert failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}
else{

  }


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

?>

<?php $page_title = 'Create Customer'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/customer/index.php'); ?>">&laquo; Back to List</a>

  <div class="customer new">
    <h1>Create Customer</h1>

    <form action="<?php echo url_for('/staff/customer/new.php'); ?>" method="post">
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
        <dd><input type="text" name="State" maxlength="2" style="text-transform:uppercase"
        value="<?php echo h($State); ?>" /></dd>
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
        <input type="submit" value="Create Customer" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
