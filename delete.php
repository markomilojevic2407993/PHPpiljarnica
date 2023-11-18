<?php

require 'model/baza.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    exit('niej unet id');
}
$id = $_GET['id'];

$result = $baza->query("DELETE FROM products WHERE id=$id");

header('Location:index.php');

exit;

$result = $baza->query("UPDATE products SET name='$name', description='$description', amount='$amount', price='$price' WHERE id=$id");
