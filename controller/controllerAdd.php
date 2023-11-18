<?php

require '../model/baza.php';

if (!isset($_POST['name']) || empty($_POST['name'])) {
    exit('nema ne postoji');
}
if (!isset($_POST['description']) || empty($_POST['description'])) {
    exit('description ne postoji');
}
if (!isset($_POST['amount']) || empty($_POST['amount'])) {
    exit('amount ne postoji');
}
if (!isset($_POST['price']) || empty($_POST['price'])) {
    exit('price ne postoji');
}
$name = $_POST['name'];
$description = $_POST['description'];
$amount = $_POST['amount'];
$price = $_POST['price'];

$baza->query("INSERT INTO products(name, description, amount, price) VALUES ('$name','$description','$amount',$price)");

header('Location:../index.php');
