<div class="meta">
  <div class="meta__author">
    <?php echo get_avatar( get_the_author_meta('email'), '42' ); ?> 
    <div class="meta__content">
      <div class="meta__name-link"><?php the_author_link(); ?> 
        <?php 
          $organization_name = get_field('Organization', 'user_' . get_the_author_meta('ID'));
          $organization_link = get_field('organization_link', 'user_' . get_the_author_meta('ID'));
          
          if ($organization_name && $organization_link): ?>
             - <a href="<?php echo esc_url($organization_link); ?>" target="_blank"><?php echo esc_html($organization_name); ?></a>
        <?php endif; ?>
     </div>
      <p><?php the_author_description(); ?></p>


      <?php
// Attempt to fetch the 'donations_link' field via ACF
$donar_link = get_field('donations_link');

// Debugging output for ACF result
echo '<pre>';
echo 'Using get_field("donations_link"):<br>';
var_dump($donar_link);
echo '</pre>';

// If ACF returns null, try getting the field with get_post_meta as a fallback
if (!$donar_link) {
    $donar_link = get_post_meta(get_the_ID(), 'donations_link', true); // Fetch directly from post meta
    
    // Debugging output for get_post_meta result
    echo '<pre>';
    echo 'Using get_post_meta("donations_link"):<br>';
    var_dump($donar_link);
    echo '</pre>';
}

// Conditional check to display link if not empty
if ($donar_link): ?>
    <a href="<?php echo esc_url($donar_link); ?>">Donar</a>
<?php else: ?>
    <p>No Donar Link available.</p> <!-- Message to show if the field is empty -->
<?php endif; ?>



    </div>
  </div>
</div>
