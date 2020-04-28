<?php

require_once('../../../private/initialize.php');

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

    <form action="<?php echo url_for('/staff/driver/create.php'); ?>" method="post">
      <dl>
        <dt>License no</dt>
        <dd><input type="text" name="License_no" maxlength="10" style="text-transform:uppercase"
         value="<?php echo h($License_no); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>First Name</dt>
        <dd><input type="text" name="D_Fname" value="<?php echo $D_Fname; ?>" /></dd>
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
