<div class="meta">
  <div class="meta__author">
    <?php echo get_avatar( get_the_author_meta('email'), '42' ); ?> 
    <div class="meta__content">
      <?php the_author_posts_link(); ?>

      <?php
      $organization_name = get_field('organization');
      $organization_link = get_field('organization_link');

      if ($organization_name && $organization_link): ?>
        <p>
          <a href="<?php echo esc_url($organization_link); ?>" target="_blank">
            <?php echo esc_html($organization_name); ?>
          </a>
        </p>
      <?php 
      elseif ($organization_name): ?>
        <p><?php echo esc_html($organization_name); ?></p>
      <?php endif; ?>
    </div>
  </div>
  <div class="meta__date">
    <?php the_time('d F Y'); ?>
  </div>
</div>