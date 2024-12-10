<?php
/**
* Template Name: Custom Login Page
*/
?>


<?php
if ( is_user_logged_in() ) {
    wp_redirect(home_url());
    exit();

}
?>

<?php get_header(); ?>

<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel='dns-prefetch' href='//polyfill.io' />
    <link rel='dns-prefetch' href='//fonts.googleapis.com' />
	<?php wp_head(); ?>
</head>

<?php 

if ( ! is_user_logged_in() ) {

    if( isset($_GET['action']) && $_GET['action'] == 'lostpassword'){
        
        ?>
    
    <div class="home home--login">
        <div class="wrap wrap--signup wrap--login">

    <div id="password-lost-form">
    <h3><?php _e( 'Forgot Your Password?', 'personalize-login' ); ?></h3>
    <p>
        <?php _e("Enter your email address and we'll send you a link you can use to pick a new password.",'personalize_login');?>
    </p>

    <form id="lostpasswordform" action="/login/?action=lostpassword" method="post">
        <input type="text" name="user_login" id="user_login" placeholder="Email">
        <br>
        <input type="submit" name="submit" class="button" value="<?php _e( 'Reset Password', 'personalize-login' ); ?>"/>
    </form>

    <?php if($error) echo display_error_message($error);?>

    <?php
    if($_POST['submit']) {
        $email = $_POST['user_login'];
        $user = get_user_by('email', $email);

        if($user) {
            $reset_key = wp_generate_password(12, false);
            $user_id = $user->ID;

            // Update the user with the reset key
            update_user_meta($user_id, 'reset_key', $reset_key);

            // Send the password reset email
            $subject = 'Password Reset Request';
            $body = 'Someone requested that the password be reset for the following account:<br><br>
                    Site Name: ' . get_bloginfo('name') . '<br>
                    Username: ' . $user->user_login . '<br>
                    Email: ' . $user->user_email . '<br><br>
                    To reset your password, visit the following address:<br>
                    <a href="' . site_url('/login?action=rp&key=' . $reset_key . '&login=' . $user->user_login) . '">Reset Password</a><br><br>
                    Best regards,<br>
                    ' . get_bloginfo('name') . ' Team';

            wp_mail($email, $subject, $body);

            echo '<p>Password reset email sent successfully.</p>';
        } else {
            echo '<p>User not found.</p>';
        }
    }
    ?>
    </div>
</div>
</div>

    <?php 
    
    }

    else if( isset($_GET['key']) && $_GET['action'] == 'rp'){?>

    <div class="home home--login">
        <div class="wrap wrap--signup wrap--login">
        <?php

        $key = $_GET['key'];
        $login = $_GET['login'];
    
        // Get the user by login
        $user = get_user_by( 'login', $login );
    
        // If the user exists and the key is valid, display the password reset form
        if ( $user &&  $key == get_user_meta( $user->ID, 'reset_key', true )) {
          ?>
          <form name="resetpassform" id="resetpassform" action="<?php echo site_url( '/login?action=rp' ); ?>" method="post">
            <input type="hidden" name="key" value="<?php echo $key; ?>" />
            <input type="hidden" name="login" value="<?php echo $login; ?>" />
            <label for="pass1">New password:</label>
            <input type="password" name="pass1" id="pass1" />
            <label for="pass2">Repeat new password:</label>
            <input type="password" name="pass2" id="pass2" />
            <input type="submit" name="submit" value="Reset Password" />
          </form>
          <?php
        } else {
          // Display an error message if the key is invalid or the user does not exist
          echo '<p>Invalid password reset key.</p>';
          echo get_user_meta( $user->ID, 'reset_key', true );
        }
    ?>
        </div>
    </div>
    <?php


    }
    else if ($_GET['action'] == 'rp' && isset($_POST['submit'])) {?>

<div class="home home--login">
        <div class="wrap wrap--signup wrap--login">

    <?php 
        // Retrieve the form data
        $key = $_POST['key'];
        $login = $_POST['login'];
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];
    
        // Validate the form data
        if ($pass1 !== $pass2) {
            echo '<p>Passwords do not match.</p>';
        } else {
            // Get the user by login
            $user = get_user_by('login', $login);
    
            // Check if the user exists and the key is valid
            if ($user && $key == get_user_meta($user->ID, 'reset_key', true)) {
                // Update the user's password
                wp_update_user(array('ID' => $user->ID, 'user_pass' => $pass1));
    
                // Delete the reset key
                delete_user_meta($user->ID, 'reset_key');
    
                // Display a success message
                echo '<p>Password reset successfully. Please <a href="' . site_url('/login') . '">click here to log in again</a>.</p>';

                    // Redirect to login page after 5 seconds
                    exit;

            } else {
                // Display an error message
                echo '<p>Invalid password reset key.</p>';
            }
        }

        echo "</div></div>";
    }
    else{

        if (get_transient('originalRegisterRefererURL') ){
        $redirect = home_url()."/create-post/?action=create&id=".url_to_postid(get_transient('originalRegisterRefererURL'));
        }
        else
        $redirect = home_url();


        $args = array(
            'redirect' => $redirect, // redirect to admin dashboard.
            'form_id' => 'custom_loginform',
            'label_username' => false,
            'label_password' => false,
            'label_remember' => __( 'Remember Me' ),
            'label_log_in' => __( 'Log In' ),
            'remember' => false,
            'echo' => false
        );

        $form = wp_login_form( $args );

        //add the placeholders
        $form = str_replace('name="log"', 'name="log" placeholder="Username"', $form);
        $form = str_replace('name="pwd"', 'name="pwd" placeholder="Password"', $form);
        echo '
        <div class="home home--login">
        <div class="wrap wrap--signup wrap--login">
        <h2>Accede a tu cuenta</h2>
        <p class="description">Accede a tu cuenta de wofreedom y participa en los debates</p>
        <div class="login__container">
        ';
        echo $form;
        echo "<div class='login__links'> <a class='button__links' href='/login?action=lostpassword'>Recuperar contraseña</a>";
        echo "<a class='button__links signup__links' href='/sign-up'>¿No tienes cuenta? Únete aquí!</a><br></div>";

    }

    if( isset($_GET['login_error']) ){
        echo display_error_message($_GET['login_error']);
    }

    echo '
    </div>
    </div>
    </div>
    ';
    
}




function display_error_message( $err_code ){
    // Invalid username.
    if ( $err_code  == 1 ) {
        $error = '<strong>ERROR</strong>: Invalid username.';
    }
    // Incorrect password.
    if (  $err_code == 2 ) {
        $error = '<strong>ERROR</strong>: The password you entered is incorrect.';
    }
return $error;
}
