<div class="meta">
  <div class="meta__author">
    <?php echo get_avatar( get_the_author_meta('email'), '42' ); ?> 
    <div class="meta__content">
      <div class="meta__name-link"><?php the_author_link(); ?></div>
      <p><?php the_author_description(); ?></p>

      <?php
      // Check if the 'Donar' field is not empty
      $donar_link = get_field('field_6534082571f05');
      if ($donar_link): ?>
        <a href="<?php echo esc_url($donar_link); ?>">Donar</a>
      <?php endif; ?>

      <a href="<?php the_field('field_670f89bf1a40f'); ?>"><?php the_field('field_670f89bf1a40f'); ?></a>
    </div>
  </div>
</div>
