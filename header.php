<?php

/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 */

// Get ACF vars from options

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
  <meta content="text/html; charset=UTF-8" name="Content-Type" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta charset="UTF-8">
	<meta name="keywords" content="Watch Out, Freedom!, asociación, sin fines de lucro, iniciativas, conocimiento, colaboración, consultoría creativa, objetivos">
	<meta name="author" content="Watch Out, Freedom!">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php if(is_front_page()){
    $title = "Watch Out, Freedom! | Iniciativas para difundir conocimiento, fomentar la colaboración y ofrecer consultoría creativa";
    $description = "descricao";
    $image = "https://www.watchoutfreedom.com/images/logo.png";
  }
  ?>
  <?php if(is_single()){
    $title = "".get_the_title();
    $description = get_field("excerpt");
    $image = get_the_post_thumbnail_url();
  }?>

  <title><?php echo $title ?></title>
	<meta property="og:title" content="<?php echo $title ?>">
  <meta name="twitter:title" content="<?php echo $title ?>">
  <meta name="description" content="<?php echo $description ?>">
  <meta property="og:description" content="<?php echo $description ?>">
  <meta name="twitter:description" content="<?php echo $description ?>">
  <meta property="og:image" content="<?php echo $image ?>">
	<meta property="og:url" content="https://www.watchoutfreedom.com/">
	<meta property="og:type" content="website">
	<meta property="og:locale" content="es_ES">
	<meta name="twitter:card" content="summary">
	<meta name="twitter:image" content="<?php echo $image ?>">
  <link rel="icon" href="https://watchoutfreedom.com/assets/favicon.ico" type="image/x-icon">
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,200;0,500;0,800;1,200;1,500;1,800&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" defer></script>

  <link rel='dns-prefetch' href='//polyfill.io' />
  <link rel='dns-prefetch' href='//fonts.googleapis.com' />
	<?php wp_head(); ?>
  
</head>

<body <?php body_class(); ?>>
  
  
  <header class="header header-fixed u-unselectable">
    <div class="header-top"> 
      <div class="header-brand">
      <div class="nav-item no-hover"><a class="title" href="<?php echo get_home_url(); ?>"><?php 	the_custom_logo(); ?></a></div>
        <div class="nav-item nav-btn" id="header-btn"><span></span><span></span><span></span></div>
      </div>
      <div class="header-nav" id="header-menu">
      <?php foundationpress_main_nav(); ?>
      <?php if ( is_home() || is_tag()):?>
        <div class="header-right">
        <ul>
          <li>
            <button class="header__menu" id="layoutToggle">
              <i class="fas fa-bars" id="menuIcon"></i>
              <i class="fas fa-times" id="closeIcon" style="display: none;"></i>
            </button>
          </li>
          <li><a href="/blog">ALL</a></li>
        <?php 
          $tag_page = get_queried_object();
          foreach(get_tags() as $tag):?>
            <li <?php if($tag_page->slug == $tag->name) echo 'class="is-active"'; ?>><a href="<?php echo get_tag_link( $tag->term_id )?>"><?php echo $tag->name ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <?php endif; ?>
      <?php if(is_archive() && !is_tag()): ?>
      <div class="header-right">
        <ul>
        <li><a href="/<?php echo get_queried_object()->rewrite['slug']?>">ALL</a></li>
        <?php 
        if(is_post_type_archive("service")) $field = 'field_6377dd09cb415';
        if(is_post_type_archive("product")) $field = 'field_6377e5090ad10';
        if(is_post_type_archive("activity")) $field = 'field_637541b007ca0';
          foreach(array_keys(get_field_object($field)['choices']) as $choice):
            //only show if type has posts
           // if(get_posts(array('post_type' => get_queried_object()->name,'meta_query' => array(array('key' => 'type','value' => $choice,'compare' => 'LIKE'))))){ 
          ?>
            <li <?php if(get_query_var('type') == $choice) echo 'class="is-active"'; ?>><a href="/<?php echo get_queried_object()->rewrite['slug'].'/?type='.$choice ?>"><?php echo get_field_object($field)['choices'][$choice]; ?></a></li>
      <?php //} 
        endforeach; ?>
        </ul>
      </div>
      <?php endif; ?>
      </div>
    </div>
  </header>