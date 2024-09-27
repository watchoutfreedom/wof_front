<?php get_template_part('components/head'); ?>

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
      <a href="/colabora">Colabora con WOF</a>
    </div>
  </div>
</header>
