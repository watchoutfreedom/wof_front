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
        <p class="description">Crear una cuenta es muy fácil y podrás publicar y contestar en nuestros debates</p>
        <?php 
        
        if (get_transient('originalRegisterRefererURL') ){
            $redirect = home_url()."/create-post/?action=create&id=".url_to_postid(get_transient('originalRegisterRefererURL'));
            delete_transient('originalRegisterRefererURL');
        }
        else
            $redirect = home_url();
        
        ?>
        
        <form id="register_new_user_form" method="post" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>">
            <?php 
            acf_form([
                'id' => 'register_new_user',
                'field_groups' => [ 283 ],
                'honeypot' => true,
                'post_id'      => 'new_user',
                'return' => $redirect,
                'updated_message' => __("Solicitud registrada. Confirma la suscripción en tu email", 'acf'),
                'submit_value' => __("UNIRME", 'acf')]);
            ?>
            
            <!-- Add consent checkbox -->
            <div class="form-consent">
                <label for="user_consent">
                    <input type="checkbox" id="user_consent" name="user_consent" required>
                    He leído y acepto los <a href="https://uc7e611b4a857fefcf0a28ffcf3f.dl.dropboxusercontent.com/cd/0/inline2/CfuTMqf1cr0eCHUpwnwaJ-22ZYBRnCo8cA6ngj2pazQlapPlF06W5HPp5N0AIcwevo3dlkg2Zd0AaqL3Bmmj0Nb-iOZtcKAeq7HHdcsQqzBXtbChnFC-fh7DtSHWT7FF658za3JMI7-tMW_g0PUay6N4RS1PSBUcJcL3W5wjdwwIOwzECufd-AA9doYA2M7TrDqxa_UommAw6inf7PdccYZ95EjuWYMPfB6fKTWxXVkCswzLFMNhrpHH6DdiXiJFqdoPFd2Yjx3Z4vmjrZ7lt5esd93fYkR3uyy06EyMdYQwNQOue9Vh8QG33eyZbqH_YaomgwqQ4FYrNJf6rsjG2WY8NVEjGAUNP3w4NgVZCiNJCXz6nHUGSDXi6VZr01Dsrao/file" target="_blank">términos de privacidad</a>.
                </label>
            </div>
            
            <!-- Submit button -->
            <div class="form-submit">
                <button type="submit" name="submit" class="btn btn-primary">UNIRME</button>
            </div>
        </form>
    </div>
</div>

<?php wp_footer(); ?>
