<?php

require_once('../../../private/initialize.php');

$Vin = '';
$License_no = '';
$Rating = '';


?>
<?php $page_title = 'Create Vehicle_Driver'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/vehicle_driver/index.php'); ?>">&laquo; Back to List</a>

  <div class="customer new">
    <h1>Create Vehicle_Driver</h1>

    <form action="<?php echo url_for('/staff/vehicle_driver/create.php'); ?>" method="post">
     
     <dl>
        <dt>VIN</dt>
        <dd><input type="text" name="Vin" maxlength="10" style="text-transform:uppercase"
         value="<?php echo h($Vin); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>License no</dt>
        <dd><input type="text" name="License_no" maxlength="10" style="text-transform:uppercase"
         value="<?php echo h($License_no); ?>" /></dd>
      </dl>
      
     <dl>
        <dt>Rating</dt>
        <dd><input type="number" min="0" max="10" name="Rating" value="<?php echo h($Rating); ?>" /></dd>
      </dl>
     
      <div id="operations">
        <input type="submit" value="Create Vehicle_Driver" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
