<?php
/*
Template Name: Php info
*/



    if (current_user_can('manage_options')) {
      phpinfo();
    } else {
      wp_redirect(home_url());
    }

    ?>
    