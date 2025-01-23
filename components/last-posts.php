<section class="section page-sidebar section--related page-sidebar--reverse">
  <div class="page-sidebar__content">
    <h3 class="page-sidebar__title">
      Últimos artículos publicados
    </h3>


    <?php
    $current_post_id = get_the_ID();
    $the_query = new WP_Query( array(
        'showposts'   => 8,
        'post__not_in' => array( $current_post_id )
    ) );

    while ( $the_query->have_posts() ) : $the_query->the_post();
        get_template_part( 'components/article-list' );
    endwhile;

    wp_reset_postdata();
    ?>

  </div>
</section>

