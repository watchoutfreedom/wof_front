<div class="meta">
  <div class="meta__author">
    <?php echo get_avatar( get_the_author_meta('email'), '42' ); ?> 
    <div class="meta__content">
      <?php the_author_posts_link(); ?>

      <?php
      $author_id = get_the_author_meta('ID');

      // Fetch organization name and link
      $organization_name = get_field('Organization', 'user_' . $author_id);
      $organization_link = get_field('organization_link', 'user_' . $author_id);

      // Display organization information
      if ($organization_name && $organization_link): ?>
          <a class="meta__organization" href="<?php echo esc_url($organization_link); ?>" target="_blank">
            <?php echo esc_html($organization_name); ?>
          </a>
      <?php 
      elseif ($organization_name): ?>
        <?php echo esc_html($organization_name); ?>
      <?php endif; ?>
      <?php
// Fetch and display co-authors
$co_authors = get_field('field_6751787c6ee27', get_the_ID()); // Use the field key

// Debug: Print the $co_authors array
echo '<pre>';
print_r($co_authors);
echo '</pre>';

if (!empty($co_authors) && is_array($co_authors)): ?>
  <span class="meta__coauthors">Co-authors: 
    <?php 
    $co_authors_list = array_map(function($co_author_id) {
        $user_info = get_userdata($co_author_id);

        // Debug: Print $user_info for each co-author ID
        echo '<pre>';
        print_r($user_info);
        echo '</pre>';

        if ($user_info) {
            // Debug: Print the raw display_name
            echo '<pre>Display Name: ';
            print_r($user_info->display_name);
            echo '</pre>';

            // Use display_name if available; fall back to other fields if not
            if (!empty($user_info->display_name)) {
                return esc_html($user_info->display_name); // Safely escape and return display name
            } elseif (!empty($user_info->first_name) || !empty($user_info->last_name)) {
                return esc_html(trim($user_info->first_name . ' ' . $user_info->last_name));
            } else {
                return esc_html($user_info->user_login); // Use username as the last fallback
            }
        }
        return null;
    }, $co_authors);
    
    echo implode(', ', array_filter($co_authors_list)); 
    ?>
  </span>
<?php endif; ?>


    </div>
  </div>
  <div class="meta__date">
    <?php the_time('d F Y'); ?>
  </div>
</div>

