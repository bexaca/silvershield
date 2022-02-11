<?php
echo "ERROR!";

if (!$_POST) exit;


if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

$name     = $_POST['name'];
$email    = $_POST['email'];
$subject  = $_POST['subject'];
$message = $_POST['message'];

if (get_magic_quotes_gpc()) {
    $message = stripslashes($message);
}

$address = "silver.office365@gmail.com";
$e_subject = "$name Vam je poslao email.";
$e_content = "$message" . PHP_EOL . PHP_EOL;
$e_reply = "$name može biti kontaktiran putem emaila: $email.";

$msg = wordwrap($e_content . $e_reply, 70);

$headers = "From: $email" . PHP_EOL;
$headers .= "Reply-To: $email" . PHP_EOL;
$headers .= "MIME-Version: 1.0" . PHP_EOL;
$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

if (mail($address, $e_subject, $msg, $headers)) {
    echo "$name";
} else {
    echo 'ERROR!';
}
