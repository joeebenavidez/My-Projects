<?php

  $receiving_email_address = 'info@jbit.com.ar';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/validate.js' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form; 
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  
  $contact->smtp = array(
    'host' => 'smtp.jbit.com',
    'username' => 'info@jbit.com',
    'password' => 'Glock-123', 
    'port' => '587'
  );

/*
  smtp.jbit.com
  587
  info@jbit.com
  el pass es del email o del server ftp?
  el pass del mail, listo ya lo puse
  */

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
?>
