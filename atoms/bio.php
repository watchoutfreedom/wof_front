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
      // Try to fetch the 'donar' field by name
      $donar_link = get_field('donations_link'); // Use the exact field name from ACF

      // Debugging output
      echo '<pre>';
      echo 'Field Name: donar<br>';
      echo 'Field Value: ';
      var_dump($donar_link); // Check what value is retrieved
      echo '</pre>';

      // Conditional check to display link if not empty
      if ($donar_link): ?>
          <a href="<?php echo esc_url($donar_link); ?>">Donar</a>
      <?php else: ?>
          <p>No Donar Link available.</p> <!-- Temporary message to indicate when the link is empty -->
      <?php endif; ?>



    </div>
  </div>
</div>
