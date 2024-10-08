<?php

// Disable comments js
function clean_header(){
}
add_action('init','clean_header');

foreach (glob( get_template_directory() . "/functions/*.php") as $filename) {
  include $filename;
}

add_theme_support( 'infinite-scroll', array(
    'type'           => 'scroll',
    'footer_widgets' => false,
    'container'      => 'feeder',
    'wrapper'        => false,
    'posts_per_page' => 4,
    'footer' => false,
    'render'         => 'news_infinite_scroll_render'
) );

function news_infinite_scroll_render() {
    get_template_part( 'template-parts/news-posts-list', get_post_format() 
);
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
// add_filter('use_block_editor_for_post', '__return_false', 10);


function register_user($post_id,$form){

	// Check that we are targeting the right form. I do this by checking the acf_form ID.
	  if ( ! isset( $form['id'] ) || 'register_new_user' != $form['id'] ) {
		  return $post_id;
	  }
  
	// Create an empty array to add user field data into
	  $user_fields = array();
  
		// Check for the fields we need in our postdata, and add them to the $user_fields array if they exist
	  if ( isset( $_POST['acf']['field_6382c10939765'] ) ) {
		  $user_fields['first_name'] = sanitize_text_field( $_POST['acf']['field_6382c10939765']);
	  }
  
	  if ( isset( $_POST['acf']['field_6382c14839766'] ) ) {
		  $user_fields['user_login'] = sanitize_user( $_POST['acf']['field_6382c14839766'] );
	  }
  
	  if ( isset( $_POST['acf']['field_6382c14839766'] ) ) {
		  $user_fields['user_email'] = sanitize_email( $_POST['acf']['field_6382c14839766']);
	  }
  
	  if ( isset( $_POST['acf']['field_6382c1b639768'] ) ) {
		  $user_fields['user_pass'] = $_POST['acf']['field_6382c1b639768'];
	  }
  
	  if ( isset( $_POST['acf']['field_6382c10939765'], $_POST['acf']['field_599c480e8c0aa'] ) ) {
		  $user_fields['display_name'] = sanitize_text_field( $_POST['acf']['field_6382c10939765']);
	  }
	$user_fields['role'] = "contributor";
	$user_id = wp_insert_user( $user_fields );
  
  
	if ( is_wp_error( $user_id ) ) {
		  wp_die( $user_id->get_error_message() );
	  } else {
  
	  // update phone and skills
	  update_field('field_6382d30135418',$_POST['acf']['field_6382c15c39767'],'user_'.$user_id);
	  update_field('field_6382d31035419',$_POST['acf']['field_6382c25fbc87b'],'user_'.$user_id);
  
	  wp_new_user_notification($user_id);
  
  
	  //auto login user
	  wp_set_current_user( $user_id, $user_fields['user_email'] );
	  wp_set_auth_cookie( $user_id );
	  do_action( 'wp_login', $user_fields['user_email'], get_user_by('id',$user_id) );
  
  
		  // Set the 'post_id' to the newly created user_id, including the 'user_' ACF uses to target a user
		  return 'user_' . $user_id;
		}
	}
  add_filter('acf/pre_save_post','register_user', 10, 2);


  function my_acf_validate_email( $valid, $value, $field, $input_name ) {

    // Bail early if value is already invalid.
    if( $valid !== true )
        return $valid;

    if ( email_exists( $value ) ) { return 'Email already exists.'; }
    
    return $valid;
}
add_filter('acf/validate_value/key=field_6382c14839766', 'my_acf_validate_email', 10, 4);

function my_acf_validate_password( $valid, $value, $field, $input_name ) {

  // Bail early if value is already invalid.
  if( $valid !== true )
      return $valid;
  if ( $value != $_POST['acf']['field_6382c1d439769']) { return 'Passwords don\'t match.'; }
  
  return $valid;
}
add_filter('acf/validate_value/key=field_6382c1b639768', 'my_acf_validate_password', 10, 4);


function change_role_name() {
	global $wp_roles;
  
	if ( ! isset( $wp_roles ) )
		$wp_roles = new WP_Roles();
  
	$wp_roles->roles['contributor']['name'] = 'Conversador';
	$wp_roles->role_names['contributor'] = 'Conversador';           
  }
  add_action('init', 'change_role_name');

// disable email verification  
  add_filter( 'admin_email_check_interval', '__return_false' );


  add_filter( 'login_url', function( $login_url){
	// Change here your login page url
	$login_url = home_url('/login');
	return $login_url;
  }, 10, 3);
  
  add_action('wp_login_failed', '_login_failed_redirect');
  
  function _login_failed_redirect( $username ){
  
	$user = get_user_by('login', $username );
  
	if(!$user){
	  //Username incorrect
	  wp_redirect(home_url('/login') .'?login_error=1');
  
	}else{
	 //Username Password combination incorrect
	  wp_redirect(home_url('/login') .'?login_error=2');
	}
  
  }

?>


