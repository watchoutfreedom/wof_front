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
 $authors = get_users([
  'fields'  => ['ID', 'display_name'],
  'role'    => 'author',
  'orderby' => 'display_name',
]); ?>

</div>

<?php get_footer(); ?>
