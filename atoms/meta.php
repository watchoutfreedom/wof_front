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

// Debug: Output co-authors to the browser console
if (!empty($co_authors)) {
    echo "<script>console.log('Co-authors found: " . json_encode($co_authors) . "');</script>";
} else {
    echo "<script>console.log('No co-authors found');</script>";
}

if (!empty($co_authors) && is_array($co_authors)): ?>
  <span class="meta__coauthors">Co-authors: 
    <?php 
    $co_authors_list = array_map(function($co_author_data) {
        // Ensure we extract the user ID correctly
        $co_author_id = is_array($co_author_data) ? $co_author_data['ID'] : $co_author_data;

        // Debug: Output current co-author ID
        echo "<script>console.log('Processing co-author ID: " . json_encode($co_author_id) . "');</script>";

        $user_info = get_user_by('id', $co_author_id); // Fetch user data by ID

        if ($user_info) {
            // Debug: Output retrieved user info
            echo "<script>console.log('User info retrieved: " . json_encode($user_info) . "');</script>";

            // Check for display_name
            if (!empty($user_info->display_name)) {
                // Debug: Display name found
                echo "<script>console.log('Display name: " . esc_js($user_info->display_name) . "');</script>";
                return esc_html($user_info->display_name);
            } elseif (!empty($user_info->first_name) || !empty($user_info->last_name)) {
                // Debug: First and/or last name found
                $name = trim($user_info->first_name . ' ' . $user_info->last_name);
                echo "<script>console.log('First/Last name: " . esc_js($name) . "');</script>";
                return esc_html($name);
            } else {
                // Debug: Fallback to user login
                echo "<script>console.log('Using user login: " . esc_js($user_info->user_login) . "');</script>";
                return esc_html($user_info->user_login);
            }
        } else {
            // Debug: User info not found
            echo "<script>console.log('User info not found for ID: " . json_encode($co_author_id) . "');</script>";
        }
        return null;
    }, $co_authors);
    
    // Debug: Final co-authors list
    echo "<script>console.log('Final co-authors list: " . json_encode($co_authors_list) . "');</script>";

    echo implode(', ', array_filter($co_authors_list)); // Display the co-authors list as a comma-separated string
    ?>
  </span>
<?php else: ?>
  <?php 
  // Debug: No co-authors to display
  echo "<script>console.log('No co-authors to display');</script>"; 
  ?>
<?php endif; ?>




    </div>
  </div>
  <div class="meta__date">
    <?php the_time('d F Y'); ?>
  </div>
</div>

