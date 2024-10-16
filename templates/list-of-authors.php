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

$users = get_users();
foreach ($users as $user) 
{
   echo $user->ID;
   echo $user->display_name;
   the_author_image($user->ID);
   echo $user->description;
}

?>

</div>

<?php get_footer(); ?>
