<?php
require 'model/baza.php';
$naslov = 'BoxMarcet';
$nav = [
    'Home' => 'index.php',
    'AddProducts' => 'addproducts.php',
];
$qr = $baza->query('SELECT * FROM products');
$products = $qr->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $naslov; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>
<body>
    <nav class="container text-center m-4">
        <?php foreach ($nav as $keyNav => $valueNav) { ?>
        <a class="m-4" href="<?php echo $valueNav; ?>"><?php echo $keyNav; ?></a>
        <?php }?>
        <hr>
    </nav>
    <div class="container">
    <form  action="controller/controllerSearch.php" method="post">
        <input type="text" name="search" placeholder="SEARCH">
        <button class="btn btn-sm btn-dark" type="submit">SEARCH PRODUCT</button>
    </form>
    </div>
    <div class="container">
        <?php foreach ($products as $product) { ?>
        <ul>
            <li><?php echo $product['name']; ?></li>
            <li><?php echo $product['description']; ?></li>
            <li><?php echo $product['amount']; ?></li>
            <li><?php echo $product['price']; ?></li>
            <a class="btn btn-sm btn-info" href="more.php?id=<?php echo $product['id']; ?>">More</a>
            <a class="btn btn-sm btn-danger" href="delete.php?id=<?php echo $product['id']; ?>">Delete</a>
        </ul>
        <?php } ?>
    </div>
</body>
</html>