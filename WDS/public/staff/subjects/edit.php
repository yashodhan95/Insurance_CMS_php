<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/subjects/index.php'));
}
$id = $_GET['id'];


if(is_post_request()) {

  // Handle form values sent by new.php
  $subject = [];
  $subject['menu_name'] = $_POST['menu_name'] ?? '';
  $subject['position'] = $_POST['position'] ?? '';
  $subject['visible'] = $_POST['visible'] ?? '';
  
  $sql = "UPDATE subjects SET ";
  $sql .= "menu_name='" . db_escape($db,$subject['menu_name']) . "', ";
  $sql .= "position='" . db_escape($db,$subject['position']) . "', ";
  $sql .= "visible='" . db_escape($db,$subject['visible']) . "' ";
  $sql .= "WHERE id='" . db_escape($db,$id) . "' ";
  $sql .= "LIMIT 1";
  
  $result = mysqli_query($db, $sql);
  
  if($result){
    redirect_to(url_for('/staff/subjects/show.php?id=' . h(u($id))));
  } else {
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
    }

} else {
   $subject = find_record($id);
   $subject_set = find_all_subjects();
   $subject_count = mysqli_num_rows($subject_set);
   mysqli_free_result($subject_set);
   
}

?>

<?php $page_title = 'Edit Subject'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject edit">
    <h1>Edit Subject</h1>
    <?php echo display_errors($errors); ?>
    <form action="<?php echo url_for('/staff/subjects/edit.php?id=' . h(u($id))); ?>" method="post">
      <dl>
        <dt>Menu Name</dt>
        <dd><input type="text" name="menu_name" value="<?php echo h($subject['menu_name']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd>
          <select name="position">
        <?php 
            for($i = 1; $i <= $subject_count; $i++) {
            echo "<option value=\"{$i}\"";
            if($subject["position"] == $i) { 
            echo "selected";
            } 
            echo ">{$i}</option>";
            }
            ?>
        </select>
        </dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd>
          <input type="hidden" name="visible" value="0" />
          <input type="checkbox" name="visible" value="1" <?php
          if($subject['visible']=="1"){ echo "checked";} ?> />
        </dd>
      </dl>
      <dl>
        <dt>Visit log</dt>
        <dd>
          <input <?php if (isset($_POST["X"]) && $_POST["X"] == "visitlog") echo "checked ";?>
          type=radio name="X" value="visitlog" />
        </dd>
      </dl>
    
      <div id="operations">
        <input type="submit" value="Edit Subject" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
