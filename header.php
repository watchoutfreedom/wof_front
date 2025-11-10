<?php get_template_part('components/head'); ?>

<?php
// Debug: Check what we're working with
if (is_single()) {
    $current_post_id = get_the_ID();
    $categories = get_the_category($current_post_id);
    $category_slugs = array();
    
    foreach ($categories as $category) {
        $category_slugs[] = $category->slug;
    }
    
    // Debug output (remove this after testing)
    echo "<!-- Debug: Current post ID: " . $current_post_id . " -->";
    echo "<!-- Debug: Category slugs: " . implode(', ', $category_slugs) . " -->";
}

// Check if it's a single post with 'helpbuttons' category
$is_helpbuttons_post = false;
if (is_single()) {
    $categories = get_the_category();
    foreach ($categories as $category) {
        // Check both slug and name to be safe
        if ($category->slug === 'helpbuttons' || strtolower($category->name) === 'helpbuttons') {
            $is_helpbuttons_post = true;
            break;
        }
    }
}

// Only apply for helpbuttons posts
if ($is_helpbuttons_post) {
  echo "
  <style>
    .header__logo-link {
      /* Set the new background image */
      background-image: url('https://wofreedom.org/wp-content/uploads/sites/8/2025/11/hb_logo_hor_00-1.png');
      background-size: contain;
      background-repeat: no-repeat;
      background-position: center;

      /* These next lines hide the original 'WOF' text and give the link dimensions */
      text-indent: -9999px;
      overflow: hidden;
      font-size: 0;
      display: block;
      width: 80px;  /* <-- Adjust width as needed for your logo */
      height: 40px; /* <-- Adjust height as needed for your logo */
    }
  </style>
  ";
}
?>

<header class="header">
  <div class="header__wrap">
    <div class="header__logo">
      <a href="<?php bloginfo('url'); ?>" class="header__logo-link">
        WOF
      </a>
    </div>
    <nav class="header__nav">
    <ul>
      <?php 
       $args = array(
        'exclude' => get_page_by_path("create-post")->ID.",".get_page_by_path("php-info")->ID.",".get_page_by_path("login")->ID.",".get_page_by_path("sign-up")->ID,
        'title_li' => ''
        );
      wp_list_pages($args); 
      ?>
    </ul>
    </nav>
    <div class="header__btn">
      <a href="/colabora">Colabora con WOF</a>
    </div>
  </div>
</header>