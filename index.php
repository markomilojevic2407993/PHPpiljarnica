<?php

require 'model/baza.php';
$naslov = 'BoxMarcet';
$nav = [
    'Home' => 'index.php',

    'Registraion' => 'registration.php',
    'login' => 'login.php',
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
<div class="container">
    
    <?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();

    // Provera da li ključ "customer" postoji pre pristupa vrednosti
    if (isset($_SESSION['customer']['name'])) {
        // Pristupanje vrednosti ključa "customer"
        $customerName = $_SESSION['customer']['name'];
        // Ispisivanje HTML taga sa imenom klijenta
        echo '<p>'.$customerName.'</p>';
        echo "<a  href='loginDelete.php'>unlogin</a>";
        if (isset($_SESSION['customer']['email']) && $_SESSION['customer']['email'] === '123@123') {
            $nav['AddProducts'] = 'addproducts.php';
        }
    } else {
        echo '<a href="login.php">Login</a>';
    }
}
?>
</div>

        <nav class="container text-center m-4">
        <?php foreach ($nav as $keyNav => $valueNav) { ?>
        <a class="m-4" href="<?php echo $valueNav; ?>"><?php echo $keyNav; ?></a>
        <?php }?>
        <hr>
    </nav>
    <div class="container">
    <form  action="controller/controllerSearch.php" method="post">
        <input class="form-control text-center" type="text" name="search" placeholder="SEARCH">
        <button class="btn btn-sm btn-info" type="submit">SEARCH PRODUCT</button>
    </form>
    </div>
    <div class="container">
    <div class="row">
        
            <?php foreach ($products as $product) { ?>
                <div class="col-md-3 m-2 border bg-secondary">
                <ul type="none">
                    <li >Name: <?php echo $product['name']; ?></li><hr>
                    <li>Description: <?php echo $product['description']; ?></li><hr>
                    <li>Warehouse: <?php echo $product['amount']; ?> kg</li><hr>
                    <li>Price: <?php echo $product['price']; ?>.99rsd per kg</li><hr>
                    <a class="btn btn-sm btn-info" href="more.php?id=<?php echo $product['id']; ?>">More</a>
                    <?php if (isset($_SESSION['customer']['email']) && $_SESSION['customer']['email'] === '123@123') { ?>
                    <a class="btn btn-sm btn-danger" href="delete.php?id=<?php echo $product['id']; ?>">Delete</a>
                    <a class="btn btn-sm btn-success" href="update.php?id=<?php echo $product['id']; ?>">Update</a>
                    <?php }?>
                </ul>
                </div>
            <?php } ?>
        
    </div>
</div>
</body>
</html>