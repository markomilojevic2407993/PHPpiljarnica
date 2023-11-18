<?php

require '../model/baza.php';

if (!isset($_POST['search']) || empty($_POST['search'])) {
    exit('nije uneto nista kao pretraga');
}
$name = $_POST['search'];

$result = $baza->query("SELECT * FROM products WHERE name LIKE '%$name%' OR description LIKE '%$name%'");
$products = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
</head>
<body>
    <nav>
        <a href="../index.php">Come back on Home</a>
    </nav>
<div class="container">
        <?php foreach ($products as $product) { ?>
        <ul>
            <li><?php echo $product['name']; ?></li>
            <li><?php echo $product['description']; ?></li>
            <li><?php echo $product['amount']; ?></li>
            <li><?php echo $product['price']; ?></li>
            <a href="more.php?id=<?php echo $product['id']; ?>">More</a>
        </ul>
        <?php } ?>
    </div>
</body>
</html>