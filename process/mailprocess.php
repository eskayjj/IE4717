<?php
    $to = 'f31ee@localhost"';
    $subject = 'subject';
    $message = 'testing';
    $headers = 'From: f32ee@localhost'. "\r\n" . 'Reply-To: f32ee@localhost' . "\r\n" . 'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers, '-ff32ee@localhost');

    echo("mail sent to: ". $to);
?>