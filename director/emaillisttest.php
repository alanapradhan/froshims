#!/usr/bin/php -q
<?

$to      = 'alana.cool@gmail.com';
$subject = '[FROSHIMS] Your CronTab has Been Scheduled';
$message = 'Dear Alana Your CronTab application is working';
$headers = 'From: alana.cool@gmail.com' . "\r\n" .
    'Reply-To: harvardfroshims@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);



?>



