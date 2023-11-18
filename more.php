<?php

require 'model/baza.php';

$id = $_GET['id'];
$result = $baza->query("SELECT * FROM products WHERE id=$id");
$product = $result->fetch_array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav>
        <a href="index.php">Come Back</a>
    </nav>
    <ul>   
        <li><?php echo $product['name']; ?></li>
        <li><?php echo $product['description']; ?></li>
        <li><?php echo $product['amount']; ?></li>
        <li><?php echo $product['price']; ?></li>
    </ul>
</body>
</html>