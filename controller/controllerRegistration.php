<?php

require '../model/baza.php';
if (!isset($_POST['name']) || empty($_POST['name'])) {
    exit('Errors name');
}
if (!isset($_POST['email']) || empty($_POST['email'])) {
    exit('Errors email');
}
if (!isset($_POST['pass']) || empty($_POST['pass'])) {
    exit('Errors pass');
}
if (!isset($_POST['price']) || empty($_POST['price']) === '') {
    exit('Errors price');
}
$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$price = $_POST['price'];

$baza->query("INSERT INTO customer(name, email, pass, price) VALUES('$name','$email','$pass',$price)");
header('Location:../index.php');
