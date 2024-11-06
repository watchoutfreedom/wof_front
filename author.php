<?php
/*
Template Name: debate
*/
get_header();
?>

<div class="wrap">  
  <div class="meta__author">
    <?php echo get_avatar( get_the_author_meta('email'), '42' ); ?> 
    <div class="meta__content">
      <?php the_author_posts_link(); ?>

      <?php 
        $organization_name = get_field('Organization', 'user_' . get_the_author_meta('ID'));
        $organization_link = get_field('organization_link', 'user_' . get_the_author_meta('ID'));
        
        if ($organization_name && $organization_link): ?>
            <a href="<?php echo esc_url($organization_link); ?>" target="_blank"><?php echo esc_html($organization_name); ?></a>
      <?php endif; ?>
    </div>
  </div>
</div>

<div class="wrap">
  <div class="wrap__box wrap__box--debate">
  <?php echo do_shortcode('[ajax_load_more id="8488605913" loading_style="infinite ring" author="'.get_the_author_ID().'" post_type="post" posts_per_page="8" category="debate" transition_container_classes="wrap__box--debate"]')?>
  </div>
</div>


<?php get_template_part('components/colabora'); ?>

<?php get_footer(); ?>

