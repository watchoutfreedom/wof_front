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

// Enable user registration
function enable_registration() {
	return true; // false for disable
}
add_filter('registration_errors', 'enable_registration');
add_filter('wp_signup_location', 'enable_registration');

function populate_answer_to($field) {
	// only on front end
	if (is_admin()) {
	  return $field;
	}
	if (isset($_GET['id']) && $_GET['action'] == 'create') {
	  $field['value'] = $_GET['id'];
	}
	return $field;
  }
  
  add_filter('acf/prepare_field/key=field_6375339e513ad', 'populate_answer_to');
// disable gutenberg editor
add_filter('use_block_editor_for_post', '__return_false', 10);



?>


