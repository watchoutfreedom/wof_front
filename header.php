<?php get_template_part('components/head'); ?>

<?php
// Check if it's a single post with 'helpbuttons' category
$is_helpbuttons_post = false;

// Get the current post ID and check if we're on a single post
global $post;
if (isset($post) && $post->post_type == 'post') {
    $categories = get_the_category($post->ID);
    foreach ($categories as $category) {
        if ($category->slug === 'helpbuttons') {
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