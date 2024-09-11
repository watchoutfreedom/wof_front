<!DOCTYPE html>
<html xmlns:fb="http://ogp.me/ns/fb#" lang="es">
<head>
  <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" type="image/png">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title><?php bloginfo('title'); ?></title>
  <meta name="description" content="<?php bloginfo('description'); ?>"/>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
  <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
  <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
  <link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php bloginfo('atom_url'); ?>" />
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/scss/main.css" as="styles">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="header">
  <div class="header__wrap">
    <div class="header__logo">
      <a href="<?php bloginfo('url'); ?>" class="header__logo-link">
        WOF
      </a>
    </div>
    <nav class="header__nav">
    <ul><?php wp_list_pages('title_li= '); ?></ul>
    </nav>
    <div class="header__btn">
      <a href="">Colabora con WOF</a>
    </div>
  </div>
</header>
