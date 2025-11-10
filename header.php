<?php get_template_part('components/head'); ?>

<?php
// Conditionally add CSS for the 'helpbuttons' category page
if ( is_category('helpbuttons') ) {
  echo "
  <style>
    .header__logo-link {
      background-image: url('https://wofreedom.org/wp-content/uploads/sites/8/2025/11/bitmap_Página-1-16.19.22.png');
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
        'exclude' => get_page_by_path("create-post")->ID.",".get_page_by_path("php-info")->ID.",".get_page_by_path("login")->ID.",".get_page_by_path("sign-up")->ID, // Replace 5 with the parent page ID
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