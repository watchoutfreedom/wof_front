<!DOCTYPE html>
<html xmlns:fb="http://ogp.me/ns/fb#" lang="es">
<head>
  <?php
    /**
     * Add the favicon to the page.
     */
  ?>
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/favicon.ico" type="image/png">

  <?php
    /**
     * Set the meta charset for the page.
     */
  ?>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  <?php
    /**
     * Set the title tag for the page.
     *
     * If we are on a single post, set the title to the post title followed by
     * the site name. Otherwise, just set the title to the site name.
     */
    if ( is_single() ) {
      $post_title = get_the_title();
      $meta_title = "$post_title - " . get_bloginfo('name');
      echo "<title>$meta_title</title>";
      echo '<meta property="og:title" content="' . esc_attr($meta_title) . '" />';
    } else {
      echo "<title>" . get_bloginfo('title') . "</title>";
    }
  ?>

  <?php
    /**
     * Set the meta description for the page.
     *
     * If we are on a single post, set the meta description to the post content
     * in the field named "field_6375315c72e9d". Otherwise, set the meta
     * description to the site description.
     */
    if ( is_single() ) {
      $post_description = get_field('field_6375315c72e9d');
      $meta_description = esc_attr($post_description);
    } else {
      $meta_description = get_bloginfo('description');
    }
    echo "<meta name=\"description\" content=\"$meta_description\">";
  ?>

  <?php
    /**
     * Add the Open Graph metadata to the page.
     *
     * If we are on a single post, set the Open Graph type to "article".
     * Otherwise, set the Open Graph type to "website".
     */
  ?>
  <?php
    if ( is_single() ) {
      echo '<meta property="og:type" content="article" />';
    } else {
      echo '<meta property="og:type" content="website" />';
    }
  ?>

  <?php
    /**
     * Add the Open Graph url metadata to the page.
     *
     * Set the Open Graph url to the current page url.
     */
  ?>
  <?php
    $current_url = get_permalink();
    echo '<meta property="og:url" content="' . esc_url($current_url) . '">';
  ?>

  <?php
    /**
     * Add the Open Graph image metadata to the page.
     *
     * If we are on a single post and the post has a featured image, set the
     * Open Graph image to the featured image. Otherwise, set the Open Graph
     * image to the site logo.
     */
  ?>
  <?php
    if ( is_single() ) {
      $post_image = get_the_post_thumbnail_url();
      if ( ! empty($post_image) ) {
        echo '<meta property="og:image" content="' . esc_url($post_image) . '">';
      } else {
        $logo_image = get_template_directory_uri() . '/logo.png';
        echo '<meta property="og:image" content="' . esc_url($logo_image) . '">';
      }
    }
  ?>

  <?php
    /**
     * Add the main stylesheet to the page.
     */
  ?>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/scss/main.css" as="styles">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
  <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
  <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
  <link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php bloginfo('atom_url'); ?>" />
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/scss/main.css" as="styles">

  <?php
    /**
     * Add the WordPress head data to the page.
     */
  ?>
  <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

