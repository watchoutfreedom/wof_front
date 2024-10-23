<?php
/*
Template Name: autores
*/
get_header();
?>
<div class="hero">
  <h1 class="hero__title">Lista de autores</h1>
  <div class="hero__description">Gracias a todos/as.</div>
</div>

<div class="wrap">

<?php
   $display_admins = false;
   $order_by = 'post_count'; // 'nicename', 'email', 'url', 'registered', 'display_name', or 'post_count'
   $order = 'DESC';
   $role = ''; // 'subscriber', 'contributor', 'editor', 'author' - leave blank for 'all'
   $avatar_size = 161;
   $hide_empty = false; // hides authors with zero posts
   if(!empty($display_admins)) {
      $blogusers = get_users('orderby='.$order_by.'&role='.$role);
   } else {
      $admins = get_users('role=administrator');
      $exclude = array();
      foreach($admins as $ad) {
         $exclude[] = $ad->ID;
      }
      $exclude = implode(',', $exclude);
      $blogusers = get_users('exclude='.$exclude.'&orderby='.$order_by.'&order='.$order.'&role='.$role);
   }
   $authors = array();
   foreach ($blogusers as $bloguser) {
      $user = get_userdata($bloguser->ID);
      if(!empty($hide_empty)) {
         $numposts = count_user_posts($user->ID);
         if($numposts < 1) continue;
      }
      $authors[] = (array) $user;
   }
   echo '<ul id="grid-contributors">';
   foreach($authors as $author) {
      $display_name = $author['data']->display_name;
      $avatar = get_avatar($author['ID'], $avatar_size);
      $author_profile_url = get_author_posts_url($author['ID']);
      echo '<li class="single-item">';
      echo '<div class="author-gravatar"><a href="', $author_profile_url, '">', $avatar , '</a></div>';
      echo '<div class="author-name"><a href="', $author_profile_url, '" class="contributor-link">', $display_name, '</a></div>';
      echo '</li>';
   }
   echo '</ul>';
?>

</div>

<?php get_footer(); ?>
