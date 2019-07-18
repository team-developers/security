<?php

$message = $_POST['message'];
$phone = $_POST['phone'];
$name = $_POST['name'];


include('PHPMailer-master/PHPMailerAutoload.php');



    $emailTo = "ayushjaiswal34@gmail.com";

    $subject = "Website Enquiry from $name";

    $body = "$message";

    $headers = "From: ayushjaiswal34@gmail.com";

    if (mail($emailTo, $subject, $body, $headers)) {
        
        echo "The email was sent successfully";
        
    } else {
        
        echo "The email could not be sent.";
        
    }


?>



   

