<!doctype html>

<html lang="en">
  <head>
    <title>WDS <?php if(isset($page_title)) { echo '- ' . h($page_title); } ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/public.css'); ?>" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>

  <body>
    <div class="wrapper">
        <!-- <div class="multi_color_border"></div> -->
        <div class="top_nav">
            <div class="left">
                <div class="logo"><a href="<?php echo url_for('/index.php'); ?>">
                <img src="<?php echo url_for('/images/logo3.png'); ?>" width="140" height="70" alt="WDS" />
                </a></div>
            </div>
            <div class="right">
              <div class="logo"><img class="logo" src="<?php echo url_for('/images/Employee-Icon.png'); ?>" width="25" height="25" alt="Employee vector" /></div>
              <div class="staff-login"><a href="<?php echo url_for('/staff/login.php'); ?>">Staff Login</a></div>
            </div>
        </div>

        <div class="bottom_nav">
          <ul style="list-style-type:none;">
            <li><a href="<?php echo url_for('/home_insurance/home_insurance.php'); ?>">Home Insurance</a></li>
            <li><a href="<?php echo url_for('/auto_insurance/auto_insurance.php'); ?>">Auto Insurance</a></li>
            <li><a href="<?php echo url_for('/about_wds/about.php'); ?>">Claims</a></li>
            <li><a href="<?php echo url_for('/about_wds/about.php'); ?>">About WDS</a></li>
            <li><a class="button" href="<?php echo url_for('/auto_insurance/auto_old_customer.php'); ?>"><button>Customer Login</button></a></li>
          </ul>
        </div>
    </div>



    <?php echo display_session_message(); ?>
