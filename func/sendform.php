<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
// Collect POST data
$postData = "";
foreach ($_POST as $key => $value) {
    if($key!="fname"){
		if($value=="true"){
			$value="კი";
		}
		if($value=="false"){
			$value="არა";
		}

    $postData .= ucfirst($key) . ": " . ($value=="true"?"კი":($value=="false"?"არა":$value)) . "\n";
}
}

// Set email parameters
$to = "sales@elsede.ge,info@elsede.ge,ishal10@freeuni.edu.ge";
$subject = "ახალი სესხის მოთხოვნა ";
$headers = "From:Elsede Credit <plaform@elsede.ge>\r\n";
$headers .= "Reply-To: sales@elsede.ge\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Send the email
$mailSent = mail($to, $subject, $postData, $headers);

// Check if the email was sent successfully
if ($mailSent) {
    echo "Your form has been submitted successfully.";
} else {
    echo "There was an error submitting the form.";
}



?>