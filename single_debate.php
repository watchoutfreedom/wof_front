<?php get_template_part('components/head'); ?>

<div class="debate">
  <main id="post">
    <article class="single-default">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="single-default__content">
          <div class="single-hero">
            <header class="header">
                <div class="header__wrap">
                  <div class="header__logo">
                    <a href="<?php bloginfo('url'); ?>" class="header__logo-link">
                      WOF
                    </a>
                  </div>
                  <div class="header__btn">
                    <a href="/colabora">Colabora con WOF</a>
                  </div>
                </div>
              </header>
              <div class="single-thumb"><?php the_post_thumbnail('fotogrande'); ?></div>
              <div class="single-default__presentation">
                <div class="single-default__category">
                  <?php get_template_part('atoms/category-link'); ?>
                </div>
                <h1 class="single-default__title">
                  <?php the_title(); ?>
                </h1>
                <div class="single-default__intro">
                  <?php the_field('field_6375315c72e9d'); ?>
                </div>
              </div>
          </div>
          <div class="single-default__meta">
            <?php get_template_part('atoms/meta'); ?>
          </div>
          
            <div class="main single-default__main">
            <div class="answer_to"><?php if($answer_to = get_field('answer_to')) echo " Este artículo es una respuesta a la publicación <a class='answer__to' href=".get_permalink($answer_to).">".get_the_title($answer_to)."</a>";?></div>
            <?php the_field('field_63752e3ee91da'); ?>
            <?php the_content("Sigue leyendo"); ?>
            
            <h4 class="meta__title">Valorar artículo</h4>
            <div class="meta__valorate">
              <a href="#">👍 He aprendido</a>
              <a href="#">😐 Indiferente</a>
              <a href="#">👎 Está equivocado</a>            
            </div>

            <?php 
              if(wp_get_current_user()->ID == $post->post_author 
              //|| current_user_can( 'edit_others_posts', $post->ID)
              ){
                  echo "<a class='button' href='/create-post?action=edit&id=".$post->ID."'>EDITAR</a>";
              }
              else{
                  echo "<a class='button debate__button' href='/create-post?action=create&id=".$post->ID."'>RESPONDER</a>";
              }
            ?>
            
              
             <div class="answers">
            <?php     
              $posts = get_posts(array(
                  'numberposts'   => -1,
                  'post_type'     => 'post',
                  'meta_key'      => 'answer_to',
                  'meta_value'    => get_the_ID()
              ));

              if(!empty($posts)):?>


              <section class="answers">
                  <h2>Respuestas</h2>
                  <ul>
                  <?php
                      foreach($posts as $post){
                          echo "<li><span><a href='".get_permalink($post->ID)."'>".$post->post_title."</a> por ".get_the_author_meta('display_name', $post->post_author )."</span></li>";
                      }?>
                  </ul>
              </section>
            <?php endif; ?>
            </div>
        </div>

      <div class="single-default__meta">
        <?php get_template_part('atoms/bio'); ?>
      </div>

      <?php endwhile; else: ?>
        <?php include (TEMPLATEPATH . '/404.php'); ?>
      <?php endif; ?>
    </article>
 
  </main>
  <?php get_template_part('components/colabora'); ?>

  <?php get_template_part('components/list-debate'); ?>
  </div>

<?php get_footer(); ?>
