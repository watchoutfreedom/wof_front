<div class="wrap">
    <div class="wrap__box wrap__box--shop">
      <h3 class="wrap__title">Más productos</h3>

      

    <?php
  $current_post_id = get_the_ID();
  $the_query = new WP_Query( array(
      'showposts'   => 4,
      'post__not_in' => array( $current_post_id ),
      'category_name' => 'tienda' 
  ) );

  while ( $the_query->have_posts() ) : $the_query->the_post();
      get_template_part( 'components/article-list' );
  endwhile;

  wp_reset_postdata();
  ?>

    </div>
  </div>
</div>