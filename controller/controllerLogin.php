<?php

require '../model/baza.php';
if (!isset($_POST['email']) || empty($_POST['email'])) {
    exit('nije unet email');
}
if (!isset($_POST['pass']) || empty($_POST['pass'])) {
    exit('niste uneli password');
}
$email = $_POST['email'];
$pass = $_POST['pass'];

$result = $baza->query("SELECT * FROM customer WHERE email='$email' AND pass='$pass'");

if ($result->num_rows > 0) {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $row = $result->fetch_assoc();
    $_SESSION['customer'] = $row;
    header('Location:../index.php');
} else {
    exit('Email ne posotji');
}
