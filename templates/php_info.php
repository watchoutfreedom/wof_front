<?php
/*
Template Name: PhP info
*/

if ( is_user_logged_in() )
    wp_redirect(home_url());


    <?php
    if (current_user_can('administrator')) {
      phpinfo();
    } else {
      // Display a message or redirect to a different page
      echo 'You do not have permission to view the PHP info page.';
    }
    ?>
    