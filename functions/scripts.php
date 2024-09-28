<?php
function register_scripts() {
  wp_register_style('theme-style',get_template_directory_uri().'/style.css');
}

function enqueue_scripts() {
  wp_enqueue_style('theme-style');
  wp_enqueue_script('app');
  wp_register_script( 'altcha', 'https://eu.altcha.org/js/latest/altcha.min.js' ) ;
}
add_action('wp_enqueue_scripts', 'register_scripts');
add_action('wp_enqueue_scripts', 'enqueue_scripts');
?>
