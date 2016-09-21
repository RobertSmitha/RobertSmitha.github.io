<?php

// configure
$from = 'Vehicle Request <customer@tallyvalet.com>'; 
$sendTo = 'Vehicle Request <govclubvalet@gmail.com>';
$subject = 'New Vehicle Request';
$fields = array('message' => 'Ticket number: '); // array variable name => Text to appear in email
$okMessage = 'Vehicle Request successfully submitted. Thank you!';
$errorMessage = 'There was an error while submitting the form. Please try again later';

// let's do the sending

try
{
    $emailText = "New Vehicle Request: ";

    foreach ($_POST as $key => $value) {

        if (isset($fields[$key])) {
            $emailText .= "$fields[$key]: $value\n";
        }
    }

    mail($sendTo, $subject, $emailText, "From: " . $from);

    $responseArray = array('type' => 'success', 'message' => $okMessage);
}
catch (\Exception $e)
{
    $responseArray = array('type' => 'danger', 'message' => $errorMessage);
}

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);
    
    header('Content-Type: application/json');
    
    echo $encoded;
}
else {
    echo $responseArray['message'];
}
