<?php

require_once('../../../private/initialize.php');

if(is_post_request()){

  $License_no= $_POST['License_no'] ?? '';
  $D_Fname = $_POST['D_Fname'] ?? '';
  $D_Lname = $_POST['D_Lname'] ?? '';
  $D_DOB= $_POST['D_DOB'] ?? '';
  


  $sql = "Insert into drivers ";
  $sql .= "(License_No, D_Fname, D_Lname, D_DOB) ";
  $sql .= "values (";
  $sql .= "'" . db_escape($db,$License_no) . "',";
  $sql .= "'" . db_escape($db,$D_Fname) . "',";
  $sql .= "'" . db_escape($db,$D_Lname) . "',";
  $sql .= "'" . db_escape($db,$D_DOB) . "'";
  $sql .= ")";
  
  $result = mysqli_query($db, $sql);

  if($result){
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for('/staff/driver/show.php?id=' . h(u($License_no))));

  } else {
    //insert failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }

}




else{
  
  }


$License_no = '';
$D_Fname = '';
$D_Lname = '';
$D_DOB = '';

?>

<?php $page_title = 'Create Driver'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/driver/index.php'); ?>">&laquo; Back to List</a>

  <div class="driver new">
    <h1>Create Driver</h1>

    <form action="<?php echo url_for('/staff/driver/new.php'); ?>" method="post">
      <dl>
        <dt>License no</dt>
        <dd><input type="text" name="License_no" maxlength="10" style="text-transform:uppercase"
         value="<?php echo h($License_no); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>First Name</dt>
        <dd><input type="text" name="D_Fname" value="<?php echo h($D_Fname); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>Last Name</dt>
        <dd><input type="text" name="D_Lname" value="<?php echo h($D_Lname); ?>" /></dd>
      </dl>
      
      <dl>
      	<dt>Driver's Date of Birth</dt>
      	<dd><input type ="date" name="D_DOB" value="<?php echo h($D_DOB); ?>"></dd>
      </dl>

      <div id="operations">
        <input type="submit" value="Create Driver" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
