<article class="article-list">
  <div class="article-list__thumb">
    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="article-list__link">
      <picture class="article-list__picture picture">
        <?php the_post_thumbnail('medium', array( 'class' => 'no-lazy' )); ?>
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

          echo '<pre>Posts with answer_to pointing to current post: ';
          var_dump($posts);
          echo '</pre>';

          if (!empty($posts)) {
              echo count($posts) . " respuestas";
          }

          $answer_to_exists = get_field('answer_to');
          echo '<pre>Does answer_to field exist? ';
          var_dump($answer_to_exists);
          echo '</pre>';

          if ($answer_to_exists) {
              $answer_to = get_field('answer_to'); 
              
              echo '<pre>Value of answer_to field: ';
              var_dump($answer_to);
              echo '</pre>';
              
              if ($answer_to) {
                  echo " Respuesta a <a class='answer__to' href='" . esc_url(get_permalink($answer_to)) . "'>" . esc_html(get_the_title($answer_to)) . "</a>";
              }
          }
          ?>

      </div>
      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="article-list__link">
        <h3 class="article-list__title">
          <span><?php the_title(); ?></span>
        </h3>
      </a>
      <div class="article-list__author"><?php the_author_posts_link(); ?></div>

  </div>
</article>