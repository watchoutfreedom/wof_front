<?php
/*
Template Name: Signup
*/

if ( is_user_logged_in() )
    wp_redirect(home_url());


acf_form_head();

get_header();?>
<div class="home home--login">
<div class="wrap wrap--signup">
<h2>Créate una cuenta gratis</h2>
<p class="description">Crear una cuenta es muy fácil y podrás publicar y contestar en nuestos debates</p>
    <?php 
    
    if (isset($_GET['guest_key'])) {
        $guest_key = sanitize_text_field($_GET['guest_key']);
        $redirect = get_transient($guest_key);
    }
    else
        $redirect = home_url();
    
    
    acf_form([
            'id' => 'register_new_user',
            'field_groups' => [ 283 ],
            'honeypot' => true,
            'post_id'      => 'new_user',
            'return' => $redirect,
            'updated_message' => __("Solicitud registrada. Confirma la suscripción en tu email", 'acf'),
            'submit_value' => __("UNIRME", 'acf')]);
    ?>
</div>
    </div>

<?php wp_footer(); ?>