<!DOCTYPE html>
<html xmlns:fb="http://ogp.me/ns/fb#" lang="es">
<head>
  <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" type="image/png">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <?php
    if ( is_single() ) {
      $post_title = get_the_title();
      echo '<title>' . $post_title . ' - ' . get_bloginfo('name') . '</title>';
      echo '<meta property="og:title" content="'.$post_title . ' - ' . get_bloginfo('name').'" />';
    }
    else{
      echo "<title>".bloginfo('title')."</title>";
    }
  ?>
  <?php
    if ( is_single() ) {
      $post_description = get_field('field_6375315c72e9d'); // Get the description from ACF field
      echo '<meta name="description" content="' . $post_description . '">';
    }
    else{
      echo '<meta name="description" content="'.bloginfo('description').'">'; // corrected this line
    }
  ?>  
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
  <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
  <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
  <link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php bloginfo('atom_url'); ?>" />
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/scss/main.css" as="styles">
  <?php
    if ( is_single() ) {
      echo '<meta property="og:type" content="article" />'; // corrected this line
    }
    else{
      echo '<meta property="og:type" content="website" />';
    }
  ?>
  <?php
    $current_url = get_permalink(); // Get the URL of the current page
    echo '<meta property="og:url" content="' . $current_url . '">';

    if ( is_single() ) {
      $post_image = get_the_post_thumbnail_url(); // Get the URL of the featured image
      if ( !empty($post_image) ) {
        echo '<meta property="og:image" content="' . $post_image . '">';
      } else {
        $logo_image = get_template_directory_uri() . '/logo.png'; // Get the URL of the logo image
        echo '<meta property="og:image" content="' . $logo_image . '">';
      }
    }
  ?>

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>