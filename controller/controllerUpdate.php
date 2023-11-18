<?php

require '../model/baza.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    exit('Nije odabran id ili isti ne postoi');
}
$id = intval($_GET['id']);
$name = $_GET['name'];
$description = $_GET['description'];
$amount = $_GET['amount'];
$price = $_GET['price'];
$baza->query("UPDATE products SET name='$name', description='$description', amount='$amount', price=$price WHERE id=$id");
header('Location:../index.php');
