<article class="article-list">
  <div class="article-list__thumb">
    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="article-list__link">
      <picture class="article-list__picture picture">
        <?php the_post_thumbnail('large', array( 'class' => 'no-lazy' )); ?>
      </picture>
    </a>
  </div>
  <div class="article-list__content">
    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="article-list__link">
      <div class="article-list__date"> <?php the_time('d F Y'); ?></div>
    </a>
      <div class="article-list__responses">
      <?php 
        $posts = get_posts(array(
            'numberposts'   => -1,
            'post_type'     => 'post',
            'meta_key'      => 'answer_to',
            'meta_value'    => get_the_ID(),
        ));

        if (!empty($posts)) {
            echo count($posts) . " respuestas";
        }

        $answer_to = get_field('answer_to');

        if ($answer_to) {
            $answer_to_permalink = get_permalink($answer_to);
            $answer_to_title = get_the_title($answer_to);

            //if ($answer_to_permalink && $answer_to_title) {
            //    echo " Respuesta a <a class='answer__to' href='" . esc_url($answer_to_permalink) . "'>" . esc_html($answer_to_title) . "</a>";
            //}
        }
        ?>
      </div>
      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="article-list__link">
        <h3 class="article-list__title">
          <span><?php the_title(); ?></span>
        </h3>
        <div class="article-list__excerpt">
          <?php echo excerpt(30); ?>
      </a>
      <div class="article-list__author"><?php the_author_posts_link(); ?></div>

  </div>
</article>