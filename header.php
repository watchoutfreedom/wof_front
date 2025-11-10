<?php get_template_part('components/head'); ?>

<?php
// Conditionally add the CSS for the secondary logo div
if ( is_category('helpbuttons') ) {
  echo "
  <style>
    .header__secondary-logo-bg {
      /* DEFINE THE SIZE - This is crucial for a div with only a background */
      width: 80px;  /* <-- Adjust width as needed */
      height: 40px; /* <-- Adjust height as needed */

      /* SPACING */
      margin-left: 20px; /* Space between the main logo and this one */

      /* BACKGROUND IMAGE STYLING */
      background-image: url('https://wofreedom.org/wp-content/uploads/sites/8/2025/11/bitmap_Página-1-16.19.22.png');
      background-size: contain;
      background-repeat: no-repeat;
      background-position: center;
    }
    
    /* This makes sure all items in the header stay vertically aligned */
    .header__wrap {
      display: flex;
      align-items: center;
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

    <?php
    // If it's the 'helpbuttons' category page, print the empty div that our CSS will style
    if ( is_category('helpbuttons') ) {
      echo '<div class="header__secondary-logo-bg" role="img" aria-label="Help Buttons Section Logo"></div>';
    }
    ?>

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