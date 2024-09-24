<?php

// Disable comments js
function clean_header(){
}
add_action('init','clean_header');


foreach (glob( get_template_directory() . "/functions/*.php") as $filename) {
  include $filename;
}

function validate_gravatar($email) {
	// Craft a potential url and test its headers
	$hash = md5(strtolower(trim($email)));
	$uri = 'http://www.gravatar.com/avatar/' . $hash . '?d=404';
	$headers = @get_headers($uri);
	if (!preg_match("|200|", $headers[0])) {
		$has_valid_avatar = FALSE;
	} else {
		$has_valid_avatar = TRUE;
	}
	return $has_valid_avatar;
}

function move_acf_metabox_to_sidebar() {
    // Get the ACF field group
    $acf_field_group_id = '6377e402074f0'; // Replace with the actual field group ID

    // Remove ACF box from normal editor area
    remove_meta_box("acf-group_{$acf_field_group_id}", 'post', 'normal');

    // Add ACF box to the sidebar
    add_meta_box(
        "acf-group_{$acf_field_group_id}",
        __('Custom Fields', 'acf'),
        'acf_render_meta_box',
        'post',
        'side', // Move to the sidebar
        'high'
    );
}
add_action('add_meta_boxes', 'move_acf_metabox_to_sidebar', 20);

// Enable user registration
function enable_registration() {
	return true; // false for disable
}
add_filter('registration_errors', 'enable_registration');
add_filter('wp_signup_location', 'enable_registration');

?>
