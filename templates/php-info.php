<?php
/*
Template Name: Php info
*/

if ( is_user_logged_in() )
    wp_redirect(home_url());


    if (current_user_can('manage_options')) {
      phpinfo();
    } else {
      // Display a message or redirect to a different page
      echo 'You do not have permission to view the PHP info page.';
    }

    ?>
    