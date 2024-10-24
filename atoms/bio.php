<div class="meta">
  <div class="meta__author">
    <?php echo get_avatar( get_the_author_meta('email'), '42' ); ?> 
    <div class="meta__content">
      <div class="meta__name-link"><?php the_author_link(); ?> 
        <?php 
          $organization_name = get_field('Organization', 'user_' . get_the_author_meta('ID'));
          $organization_link = get_field('organization_link', 'user_' . get_the_author_meta('ID'));
          
          if ($organization_name && $organization_link): ?>
             - <a href="<?php echo esc_url($organization_link); ?>" target="_blank"><?php echo esc_html($organization_name); ?></a>
        <?php endif; ?>
     </div>
      <p><?php the_author_description(); ?></p>

      <?php
      $donar_link = get_field('field_6534082571f05');
      if ($donar_link): ?>
        <a href="<?php echo esc_url($donar_link); ?>">Donar</a>
      <?php endif; ?>

      <a href="<?php the_field('field_670f89bf1a40f'); ?>"><?php the_field('field_670f89bf1a40f'); ?></a>
    </div>
  </div>
</div>
