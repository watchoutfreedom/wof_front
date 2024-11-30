<?php
/*
Template Name: Signup
*/

if ( is_user_logged_in() )
    wp_redirect(home_url());


acf_form_head();

get_header();?>

<div class="wrap wrap--signup">

    <?php 
    
    if (get_transient('originalRegisterRefererURL') ){
        $redirect = home_url()."/create-post/?action=create&id=".url_to_postid(get_transient('originalRegisterRefererURL'));
        delete_transient('originalRegisterRefererURL');
    }
    else
        $redirect = home_url();
    
    
    acf_form([
            echo '
            <div class="home">
            ';
            'id' => 'register_new_user',
            'field_groups' => [ 283 ],
            'honeypot' => true,
            'post_id'      => 'new_user',
            'return' => $redirect,
            'updated_message' => __("Solicitud registrada. Confirma la suscripción en tu email", 'acf'),
            'submit_value' => __("UNIRME", 'acf')]);
            echo '
            </div>
            ';
    ?>
</div>

<?php wp_footer(); ?>