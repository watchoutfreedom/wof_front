<?php get_template_part('components/head'); ?>

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
        'exclude' => get_page_by_path("create-post").",".get_page_by_path("login").",".get_page_by_path("sign-up"), // Replace 5 with the parent page ID
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
