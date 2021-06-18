<?php
session_start();

$css 	= "static/css/";
$js 	= "static/js/";
$img	= "static/img/";
$tpl	= "includes/";

/* Important Variables */
$websiteName = 'اسم موقعك';
$author = '(اسمك)';

/* Sending Email Variables */
$host = "smtp.gmail.com";
$email = "freelancertesting256@gmail.com";
$password = "freelance256";
$port = 587;
$reply = "noreply@example.com";

include 'includes/autoloader.php';