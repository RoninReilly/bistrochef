<?php
$errorMSG = "";

if (empty($_POST["name"])) {
    $errorMSG = "Необходимо ввести имя ";
} else {
    $name = $_POST["name"];
}

if (empty($_POST["email"])) {
    $errorMSG = "Необходимо ввести Email";
} else {
    $email = $_POST["email"];
}

if (empty($_POST["message"])) {
    $errorMSG = "Необходимо ввести сообщение";
} else {
    $message = $_POST["message"];
}

if (empty($_POST["terms"])) {
    $errorMSG = "Необходимо подтверждение";
} else {
    $terms = $_POST["terms"];
}

$EmailTo = "Bistroceff@mail.ru";
$Subject = "Новое сообщение с сайта";

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $message;
$Body .= "\n";
$Body .= "Terms: ";
$Body .= $terms;
$Body .= "\n";

// send email
$success = mail($EmailTo, $Subject, $Body, "From:".$email);

// redirect to success page
if ($success && $errorMSG == ""){
   echo "Успех";
}else{
    if($errorMSG == ""){
        echo "Что-то пошло не так :(";
    } else {
        echo $errorMSG;
    }
}
?>