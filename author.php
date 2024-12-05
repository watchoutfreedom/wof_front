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

      <?php 
        // Retrieve and display co-authors
        $co_authors = get_field('field_6751787c6ee27', get_the_ID()); // Use the field key
        if (!empty($co_authors) && is_array($co_authors)): ?>
          <span class="meta__coauthors">Co-authors: 
            <?php 
            $co_authors_list = array_map(function($co_author_id) {
                $user_info = get_userdata($co_author_id);
                return $user_info ? esc_html($user_info->display_name) : null;
            }, $co_authors);
            
            echo implode(', ', array_filter($co_authors_list)); 
            ?>
          </span>
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

