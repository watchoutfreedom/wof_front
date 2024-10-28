<?php
/*
Template Name: Php info
*/

if ( function_exists( 'mail' ) )
{
    echo 'mail() is available';
}
else
{
    echo 'mail() has been disabled';
}

$email = "brunoxpalma@gmail.com";
$subject =  "Email Test";
$message = "this is a mail testing email function on server";


$sendMail = mail($email, $subject, $message);
if($sendMail)
{
echo "Email Sent Successfully";
}
else

{
echo "Mail Failed";
}



    if (current_user_can('manage_options')) {
      phpinfo();

      
    } else {
      wp_redirect(home_url());
    }

    ?>
    