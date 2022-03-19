<?php
    $dsn = 'mysql:host=acw2033ndw0at1t7.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=x7sd1lczpn9hja36';
    $username = 'i3j6yd9q6r9nql63';
    $password = 'lwwmobf6kr2oer9u';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('/model/database_error.php');
        exit();
    }
?>