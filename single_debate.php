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
              <div class="single-thumb">
                <?php the_post_thumbnail('fotogrande'); ?></div>
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
                <?php if(get_post_status($post->ID) == 'pending'){ ?>
              <div class="pending single-default__intro">
              Gracias por mandar tu respuesta. La publicaremos cuando un autor la revise.
              </div>
              <?php } ?> 
              </div>
              
          </div>
          <div class="single-default__meta">
            <?php get_template_part('atoms/meta'); ?>
          </div>
          
            <div class="main single-default__main">
              <div class="answer_to"><?php if($answer_to = get_field('answer_to')) echo " Este artículo es una respuesta a la publicación <a class='answer__to' href=".get_permalink($answer_to).">".get_the_title($answer_to)."</a>";?></div>
              <?php the_field('field_63752e3ee91da'); ?>
              <?php the_content("Sigue leyendo"); ?>
              <?php get_template_part('atoms/biblio'); ?>

            </div>

                
            <div class="single-default__meta">
              <?php get_template_part('atoms/bio'); ?>
            </div>

            <div class="meta">
              <div class="meta__valorate">
              <?php if(function_exists('the_ratings')) { ?>


                <div id="post-ratings-1425" class="post-ratings" itemscope="" itemtype="https://schema.org/Article" data-nonce="6660c12267"><img id="rating_1425_1" src="https://wofreedom.org/wp-content/plugins/wp-postratings/images/stars_flat_png/rating_off.gif" alt="He aprendido" title="He aprendido" onmouseover="current_rating(1425, 1, 'He aprendido');" onmouseout="ratings_off(0, 0, 0);" onclick="rate_post();" onkeypress="rate_post();" style="cursor: pointer; border: 0px;"><img id="rating_1425_2" src="https://wofreedom.org/wp-content/plugins/wp-postratings/images/stars_flat_png/rating_off.gif" alt="Indiferente" title="Indiferente" onmouseover="current_rating(1425, 2, 'Indiferente');" onmouseout="ratings_off(0, 0, 0);" onclick="rate_post();" onkeypress="rate_post();" style="cursor: pointer; border: 0px;"><img id="rating_1425_3" src="https://wofreedom.org/wp-content/plugins/wp-postratings/images/stars_flat_png/rating_off.gif" alt="Está equivocado" title="Está equivocado" onmouseover="current_rating(1425, 3, 'Está equivocado');" onmouseout="ratings_off(0, 0, 0);" onclick="rate_post();" onkeypress="rate_post();" style="cursor: pointer; border: 0px;"> (<strong>1</strong> votes, average: <strong>0.00</strong> out of 3)<br><span class="post-ratings-text" id="ratings_1425_text" style="display: none;"></span><meta itemprop="name" content="Un apunte sobre la neutralidad de Bitcoin (I): “Sea el sistema político que te guste o no”"><meta itemprop="headline" content="Un apunte sobre la neutralidad de Bitcoin (I): “Sea el sistema político que te guste o no”"><meta itemprop="description" content="




¿está bitcoin perdiendo el principio de neutralidad?




"><meta itemprop="datePublished" content="2024-10-12T11:50:41+00:00"><meta itemprop="dateModified" content="2024-10-16T10:07:13+00:00"><meta itemprop="url" content="https://wofreedom.org/blog/2024/10/12/un-apunte-sobre-la-neutralidad-de-bitcoin-i-sea-el-sistema-politico-que-te-guste-o-no/"><meta itemprop="author" content="Teo"><meta itemprop="mainEntityOfPage" content="https://wofreedom.org/blog/2024/10/12/un-apunte-sobre-la-neutralidad-de-bitcoin-i-sea-el-sistema-politico-que-te-guste-o-no/"><div style="display: none;" itemprop="image" itemscope="" itemtype="https://schema.org/ImageObject"><meta itemprop="url" content="https://wofreedom.org/wp-content/uploads/sites/8/2024/10/07a2a53b-844f-480a-b4a0-1611b3bf66b8-1-120x120.jpg"><meta itemprop="width" content="120"><meta itemprop="height" content="120"></div><div style="display: none;" itemprop="publisher" itemscope="" itemtype="https://schema.org/Organization"><meta itemprop="name" content="Watch Out, Freedom!"><meta itemprop="url" content="https://wofreedom.org"><div itemprop="logo" itemscope="" itemtype="https://schema.org/ImageObject"><meta itemprop="url" content="https://wofreedom.org/wp-content/uploads/sites/8/2023/02/wof_logo_2021-07_cut_jpg.jpg"></div></div></div>

               <?php} ?>
              <a id="rating_1425_1" href="#" onkeypress="rate_post();" onclick="rate_post();"><span>👍</span> He aprendido</a>
              <a id="rating_1425_2" href="#"><span>😐</span> Indiferente</a>
              <a id="rating_1425_3" href="#"><span>👎</span> Está equivocado</a>            
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
            </div>
              
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

      <?php endwhile; else: ?>
        <?php include (TEMPLATEPATH . '/404.php'); ?>
      <?php endif; ?>
    </article>
 
  </main>
  <?php get_template_part('components/colabora'); ?>

  <?php get_template_part('components/list-debate'); ?>
  </div>

<?php get_footer(); ?>
