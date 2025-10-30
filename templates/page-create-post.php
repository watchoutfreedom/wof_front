<?php
/**
 * Template Name: Create Post
 */

acf_form_head();
get_header(); 


if(!session_id()) {
    session_start();
}

// --- Helper: ensure ghost user exists
function get_guest_user_id() {
    $ghost_user = get_user_by('login', 'ghost');
    if (!$ghost_user) {
        $ghost_user_id = wp_create_user('ghost', wp_generate_password(), 'ghost@example.com');
        return $ghost_user_id;
    }
    return $ghost_user->ID;
}

// --- Helper: filter ACF fields
function filter_acf_fields($fields, $exclude_field_key) {
    if (!$fields || !is_array($fields)) return $fields;
    foreach ($fields as $key => $field) {
        if ($field['key'] === $exclude_field_key) {
            unset($fields[$key]);
        }
    }
    return $fields;
}

$exclude_field_key = 'field_6751787c6ee27'; // Co-author field key
$post_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$action = isset($_GET['action']) ? $_GET['action'] : 'create';
$post = $post_id ? get_post($post_id) : null;

// --- Determine author
$current_user_id = get_current_user_id();
if ($current_user_id) {
    $author_id = $current_user_id;
} else {
    $author_id = get_guest_user_id();
}

// --- Security: editing permissions
if ($action === 'edit') {
    if (!$post || ($current_user_id !== $post->post_author && !current_user_can('edit_others_posts'))) {
        wp_redirect(home_url());
        exit;
    }
}

// --- Redirect if user tries to create duplicate
if ($action === 'create' && $post && $current_user_id === $post->post_author) {
    wp_redirect(get_permalink($post_id));
    exit;
}

// --- Determine post status
$status = 'pending';
if (!is_user_logged_in()) {
    $status = 'draft';
} elseif ($current_user_id === $post->post_author || in_array('administrator', wp_get_current_user()->roles) || in_array('author', wp_get_current_user()->roles)) {
    $status = 'publish';
}

// --- Get fields and filter
$fields = $action === 'edit' && $post ? acf_get_fields($post_id) : acf_get_fields('new_post');
$filtered_fields = filter_acf_fields($fields, $exclude_field_key);
$field_keys = wp_list_pluck($filtered_fields, 'key');

?>

<div class="wrap wrap--createpost">

<?php
if ($action === 'edit' && $post) {
    acf_form(array(
        'post_id'       => $post_id,
        'post_title'    => true,
        'post_content'  => false,
        'fields'        => $field_keys,
        'post_category' => array(28),
        'return'        => '%post_url%',
        'submit_value'  => __("Publicar", 'acf'),
    ));
} else { 
    if ($action === 'create' && $post) {
        echo "<div class='excerp excerp--response'>Responder a <a class='answer__to' href='" . get_permalink($post_id) . "'>" . get_the_title($post_id) . "</a></div>";
    }

    $return_url = is_user_logged_in() ? '%post_url%' : wp_login_url()."?draft=%post_url%";

    acf_form(array(
        'post_id'       => 'new_post',
        'post_title'    => true,
        'post_content'  => false,
        'fields'        => $field_keys,
        'return'        =>  $return_url,
        'submit_value'  => __("Publicar", 'acf'),
        'new_post'      => array(
            'post_type'     => 'post',
            'post_category' => array(28),
            'post_status'   => $status,
            'post_author'   => $author_id,
        ),
    ));
}
?>

</div>

<script>
jQuery("form").submit(function(e) {
    if (typeof tinymce !== 'undefined' && tinymce.activeEditor) {
        if (tinymce.activeEditor.getContent({format: 'text'}).length < 500) {
            e.preventDefault();
            e.stopPropagation();
            alert("Respuesta no tiene un mínimo 500 caracteres");
        }
    }
});
</script>

<?php get_footer(); ?>
