<?php

require 'model/baza.php';

$id = $_GET['id'];
$result = $baza->query("SELECT * FROM products WHERE id=$id");
$products = $result->fetch_array();

// var_dump($products);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="controller/controllerUpdate.php" method="get">
        <input type="text" name="name" placeholder="<?php echo $products['name']; ?>">
        <input type="text" name="description" placeholder="<?php echo $products['description']; ?>">
        <input type="text" name="amount" placeholder="<?php echo $products['amount']; ?>">
        <input type="number" name="price" placeholder="<?php echo $products['price']; ?>">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        <button type="submit">Update product</button>
    </form>
    
</body>
</html>