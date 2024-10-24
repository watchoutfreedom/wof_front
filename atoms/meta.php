<div class="meta">
  <div class="meta__author">
    <?php echo get_avatar( get_the_author_meta('email'), '42' ); ?> 
    <div class="meta__content">
      <?php the_author_posts_link(); ?>

      <?php
      $author_id = get_the_author_meta('ID');

      $organization_name = get_field('Organization', 'user_' . $author_id);
      $organization_link = get_field('organization_link', 'user_' . $author_id);

      if ($organization_name && $organization_link): ?>
          <a class="meta__organization" href="<?php echo esc_url($organization_link); ?>" target="_blank">
            <?php echo esc_html($organization_name); ?>
          </a>
      <?php 
      elseif ($organization_name): ?>
        <?php echo esc_html($organization_name); ?>
      <?php endif; ?>
    </div>
  </div>
  <div class="meta__date">
    <?php the_time('d F Y'); ?>
  </div>
</div>
